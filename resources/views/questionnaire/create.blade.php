@extends('layouts.app')

@section('content')
<!-- Create questionnaire view, header of Create new Questionnaire -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create new Questionnaire</div>
                <!-- Open form with post method application on submission, also csrf token used for security -->
                <div class="card-body">
                    <form action="/questionnaires" method="post">
                        @csrf
                        <!-- Title input form with error validator to check input -->
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
                        <!-- Ethics satement input form with error validator to check input, ethics just state by completing survey 
                    respondent agrees to ethics -->
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
                            {!! Form::select('live', array('1' => '1', '2' => '0'), ['placeholder' => 'Select...']) !!}
                            <small>1 is live, 0 is not live</small>
                        </div>
                        <!-- Form submission button to create questionnaire -->
                        <button type="submit" class="btn btn-primary">Create Questionnaire</button>
                    </form>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
