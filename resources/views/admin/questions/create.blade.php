@extends('layouts.master')

@section('title', 'Create Question')

@section('content')

    {{ Form::open(array('action' => 'QuestionController@store', 'id' => 'createquestion', 'method' => 'POST'))  }}
    {{ csrf_field() }}
<div class="form-group">
        {!! Form::label('question', 'Question:') !!}
        {!! Form::text('question', null, ['class' => 'form-control', 'placeholder' => 'Type here...']) !!}
    </div>
    
    <div class="form-group">
        {!! Form::label('', 'Questionnaire:') !!}
        {!! Form::select('questionnaire_id[]', $qests, null,['class' => 'form-control', 'multiple']) !!}
    </div>
        {!! Form::submit('Create Question', ['class' => 'button']) !!}

{!! Form::close() !!}

@endsection
