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
}
