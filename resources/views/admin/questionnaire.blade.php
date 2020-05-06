@extends('layouts.master')

@section('title', 'Questionnaires')

@section('content')

<h1>Questionnaires</h1>

    <h2>Current Questionnaires</h2>

    <section>
          @if (isset ($questionnaires))

              <table class="table table-striped table-bordered">
                  <thead>
                      <tr>
                          <td>Questionnaire ID</td>
                          <td>Title</td>
                          <td>Ethics Statement</td>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach ($questionnaires as $questionnaire)
                          <tr>
                              <td>{{ $questionnaire->questionnaireId }}</td>
                              <td>{{ $questionnaire->title }}</td>
                              <td>{{ $questionnaire->ethics }}</td>
                          </tr>

                      @endforeach
                  </tbody>
              </table>
          @else
              <p> No questionnaires added yet </p>
          @endif
      </section>

<!-- 
    @if (isset ($questionnaires))
        <ul>
            @foreach ($questionnaires as $questionnaire)
            <li>{{ $questionnaire->title }}</li>
            @endforeach
        </ul>
    @else
        <p> no questionnaires added yet </p>
    @endif
 -->


{{ Form::open(array('action' => 'QuestionnaireController@create', 'method' => 'get')) }}
    <div class="row">
        {!! Form::submit('Create Questionnaire', ['class' => 'button']) !!}
    </div>
{{ Form::close() }}

@endsection

