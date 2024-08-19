<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\KategoriDana;
use DB;
use Auth;
use Carbon\Carbon;

class KategoriDanaController extends Controller
{
    //

    public function index()
    {
        $datas = KategoriDana::get();
        return view('kategoridana.index',compact(['datas']));
    }

    public function create()
    {
        return view('kategoridana.create');
    }
    public function store(Request $request)
    {

        KategoriDana::create([
            'nama_kategori' => $request->nama_kategori,
            'jenis_dana' => $request->jenis_dana
        ]);

        return redirect()->route('kategoridana.index')->with(['message' => 'Data Berhasil disimpan']);
    
    }
    public function edit($id)
    {

        $data = KategoriDana::where('id', $id)->first();
        return view('kategoridana.edit',compact(['data']));
    }
    public function update(Request $request, $id)
    {

        KategoriDana::where('id', $id)->update([
            'nama_kategori' => $request->nama_kategori,
            'jenis_dana' => $request->jenis_dana
        ]);

        return redirect()->route('kategoridana.index')->with(['message' => 'Data Berhasil diubah']);
    
    }
    public function destroy($id)
    {


        KategoriDana::where('id', $id)->delete();
        return redirect()->route('kategoridana.index')->with(['message' => 'Data Berhasil dihapus']);
    
    }

}
