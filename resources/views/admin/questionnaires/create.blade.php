@extends('layouts.master')

@section('title', 'Create Questionnaire')

@section('content')

    {{ Form::open(array('action' => 'QuestionnaireController@store', 'id' => 'createquestionnaire', 'method' => 'POST'))  }}
    @csrf
<div class="form-group">
        {!! Form::label('title', 'Title:') !!}
        {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Type here...']) !!}
    </div>
    
    <div class="form-group">
        {!! Form::label('ethics', 'Ethics:') !!}
        {!! Form::text('ethics', null, ['class' => 'form-control', 'placeholder' => 'Type here...']) !!}
    </div>
        
        {!! Form::submit('Create Questionnaire', ['class' => 'button']) !!}
        
{!! Form::close() !!}

@endsection
