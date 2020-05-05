@extends('layouts.master')

@section('title', 'Create Question')

@section('content')

    {{ Form::open(array('action' => 'QuestionController@store', 'id' => 'createquestion'))  }}

<div class="row large-12 columns">
        {!! Form::label('question', 'Question:') !!}
        {!! Form::text('question', null, ['class' => 'large-8 columns']) !!}
    </div>
    
    <div class="row large-6 columns">
        {!! Form::submit('Create Question', ['class' => 'button']) !!}
    </div>
{!! Form::close() !!}

@endsection
