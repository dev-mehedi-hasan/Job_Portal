<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuizQuestion extends Model
{
    protected $fillable = [
        'quiz_subject_id', 'q1','a1', 'q2','a2', 'q3','a3', 'q4','a4', 'q5','a5'
    ];

    public function quiz_subject()
    {
        return $this->belongsTo(QuizSubject::class);
    }
}
