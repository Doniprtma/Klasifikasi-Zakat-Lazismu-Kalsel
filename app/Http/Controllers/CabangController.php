<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Cabang;
use DB;
use Auth;
use Carbon\Carbon;

class CabangController extends Controller
{
    //

    public function index()
    {
        $datas = Cabang::get();
        return view('cabang.index',compact(['datas']));
    }

    public function create()
    {

        return view('cabang.create');
    }
    public function store(Request $request)
    {

        Cabang::create([
            'kategori' => $request->kategori,
            'nama_kantor' => $request->nama_kantor
        ]);

        return redirect()->route('cabang.index')->with(['message' => 'Data Berhasil disimpan']);
    
    }
    public function edit($id)
    {

        $data = Cabang::where('id', $id)->first();
        return view('cabang.edit',compact(['data']));
    }
    public function update(Request $request, $id)
    {

        Cabang::where('id', $id)->update([
            'kategori' => $request->kategori,
            'nama_kantor' => $request->nama_kantor
        ]);

        return redirect()->route('cabang.index')->with(['message' => 'Data Berhasil diubah']);
    
    }
    public function destroy($id)
    {


         Cabang::where('id', $id)->delete();

        return redirect()->route('cabang.index')->with(['message' => 'Data Berhasil dihapus']);
    
    }

}
