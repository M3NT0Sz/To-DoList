<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(5);
        return view('users.index', [
            'users' => $users
        ]);
    }

    public function show(User $user)
    {
        return view('users.show', [
            'user' => $user
        ]);
    }

    public function create(){
        return view('users.create');
    }

    public function store(Request $request){
        $input = $request->validate([
            'name'=> 'required',
            'email'=> 'required|email',
            'password'=> 'required|min:3',
        ]);

        User::create($input);
        return redirect()->back();
    }

    public function edit(User $user)
    {
        return view('users.edit', [
            'user' => $user
        ]);
    }

    public function editUser(Request $request, User $user){
        $input = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        $user->fill($input);
        $user->save();
        return redirect()->back();
    }
}
