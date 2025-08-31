<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['quiz_id', 'text'];

    // Une question appartient à un quiz
    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }

    // Une question a plusieurs réponses possibles
    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
}
