@extends('layouts.app')

@section('content')
<!-- Home view, SurveyKitty dashboard header, checks if logged in next -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">SurveyKitty Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <!-- Button to link to creating a new questionnaire -->
                    <a href="/questionnaires/create" class="btn btn-primary">Create New Questionnaire</a>
                </div>
            </div>
            <!-- My Questionnaire header and next al questionnaires called in to vire, for each
            questionnaire put title first, then the share url that can be used if system is deployed -->
            <div class="card mt-4">
                <div class="card-header">My Questionnaires</div>

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
