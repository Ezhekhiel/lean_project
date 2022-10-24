<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecruitmentEmailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recruitment__email', function (Blueprint $table) {
            $table->string('id',55)->primary();
            $table->integer('id_mt');
            $table->integer('status');
            $table->string('link',255)->default('-');
            $table->string('link_ms_teams',255)->default('-');
            $table->string('user',55);
            $table->string('password',255);
            $table->dateTime('time')->default(\DB::raw('CURRENT_TIMESTAMP'));
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
        Schema::dropIfExists('recruitment__email');
    }
}
