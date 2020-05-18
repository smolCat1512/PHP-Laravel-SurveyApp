@extends('layouts.app')

@section('content')
<!-- Edit Questionnaire view, header of Edit Questionnaire -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Questionnaire</div>
                <!-- Open form with post method, then set to patch method in next line,
                csrf also incorporated for cross-site security -->
                <div class="card-body">
                    <form action="/questionnaires/{{ $questionnaire->id }}" method="post">
                        @method('PATCH')
                        @csrf
                        <!-- Title edit form, validator to check for input -->
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input name="title" type="text" class="form-control" id="titleHelp"
                                aria-describedby="titleHelp" placeholder="Enter questionnaire title">
                            <small id="titleHelp" class="form-text text-muted">Give your questionnaire a relevant
                                title</small>
                            @error('title')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <!-- Ethics statement edit form, validator to check for input -->
                        <div class="form-group">
                            <label for="ethics">Ethics Statement</label>
                            <input name="ethics" type="text" class="form-control" id="ethics"
                                aria-describedby="ethicsHelp" placeholder="Enter ethics statement">
                            <small id="ethicsHelp" class="form-text text-muted">State the ethics of your questionnaire
                                here,
                                how any data taken on submission of this questionnaire/survey by a respondent</small>
                            @error('ethics')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <!-- Selector form field to make questionnaire live, 0 not line, 1 is live -->
                        <div class="form-group">
                            {!! Form::label('live', 'Live Questionnaire:') !!}
                            {!! Form::select('live', array('1' => '1', '0' => '0'), ['placeholder' => 'Select...']) !!}
                            <p>1 is live, 0 is not live</p>
                        </div>
                        <!-- Edit questionnaire button to submit form -->
                        <button type="submit" class="btn btn-primary">Edit Questionnaire</button>
                    </form>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
