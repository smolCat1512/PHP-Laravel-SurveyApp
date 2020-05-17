@extends('layouts.app')

@section('content')
<!-- Survey view, pulls in questionnaire title as H1 header, then the ethics staement
as a h2 sub header -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1> {{ $questionnaire->title }}</h1>
            <h2> {{ $questionnaire->ethics }}</h2>
            <!-- Open form to allow surveys to be "submitted", using csrf token for security -->
            <form action="/surveys/{{ $questionnaire->id }}-{{ Str::slug($questionnaire->title) }}" method="post">
                @csrf
                <!-- For eaach loop pulling in questions of the questionnaire, also adding 1 to key index
                so each question has correct number in order of questionnaire -->
                @foreach($questionnaire->questions as $key => $question)
                <div class="card mt-5">
                    <div class="card-header"><strong>{{ $key + 1 }}</strong> {{ $question->question }}</div>
                    <!-- Error checker making sure responses are selected before allowing submission -->
                    <div class="card-body">
                        @error('responses.' . $key . '.answer_id')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                        <!-- For eaach statement, pull in each questions answers, output as radio button selctables -->
                        <ul class="list-group">
                            @foreach($question->answers as $answer)
                            <label for="answer{{ $answer->id }}">
                                <li class="list-group-item">
                                    <input type="radio" name="responses[{{ $key }}][answer_id]"
                                        id="answer{{ $answer->id }}"
                                        {{ (old('responses.' . $key . '.answer_id') == $answer->id) ? 'checked' : '' }}
                                        class="mr-2" value="{{ $answer->id }}">
                                    {{ $answer->answer }}
                                    <input type="hidden" name="responses[{{ $key }}][question_id]"
                                        value="{{ $question->id }}">
                                </li>
                            </label>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @endforeach

                <!-- Extra requirements section asking for feedback and email address if user wants to be kept up to date -->
                <div class="card mt-3">
                    <div class="card-header">Extra requirements</div>
                    <!-- Each filed needs some input, highlighted to user can just be junk ubut needed to submit survey -->
                    <div class="card-body">
                        <div class="form-group">
                            <label for="feedback">Your Feedback</label>
                            <input name="survey[feedback]" type="text" class="form-control" id="feedbackHelp"
                                aria-describedby="feedbackHelp" placeholder="Feedback here...">
                            <small id="feedbackHelp" class="form-text text-muted">Hi, please provide any feedback, if
                                none
                                just something to allow form submission</small>
                            @error('feedback')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Your Email</label>
                            <input name="survey[email]" type="text" class="form-control" id="email"
                                aria-describedby="emailHelp" placeholder="Enter email...or not">
                            <small id="emailHelp" class="form-text text-muted">Enter your email if you wish to be kept
                                up to date on new surveys, if not just type some junk:)</small>
                            @error('email')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                            <!-- Complete submission button -->
                            <div>
                                <button class="btn btn-info mt-3" type="submit">Complete Survey</button>
                            </div>
                        </div>
            </form>
        </div>
    </div>
</div>
@endsection
