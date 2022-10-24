<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class recruitment__soal extends Model
{
    protected $table = "recruitment__soal";
    protected $fillable = ['bagian','soal','type','jawaban'];
}
