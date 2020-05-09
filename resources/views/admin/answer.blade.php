@extends('layouts.master')

@section('title', 'Answers')

@section('content')

<h2>Current Answers</h2>

@if(count($answers) > 0)
    @foreach($answers as $answer)
    <div class="well">
        <h3><a href="answer/{{$answer->answerId}}">{{$answer->answer}}</a></h3>
        <small>Created:{{$answer->created_at}} by {{$answer->user->name}}</small>     
    </div>
    <hr>
    @endforeach
    {{$answers->links()}}
    @else
    <p>No answers created yet</p>
    @endif



{{ Form::open(array('action' => 'AnswerController@create', 'method' => 'get')) }}
    @csrf
    <div class="row">
        {!! Form::submit('Create Answer', ['class' => 'button']) !!}
    </div>
{{ Form::close() }}

@endsection
