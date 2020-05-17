@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="card mt-4">
            <div class="card-header">My Questionnaires</div>

            <div class="card-body">
                <ul class="list-group">
                    @foreach($questionnaires as $questionnaire)
                    <li class="list-group-item">
                        <a href="{{ $questionnaire->path() }}">{{ $questionnaire->title }}</a>
                        <p>Click weblink below to take the survey please</p>
                        <a href="{{ $questionnaire->publicPath() }}">
                            {{ $questionnaire->publicPath() }}
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
