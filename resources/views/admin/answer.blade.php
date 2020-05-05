@extends('layouts.master')

@section('title', 'Answers')

@section('content')

<h1>Answers</h1>


    <h2>Current Answers</h2>

    @if (isset ($answers))
        <ul>
            @foreach ($answers as $answer)
            <li>{{ $answer->answer }}</li>
            @endforeach
        </ul>
    @else
        <p> no answers added yet </p>
    @endif



{{ Form::open(array('action' => 'AnswerController@create', 'method' => 'get')) }}
    <div class="row">
        {!! Form::submit('Create Answer', ['class' => 'button']) !!}
    </div>
{{ Form::close() }}

@endsection
