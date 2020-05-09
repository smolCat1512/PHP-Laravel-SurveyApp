@extends('layouts.master')

@section('title', 'Edit Question')

@section('content')

    {{ Form::open(array('action' => ['QuestionController@update', $question->questionId], 'id' => 'editquestion', 'method' => 'POST'))  }}
    @csrf
<div class="form-group">
        {!! Form::label('question', 'Question:') !!}
        {!! Form::text('question', $question->question, ['class' => 'form-control', 'placeholder' => 'Type here...']) !!}
    </div>
    
        {{Form::hidden('_method', 'PUT')}}
        {!! Form::submit('Edit Question', ['class' => 'button']) !!}
                
{!! Form::close() !!}

@endsection
