<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Item;
use App\Http\Resources\Item as ItemResource;

class ItemController extends Controller
{
    public function index(){

        $data = Item::where('category_id', request()->category_id)->orderBy('item_desc', 'asc')->get();
        return response()->json($data);

    }


    public function items_dm(){
        
        $items = Item::where('category_id', request()->category_id)->where('item_desc', 'like', '%'.request()->word.'%')->orderBy('item_desc', 'asc')->get();
        $data = ItemResource::collection($items);

        return response()->json($data);

    }
}
