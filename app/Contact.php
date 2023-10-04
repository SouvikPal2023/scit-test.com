<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $guarded =[];
    protected $fillable = [
        'name',
        'email',
        'phone',
        'message',
        'subject'
    ];
}
