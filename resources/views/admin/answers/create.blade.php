@extends('layouts.master')

@section('title', 'Create Answer')

@section('content')

    {{ Form::open(array('action' => 'AnswerController@store', 'id' => 'createanswer'))  }}

<div class="row large-12 columns">
        {!! Form::label('answer', 'Answer:') !!}
        {!! Form::text('answer', null, ['class' => 'large-8 columns']) !!}
    </div>
    
    <div class="row large-6 columns">
        {!! Form::submit('Create Answer', ['class' => 'button']) !!}
    </div>
{!! Form::close() !!}

@endsection
