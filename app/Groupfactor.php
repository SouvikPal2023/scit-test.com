<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Groupfactor extends Model
{
    protected $guarded = [];
    protected $table = 'Groupfactor';

    public function category(){
        return $this->belongsTO(Category::class);
    }

}
