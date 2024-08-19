<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Cabang;
use App\Models\DanaZakat;
use DB;
use Auth;
use Carbon\Carbon;

class DanaZakatController extends Controller
{
    //

    public function index(Request $request)
    {
        $cabangs = Cabang::get();
        $cabang_id = null;
        if($request->cabang_id) {
            $cabang_id = $request->cabang_id;
        }
        return view('danazakat.index', compact('cabangs', 'cabang_id'));
    }

    public function create()
    {

    }
    public function store(Request $request)
    {

    
    }
    public function edit($id)
    {

    }
    public function update(Request $request, $id)
    {

    
    }
    public function destroy($id)
    {


        
    
    }

}
