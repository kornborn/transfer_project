<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    /**
     * Возвращает view с созданием новой транзакции
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function getCreateTransaction()
    {
        return view('create_transaction');
    }

    /**
     * Возвращает view с React
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function getReact()
    {
        return view('react');
    }
}
