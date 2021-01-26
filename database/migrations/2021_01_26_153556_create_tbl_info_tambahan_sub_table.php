<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblInfoTambahanSubTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_info_tambahan_sub', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('id_info_tambahan');
            $table->string('judul_sub');
            $table->timestamps();

            $table->foreign('id_info_tambahan')
                ->references('id')
                ->on('tbl_info_tambahan')
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
        Schema::dropIfExists('tbl_info_tambahan_sub');
    }
}
