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

                <h1>Welcome to SurveyKitty</h1>

                <p>Please select an option from the below:</p>

                <a class="btn btn-outline-primary row" href="admin/questionnaire">Questionnaires</a>

                <a class="btn btn-outline-primary row" href="admin/question">Questions</a>

                <a class="btn btn-outline-primary row" href="admin/answer">Answers</a>

                <h1>Responses</h1>

                <a class="btn btn-primary row" href="">View responses</a>

            </div>
        </div>
    </div>
</div>
@endsection
