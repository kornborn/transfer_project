<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transfer;

class TransfersController extends Controller
{
    public function makeTransfer(Request $request)
    {
        $this->validate($request, [
            'transfer-giving-id' => 'required',
            'transfer-receiver-id' => 'required',
            'transfer-sum' => 'required',
            'transfer-date' => 'required',
        ]);

        $transfer = new Transfer();
        $transfer->giving_id = $request->input('transfer-giving-id');
        $transfer->receiver_id = $request->input('transfer-receiver-id');
        $transfer->money = $request->input('transfer-sum');
        $transfer->date = $request->input('transfer-date');
        $transfer->save();

        return redirect('/transfer')->with('status', 'Transfer accepted!');
    }
}
