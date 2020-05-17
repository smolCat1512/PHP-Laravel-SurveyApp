@extends('layouts.app')

@section('content')
<!-- Respondent view, header, pull in each questionnaire next, list as title first
then a lin of text asking to click weblink and then the weblink as a public path so 
non logged in users can access and take surveys -->
<div class="container">
    <div class="row justify-content-center">
        <div class="card mt-4">
            <div class="card-header">Questionnaires</div>

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
