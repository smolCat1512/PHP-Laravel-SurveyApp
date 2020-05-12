@extends('layouts.master')

@section('title', 'Edit Questionnaire')

@section('content')

{{ Form::open(array('action' => ['QuestionnaireController@update', $questionnaire->questionnaireId], 'id' => 'editquestionnaire', 'method' => 'POST'))  }}
    @csrf
<div class="form-group">
        {!! Form::label('title', 'Title:') !!}
        {!! Form::text('title', $questionnaire->title, ['class' => 'form-control', 'placeholder' => 'Type here...']) !!}
    </div>
    
    <div class="form-group">
        {!! Form::label('ethics', 'Ethics:') !!}
        {!! Form::text('ethics', $questionnaire->ethics, ['class' => 'form-control', 'placeholder' => 'Type here...']) !!}
    </div>
    {{Form::hidden('_method', 'PUT')}}
        {!! Form::submit('Edit Questionnaire', ['class' => 'button']) !!}        
{!! Form::close() !!}

@endsection
