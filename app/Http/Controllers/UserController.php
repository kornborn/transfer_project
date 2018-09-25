<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getUsers()
    {
        $users = User::all();

        return view('users')->with('users', $users);
    }

    public function addUser(Request $request)
    {
        $money = $request->input('money');
        $user = new User();
        $user->money = $money;
        $user->save();

        return redirect('/')->with('status', 'User added!');
    }
}
