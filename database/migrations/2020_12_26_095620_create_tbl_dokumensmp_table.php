<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblDokumensmpTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_dokumensmp', function (Blueprint $table) {
            $table->uuid('id_dokumen_smp')->primary();
            $table->uuid('id_jenisdokumen_smp');
            $table->uuid('id_calonsiswa_smp');
            $table->string('dokumen');
            $table->timestamps();

            $table->foreign('id_jenisdokumen_smp')
                ->references('id_jenisdokumen')
                ->on('tbl_jenisdokumen')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('id_calonsiswa_smp')
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
        Schema::dropIfExists('tbl_dokumensmp');
    }
}
