<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Estate;
use Illuminate\View\View;
use Illuminate\Http\Request;

class EstateController extends Controller
{
    public function index() : View
    {
        return view('estate.index'
            // , 
            // [
            //     Estate::class->paginate(50),
            // ]
        );
    }

    public function new() : View
    {
        $estate = new Estate();

        return view('estate.new',[
            "estate"=>$estate,
        ]);
    }
}
