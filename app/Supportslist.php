<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supportslist extends Model
{
    //
    protected $fillable = [
        'user_id','password','name', 'father', 'mother','mobile','national_id','occupation','current_address','permanent_address','status'
    ];
}
