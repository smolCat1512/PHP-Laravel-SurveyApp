@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create new Question</div>

                <div class="card-body">
                    <form action="/questionnaires/{{ $questionnaire->id }}/questions" method="post">

                        @csrf

                        <div class="form-group">
                            <label for="question">Question</label>
                            <input name="question[question]" type="text" class="form-control"
                                value="{{ old('question.question') }}" id="question" aria-describedby="questionHelp"
                                placeholder="Enter question title">
                            <small id="questionHelp" class="form-text text-muted">Create a question relevant to this
                                questionnaire</small>

                            @error('question.question')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <fieldset>
                                <legend>Choices</legend>
                                <small id="choicesHelp" class="form-text text-muted">Give choices relevant to the
                                    question so a respondent can answer correctly</small>

                                <div class="form-group">
                                    <label for="answer1">Choice 1</label>
                                    <input name="answers[][answer]" type="text" value="{{ old('answers.0.answer') }}"
                                        class="form-control" id="answer1" aria-describedby="choicesHelp"
                                        placeholder="Enter choice 1">

                                    @error('answers.0.answer')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="answer2">Choice 2</label>
                                    <input name="answers[][answer]" value="{{ old('answers.1.answer') }}" type="text"
                                        class="form-control" id="answer2" aria-describedby="choicesHelp"
                                        placeholder="Enter choice 2">

                                    @error('answers.1.answer')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                            </fieldset>
                        </div>

                        <button type="submit" class="btn btn-info">Add Question</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
