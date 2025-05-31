<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;

class QuizController extends Controller
{
    public function index()
    {
        $quizzes = Quiz::all();
        return view('quizzes.index', compact('quizzes'));
    }

    public function show(Quiz $quiz)
    {
        $quiz->load('questions.answers');
        return view('quizzes.show', compact('quiz'));
    }

    public function submit(Request $request, Quiz $quiz)
{
    $score = 0;
    $total = $quiz->questions->count();

    foreach ($quiz->questions as $question) {
        $selected = $request->input("answers.{$question->id}");
        $correct = $question->answers()->where('is_correct', true)->first();

        if ($selected && $correct && $selected == $correct->id) {
            $score++;
        }
    }

    return view('quizzes.result', compact('quiz', 'score', 'total'));
}

}
