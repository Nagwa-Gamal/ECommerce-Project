<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class review extends Model
{
    protected $table="reviews";
    protected $fillable = [
        'content','cus_id','pro_id', 'rate','updated_at'
    ];
    //
}
