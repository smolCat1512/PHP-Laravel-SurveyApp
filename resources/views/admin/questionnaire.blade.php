@extends('layouts.master')

@section('title', 'Questionnaires')

@section('content')

<h1>Questionnaires</h1>

<section>
    @if (isset ($questionnaires))

        <ul>
            @foreach ($questionnaires as $questionnaire)
            <li><a href="/admin/questionnaire/{{ $questionnaire->id }}" name="{{ $questionnaire->title }}"></a></li>
            @endforeach
        </ul>
    @else
        <p> no questionnaires added yet </p>
    @endif
</section>

<a href="questionnaires/create">Create Questionnaire</a>

@endsection

