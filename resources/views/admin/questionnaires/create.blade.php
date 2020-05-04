@extends('layouts.master')

@section('title', 'Create Questionnaire')

@section('content')

    <h1>Create Questionnaire</h1>

    {{ Form::open(array('action' => 'QuestionnaireController@store', 'id' => 'createquestionnaire')) }}

<div class="row large-12 columns">
        {!! Form::label('title', 'Title:') !!}
        {!! Form::text('title', null, ['class' => 'large-8 columns']) !!}
    </div>
    
    <div class="row large-12 columns">
        {!! Form::label('ethics', 'Ethics:') !!}
        {!! Form::text('ethics', null, ['class' => 'large-8 columns']) !!}
    </div>
        
    <div class="row large-6 columns">
        {!! Form::submit('Create Questionnaire', ['class' => 'button']) !!}
    </div>
{!! Form::close() !!}

@endsection
