<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\EstateRequest;
use App\Models\Estate;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;


class EstateController extends Controller
{
    public function index() : View
    {
        return view('estate.index', 
            [
                'estates'=>Estate::paginate(50),
            ]
        );
    }

    public function new() : View
    {
        $estate = new Estate();

        return view('estate.new',[
            "estate"=>$estate,
        ]); 
    }

    public function store(EstateRequest $request): RedirectResponse
    {
        $estate = Estate::create([
            'title'=>$request->input('title'),
            'square_meters'=>$request->input('square_meters'),
            'price'=>$request->input('price'),
            'description'=>$request->input('description'),
            'localisation'=>$request->input('localisation'),
            'sold'=>$request->input('sold') ?? false,
        ]);

        return redirect()
        ->route('estate.show',[
            'estate' => $estate,
        ])
        ->with('success', 'This estate has been saved in our Database');
    }

    public function show(Estate $estate): View
    {
        if(!$estate->id){
            return view('estate.index')->with('error',"This estate doesn't exist");
        }

        return view('estate.show', [
            'estate'=>$estate
        ]);
    }

    public function edit(Estate $estate): View
    {
        if(!$estate->id){
            return view('estate.index')->with('error',"This estate doesn't exist");
        }    
        return view('estate.edit', [
            'estate'=>$estate,
        ]);
    }

    public function update(EstateRequest $request, Estate $estate) : RedirectResponse
    {
        $estate ->update([
            'title'=>$request->input('title'),
            'square_meters'=>$request->input('square_meters'),
            'price'=>$request->input('price'),
            'description'=>$request->input('description'),
            'localisation'=>$request->input('localisation'),
            'sold'=>$request->input('sold') ?? false,
        ]);
        $estate->save();

        return redirect()
        ->route('estate.show', [
            'estate'=>$estate,
        ])
        ->with('success','Your estate has correctly been updated');
    }

    public function delete(Estate $estate): View
    {
        return view('estate.delete', [
            'estate'=>$estate,
        ]);
    }

    public function remove(Estate $estate): RedirectResponse
    {
        $estate->delete();
        return redirect()
        ->route('estate.index')
        ->with('success', 'Your estate has been successfully removed');
    }
}
