<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\InMemo;
use App\Models\KategoriDana;
use App\Models\DanaZakat;
use App\Models\Cabang;
use App\Models\PengaturanDana;
use DB;
use Auth;
use Carbon\Carbon;

class InMemoController extends Controller
{
    //

    public function index()
    {
        $datas = InMemo::get();
        return view('inmemo.index', compact(['datas']));
    }

    public function create()
    {

        $kategorisZakat = KategoriDana::where('jenis_dana', '!=', 'Bagi Dana Zakat Otomatis')->get();
        //$kategorisPengeluaran = KategoriDana::where('jenis_dana', '=', 'Pengeluaran')->get();
        $cabangs = Cabang::get();
        return view('inmemo.create', compact('cabangs', 'kategorisZakat'));
    }
    public function store(Request $request)
    {

        $file = $request->file('file');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('files'), $filename);

        $inMemo = InMemo::create([
            'kategoridana_id' => $request->kategoridana_id,
            'uraian' => $request->uraian,
            'anggaran' => $request->anggaran,
            'tglpengajuan' => $request->tglpengajuan,
            'tglpenyaluran' => $request->tglpenyaluran,
            'file' => $filename,
            'cabang_id' => $request->cabang_id,
            'status' => 'Pending',
        ]);

        return redirect()->route('inmemo.index')->with(['message' => 'Data Berhasil disimpan']);

    }
    public function edit($id)
    {

        $inmemo = InMemo::where('id', $id)->first();
        $kategorisZakat = KategoriDana::where('jenis_dana', '!=', 'Bagi Dana Zakat Otomatis')->get();
        $cabangs = Cabang::get();

        return view('inmemo.edit', compact(['inmemo', 'kategorisZakat', 'cabangs']));
    }
    public function update(Request $request, $id)
    {
        $inMemo = InMemo::findOrFail($id); // Temukan data InMemo berdasarkan ID

        // Perbarui informasi InMemo dengan data yang baru
        $inMemo->update([
            'kategoridana_id' => $request->kategoridana_id,
            'uraian' => $request->uraian,
            'anggaran' => $request->anggaran,
            'tglpengajuan' => $request->tglpengajuan,
            'tglpenyaluran' => $request->tglpenyaluran,
            'cabang_id' => $request->cabang_id,
            'status' => $request->status,
        ]);
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('files'), $filename);


            // Update nama file baru dalam database
            $inMemo->update(['file' => $filename]);
        }
        return redirect()->route('inmemo.index')->with(['message' => 'Data Berhasil diubah']);

    }
    public function destroy($id)
    {

        InMemo::where('id', $id)->delete();

        return redirect()->route('inmemo.index')->with(['message' => 'Data Berhasil dihapus']);

    }

}
