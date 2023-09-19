<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExamImages extends Model
{
    protected $guarded = [];
    public function examimages()
    {
        return $this->hasMany(Exam::class,'id');
    }
}
