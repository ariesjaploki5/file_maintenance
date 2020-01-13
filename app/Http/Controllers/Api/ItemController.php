<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Item;

class ItemController extends Controller
{
    public function index(){
        $data = Item::where('category_id', request()->category_id)->orderBy('item_desc', 'asc')->get();

        return response()->json($data);
    }

}
