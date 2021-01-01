<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblSlidefrontendTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_slidefrontend', function (Blueprint $table) {
            $table->uuid('id_slidefrontend')->primary();
            $table->string('gambar');
            $table->string('judul')->nullable();
            $table->string('deskripsi')->nullable();
            $table->string('url')->nullable();
            $table->string('url_teks')->nullable();
            $table->boolean('status');
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
        Schema::dropIfExists('tbl_slidefrontend');
    }
}
