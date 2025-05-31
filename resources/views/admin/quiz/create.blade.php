@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Créer un nouveau quiz</h1>

    <form method="POST" action="{{ route('admin.quiz.store') }}">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Titre</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" class="form-control"></textarea>
        </div>

        <hr>
        <h4>Questions</h4>

        <div id="questions-container">
            <!-- Questions dynamiques -->
        </div>

        <button type="button" class="btn btn-secondary" onclick="addQuestion()">Ajouter une question</button>
        <br><br>

        <button type="submit" class="btn btn-primary">Créer le quiz</button>
    </form>
</div>

<script>
let questionIndex = 0;

function addQuestion() {
    const container = document.getElementById('questions-container');

    const html = `
        <div class="card p-3 mb-3">
            <div class="mb-2">
                <label>Question</label>
                <input type="text" name="questions[${questionIndex}][text]" class="form-control" required>
            </div>
            <div class="mb-2">
                <label>Réponses (la bonne réponse sera cochée)</label>
                <div class="form-check">
                    <input type="radio" name="questions[${questionIndex}][correct]" value="0" required>
                    <input type="text" name="questions[${questionIndex}][answers][0]" class="form-control" placeholder="Réponse 1" required>
                </div>
                <div class="form-check">
                    <input type="radio" name="questions[${questionIndex}][correct]" value="1" required>
                    <input type="text" name="questions[${questionIndex}][answers][1]" class="form-control" placeholder="Réponse 2" required>
                </div>
                <div class="form-check">
                    <input type="radio" name="questions[${questionIndex}][correct]" value="2">
                    <input type="text" name="questions[${questionIndex}][answers][2]" class="form-control" placeholder="Réponse 3">
                </div>
            </div>
        </div>
    `;

    container.insertAdjacentHTML('beforeend', html);
    questionIndex++;
}
</script>
@endsection
