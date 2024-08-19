<?php

namespace App\Http\Controllers;

use App\Models\KriteriaDetail;
use Illuminate\Http\Request;

use App\Models\Kriteria;
use App\Models\PerhitunganSaw;
use DB;
use Auth;
use Carbon\Carbon;

class KriteriaController extends Controller
{
    //

    public function index()
    {
        $datas = Kriteria::get();
        $datas_detail = KriteriaDetail::get();
        
    $perhitungansaw = PerhitunganSaw::count();
        return view('kriteria.index',compact(['datas', 'datas_detail', 'perhitungansaw']));
    }

    public function create()
    {
        $kriteria_kodes = Kriteria::get();
        return view('kriteria.create', compact('kriteria_kodes'));
    }
    public function store(Request $request)
    {

        Kriteria::create([
            'nama' => $request->nama,
            'bobot' => $request->bobot,
            'atribut' => $request->atribut,
            'kode_kriteria' => $request->kode_kriteria
        ]);

        return redirect()->route('kriteria.index')->with(['message' => 'Data Berhasil disimpan']);
    
    }
    public function edit($id)
    {

        $data = Kriteria::where('id', $id)->first();
        return view('kriteria.edit',compact(['data']));
    }
    public function update(Request $request, $id)
    {

        Kriteria::where('id', $id)->update([
            'nama' => $request->nama,
            'bobot' => $request->bobot,
            'atribut' => $request->atribut
        ]);

        return redirect()->route('kriteria.index')->with(['message' => 'Data Berhasil diubah']);
    
    }
    public function destroy($id)
    {


         Kriteria::where('id', $id)->delete();

        return redirect()->route('kriteria.index')->with(['message' => 'Data Berhasil dihapus']);
    
    }
    public function detailEdit($id)
    {

        $data = KriteriaDetail::where('id', $id)->first();
        return view('kriteria.edit-detail',compact(['data']));
    }
    public function detailUpdate(Request $request, $id)
    {

        KriteriaDetail::where('id', $id)->update([
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('kriteria.index')->with(['message' => 'Data Kriteria Detail Berhasil diubah']);
    
    }
}
