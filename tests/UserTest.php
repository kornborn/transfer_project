<?php

use App\User;
use App\Transaction;

class UserTest extends TestCase
{
    /**
     * Тестирование добавления нового юзера
     *
     * @return void
     */
    public function testCreateUser()
    {
        $money = 1111111;

        $this->visit('/');
        $this->type($money, 'money');
        $this->press('Add user');
        $this->seePageIs('/');

        $this->seeInDatabase(
            'users',
            ['money' => $money]
        );
    }

    /**
     * Тестирование метода getLastTransaction
     *
     * @throws
     * @return void
     */
    public function testGetLastTransaction()
    {
        $user = new User();
        $user->money = 111111;
        $user->save();

        $transaction = new Transaction();
        $transaction->giving_id = $user->id;
        $transaction->receiver_id = 1;
        $transaction->money = 1;
        $transaction->date = '2018-09-27 14:00:00';
        $transaction->save();

        $this->assertEquals($user->getLastTransaction()->id, $transaction->id);

        $transaction->delete();
        $user->delete();
    }
}