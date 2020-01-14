<?php

namespace App\Http\Controllers\Homis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\ItemHclass;

class MsController extends Controller
{
    public function index(){
        $data = DB::table("mmo.dbo.tfn_homis_ms()")->where('homis_desc', 'like', '%'.request()->word.'%')->orderBy('homis_desc', 'asc')->get();

        return response()->json($data);
    }

    public function update(Request $request){
        $homis_dm = ItemHclass::firstOrCreate([
            'cl1comb' => $request->cl1comb,
            'cl2comb' => $request->cl2comb,
            'item_id' => $request->item_id,

        ]);

        return response()->json();
    }
}
