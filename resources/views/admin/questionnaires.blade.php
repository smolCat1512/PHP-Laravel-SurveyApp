@extends('layouts.master')

@section('title', 'Questionnaires')

@section('content')

<h1>Create Questionnaire</h1>

<section>
    @if (isset ($questionnaires))

        <ul>
            @foreach ($questionnaires as $questionnaire)
            <li><a href="/admin/questionnaires/{{ $questionnaire->id }}" name="{{ $questionnaire->title }}"></a></li>
            @endforeach
        </ul>
    @else
        <p> no questionnaires added yet </p>
    @endif
</section>

{{ Form::open(array('action' => 'QuestionnaireController@store', 'id' => 'createquestionnaire')) }}

<div class="row large-12 columns">
        {!! Form::label('title', 'Title:') !!}
        {!! Form::text('title', null, ['class' => 'large-8 columns']) !!}
    </div>
    
    <div class="row large-12 columns">
        {!! Form::label('ethics', 'Ethics Statement:') !!}
        {!! Form::text('ethics', null, ['class' => 'large-8 columns']) !!}
    </div>
        
    <div class="row large-6 columns">
        {!! Form::submit('Create Questionnaire', ['class' => 'button']) !!}
    </div>
{!! Form::close() !!}

@endsection