<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecruitmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recruitment', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->string('name',125)->nullable();
            $table->smallInteger('age');
            $table->string('bachelors_degree');
            $table->string('email');
            $table->string('phone_number',25);
            $table->string('cv');
            $table->string('ijazah');
            $table->string('kk');
            $table->string('ktp');
            $table->string('skck');
            $table->string('kartu_sehat');
            $table->string('transkrip_nilai');
            $table->string('vaksin_1');
            $table->string('vaksin_2');
            $table->string('nama_kampus');
            $table->string('program_pendidikan');
            $table->text('alamat');
            $table->text('pengalaman_kerja');
            $table->string('lama_bekerja');
            $table->string('referensi')->default('-');
            $table->enum('kehadiran', ['Invite', 'Present','Postponed']);
            $table->string('id_test')->default('-');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recruitment');
    }
}
