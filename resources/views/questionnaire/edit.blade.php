@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Questionnaire</div>

                <div class="card-body">
                    <form action="/questionnaires/{{ $questionnaire->id }}" method="post">
                    @method('PATCH')
                    @csrf

                    <div class="form-group">
                        <label for="title">Title</label>
                        <input name="title" type="text" class="form-control" id="titleHelp" aria-describedby="titleHelp"
                            placeholder="Enter questionnaire title">
                        <small id="titleHelp" class="form-text text-muted">Give your questionnaire a relevant
                            title</small>
                        @error('title')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="ethics">Ethics Statement</label>
                        <input name="ethics" type="text" class="form-control" id="ethics" aria-describedby="ethicsHelp"
                            placeholder="Enter ethics statement">
                        <small id="ethicsHelp" class="form-text text-muted">State the ethics of your questionnaire here,
                            how any data taken on submission of this questionnaire/survey by a respondent</small>
                        @error('ethics')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Edit Questionnaire</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
