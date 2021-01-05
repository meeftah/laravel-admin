<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblDokumensmaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_dokumensma', function (Blueprint $table) {
            $table->uuid('id_dokumen_sma')->primary();
            $table->uuid('id_jenisdokumen_sma');
            $table->uuid('id_casis_sma');
            $table->string('dokumen');
            $table->timestamps();

            $table->foreign('id_jenisdokumen_sma')
                ->references('id_jenisdokumen')
                ->on('tbl_jenisdokumen')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('id_casis_sma')
                ->references('id_casis_sma')
                ->on('tbl_casis_sma')
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
        Schema::dropIfExists('tbl_dokumensma');
    }
}
