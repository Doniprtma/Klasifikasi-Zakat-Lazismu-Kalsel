<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Cabang;
use DB;
use Auth;
use Carbon\Carbon;

class UserController extends Controller
{
    //

    public function index()
    {
        $datas = User::orderBy('id', 'ASC')->get();
        return view('admin.user.index',compact(['datas']));
    }

    public function create()
    {

        $cabangs = Cabang::get();
        return view('admin.user.create', compact('cabangs'));
    }
    public function store(Request $request)
    {

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'level' => $request->level,
            'cabang_id' => $request->cabang_id,
            'password' => bcrypt($request->password)
        ]);

        return redirect()->route('user.index')->with(['message' => 'Data Berhasil disimpan']);
    
    }
    public function edit($id)
    {

       
        $data = User::where('id', $id)->first();
        $cabangs = Cabang::get();
        return view('admin.user.edit',compact(['data', 'cabangs']));
    }
    public function update(Request $request, $id)
    {
        if($request->get('password')) {


         User::where('id', $id)->update([
               'name' => $request->name,
            'email' => $request->email,
            'cabang_id' => $request->cabang_id,
            'level' => $request->level,
            'password' => bcrypt($request->password)

        ]);
        } else {

            User::where('id', $id)->update([
               'name' => $request->name,
            'cabang_id' => $request->cabang_id,
            'email' => $request->email,
            'level' => $request->level

        ]);

        }


        return redirect()->route('user.index')->with(['message' => 'Data Berhasil diubah']);
    
    }
    public function destroy($id)
    {


         User::where('id', $id)->delete();

        return redirect()->route('user.index')->with(['message' => 'Data Berhasil dihapus']);
    
    }


}
