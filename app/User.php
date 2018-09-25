<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class User extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'money',
    ];

    //Получить последнюю транзакцию
    public function getLastTransaction()
    {
        return static::select(\DB::raw('*'))
            ->from('transactions')
            ->where('giving_id', '=', $this->id)
            ->orderBy('date', 'desc')
            ->first();
    }
}
