<?php

namespace App\Http\Controllers\Homis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\ItemHdmhdr;

class DmController extends Controller
{
    public function index(){
        $data = DB::table("mmo.dbo.tfn_homis_dm()")
        ->where('homis_desc', 'like', '%'.request()->word.'%')
        ->orderBy('homis_desc', 'asc')
        // ->orderBy('chrgdesc', 'asc')
        ->get();

        return response()->json($data);
    }

    public function update(Request $request, $dmdcomb, $dmdctr){
        $homis_dm = ItemHdmhdr::firstOrCreate([
            'dmdcomb' => $dmdcomb,
            'dmdctr' => $dmdctr,
            'item_id' => $request->item_id,

        ]);

        return response()->json();
    }
}
