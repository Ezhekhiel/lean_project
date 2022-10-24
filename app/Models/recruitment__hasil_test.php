<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class recruitment__hasil_test extends Model
{
    protected $table = "recruitment__hasil_test";
    protected $fillable = ['id_mt','id_soal','bagian','jawaban','nilai'];
}
