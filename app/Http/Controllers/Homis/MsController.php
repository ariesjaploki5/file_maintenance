<?php

namespace App\Http\Controllers\Homis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class MsController extends Controller
{
    public function index(){
        $data = DB::table("")->get();

        return response()->json($data);
    }
}
