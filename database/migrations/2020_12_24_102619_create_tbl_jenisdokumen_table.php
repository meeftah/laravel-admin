<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblJenisdokumenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_jenisdokumen', function (Blueprint $table) {
            $table->uuid('id_jenisdokumen')->primary();
            $table->string('jenisdokumen');
            $table->uuid('id_unit')->nullable();
            $table->timestamps();

            $table->foreign('id_unit')
                ->references('id_unit')
                ->on('tbl_unit')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_jenisdokumen');
    }
}
