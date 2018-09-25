@extends('layouts.app')

@section('content')
    <div class="container">
        @if(count($transactions) > 0)
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Id от кого перевод</th>
                    <th scope="col">Id кому перевод</th>
                    <th scope="col">Дата перевода</th>
                    <th scope="col">Сумма перевода</th>
                    <th scope="col">Статус</th>
                </tr>
                </thead>
                <tbody>

                @foreach($transactions as $transaction)
                    <tr>
                        <td>{{ $transaction->id }}</td>
                        <td>{{ $transaction->giving_id }}</td>
                        <td>{{ $transaction->receiver_id }}</td>
                        <td>{{ $transaction->date }}</td>
                        <td>{{ $transaction->money }}</td>
                        <td>{{ $transaction->status }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <p>Список транзакций пуст</p>
        @endif
    </div>
@endsection
