@extends('layouts.master')

@section('title', 'Home')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">SurveyKitty Home</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p>You are logged in!</p>
                </div>

                <p>Welcome to SurveyKitty</p>

                <h1>Questionnaires</h1>

                <a href="admin/questionnaires">Create Questionnaire</a>

                <a href="">Edit Questionnaire</a>

                <a href="">Delete Questionnaire</a>

                <h1>Questions</h1>

                <a href="">Create Question</a>

                <a href="">Edit Question</a>

                <a href="">Delete Question</a>

                <h1>Answers</h1>

                <a href="">Create Answer</a>

                <a href="">Edit Answer</a>

                <a href="">Delete Answer</a>

                <h1>Responses</h1>

                <a href="">View responses</a>

            </div>
        </div>
    </div>
</div>
@endsection
