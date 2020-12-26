<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblDokumensdTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_dokumensd', function (Blueprint $table) {
            $table->uuid('id_dokumen_sd')->primary();
            $table->uuid('id_jenisdokumen_sd');
            $table->uuid('id_calonsiswa_sd');
            $table->string('dokumen');
            $table->timestamps();

            $table->foreign('id_jenisdokumen_sd')
                ->references('id_jenisdokumen')
                ->on('tbl_jenisdokumen')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('id_calonsiswa_sd')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_dokumensd');
    }
}
