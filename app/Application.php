<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $fillable = [
        'applicant_id', 'job_id','status'
    ];

    public function job()
    {
        return $this->belongsTo(Job::class);
    }
    public function applicant()
    {
        return $this->belongsTo(User::class);
    }
}
