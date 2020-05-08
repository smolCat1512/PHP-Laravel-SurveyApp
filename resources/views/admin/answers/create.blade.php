@extends('layouts.master')

@section('title', 'Create Answer')

@section('content')

    {{ Form::open(array('action' => 'AnswerController@store', 'id' => 'createanswer', 'method' => 'POST'))  }}

<div class="form-group">
        {!! Form::label('answer', 'Answer:') !!}
        {!! Form::text('answer', null, ['class' => 'form-control', 'placeholder' => 'Type here...']) !!}
    </div>
    
        {!! Form::submit('Create Answer', ['class' => 'button']) !!}
    
{!! Form::close() !!}

@endsection
