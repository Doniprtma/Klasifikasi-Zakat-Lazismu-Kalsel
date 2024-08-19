<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\PengaturanDana;
use App\Models\KategoriDana;
use DB;
use Auth;
use Carbon\Carbon;

class PengaturanDanaController extends Controller
{
    //

    public function index()
    {
        $data = PengaturanDana::first();
        return view('pengaturandana.index',compact(['data']));
    }

    public function create()
    {
        /*$kategoridanas = KategoriDana::get();
        return view('pengaturandana.create', compact('kategoridanas'));*/
    }
    public function store(Request $request)
    {

       /* PengaturanDana::create([
            'nama' => $request->nama,
            'bobot' => $request->bobot,
            'atribut' => $request->atribut,
            'kode_pengaturandana' => $request->kode_pengaturandana
        ]);

        return redirect()->route('pengaturandana.index')->with(['message' => 'Data Berhasil disimpan']);*/
    
    }
    public function edit($id)
    {

        $data = PengaturanDana::where('id', $id)->first();
        return view('pengaturandana.edit',compact(['data']));
    }
    public function update(Request $request, $id)
    {

        PengaturanDana::where('id', $id)->update([
            'fakir' => $request->fakir,
            'miskin' => $request->miskin,
            'amil' => $request->amil,
            'mualaf' => $request->mualaf,
            'riqab' => $request->riqab,
            'gharim' => $request->gharim,
            'fisabillah' => $request->fisabillah,
            'ibnu_sabil' => $request->ibnu_sabil
        ]);

        return redirect()->route('pengaturandana.index')->with(['message' => 'Data Berhasil diubah']);
    
    }
    public function destroy($id)
    {


         PengaturanDana::where('id', $id)->delete();

        return redirect()->route('pengaturandana.index')->with(['message' => 'Data Berhasil dihapus']);
    
    }

}
