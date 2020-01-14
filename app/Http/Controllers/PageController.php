<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function items(){
        return view('pages.items');
    }

    public function sl_codes(){
        return view('pages.sl_codes');
    }

    public function items_dm(){
        return view('pages.items_dm');
    }

    public function homis_dm(){
        return view('pages.homis_dm');
    }

    public function homis_ms(){
        return view('pages.homis_ms');
    }
}
