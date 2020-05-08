@extends('layouts.master')

@section('title', 'Edit Questionnaire')

@section('content')

    {{ Form::open(['action' => ['QuestionnaireController@update', $questionnaire->questionnaireId], 'id' => 'createquestionnaire', 'method' => 'post'])  }}

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
