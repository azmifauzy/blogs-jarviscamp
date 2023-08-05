<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('contents.users', [
            "title" => "Users",
            "users" => User::all(),
            "posts" => Post::all(),
        ]);
    }

    public function edit($id)
    {
        return view('contents.edit', [
            "title" => "Users Edit",
            "user" => User::find($id),
        ]);
    }

    public function update($id, Request $request)
    {
        $user = User::find($id);
        
        $validatedData = $request->validate([
            "email" => 'unique:users,email,' . $id . '|required',
            "name" => 'required|max:100|min:5',
        ]);

        $user->update($validatedData);
        return redirect('/users/' . $id . '/edit')->with('success', 'Berhasil mengubah data.');
    }

    public function create()
    {
        return view('contents.create', [
            "title" => "Users Create",
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "email" => 'unique:users,email|required',
            "name" => 'required|max:100|min:5',
            "password" => 'required|max:255|min:5',
        ]);

        User::create($validatedData);

        return redirect('/users')->with('success', 'Berhasil menambah data.');
    }

    public function show($id)
    {
        return view('contents.show', [
            "title" => "Users Detail",
            "user" => User::find($id),
        ]);
    }


}
