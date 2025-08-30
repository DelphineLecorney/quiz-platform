@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Bienvenue, {{ auth()->user()->name }}</h1>
        <form id="logout-form" action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-outline-danger">Se déconnecter</button>
        </form>
    </div>

    <h2 class="mb-3">Quiz disponibles</h2>

    @if($quizzes->isEmpty())
        <p>Aucun quiz disponible pour le moment.</p>
    @else
        <div class="row">
            @foreach($quizzes as $quiz)
                <div class="col-md-6 mb-3">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">{{ $quiz->title }}</h5>
                            <p class="card-text">{{ $quiz->description }}</p>
                            <a href="{{ route('quiz.show', $quiz->id) }}" class="btn btn-primary">Commencer le quiz</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
