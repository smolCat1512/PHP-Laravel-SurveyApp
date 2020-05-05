@extends('layouts.master')

@section('title', 'Questionnaires')

@section('content')

<h1>Questions</h1>


    <h2>Current Questions</h2>

    @if (isset ($questions))
        <ul>
            @foreach ($questions as $question)
            <li>{{ $question->question }}</li>
            @endforeach
        </ul>
    @else
        <p> no questions added yet </p>
    @endif



{{ Form::open(array('action' => 'QuestionController@create', 'method' => 'get')) }}
    <div class="row">
        {!! Form::submit('Create Question', ['class' => 'button']) !!}
    </div>
{{ Form::close() }}

@endsection
