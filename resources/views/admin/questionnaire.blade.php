@extends('layouts.master')

@section('title', 'Questionnaires')

@section('content')

<h1>Questionnaires</h1>


    <h2>Current Questionnaires</h2>

    @if (isset ($questionnaires))
        <ul>
            @foreach ($questionnaires as $questionnaire)
            <li>{{ $questionnaire->title }}</li>
            @endforeach
        </ul>
    @else
        <p> no questionnaires added yet </p>
    @endif



{{ Form::open(array('action' => 'QuestionnaireController@create', 'method' => 'get')) }}
    <div class="row">
        {!! Form::submit('Create Questionnaire', ['class' => 'button']) !!}
    </div>
{{ Form::close() }}

@endsection

