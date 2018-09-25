@extends('layouts.app')

@section('content')
    <div>
        @if(count($users) > 0)
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Money</th>
                    <th scope="col" class="text-center">Last transaction</th>
                </tr>
                </thead>
                <tbody>

                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->money }}</td>
                        <td class="text-center">{{ $user->getLastTransaction()['date'] or '-'}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <p>Список пользователей пуст</p>
        @endif
    </div>

    <div>
        {!! Form::open(['url' => '/user/add']) !!}
        {{ csrf_field() }}

        <div class="form-group">

            {{ Form::text('money', '', [
                    'class' => 'form-control',
                    'placeholder' => 'Enter money',
                    ]) }}
        </div>

        <div>
            {{Form::submit('Add user', ['class' => 'btn btn-primary'])}}
        </div>

        {!! Form::close() !!}

    </div>
@endsection
