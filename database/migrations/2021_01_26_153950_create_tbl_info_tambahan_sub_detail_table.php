<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblInfoTambahanSubDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_info_tambahan_sub_detail', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('id_info_tambahan_sub');
            $table->string('detail');
            $table->string('gambar')->nullable();
            $table->timestamps();

            $table->foreign('id_info_tambahan_sub')
                ->references('id')
                ->on('tbl_info_tambahan_sub')
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
        Schema::dropIfExists('tbl_info_tambahan_sub_detail');
    }
}
