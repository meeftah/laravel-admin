<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblInfoTambahanDaftarDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_info_tambahan_daftar_detail', function (Blueprint $table) {
            $table->id();
            $table->uuid('id_info_tambahan_daftar');
            $table->text('detail');
            $table->string('gambar')->nullable();
            $table->timestamps();

            $table->foreign('id_info_tambahan_daftar')
                ->references('id')
                ->on('tbl_info_tambahan_daftar')
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
        Schema::dropIfExists('tbl_info_tambahan_daftar_detail');
    }
}
