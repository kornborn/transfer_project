@extends('layouts.app')

@section('content')
    {!! Form::open(['url' => 'transfer/submit']) !!}
    <div class="form-group">
        {{Form::label('transfer-giving-id', 'id от кого перевести')}}
        {{Form::text('transfer-giving-id', '', [
            'class' => 'form-control',
            'placeholder' => 'Enter id',
            ])}}
    </div>
    <div class="form-group">
        {{Form::label('transfer-receiver-id', 'id кому перевести')}}
        {{Form::text('transfer-receiver-id', '', [
            'class' => 'form-control',
            'placeholder' => 'Enter id',
            ])}}
    </div>
    <div class="form-group">
        {{Form::label('transfer-sum', 'сумма перевода')}}
        {{Form::text('transfer-sum', '', [
            'class' => 'form-control',
            'placeholder' => 'Enter sum',
            ])}}
    </div>
    <div class="form-group">
        {{Form::label('transfer-date', 'дата перевода')}}
        {{Form::date('transfer-date', '\Carbon\Carbon::now()')}}

        {{--<div class="well">--}}
            {{--<div id="transfer-date" class="input-append date">--}}
                {{--<input data-format="dd/MM/yyyy hh:mm:ss" type="text"></input>--}}
                {{--<span class="add-on">--}}
                  {{--<i data-time-icon="icon-time" data-date-icon="icon-calendar">--}}
                  {{--</i>--}}
                {{--</span>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<script type="text/javascript">--}}
            {{--$('#transfer-date').datetimepicker({--}}
                {{--format: 'dd/MM/yyyy hh:mm:ss',--}}
                {{--language: 'pt-BR'--}}
            {{--});--}}
        {{--</script>--}}
    </div>
    <div>
        {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
    </div>
    {!! Form::close() !!}

@endsection
