<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RecruitmentResultKreplin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recruitment__result_kreplin', function (Blueprint $table) {
            $table->string('id',55)->primary();
            $table->integer('id_kandidate');
            $table->integer('no_soal');
            $table->char('baris1',5);
            $table->char('baris2',5);
            $table->char('baris3',5);
            $table->char('baris4',5);
            $table->char('baris5',5);
            $table->char('baris6',5);
            $table->char('baris7',5);
            $table->char('baris8',5);
            $table->char('baris9',5);
            $table->char('baris10',5);
            $table->char('baris11',5);
            $table->char('baris12',5);
            $table->char('baris13',5);
            $table->char('baris14',5);
            $table->char('baris15',5);
            $table->char('baris16',5);
            $table->char('baris17',5);
            $table->char('baris18',5);
            $table->char('baris19',5);
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
        Schema::dropIfExists('recruitment__result_kreplin');
    }
}
