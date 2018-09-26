<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Transaction;

class TransactionController extends Controller
{
    /**
     * Валидация введенных параметров
     *
     * @param int $givingId   Id отдающего
     * @param int $receiverId Id принимающего
     * @param int $sum        сумма перевода
     *
     * @throws \Exception
     * @return void
     */
    protected function validateTransaction($givingId, $receiverId, $sum)
    {
        if ($givingId == $receiverId) {
            throw new \Exception('Id отдающего совпадает с id принимающего');
        }

        $givingUser = User::find($givingId);
        $receiverUser = User::find($receiverId);

        //если юзер не найден
        if (!$givingUser || !$receiverUser) {
            throw new \Exception('Введен неверный id');
        }

        //если если денег для перевода нету
        if ($givingUser->money < $sum) {
            throw new \Exception('У передающего пользователя недостаточно денег для этой транзакции. Его баланс: ' . $givingUser->money);
        }
    }

    /**
     * Создание транзакции
     *
     * @param Request $request запрос
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function createTransaction(Request $request)
    {
        $this->validate(
            $request,
            [
                'transaction-giving-id' => ['required', 'int'],
                'transaction-receiver-id' => ['required', 'int'],
                'transaction-sum' => ['required', 'int'],
                'transaction-date' => 'required',
            ]
        );

        $inputGivingId = $request->input('transaction-giving-id');
        $inputReceiverId = $request->input('transaction-receiver-id');
        $inputSum = $request->input('transaction-sum');
        $inputDate = $request->input('transaction-date');

        try {
            $this->validateTransaction($inputGivingId, $inputReceiverId, $inputSum);
        } catch (\Exception $e) {
            return redirect('/create_transaction')->with('fail', $e->getMessage());
        }

        //сохранение в БД транзакции
        $transaction = new Transaction();
        $transaction->giving_id = $inputGivingId;
        $transaction->receiver_id = $inputReceiverId;
        $transaction->money = $inputSum;
        $transaction->date = $inputDate;
        $transaction->save();

        //Вычитание денег у отдающего юзера
        $givingUser = User::find($inputGivingId);
        $givingUser->money -= $inputSum;
        $givingUser->save();

        return redirect('/create_transaction')->with('status', 'transaction accepted!');
    }

    /**
     * Выполнение транзакций
     *
     * @return void
     */
    public function submitTransactions()
    {
        $transactions = Transaction::all();

        foreach ($transactions as $transaction) {
            if ($transaction->date <= Carbon::now()->format('Y-m-d H:i:s') && $transaction->status == 'opened') {

                $receiverId = $transaction->receiver_id;
                $transactionSum = $transaction->money;

                $receiverUser = User::find($receiverId);

                //перевод денег юзеру
                $receiverUser->money += $transactionSum;

                $transaction->status = 'closed';

                $receiverUser->save();
                $transaction->save();
            }
        }
    }

    /**
     * Возвращает view с транзакциями
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function getTransactions()
    {
        $transactions = Transaction::all();

        return view('transactions')->with('transactions', $transactions);
    }
}
