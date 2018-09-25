@extends('layouts.app')

@section('content')
    {!! Form::open(['url' => 'transaction/submit']) !!}
    {{ csrf_field() }}
    <div class="form-group">
        {{ Form::label('transaction-giving-id', 'id от кого перевести') }}
        {{ Form::text('transaction-giving-id', '', [
            'class' => 'form-control',
            'placeholder' => 'Enter id',
            ]) }}
    </div>
    <div class="form-group">
        {{ Form::label('transaction-receiver-id', 'id кому перевести') }}
        {{ Form::text('transaction-receiver-id', '', [
            'class' => 'form-control',
            'placeholder' => 'Enter id',
            ]) }}
    </div>
    <div class="form-group">
        {{ Form::label('transaction-sum', 'сумма перевода') }}
        {{ Form::text('transaction-sum', '', [
            'class' => 'form-control',
            'placeholder' => 'Enter sum',
            ]) }}
    </div>
    <div class="form-group">
        {{ Form::label('transaction-date', 'дата перевода') }}
        {{ Form::text('transaction-date', '', [
            'class' => 'form-control',
            ]) }}
        <script>
            const currentDate = new Date();
            $('#transaction-date').datetimepicker({
                format:'Y-m-d H:i:00',
                inline:true,
                minDate:'0',
                minTime:`${currentDate.getHours()+1}`,
                lang:'ru',
            });
        </script>
    </div>
    <div>
        {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
    </div>
    {!! Form::close() !!}

@endsection
