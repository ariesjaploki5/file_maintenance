<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ItemHdmhdr;

class ItemHdmhdrController extends Controller
{
    public function index(){
        $data = Item::where('category_id', request()->category_id)->orderBy('item_desc', 'asc')->get();
        return response()->json($data);
    }

    public function store(Request $request){

        $homis_dm = $request->homis_dms;
        $count = count($homis_dms);
        for($i = 0; $i < $count; $i++){
            $itemhdmhdr = ItemHdmhdr::firstOrCreate([
                'item_id' => $request->item_id,
                'dmdcomb' => $homis_dm[$i]['dmdcomb'],
                'dmdctr' => $homis_dm[$i]['dmdctr'],
            ]);
        }

        return response()->json();
    }

    public function update(Request $request, $id){

        
    }

    public function destory($id){


    }

}
