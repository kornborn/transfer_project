<?php

class TransactionTest extends TestCase
{
    /**
     * Тестирование добавления новой транзакции
     *
     * @return void
     */
    public function testCreateTransaction()
    {
        $giving_id = 1;
        $receiver_id = 2;
        $sum = 1;
        $date = '2018-09-27 14:00:00';

        $this->visit('/create_transaction');
        $this->type($giving_id, 'transaction-giving-id');
        $this->type($receiver_id, 'transaction-receiver-id');
        $this->type($sum, 'transaction-sum');
        $this->type($date, 'transaction-date');
        $this->press('Submit');
        $this->seePageIs('/create_transaction');

        $this->seeInDatabase(
            'transactions',
            [
                'giving_id' => $giving_id,
                'receiver_id' => $receiver_id,
                'money' => $sum,
                'date' => $date,
            ]
        );
    }
}