<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SequenceInspection extends Model
{
    protected $table = "inspection_sequence";
    protected $fillable = ['id','id_proses','area','sukses','error'];
}
