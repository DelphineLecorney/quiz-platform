<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Quiz;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function dashboard()
    {
        $users = User::all();
        $quizzes = Quiz::all();

        return view('admin.dashboard', compact('users', 'quizzes'));
    }

    public function deleteQuiz($id)
    {
        Quiz::destroy($id);
        return redirect()->route('admin.dashboard')->with('success', 'Quiz supprimé.');
    }

    public function changeRole(Request $request, $id)
    {
        $request->validate([
            'role' => 'required|in:user,admin',
        ]);

        $user = User::findOrFail($id);
        $user->role = $request->role;
        $user->save();

        return redirect()->route('admin.dashboard')->with('success', 'Rôle mis à jour.');
    }

    public function createQuiz()
    {
        return view('admin.quiz.create');
    }

    public function storeQuiz(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'questions' => 'required|array',
            'questions.*.text' => 'required|string',
            'questions.*.answers' => 'required|array|min:1',
            'questions.*.correct' => 'required',
        ]);

        $quiz = Quiz::create([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        foreach ($request->questions as $q) {
            $question = $quiz->questions()->create([
                'text' => $q['text'],
            ]);

            foreach ($q['answers'] as $i => $answerText) {
                $question->answers()->create([
                    'text' => $answerText,
                    'is_correct' => $i == $q['correct'],
                ]);
            }
        }

        return redirect()->route('admin.dashboard')->with('success', 'Quiz créé avec succès');
    }
}
