@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $quiz->title }}</h1>
    <p>{{ $quiz->description }}</p>

    <form action="{{ route('quiz.submit', $quiz->id) }}" method="POST">
        @csrf

        @foreach($quiz->questions as $question)
            <div class="mb-4">
                <strong>{{ $question->text }}</strong>

                @foreach($question->answers as $answer)
                    <div class="form-check">
                        <input type="radio" name="answers[{{ $question->id }}]" value="{{ $answer->id }}" class="form-check-input" id="answer_{{ $answer->id }}">
                        <label for="answer_{{ $answer->id }}" class="form-check-label">{{ $answer->text }}</label>
                    </div>
                @endforeach
            </div>
        @endforeach

        <button type="submit" class="btn btn-success">Valider mes réponses</button>
    </form>
</div>
@endsection
