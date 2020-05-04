<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Questionnaires</title>
</head>
<body>
<h1>Create Questionnaire</h1>

<section>
    @if (isset ($questionnaires))

        <ul>
            @foreach ($questionnaires as $questionnaire)
                <li>{{ $questionnaire->title }}</li>
            @endforeach
        </ul>
    @else
        <p> no questionnaires added yet </p>
    @endif
</section>

{!! Form::open(['']) !!}
    <div class="row">
        {!! Form::submit('Create Questionnaire', ['class' => 'button']) !!}
    </div>
{!! Form::close() !!}

</body>
</html>