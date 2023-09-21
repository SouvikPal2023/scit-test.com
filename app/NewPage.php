<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewPage extends Model
{
    protected $fillable = [
        //'id',
        'name',
        'slug',


        'template',
        'seo_title',
        'meta_keyword',
        'meta_content',
        ];
}
