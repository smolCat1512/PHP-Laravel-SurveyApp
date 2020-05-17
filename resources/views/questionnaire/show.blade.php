@extends('layouts.app')

@section('content')
<!-- Show view for questionnaires, first pulling in questionnaire title, then ethics statement -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Title: {{ $questionnaire->title }}</div>
                <div class="card-body">Ethics statement: {{ $questionnaire->ethics }}</div>
                <!-- Add new question button pointing to create method in controller and route -->
                <div class="card-body">
                    <a class="btn btn-outline-primary btn-lg"
                        href="/questionnaires/{{ $questionnaire->id }}/questions/create">Add
                        new
                        Question</a>
                    <!-- Edit questionnaire button pointing to edit method in controller and route -->
                    <a class="btn btn-outline-warning btn-lg" href="/questionnaire/{{ $questionnaire->id }}/edit">Edit
                        Questionnaire</a>
                    <!-- Take a survey button in case user wants to submit a survey to test functionality,
                    point to survey and outputs title as a slug in url -->
                    <a class="btn btn-outline-success btn-lg"
                        href="/surveys/{{ $questionnaire->id }}-{{ Str::slug($questionnaire->title)}}">Take A Survey</a>
                </div>
            </div>
            <!-- For each statement stating for wach question push into view with question title, then each answer for
            said question. Finally for each answer display a count of choices survey takers have used, returning as a
            percentage to right of each question in the view -->
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
                <!-- Delete button pointing to delete method, incorporates csrf for security, of type danger -->
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
