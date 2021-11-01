<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    //
    protected $table = "orders";

    protected $fillable = [
        'cus_id','pro_id','quantity',
    ];
}
