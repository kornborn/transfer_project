<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransferController extends Controller
{
    public function makeTransfer(Request $request)
    {

        return $request->input();
    }
}
