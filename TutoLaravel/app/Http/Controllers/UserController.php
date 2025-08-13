<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\UserFormRequest;

class UserController extends Controller
{
    public function index(): View
    {
        // User::create([
        //     'name' => "John Hammond",
        //     'email'=> "john.hammond@mail.com",
        //     'password'=> Hash::make('Test1234=')
        // ]);
        return view('user.index',[
            "users"=> User::all(),
        ]);
    }

    public function show(User $user): View
    {
        return view('user.show',[
            'user'=>$user,
        ]);
    }

    public function create(): View
    {
        $user = new User();

        return view('user.create', [
            'user'=> $user,
        ]);
    }

    public function store(UserFormRequest $request, User $user): RedirectResponse
    {
        $data = $request->validated();
        $user->update($data);

        return redirect()
        ->route('user.show',[
            'user'=>$user,
        ])
        ->with('success', 'Welcome young Padawan!');
    }

    
}
