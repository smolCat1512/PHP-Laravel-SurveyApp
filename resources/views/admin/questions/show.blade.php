@extends('layouts.master')

@section('content')
<a href="/admin/question" class="btn btn-default">Go Back</a>   
<h1>{{$question->question}}</h1>
<hr> 
<small>Created on:{{$question->created_at}}</small>
<small>Updated on:{{$question->updated_at}}</small>

<h2>Part of these questionnaires:</h2>
@if (isset ($questionnaires))
<ul>
@foreach($questionnaires as $questionnaire)
<li>{{ $questionnaire->title }}</li>
@endforeach
</ul>
@else
<p>Not currently a part of any questionnaires</p>
@endif

<h2>Answer choices:</h2>
@if (isset ($answers))
<ul>
@foreach($answers as $answer)
<li>{{ $answer->answer }}</li>
@endforeach
</ul>
@else
<p>No current answer options set on this question</p>
@endif

<hr>
@if(Auth::user()->id == $question->user_id)
<a href="/admin/questions/{{$question->questionId}}/edit" class="btn btn-warning">Edit</a>

{{Form::open(['action' => ['QuestionController@destroy', $question->questionId], 'method' => 'POST', 'class' => 'small-push-11'])}}
@csrf
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
    {!!Form::close()!!}
    @endif
@endsection

