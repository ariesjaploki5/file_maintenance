<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SlCodes;
use App\Http\Resources\SlCode as SlCodeResource;

class SlCodesController extends Controller
{
    public function index(){
        
        $data = SlCodeResource::collection(SlCodes::where('category_id', request()->category_id)
        ->where('sl_description', 'like', '%'.request()->word.'%')
        ->orderBy('sl_code', 'asc')
        ->get());

        return response()->json($data);
    }

    public function store(Request $request){

    }

    public function update(Request $request, $id){
        $sl_code = SlCodes::findOrFail($id);
        $sl_code->update([
            'unit_desc' => $request->unit_desc,
            'item_id' => $request->item_id,
            'brand_id' => $request->brand_id,
        ]);

        return response()->json();
    }
}
