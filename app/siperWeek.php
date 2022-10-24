<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class siperWeek extends Model
{
    protected $table = "si_per_week";
    protected $fillable = ['cell','po','market','style','width','quantity','balance','exp','status'];
}
