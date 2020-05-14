@extends('layouts.master')

@section('title', 'Question')

@section('content')

<h2>Current Questions</h2>

@if(count($questions) > 0)
    @foreach($questions as $question)
    <div class="well">
        <h3><a href="question/{{$question->questionId}}">{{$question->question}}</a></h3>
        <small>Created:{{$question->created_at}}</small>     
    </div>
    <hr>
    @endforeach
    {{$questions->links()}}
    @else
    <p>No questions created yet</p>
    @endif


{{ Form::open(array('action' => 'QuestionController@create', 'method' => 'get')) }}
    @csrf
    <div class="row">
        {!! Form::submit('Create Question', ['class' => 'button']) !!}
    </div>
{{ Form::close() }}

@endsection
