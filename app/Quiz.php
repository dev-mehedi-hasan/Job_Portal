<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $fillable = [
        'quizquestion_id', 'participant_id','status', 'mark'
    ];

    public function quiz_question()
    {
        return $this->belongsTo(QuizQuestion::class);
    }
    public function participant()
    {
        return $this->belongsTo(User::class);
    }
}
