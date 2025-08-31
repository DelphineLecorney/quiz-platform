<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $fillable = ['title', 'description', 'user_id'];

    // Un quiz appartient à un créateur (admin)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Un quiz contient plusieurs questions
    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    // Un quiz peut avoir plusieurs tentatives
    public function attempts()
    {
        return $this->hasMany(QuizAttempt::class);
    }
}
