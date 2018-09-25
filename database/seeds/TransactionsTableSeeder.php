<?php
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class TransactionsTableSeeder extends Seeder
{
    public function run()
    {
        for($i = 0; $i < 10; $i++) {
            \DB::table('transactions')->insert([
                'giving_id' => rand(1, 5),
                'receiver_id' => rand(6, 10),
                'date' => Carbon::now()->addHour(rand(1, 10))->addDays(rand(1, 5))->format('Y-m-d H:i:s'),
                'money' => rand(200, 2000),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }

    }
}