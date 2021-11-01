<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cuspro extends Model
{
    //
    protected $table = 'cuspros';
    protected $fillable = ['id', 'cus_id', 'pro_id', 'updated_at'];
}
