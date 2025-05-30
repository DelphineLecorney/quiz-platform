<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Quiz;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();

        if ($user->role === 'admin') {
            $users = User::all();
            $quizzes = Quiz::all();
            return view('admin.dashboard', compact('users', 'quizzes'));
        }


        return view('user.dashboard');
    }
}
