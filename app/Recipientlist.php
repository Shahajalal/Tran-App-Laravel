<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipientlist extends Model
{
    protected $fillable = [
        'user_id','name', 'father', 'mother','mobile','national_id','occupation','family_member','monthly_income','jela','upojela','word','village','house_no','easy_way','comment','status','permanent_address'
    ];
}
