<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PoItem;

class PoItemController extends Controller
{
    public function index(){
        $data = PoItem::orderBy('description', 'asc')->get();

        return response()->json($data);
    }

    public function store(Request $request){

        

    }

    public function show($id){

    }

    public function update(Request $request, $id){

        $po_item = PoItem::findOrFail($id);
        $po_item->update([
            'item_code' => $request->item_code,
        ]);

        return response()->json();

    }

    public function destroy($id){

    }
}
