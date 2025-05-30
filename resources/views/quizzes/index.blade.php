@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Liste des Quiz</h1>

    <div class="row">
        @foreach($quizzes as $quiz)
            <div class="col-md-6">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">{{ $quiz->title }}</h5>
                        <p class="card-text">{{ $quiz->description }}</p>
                        <a href="#" class="btn btn-primary">Commencer</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
