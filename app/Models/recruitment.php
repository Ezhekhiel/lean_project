<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class recruitment extends Model
{
    protected $table = "recruitment";
    protected $fillable = ['id', 'tanggal', 'name', 'age', 'bachelors_degree', 'email', 'phone_number', 'cv', 'ijazah', 'kk', 'ktp', 'skck', 'kartu_sehat', 'transkrip_nilai', 'vaksin_1', 'vaksin_2', 'nama_kampus', 'program_pendidikan', 'alamat', 'pengalaman_kerja', 'lama_bekerja', 'referensi', 'kehadiran', 'id_test' ];
}
