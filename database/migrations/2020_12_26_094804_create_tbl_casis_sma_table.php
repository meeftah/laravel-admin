<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblCasisSmaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_casis_sma', function (Blueprint $table) {
            $table->uuid('id_casis_sma')->primary();
            $table->uuid('id_user');
            $table->uuid('id_va_sma');
            $table->string('nm_siswa')->nullable();
            $table->string('jk')->nullable();
            $table->string('nisn')->nullable();
            $table->string('nik')->nullable();
            $table->string('no_ijazah')->nullable();
            $table->string('no_skhun')->nullable();
            $table->string('no_un')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tgl_lahir')->nullable();
            $table->string('no_akte_lahir')->nullable();
            $table->uuid('id_agama')->nullable();
            $table->string('kebutuhan_khusus')->nullable();
            $table->string('jalan')->nullable();
            $table->string('rt')->nullable();
            $table->string('rw')->nullable();
            $table->string('desalurah')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('kabkota')->nullable();
            $table->string('kodepos')->nullable();
            $table->uuid('id_tempattinggal')->nullable();
            $table->uuid('id_transportasi')->nullable();
            $table->string('no_kks')->nullable();
            $table->string('no_kps')->nullable();
            $table->string('no_kip')->nullable();
            $table->string('nm_kip')->nullable();
            $table->boolean('suket_miskin')->nullable();
            $table->boolean('yatim_piatu')->nullable();
            $table->uuid('id_kondisibelajar')->nullable();
            $table->uuid('id_bcquran')->nullable();
            $table->string('olahraga')->nullable();
            $table->string('kesenian')->nullable();
            $table->string('hobby')->nullable();
            $table->string('penyakit')->nullable();
            $table->integer('tinggi_badan')->nullable();
            $table->integer('berat_badan')->nullable();
            $table->uuid('id_jarak')->nullable();
            $table->uuid('id_waktutmph')->nullable();
            $table->integer('jumlah_saudara')->nullable();
            $table->integer('anak_ke')->nullable();
            $table->integer('dari_bersaudara')->nullable();
            $table->uuid('id_data_ortu')->nullable();
            $table->string('foto')->nullable();
            $table->uuid('id_status_casis');
            $table->string('ket_status')->nullable();
            $table->string('catatan')->nullable();
            $table->uuid('id_tahun_ajaran');
            $table->timestamps();

            $table->foreign('id_va_sma')
                ->references('id_va_sma')
                ->on('tbl_va_sma')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('id_user')
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('id_agama')
                ->references('id_agama')
                ->on('tbl_agama')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('id_tempattinggal')
                ->references('id_tempattinggal')
                ->on('tbl_tempattinggal')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('id_transportasi')
                ->references('id_transportasi')
                ->on('tbl_transportasi')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('id_kondisibelajar')
                ->references('id_kondisibelajar')
                ->on('tbl_kondisibelajar')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('id_bcquran')
                ->references('id_bcquran')
                ->on('tbl_bcquran')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('id_jarak')
                ->references('id_jarak')
                ->on('tbl_jarak')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('id_waktutmph')
                ->references('id_waktutmph')
                ->on('tbl_waktutmph')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('id_data_ortu')
                ->references('id_data_ortu')
                ->on('tbl_data_ortu')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('id_status_casis')
                ->references('id_status_casis')
                ->on('tbl_status_casis')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('id_tahun_ajaran')
                ->references('id_tahun_ajaran')
                ->on('tbl_tahun_ajaran')
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
        Schema::dropIfExists('tbl_casis_sma');
    }
}
