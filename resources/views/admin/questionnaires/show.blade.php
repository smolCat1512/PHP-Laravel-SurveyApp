@extends('layouts.master')

@section('content')
<a href="/admin/questionnaire" class="btn btn-default">Go Back</a>   
<h1>{{$questionnaire->title}}</h1>
<p>Ethics statement:{{$questionnaire->ethics}}</p>
<hr> 
<small>Created on:{{$questionnaire->created_at}}</small>
<small>Updated on:{{$questionnaire->updated_at}}</small>

@endsection

