@extends('layouts.master')

@section('title', 'Questionnaires')

@section('content')

    <h2>Current Questionnaires</h2>

    @if(count($questionnaires) > 0)
        @foreach($questionnaires as $questionnaire)
        <div class="well">
            <h3><a href="questionnaire/{{$questionnaire->questionnaireId}}">{{$questionnaire->title}}</a></h3>
            <p>Ethics statement:{{$questionnaire->ethics}}</p>
            <small>Created:{{$questionnaire->created_at}} by {{$questionnaire->user->name}}</small>
        </div>
        <hr>
        @endforeach
        {{$questionnaires->links()}}
        @else
        <p>You have no questionnaires created yet</p>
        @endif

{{ Form::open(array('action' => 'QuestionnaireController@create', 'method' => 'get')) }}
    @csrf
    @if(!Auth::guest())

    <div class="row">
        {!! Form::submit('Create Questionnaire', ['class' => 'button']) !!}
    </div>
    @endif
{{ Form::close() }}

@endsection

