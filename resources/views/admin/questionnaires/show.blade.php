@extends('layouts.master')

@section('content')
<a href="/admin/questionnaire" class="btn btn-default">Go Back</a>   
<h1>{{$questionnaire->title}}</h1>
<p>Ethics statement:{{$questionnaire->ethics}}</p>
<hr> 
<small>Created on:{{$questionnaire->created_at}}</small>
<small>Updated on:{{$questionnaire->updated_at}}</small>
<hr>
<a href="/admin/questionnaires/{{$questionnaire->questionnaireId}}/edit" class="button">Edit</a>

    {{Form::open(['action' => ['QuestionnaireController@destroy', $questionnaire->questionnaireId], 'method' => 'POST', 'class' => 'small-push-11'])}}
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('Delete', ['class' => 'button'])}}
    {!!Form::close()!!}

@endsection

