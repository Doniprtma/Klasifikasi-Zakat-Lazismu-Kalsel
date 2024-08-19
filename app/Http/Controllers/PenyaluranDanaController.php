<?php

namespace App\Http\Controllers;

use App\Models\Cabang;
use App\Models\DanaZakat;
use App\Models\PenerimaZakat;
use App\Models\PenyaluranDana;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenyaluranDanaController extends Controller
{
    public function index(Request $request)
    {
        $query = PenyaluranDana::query();

        if ($request->has('start_date') && $request->has('end_date')) {
            $query->whereBetween('tgl_penyaluran', [$request->start_date, $request->end_date]);
        }

        if ($request->has('jenis_zakat')) {
            $query->where('jenis_zakat', $request->jenis_zakat);
        }

        if ($request->has('cabang_id')) {
            $query->whereHas('penerimaZakat', function ($q) use ($request) {
                $q->where('cabang_id', $request->cabang_id);
            });
        }

        $datas = $query->get();
        $jenis_zakat = $request->jenis_zakat ?? null;
        return view('penyalurandana.index', compact(['datas', 'jenis_zakat']));
    }

    public function create(Request $request)
    {
        //
    }

    public function store(Request $request)
{
    $tgl_perhitungan = $request->input('tgl_perhitungan');
    $jenis_zakat = $request->input('jenis_zakat');
    $cabang_id = $request->input('cabang_id');
    $penerima_ids = $request->input('penerima_id');
    $total_dana_diterimas = $request->input('total_dana_diterima_form');
    $persentases = $request->input('total_persentase');

    foreach ($penerima_ids as $key => $penerima_id) {
        $persentase = $persentases[$key];
        $total_dana_diterima = str_replace(['.', ',', ' '], '', $total_dana_diterimas[$key]);

        $penyaluran = PenyaluranDana::create([
            'tgl_perhitungan' => $tgl_perhitungan,
            'jenis_zakat' => $jenis_zakat,
            'penerima_id' => $penerima_id,
            'persentase' => $persentase,
            'total_dana_diterima' => $total_dana_diterima,
        ]);

        $danaZakatEntries = DanaZakat::where('jenis_dana', $jenis_zakat)
            ->whereHas('jurnal', function ($query) use ($cabang_id) {
                $query->where('cabang_id', $cabang_id);
            })
            ->orderBy('jumlah_dana', 'desc')
            ->get();

        $remainingAmount = $total_dana_diterima;

        foreach ($danaZakatEntries as $entry) {
            if ($remainingAmount <= 0) {
                break;
            }

            $initialAmount = $entry->jumlah_dana;

            if ($entry->jumlah_dana >= $remainingAmount) {
                $entry->decrement('jumlah_dana', $remainingAmount);
                $remainingAmount = 0;
            } else {
                $remainingAmount -= $entry->jumlah_dana;
                $entry->update(['jumlah_dana' => 0]);  // Simpan nilai awal
            }
        }
    }

    return redirect()->route('penyalurandana.index')->with(['message' => 'Data Berhasil disimpan']);
}

    
public function batal(Request $request)
{
    $request->validate([]);

    $tgl_perhitungan = $request->input('tgl_perhitungan');
    $jenis_zakat = $request->input('jenis_zakat');
    $cabang_id = $request->input('cabang_id');

    $penyaluranDanas = PenyaluranDana::where([
        'tgl_perhitungan' => $tgl_perhitungan,
        'jenis_zakat' => $jenis_zakat,
    ])->whereHas('penerimaZakat', function ($query) use ($cabang_id) {
        $query->where('cabang_id', $cabang_id);
    })->get();

    foreach ($penyaluranDanas as $penyaluran) {
        $danaZakatEntries = DanaZakat::where('jenis_dana', $jenis_zakat)
            ->whereHas('jurnal', function ($query) use ($cabang_id) {
                $query->where('cabang_id', $cabang_id);
            })
            ->get();

        foreach ($danaZakatEntries as $entry) {
            $entry->update(['jumlah_dana' => $entry->jumlah_dana_awal]);
        }

        $penyaluran->delete();
    }

    return redirect()->back()->with(['message' => 'Data Berhasil dibatalkan']);
}

    
    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    public function cetakKwitansi(Request $request)
{
    $request->validate([
        'id' => 'required|integer',
        'tgl_penyaluran' => 'required|date',
        'cash_transfer' => 'required|string|max:255',
        'keterangan' => 'required|string',
    ]);

    $penyaluranDana = PenyaluranDana::findOrFail($request->id);

    $penyaluranDana->update([
        'tgl_penyaluran' => $request->tgl_penyaluran,
        'cash_transfer' => $request->cash_transfer,
        'keterangan' => $request->keterangan,
    ]);

    return redirect()->route('penyalurandana.show_kwitansi', ['id' => $penyaluranDana->id])
                     ->with('message', 'Data berhasil disimpan dan siap dicetak.');
}

public function showKwitansi($id)
{
    $penyaluranDana = PenyaluranDana::findOrFail($id);
    return view('penyalurandana.cetak_kwitansi', compact('penyaluranDana'));
}

    
    
}
