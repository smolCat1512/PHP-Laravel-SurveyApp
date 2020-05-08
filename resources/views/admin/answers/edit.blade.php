@extends('layouts.master')

@section('title', 'Edit Answer')

@section('content')

    {{ Form::open(array('action' => ['AnswerController@update', $answer->answerId], 'id' => 'editanswer', 'method' => 'POST'))  }}

<div class="form-group">
        {!! Form::label('answer', 'Answer:') !!}
        {!! Form::text('answer', $answer->answer, ['class' => 'form-control', 'placeholder' => 'Type here...']) !!}
    </div>
    
        {{Form::hidden('_method', 'PUT')}}
        {!! Form::submit('Edit Answer', ['class' => 'button']) !!}
                
{!! Form::close() !!}

@endsection
