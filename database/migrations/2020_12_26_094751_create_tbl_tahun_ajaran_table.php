<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblTahunAjaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_tahun_ajaran', function (Blueprint $table) {
            $table->uuid('id_tahun_ajaran')->primary();
            $table->string('tahun_ajaran');
            $table->string('slug_tahun_ajaran');
            $table->dateTime('periode_mulai')->nullable();
            $table->dateTime('periode_akhir')->nullable();
            $table->boolean('status')->default(0);
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
        Schema::dropIfExists('tbl_tahun_ajaran');
    }
}
