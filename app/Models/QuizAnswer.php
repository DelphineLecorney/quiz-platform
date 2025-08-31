<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuizAnswer extends Model
{
    protected $fillable = ['quiz_attempt_id', 'answer_id'];

    // Réponse choisie lors d’une tentative
    public function attempt()
    {
        return $this->belongsTo(QuizAttempt::class, 'quiz_attempt_id');
    }

    // Relie à la vraie réponse
    public function answer()
    {
        return $this->belongsTo(Answer::class);
    }
}
