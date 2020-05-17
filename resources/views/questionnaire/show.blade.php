@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Title: {{ $questionnaire->title }}</div>

                <div class="card-body">Ethics statement: {{ $questionnaire->ethics }}</div>

                <div class="card-body">
                    <a class="btn btn-outline-primary btn-lg"
                        href="/questionnaires/{{ $questionnaire->id }}/questions/create">Add
                        new
                        Question</a>

                    <a class="btn btn-outline-warning btn-lg" href="/questionnaires/{id}/edit">Edit
                        Questionnaire</a>

                    <a class="btn btn-outline-success btn-lg"
                        href="/surveys/{{ $questionnaire->id }}-{{ Str::slug($questionnaire->title)}}">Take A Survey</a>

                </div>
            </div>

            @foreach($questionnaire->questions as $question)
            <div class="card mt-5">
                <div class="card-header">{{ $question->question }}</div>
                <div class="card-body">
                    <ul class="list-group">
                        @foreach($question->answers as $answer)
                        <li class="list-group-item d-flex justify-content-between">
                            <div>{{ $answer->answer }}</div>
                            @if($question->responses->count())
                            <div>{{ intval(($answer->responses->count() * 100) / $question->responses->count()) }}%
                            </div>
                            @endif
                        </li>
                        @endforeach
                    </ul>
                </div>

                <div class="card-footer">
                    <form action="/questionnaires/{{ $questionnaire->id}}/questions/{{ $question->id }}" method="post">
                        @method('DELETE')
                        @csrf

                        <button type="submit" class="btn btn-sm btn-danger">Delete Question</button>

                    </form>



                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
