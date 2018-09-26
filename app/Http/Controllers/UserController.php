<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Возвращает view со всеми юзерами
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function getUsers()
    {
        $users = User::all();

        return view('users')->with('users', $users);
    }

    /**
     * Добавление нового юзера
     *
     * @param Request $request запрос
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function addUser(Request $request)
    {
        $user = new User();
        $user->money = $request->input('money');
        $user->save();

        return redirect('/')->with('status', 'User added!');
    }
}
