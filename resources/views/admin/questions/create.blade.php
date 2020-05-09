@extends('layouts.master')

@section('title', 'Create Question')

@section('content')

    {{ Form::open(array('action' => 'QuestionController@store', 'id' => 'createquestion', 'method' => 'POST'))  }}
    @csrf
<div class="form-group">
        {!! Form::label('question', 'Question:') !!}
        {!! Form::text('question', null, ['class' => 'form-control', 'placeholder' => 'Type here...']) !!}
    </div>
    
        {!! Form::submit('Create Question', ['class' => 'button']) !!}

{!! Form::close() !!}

@endsection
