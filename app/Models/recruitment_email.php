<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class recruitment_email extends Model
{
    protected $table = "recruitment__email";
    protected $fillable = ['id_mt','status','link','link_ms_teams','user','password','time'];
}
