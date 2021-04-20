<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = [
        'user_id', 'office_name', 'position', 'description','vacancy', 'responsibilities','skill_name','required_education', 'employment_status', 'salary','other_benifits', 'location', 'dead_line'
    ];
}
