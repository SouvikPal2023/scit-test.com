<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class optionImages extends Model
{
    protected $table = 'Optionimages';
    protected $guarded = [];
    public function optionsimages()
    {
        return $this->hasMany(Exam::class,'option_id');
    }
}
