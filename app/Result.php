<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $guarded = [];

    public function exam()
    {
        return $this->belongsTo(Exam::class,'exam_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}