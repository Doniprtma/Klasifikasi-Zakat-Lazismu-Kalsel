<?php

namespace App\Http\Controllers;

use App\Models\Cabang;
use App\Models\Kriteria;
use App\Models\KriteriaDetail;
use App\Models\PenerimaZakat;
use App\Models\PenyaluranDana;
use Illuminate\Http\Request;

use App\Models\PerhitunganSaw;
use DB;
use Auth;
use Carbon\Carbon;

class PerhitunganSawController extends Controller
{
    //

    public function index(Request $request)
    {
        $jenis_zakat = $request->input('jenis_zakat');
        $tgl_perhitungan = $request->input('tgl_perhitungan');
        $cabang_id = $request->input('cabang_id');

        $datas = PenerimaZakat::when($jenis_zakat, function ($query) use ($jenis_zakat) {
            $query->where('jenis_zakat', $jenis_zakat);
        })
            ->where('cabang_id', $cabang_id) // Add cabang_id filter
            ->whereIn('id', function ($query) {
                $query->select('penerima_id')
                    ->from('proses_perhitungan');
            })
            ->when($tgl_perhitungan, function ($query) use ($tgl_perhitungan) {
                $query->whereHas('perhitunganSaw', function ($subquery) use ($tgl_perhitungan) {
                    $subquery->where('tgl_perhitungan', $tgl_perhitungan);
                });
            })
            ->get();

        $minmaxValues = PerhitunganSaw::select('proses_perhitungan.kode_kriteria', DB::raw('
        CASE
            WHEN kriteria.atribut = "cost" THEN MIN(proses_perhitungan.nilai)
            WHEN kriteria.atribut = "benefit" THEN MAX(proses_perhitungan.nilai)
        END AS minmax_value
    '))
            ->join('kriteria', 'kriteria.kode_kriteria', '=', 'proses_perhitungan.kode_kriteria')
            ->join('penerima_zakat', 'penerima_zakat.id', '=', 'proses_perhitungan.penerima_id')
            ->where('penerima_zakat.cabang_id', $cabang_id)
            ->when($tgl_perhitungan, function ($query) use ($tgl_perhitungan) {
                $query->where('proses_perhitungan.tgl_perhitungan', $tgl_perhitungan);
            })
            ->when($jenis_zakat, function ($query) use ($jenis_zakat) {
                $query->where('penerima_zakat.jenis_zakat', $jenis_zakat);
            })
            ->groupBy('proses_perhitungan.kode_kriteria')
            ->get();

        $cabangs = Cabang::get();

        $kriteria = Kriteria::get();

        $penyalurandana = PenyaluranDana::query();
        $penyalurandana2 = PenyaluranDana::get();
        return view('perhitungansaw.index', compact(['datas', 'minmaxValues', 'kriteria', 'jenis_zakat', 'tgl_perhitungan', 'cabang_id', 'cabangs', 'penyalurandana', 'penyalurandana2']));
    }

    public function laporanSaw(Request $request)
    {
        $cabangs = Cabang::all(); 
        return view('perhitungansaw.laporan', compact('cabangs'));
    }
    
    public function laporanCetak(Request $request)
    {
        $tgl_perhitungan = $request->input('tgl_perhitungan');
        $cabang_id = $request->input('cabang');
    
        $query = PenyaluranDana::where('tgl_perhitungan', $tgl_perhitungan)
                    ->whereHas('penerimaZakat', function($q) use ($cabang_id) {
                        if ($cabang_id) {
                            $q->where('cabang_id', $cabang_id);
                        }
                    });
    
        $datas = $query->get();
        $groupedDatas = $datas->groupBy('jenis_zakat');
        
        return view('perhitungansaw.cetak', compact('groupedDatas', 'tgl_perhitungan'));
    }
    
    
    public function create(Request $request)
    {
        $jenis_zakat = $request->input('req');
        $cabang_id = $request->input('cabang_id');
        $tgl_perhitungan = $request->input('tgl_perhitungan');

        $cabang = Cabang::where('id', $cabang_id)->first();

        $penerimazakats = PenerimaZakat::where('jenis_zakat', $jenis_zakat)
            ->whereNotIn('id', function ($query) {
                $query->select('penerima_id')->from('proses_perhitungan');
            })
            ->where('cabang_id', $cabang_id)
            ->get();
        $kriteriadetail = KriteriaDetail::get();

        return view('perhitungansaw.create', compact(['penerimazakats', 'kriteriadetail', 'tgl_perhitungan', 'cabang', 'jenis_zakat']));
    }

    public function store(Request $request)
    {

        $request->validate([
            'penerima_id' => 'required|integer',
            'kode_kriteria_c1' => 'required',
            'kode_kriteria_c2' => 'required',
            'kode_kriteria_c3' => 'required',
            'kode_kriteria_c4' => 'required',
            'tgl_perhitungan' => 'required',
        ]);

        PerhitunganSaw::create([
            'tgl_perhitungan' => $request->tgl_perhitungan,
            'penerima_id' => $request->penerima_id,
            'kode_kriteria' => 'C1',
            'nilai' => $request->kode_kriteria_c1,
        ]);

        PerhitunganSaw::create([
            'tgl_perhitungan' => $request->tgl_perhitungan,
            'penerima_id' => $request->penerima_id,
            'kode_kriteria' => 'C2',
            'nilai' => $request->kode_kriteria_c2,
        ]);

        PerhitunganSaw::create([
            'tgl_perhitungan' => $request->tgl_perhitungan,
            'penerima_id' => $request->penerima_id,
            'kode_kriteria' => 'C3',
            'nilai' => $request->kode_kriteria_c3,
        ]);

        PerhitunganSaw::create([
            'tgl_perhitungan' => $request->tgl_perhitungan,
            'penerima_id' => $request->penerima_id,
            'kode_kriteria' => 'C4',
            'nilai' => $request->kode_kriteria_c4,
        ]);

        return redirect()->route('perhitungansaw.index', [
            'jenis_zakat' => $request->jenis_zakat,
            'tgl_perhitungan' => $request->tgl_perhitungan,
            'cabang_id' => $request->cabang_id,
        ])->with(['message' => 'Data Berhasil disimpan']);
    }
    
    public function edit($id)
    {

        $penerimazakat = PenerimaZakat::where('id', $id)->first();
        $data = PerhitunganSaw::where('penerima_id', $penerimazakat->id)->get();

        $kriteriadetail = KriteriaDetail::get();

        return view('perhitungansaw.edit', compact('data', 'penerimazakat', 'kriteriadetail'));
    }

    public function update(Request $request, $id)
    {

        // Update for C1
        PerhitunganSaw::where('penerima_id', $id)->where('kode_kriteria', 'C1')
            ->update(['nilai' => $request->kode_kriteria_c1]);

        // Update for C2
        PerhitunganSaw::where('penerima_id', $id)->where('kode_kriteria', 'C2')
            ->update(['nilai' => $request->kode_kriteria_c2]);

        // Update for C3
        PerhitunganSaw::where('penerima_id', $id)->where('kode_kriteria', 'C3')
            ->update(['nilai' => $request->kode_kriteria_c3]);

        // Update for C4
        PerhitunganSaw::where('penerima_id', $id)->where('kode_kriteria', 'C4')
            ->update(['nilai' => $request->kode_kriteria_c4]);

        return redirect()->route('perhitungansaw.index', [
            'jenis_zakat' => $request->jenis_zakat,
            'tgl_perhitungan' => $request->tgl_perhitungan,
            'cabang_id' => $request->cabang_id,
        ])->with(['message' => 'Data Berhasil diubah']);
    }
    public function destroy($id)
    {


        PerhitunganSaw::where('penerima_id', $id)->delete();
        return redirect()->back()->with(['message' => 'Data Berhasil dihapus']);
    }
}
