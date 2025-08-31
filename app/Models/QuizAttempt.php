<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuizAttempt extends Model
{
    protected $fillable = ['user_id', 'quiz_id', 'score'];

    // Une tentative appartient à un utilisateur
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Une tentative concerne un quiz
    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }

    // Une tentative contient plusieurs réponses choisies
    public function answers()
    {
        return $this->hasMany(QuizAnswer::class);
    }
}
