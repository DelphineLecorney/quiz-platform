@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Résultat du Quiz : {{ $quiz->title }}</h1>
    <p>Vous avez obtenu un score de <strong>{{ $score }}/{{ $total }}</strong></p>
    <a href="{{ route('quizzes.index') }}" class="btn btn-primary">Retour à la liste des quiz</a>
</div>
@endsection
