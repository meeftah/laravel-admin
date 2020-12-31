<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblDataOrtuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_data_ortu', function (Blueprint $table) {
            $table->uuid('id_data_ortu')->primary();
            $table->string('nm_ayah')->nullable();
            $table->string('nik_ayah')->nullable();
            $table->integer('tahun_lahir_ayah')->nullable();
            $table->uuid('pendidikan_ayah')->nullable();
            $table->uuid('pekerjaan_ayah')->nullable();
            $table->uuid('penghasilan_ayah')->nullable();
            $table->string('kebutuhan_khusus_ayah')->nullable();
            $table->string('nohp_ayah')->nullable();
            $table->string('nm_ibu')->nullable();
            $table->string('nik_ibu')->nullable();
            $table->integer('tahun_lahir_ibu')->nullable();
            $table->uuid('pendidikan_ibu')->nullable();
            $table->uuid('pekerjaan_ibu')->nullable();
            $table->uuid('penghasilan_ibu')->nullable();
            $table->string('kebutuhan_khusus_ibu')->nullable();
            $table->string('nohp_ibu')->nullable();
            $table->string('nm_wali')->nullable();
            $table->string('nik_wali')->nullable();
            $table->integer('tahun_lahir_wali')->nullable();
            $table->uuid('pendidikan_wali')->nullable();
            $table->uuid('pekerjaan_wali')->nullable();
            $table->uuid('penghasilan_wali')->nullable();
            $table->string('kebutuhan_khusus_wali')->nullable();
            $table->string('nohp_wali')->nullable();
            $table->timestamps();

            $table->foreign('pendidikan_ayah')
                ->references('id_pendidikan')
                ->on('tbl_pendidikan')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('pekerjaan_ayah')
                ->references('id_pekerjaan')
                ->on('tbl_pekerjaan')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('penghasilan_ayah')
                ->references('id_penghasilan')
                ->on('tbl_penghasilan')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('pendidikan_ibu')
                ->references('id_pendidikan')
                ->on('tbl_pendidikan')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('pekerjaan_ibu')
                ->references('id_pekerjaan')
                ->on('tbl_pekerjaan')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('penghasilan_ibu')
                ->references('id_penghasilan')
                ->on('tbl_penghasilan')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('pendidikan_wali')
                ->references('id_pendidikan')
                ->on('pendidikans')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('pekerjaan_wali')
                ->references('id_pekerjaan')
                ->on('pekerjaans')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('penghasilan_wali')
                ->references('id_penghasilan')
                ->on('penghasilans')
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
        Schema::dropIfExists('tbl_data_ortu');
    }
}
