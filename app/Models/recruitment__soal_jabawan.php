<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class recruitment__soal_jabawan extends Model
{
    protected $table = "recruitment__soal_jabawan";
    protected $fillable = ['id_soal','jawaban','pilihan','type'];
}
