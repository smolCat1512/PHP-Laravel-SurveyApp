<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Answer</title>
  </head>
  <body>

    <h1>Answers</h1>

    <section>
    @if (isset ($answers))

        <ul>
            @foreach ($answers as $answer)
                <li>{{ $answer->answer }}</li>
            @endforeach
        </ul>
    @else
        <p> no answers added yet </p>
    @endif
</section>

<form class="" action="index.html" method="post">
  <button type="button" name="button" href="/admin/answer/create">Add Answer</button>
</form>

<h1>Add Answer</h1>



{!! Form::open(['']) !!}
    <div class="row">
        {!! Form::submit('Add Article', ['class' => 'button']) !!}
    </div>
{!! Form::close() !!}

  </body>
</html>
