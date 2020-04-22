<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Create Answer</title>
  </head>
  <body>

    <h1>Add Answer</h1>

    {!! Form::open(array('action' => 'AnswerController@store', 'id' => '.createanswers')) !!}
        {{ csrf_token() }}
    <div class="row large-12 columns">
        {!! Form::label('answer', 'answer:') !!}
        {!! Form::text('answer', null, ['class' => 'large-8 columns']) !!}
    </div>

    <div class="row large-4 columns">
        {!! Form::submit('Add Answer', ['class' => 'button']) !!}
    </div>
{!! Form::close() !!}

  </body>
</html>
