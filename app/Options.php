<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Symfony\Component\Console\Question\Question;

class Options extends Model
{
    protected $guarded = [];
    public function optionsimages()
    {
        return $this->hasMany(optionImages::class,'option_id','id');
    }
    public function question()
    {
        return $this->belongsTo(Question::class,'question_id');
    }
}
