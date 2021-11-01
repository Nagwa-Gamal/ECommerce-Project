<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class FristController extends Controller
{
    //
    public function getFrist(){

        return view('firstv');
    }
}
