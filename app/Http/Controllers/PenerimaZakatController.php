<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cabang;
use App\Models\KriteriaDetail;
use App\Models\PenerimaZakat;
use App\Models\PerhitunganSaw;
use App\Models\PenyaluranDana;
use DB;
use Auth;
use Carbon\Carbon;

class PenerimaZakatController extends Controller
{
    public function index()
    {
        $datas = PenerimaZakat::get();
        $perhitungan = PerhitunganSaw::get();
        return view('penerimazakat.index', compact(['datas', 'perhitungan']));
    }

    public function create()
    {
        $cabangs = Cabang::get();
        $kriteriadetail = KriteriaDetail::get();
        return view('penerimazakat.create', compact('cabangs', 'kriteriadetail'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_penerima' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'jenis_zakat' => 'required|string',
            'cabang_id' => 'required|integer',
            'nik' => 'required|string|max:255',
            'program' => 'required|string|max:255',
            'jenis_kelamin' => 'required|string',
            'tgl_perhitungan' => 'required|date',
            'kode_kriteria_c1' => 'required|integer',
            'kode_kriteria_c2' => 'required|integer',
            'kode_kriteria_c3' => 'required|integer',
            'kode_kriteria_c4' => 'required|integer',
        ]);

        // Pengecekan apakah penyaluran dana sudah ada
        $existingPenyaluran = PenyaluranDana::where('jenis_zakat', $request->jenis_zakat)
            ->where('tgl_perhitungan', $request->tgl_perhitungan)
            ->whereHas('penerimaZakat', function ($query) use ($request) {
                $query->where('cabang_id', $request->cabang_id);
            })
            ->first();

        if (!is_null($existingPenyaluran)) {
            return redirect()->back()->withInput()->withErrors(['msg' => 'Tidak dapat menambahkan data lagi karena penyaluran dana sudah di-generate pada tanggal perhitungan ini.']);
        }

        // Pengecekan saldo dana zakat
        if (getTotalDana($request->jenis_zakat, $request->cabang_id) <= 0) {
            return redirect()->back()->withInput()->withErrors(['msg' => 'Saldo Dana Zakat Rp 0. Tidak bisa melakukan proses perhitungan zakat dengan metode saw.']);
        }

        DB::transaction(function () use ($request) {
            $penerimaZakat = PenerimaZakat::create([
                'nama_penerima' => $request->nama_penerima,
                'alamat' => $request->alamat,
                'jenis_zakat' => $request->jenis_zakat,
                'cabang_id' => $request->cabang_id,
                'nik' => $request->nik,
                'program' => $request->program,
                'jenis_kelamin' => $request->jenis_kelamin,
            ]);

            $kriteria = ['C1', 'C2', 'C3', 'C4'];
            foreach ($kriteria as $key) {
                PerhitunganSaw::create([
                    'tgl_perhitungan' => $request->tgl_perhitungan,
                    'penerima_id' => $penerimaZakat->id,
                    'kode_kriteria' => $key,
                    'nilai' => $request->input('kode_kriteria_' . strtolower($key)),
                ]);
            }
        });

        return redirect()->route('penerimazakat.index')->with(['message' => 'Data Berhasil disimpan']);
    }

    public function edit($id)
    {
        $cabangs = Cabang::get();
        $data = PenerimaZakat::findOrFail($id);
        return view('penerimazakat.edit', compact(['data', 'cabangs']));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_penerima' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'jenis_zakat' => 'required|string',
            'cabang_id' => 'required|integer',
            'nik' => 'required|string|max:255',
            'program' => 'required|string|max:255',
            'jenis_kelamin' => 'required|string',
            'tgl_perhitungan' => 'required|date',
            'kode_kriteria_c1' => 'required|integer',
            'kode_kriteria_c2' => 'required|integer',
            'kode_kriteria_c3' => 'required|integer',
            'kode_kriteria_c4' => 'required|integer',
        ]);

        $data = PenerimaZakat::findOrFail($id);

        // Pengecekan apakah penyaluran dana sudah ada
        $existingPenyaluran = PenyaluranDana::where('jenis_zakat', $request->jenis_zakat)
            ->where('tgl_perhitungan', $request->tgl_perhitungan)
            ->whereHas('penerimaZakat', function ($query) use ($data) {
                $query->where('cabang_id', $data->cabang_id);
            })
            ->first();

        if (!is_null($existingPenyaluran)) {
            return redirect()->back()->withInput()->withErrors(['msg' => 'Tidak dapat mengubah data karena penyaluran dana sudah di-generate pada tanggal perhitungan ini.']);
        }

        DB::transaction(function () use ($request, $data) {
            $data->update([
                'nama_penerima' => $request->nama_penerima,
                'alamat' => $request->alamat,
                'jenis_zakat' => $request->jenis_zakat,
                'cabang_id' => $request->cabang_id,
                'nik' => $request->nik,
                'program' => $request->program,
                'jenis_kelamin' => $request->jenis_kelamin,
            ]);

            $kriteria = ['C1', 'C2', 'C3', 'C4'];
            foreach ($kriteria as $key) {
                $perhitunganSaw = PerhitunganSaw::where('penerima_id', $data->id)
                    ->where('kode_kriteria', $key)
                    ->first();
                if ($perhitunganSaw) {
                    $perhitunganSaw->update([
                        'tgl_perhitungan' => $request->tgl_perhitungan,
                        'nilai' => $request->input('kode_kriteria_' . strtolower($key)),
                    ]);
                } else {
                    PerhitunganSaw::create([
                        'tgl_perhitungan' => $request->tgl_perhitungan,
                        'penerima_id' => $data->id,
                        'kode_kriteria' => $key,
                        'nilai' => $request->input('kode_kriteria_' . strtolower($key)),
                    ]);
                }
            }
        });

        return redirect()->route('penerimazakat.index')->with(['message' => 'Data Berhasil diubah']);
    }

    public function destroy($id)
    {
        $data = PenerimaZakat::findOrFail($id);

        // Pengecekan apakah data sudah masuk ke perhitungan SAW
        $existingPerhitungan = PerhitunganSaw::where('penerima_id', $data->id)->exists();
        if ($existingPerhitungan) {
            return redirect()->route('penerimazakat.index')->with(['message' => 'Data sudah masuk ke perhitungan SAW, tidak dapat dihapus.']);
        }

        $data->delete();
        return redirect()->route('penerimazakat.index')->with(['message' => 'Data Berhasil dihapus']);
    }
}
