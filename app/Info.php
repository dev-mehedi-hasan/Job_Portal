<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    protected $fillable = [
        'user_id', 'career_objective', 'work_experience', 'current_position', 'current_company'
    ];

}
