<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;

class EstatesController extends Controller
{
    public function index() : View
    {
        return view('index'
        // , 
        // [
        //     Estates::class->paginate(50),
        // ]
    );
    }
}
