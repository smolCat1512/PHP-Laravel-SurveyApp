@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">SurveyKitty Dashboard</div>

                    <a href="/questionnaires/create" class="btn btn-primary">Questionnaires/a>
                </div>
            </div>

            <div class="card mt-4">
                <div class="card-header">Questionnaires</div>

                <div class="card-body">
                    <ul class="list-group">
                        @foreach($questionnaires as $questionnaire)
                        <li class="list-group-item">
                            <a href="{{ $questionnaire->path() }}">{{ $questionnaire->title }}</a>

                            <div class="mt-2">
                                <small class="font-weight-bold">Share URL</small>
                                <p>
                                    <a href="{{ $questionnaire->publicPath() }}">
                                        {{ $questionnaire->publicPath() }}
                                    </a>
                                </p>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
