@extends('layouts.app')

@section('content')
    {!! Form::open(['url' => 'transfer/submit']) !!}
    <div class="form-group">
        {{ Form::label('transfer-giving-id', 'id от кого перевести') }}
        {{ Form::text('transfer-giving-id', '', [
            'class' => 'form-control',
            'placeholder' => 'Enter id',
            ]) }}
    </div>
    <div class="form-group">
        {{ Form::label('transfer-receiver-id', 'id кому перевести') }}
        {{ Form::text('transfer-receiver-id', '', [
            'class' => 'form-control',
            'placeholder' => 'Enter id',
            ]) }}
    </div>
    <div class="form-group">
        {{ Form::label('transfer-sum', 'сумма перевода') }}
        {{ Form::text('transfer-sum', '', [
            'class' => 'form-control',
            'placeholder' => 'Enter sum',
            ]) }}
    </div>
    <div class="form-group">
        {{ Form::label('transfer-date', 'дата перевода') }}
        {{ Form::text('transfer-date', '', [
            'class' => 'form-control',
            ]) }}
        <script>
            jQuery('#transfer-date').datetimepicker({
                format:'Y-m-d H:i:00',
                inline:true,
                lang:'ru'
            });
        </script>
    </div>
    <div>
        {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
    </div>
    {!! Form::close() !!}

@endsection
