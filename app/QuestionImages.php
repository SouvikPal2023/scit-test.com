<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionImages extends Model
{
    protected $table = 'Questionimages';
    protected $guarded = [];
    public function questionimages()
    {
        return $this->hasMany(Exam::class,'question_id');
    }
}
