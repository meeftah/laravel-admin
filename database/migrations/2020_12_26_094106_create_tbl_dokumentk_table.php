<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblDokumentkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_dokumentk', function (Blueprint $table) {
            $table->uuid('id_dokumen_tk')->primary();
            $table->uuid('id_jenisdokumen_tk');
            $table->uuid('id_calonsiswa_tk');
            $table->string('dokumen');
            $table->timestamps();

            $table->foreign('id_jenisdokumen_tk')
                ->references('id_jenisdokumen')
                ->on('tbl_jenisdokumen')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('id_calonsiswa_tk')
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
        Schema::dropIfExists('tbl_dokumentk');
    }
}
