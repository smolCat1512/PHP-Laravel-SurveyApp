@extends('layouts.master')

@section('content')
<a href="/admin/answer" class="btn btn-default">Go Back</a>   
<h1>{{$answer->answer}}</h1>
<hr> 
<small>Created on:{{$answer->created_at}}</small>
<small>Updated on:{{$answer->updated_at}}</small>
<hr>
<a href="/admin/answers/{{$answer->answerId}}/edit" class="btn btn-default">Edit</a>
@endsection

