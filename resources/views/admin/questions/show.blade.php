@extends('layouts.master')

@section('content')
<a href="/admin/question" class="btn btn-default">Go Back</a>   
<h1>{{$question->question}}</h1>
<hr> 
<small>Created on:{{$question->created_at}}</small>
<small>Updated on:{{$question->updated_at}}</small>

<small>Part of questionnaire: ned to code in questionnaire title here!</small>
<hr>
@if(Auth::user()->id == $question->user_id)
<a href="/admin/questions/{{$question->questionId}}/edit" class="button">Edit</a>

{{Form::open(['action' => ['QuestionController@destroy', $question->questionId], 'method' => 'POST', 'class' => 'small-push-11'])}}
@csrf
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('Delete', ['class' => 'button'])}}
    {!!Form::close()!!}
    @endif
@endsection

