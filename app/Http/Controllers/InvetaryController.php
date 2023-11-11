<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InvetaryController extends Controller
{
    public function see(){
        return view('invetario.see');
    }
    
}