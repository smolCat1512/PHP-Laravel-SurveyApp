@extends('layouts.master')

@section('content')
<a href="/admin/questionnaire" class="btn btn-default">Go Back</a>   
<h1>{{$questionnaire->title}}</h1>
<p>Ethics statement:{{$questionnaire->ethics}}</p>
<hr> 
<small>Created on:{{$questionnaire->created_at}}</small>
<small>Updated on:{{$questionnaire->updated_at}}</small>
<h3>Questions</h3>
@if (isset ($questions))
<ul>
@foreach($questions as $question)
<li>{{ $question->question }}</li>
@endforeach
</ul>
@else
<p>No current questions</p>
@endif
<hr>

@if(!Auth::guest())
@if(Auth::user()->id == $questionnaire->user_id)
<a href="/admin/questionnaires/{{$questionnaire->questionnaireId}}/edit" class="btn btn-warning">Edit</a>

    {{Form::open(['action' => ['QuestionnaireController@destroy', $questionnaire->questionnaireId], 'method' => 'POST', 'class' => 'small-push-11'])}}
        @csrf
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
    {!!Form::close()!!}
    @endif
@endif
@endsection
