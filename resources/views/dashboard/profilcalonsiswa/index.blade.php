@extends('layouts.admin')

@section('title', 'Profil Calon Siswa')

@section('breadcrumb')
<div class="br-pageheader pd-y-15 pd-l-20">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
        <a class="breadcrumb-item" href="{{ route('dashboard.calonsiswa.profil', Auth::user()->id) }}">Profil Calon
            Siswa</a>
    </nav>
</div>
@endsection

@section('content-header')
<div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
    <h4 class="tx-gray-800 mg-b-5">Profil Calon Siswa</h4>
    <p class="mg-b-0">Calon Siswa</p>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div id="wizard4">
                    <h3>BIODATA</h3>
                    <section class="bg-light">
                        <div class="card-body">
                            <div class="form-group row align-items-center mb-0">
                                <label class="col-sm-12 col-md-3 control-label col-form-label">
                                    <h6 class="tx-uppercase tx-bold tx-black mg-b-10">DATA CALON SISWA</h6>
                                </label>
                            </div>
                            <div class="form-group row align-items-center mb-0">
                                <label class="col-md-3 control-label col-form-label">
                                    Nama Peserta Didik
                                    <small>(Sesuai Akta Lahir)</small>
                                </label>
                                <div class="col-md-9 pb-2 pt-2">
                                    <input type="text" id="nm_siswa" name="nm_siswa" class="form-control"
                                        placeholder="NAMA LENGKAP" value="" style="text-transform:uppercase">
                                </div>
                            </div>
                            <div class="form-group row align-items-center mb-0">
                                <label class="col-md-3 control-label col-form-label mb-0">
                                    Jenis Kelamin
                                </label>
                                <div class="col-md-9 pb-2 pt-2">
                                    <select id="jk" name="jk" class="form-control select2-show-search"
                                        style="width: 100%" data-placeholder="PILIH JENIS KELAMIN">
                                        <option></option>
                                        <option value="L">LAKI-LAKI</option>
                                        <option value="P">PEREMPUAN</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row align-items-center mb-0">
                                <label class="col-md-3 control-label col-form-label">
                                    NISN
                                    <small>(Nomor Induk Siswa Nasional)</small>
                                </label>
                                <div class="col-md-9 pb-2 pt-2">
                                    <input type="text" id="nisn" name="nisn" class="form-control" maxlength="10"
                                        value="" placeholder="NOMOR INDUK SISWA NASIONAL"
                                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                </div>
                            </div>
                            <div class="form-group row align-items-center mb-0">
                                <label class="col-md-3 control-label col-form-label">
                                    NIK
                                    <small>(Nomor Induk Kependudukan)</small>
                                </label>
                                <div class="col-md-9 pb-2 pt-2">
                                    <input type="text" id="nik" name="nik" class="form-control" maxlength="16" value=""
                                        placeholder="BERUPA ANGKA 16 DIGIT"
                                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                </div>
                            </div>
                            <div class="form-group row align-items-center mb-0">
                                <label class="col-md-3 control-label col-form-label">
                                    Nomor Seri Ijazah SD/MI
                                </label>
                                <div class="col-md-9 pb-2 pt-2">
                                    <input type="text" id="no_ijazah" name="no_ijazah" class="form-control" value=""
                                        placeholder="NOMOR SERI IJAZAH SD/MI">
                                </div>
                            </div>
                            <div class="form-group row align-items-center mb-0">
                                <label class="col-md-3 control-label col-form-label">
                                    Nomor seri SKHUN SD/MI
                                </label>
                                <div class="col-md-9 pb-2 pt-2">
                                    <input type="text" id="no_skhun" name="no_skhun" class="form-control" value=""
                                        placeholder="NOMOR SERI SKHUN SD/MI">
                                </div>
                            </div>
                            <div class="form-group row align-items-center mb-0">
                                <label class="col-md-3 control-label col-form-label">
                                    Nomor Ujian Nasional SD/MI
                                </label>
                                <div class="col-md-9 pb-2 pt-2">
                                    <input type="text" id="no_un" name="no_un" class="form-control" value=""
                                        placeholder="NOMOR UJIAN NASIONAL SD/MI">
                                </div>
                            </div>
                            <div class="form-group row align-items-center mb-0">
                                <label class="col-md-3 control-label col-form-label">
                                    Tempat / Tgl Lahir
                                </label>
                                <div class="col-md-5 pb-2 pt-2">
                                    <input id="tempat_lahir" name="tempat_lahir" type="text" class="form-control"
                                        value="" placeholder="TEMPAT LAHIR" style="text-transform:uppercase">
                                </div>
                                <div class="col-md-4 pb-2 pt-2">
                                    <input id="tanggal_lahir" name="tanggal_lahir" type="text"
                                        class="form-control fc-datepicker" placeholder="TANGGAL/BULAN/TAHUN">
                                </div>
                            </div>
                            <div class="form-group row align-items-center mb-0">
                                <label class="col-sm-12 col-md-3 control-label col-form-label">
                                    Nomor Registrasi Akta Lahir
                                </label>
                                <div class="col-sm-12 col-md-9 pb-2 pt-2">
                                    <input id="no_aktalahir" name="no_aktalahir" type="text" class="form-control"
                                        value="" placeholder="NO AKTA LAHIR">
                                </div>
                            </div>
                            <div class="form-group row align-items-center mb-0">
                                <label class="col-sm-12 col-md-3 control-label col-form-label">
                                    Agama
                                </label>
                                <div class="col-sm-12 col-md-9 pb-2 pt-2">
                                    <select name="id_agama" class="form-control select2-show-search" style="width: 100%"
                                        data-placeholder="PILIH AGAMA">
                                        <option></option>
                                        @foreach ($agama as $item)
                                        <option value="{{ $item->id_agama }}">{{ strtoupper($item->agama) }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row align-items-center mb-0">
                                <label class="col-sm-12 col-md-3 control-label col-form-label">
                                    Berkebutuhan Khusus
                                </label>
                                <div class="col-sm-12 col-md-2 pb-2 pt-2">
                                    <select id="kebutuhan_khusus_siswa" name="kebutuhan_khusus_siswa"
                                        class="form-control select2-show-search" style="width: 100%"
                                        data-placeholder="PILIH">
                                        <option></option>
                                        <option value="YA">YA</option>
                                        <option value="TIDAK">TIDAK</option>
                                    </select>
                                </div>
                                <div class="col-sm-12 col-md-7 pb-2 pt-2">
                                    <input id="kebutuhan_khusus_siswa_detail" name="kebutuhan_khusus_siswa_detail"
                                        type="text" class="form-control" value="" style="text-transform:uppercase"
                                        placeholder="TUNA NETRA / RUNGU / INDIGO / NARKOBA / AUTIS / LAINNYA (SEBUTKAN...)">
                                </div>
                            </div>
                            <hr>
                            <div class="form-group row align-items-center mb-0">
                                <label class="col-sm-12 col-md-3 control-label col-form-label">
                                    <h6 class="tx-uppercase tx-bold tx-black mg-b-10">
                                        DATA ALAMAT SEKARANG
                                        <small>(Saat Sekolah)</small>
                                    </h6>
                                </label>
                            </div>
                            <div class="form-group row align-items-center mb-0">
                                <label class="col-sm-12 col-md-3 control-label col-form-label">
                                    Jalan
                                </label>
                                <div class="col-sm-12 col-md-9 pb-2 pt-2">
                                    <input id="jalan" name="jalan" type="text" class="form-control" value=""
                                        placeholder="ALAMAT LENGKAP" style="text-transform:uppercase">
                                </div>
                            </div>
                            <div class="form-group row align-items-center mb-0">
                                <label class="col-sm-12 col-md-3 control-label col-form-label">
                                    RT / RW
                                </label>
                                <div class="col-md-4 pb-2 pt-2">
                                    <input type="text" id="rt" name="rt" class="form-control" value=""
                                        placeholder="RT 3 DIGIT, CONTOH: 003"
                                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                </div>
                                <div class="col-md-5 pb-2 pt-2">
                                    <input type="text" id="rw" name="rw" class="form-control" value=""
                                        placeholder="RW 3 DIGIT, CONTOH: 016"
                                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                </div>
                            </div>
                            <div class="form-group row align-items-center mb-0">
                                <label class="col-sm-12 col-md-3 control-label col-form-label">
                                    Desa / Kelurahan
                                </label>
                                <div class="col-sm-12 col-md-9 pb-2 pt-2">
                                    <input type="text" class="form-control" value="">
                                </div>
                            </div>
                            <div class="form-group row align-items-center mb-0">
                                <label class="col-sm-12 col-md-3 control-label col-form-label">
                                    Kecamatan
                                </label>
                                <div class="col-sm-12 col-md-9 pb-2 pt-2">
                                    <input type="text" class="form-control" value="">
                                </div>
                            </div>
                            <div class="form-group row align-items-center mb-0">
                                <label class="col-sm-12 col-md-3 control-label col-form-label">
                                    Kabupaten / Kota
                                </label>
                                <div class="col-sm-12 col-md-9 pb-2 pt-2">
                                    <input type="text" class="form-control" value="">
                                </div>
                            </div>
                            <div class="form-group row align-items-center mb-0">
                                <label class="col-sm-12 col-md-3 control-label col-form-label">
                                    Kode Pos
                                </label>
                                <div class="col-sm-12 col-md-9 pb-2 pt-2">
                                    <input type="text" id="kode_pos" name="kode_pos" class="form-control" value=""
                                        maxlength="5" placeholder="KODE POS"
                                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                </div>
                            </div>
                            <hr>
                            <div class="form-group row align-items-center mb-0">
                                <label class="col-sm-12 col-md-3 control-label col-form-label">
                                    <h6 class="tx-uppercase tx-bold tx-black mg-b-10">DATA PELENGKAP</h6>
                                </label>
                            </div>
                            <div class="form-group row align-items-center mb-0">
                                <label class="col-sm-12 col-md-3 control-label col-form-label">
                                    Tempat Tinggal
                                </label>
                                <div class="col-sm-12 col-md-9 pb-2 pt-2">
                                    <select name="id_jarak" class="form-control select2-show-search" style="width: 100%"
                                        data-placeholder="PILIH JARAK TEMPAT TINGGAL KE SEKOLAH">
                                        <option></option>
                                        @foreach ($jarak as $item)
                                        <option value="{{ $item->id_jarak }}">{{ strtoupper($item->jarak) }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row align-items-center mb-0">
                                <label class="col-sm-12 col-md-3 control-label col-form-label">
                                    Jenis Transportasi ke Sekolah
                                </label>
                                <div class="col-sm-12 col-md-9 pb-2 pt-2">

                                    <input type="text" class="form-control" value="">
                                </div>
                            </div>
                            <div class="form-group row align-items-center mb-0">
                                <label class="col-sm-12 col-md-3 control-label col-form-label">
                                    Nomor Telepon Rumah
                                </label>
                                <div class="col-sm-12 col-md-9 pb-2 pt-2">
                                    <input type="text" id="telepon_rumah" name="telepon_rumah" class="form-control"
                                        value="" placeholder="(0561) 88888888">
                                </div>
                            </div>
                            <div class="form-group row align-items-center mb-0">
                                <label class="col-sm-12 col-md-3 control-label col-form-label">
                                    Email
                                </label>
                                <div class="col-sm-12 col-md-9 pb-2 pt-2">
                                    <input id="email" name="email" type="text" class="form-control" value=""
                                        placeholder="ISI EMAIL ANDA DENGAN BENAR" style="text-transform:uppercase">
                                </div>
                            </div>
                            <div class="form-group row align-items-center mb-0">
                                <label class="col-sm-12 col-md-3 control-label col-form-label">
                                    Nomor KKS
                                    <small>(Kartu Keluarga Sejahtera)</small>
                                </label>
                                <div class="col-sm-12 col-md-2 pb-2 pt-2">
                                    <select id="no_kks" name="no_kks" class="form-control select2-show-search"
                                        style="width: 100%" data-placeholder="PILIH">
                                        <option></option>
                                        <option value="ADA">ADA</option>
                                        <option value="TIDAK ADA">TIDAK ADA</option>
                                    </select>
                                </div>
                                <div class="col-sm-12 col-md-7 pb-2 pt-2">
                                    <input id="no_kks_detail" name="no_kks_detail" type="text" class="form-control"
                                        value="">
                                </div>
                            </div>
                            <div class="form-group row align-items-center mb-0">
                                <label class="col-sm-12 col-md-3 control-label col-form-label">
                                    Penerima KPS
                                    <small>(Kartu Perlin. Sosial)</small>
                                </label>
                                <div class="col-sm-12 col-md-2 pb-2 pt-2">
                                    <select id="no_kps" name="no_kps" class="form-control select2-show-search"
                                        style="width: 100%" data-placeholder="PILIH">
                                        <option></option>
                                        <option value="YA">YA</option>
                                        <option value="TIDAK">TIDAK</option>
                                    </select>
                                </div>
                                <div class="col-sm-12 col-md-7 pb-2 pt-2">
                                    <input id="no_kps_detail" name="no_kps_detail" type="text" class="form-control"
                                        value="">
                                </div>
                            </div>
                            <div class="form-group row align-items-center mb-0">
                                <label class="col-sm-12 col-md-3 control-label col-form-label">
                                    Penerima KIP
                                    <small>(Kartu Indonesia Pintar)</small>
                                </label>
                                <div class="col-sm-12 col-md-2 pb-2 pt-2">
                                    <select id="no_kip" name="no_kip" class="form-control select2-show-search"
                                        style="width: 100%" data-placeholder="PILIH">
                                        <option></option>
                                        <option value="YA">YA</option>
                                        <option value="TIDAK">TIDAK</option>
                                    </select>
                                </div>
                                <div class="col-sm-12 col-md-7 pb-2 pt-2">
                                    <input id="no_kip_detail" name="no_kip_detail" type="text" class="form-control"
                                        value="">
                                </div>
                            </div>
                            <div class="form-group row align-items-center mb-0">
                                <label class="col-sm-12 col-md-3 control-label col-form-label">
                                    Nama Tertera di KIP
                                </label>
                                <div class="col-sm-12 col-md-9 pb-2 pt-2">
                                    <input id="nm_kip" name="nm_kip" type="text" class="form-control" value=""
                                        placeholder="NAMA YANG TERTERA DI KIP" style="text-transform:uppercase">
                                </div>
                            </div>
                            <div class="form-group row align-items-center mb-0">
                                <label class="col-sm-12 col-md-3 control-label col-form-label">
                                    Memiliki Surat Keterangan Miskin
                                </label>
                                <div class="col-sm-12 col-md-9 pb-2 pt-2">
                                    <select id="suket_miskin" name="suket_miskin"
                                        class="form-control select2-show-search" style="width: 100%"
                                        data-placeholder="PILIH">
                                        <option></option>
                                        <option value="YA">YA</option>
                                        <option value="TIDAK">TIDAK</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row align-items-center mb-0">
                                <label class="col-sm-12 col-md-3 control-label col-form-label">
                                    Yatim / Yatim Piatu
                                </label>
                                <div class="col-sm-12 col-md-9 pb-2 pt-2">
                                    <select id="yatim_piatu" name="yatim_piatu" class="form-control select2-show-search"
                                        style="width: 100%" data-placeholder="PILIH">
                                        <option></option>
                                        <option value="YA">YA</option>
                                        <option value="TIDAK">TIDAK</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row align-items-center mb-0">
                                <label class="col-sm-12 col-md-3 control-label col-form-label">
                                    Kondisi Belajar di Rumah
                                </label>
                                <div class="col-sm-12 col-md-9 pb-2 pt-2">
                                    <select name="id_kondisibelajar" class="form-control select2-show-search"
                                        style="width: 100%" data-placeholder="PILIH KONDISI BELAJAR">
                                        <option></option>
                                        @foreach ($kondisibelajar as $item)
                                        <option value="{{ $item->id_kondisibelajar }}">
                                            {{ strtoupper($item->kondisibelajar) }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row align-items-center mb-0">
                                <label class="col-sm-12 col-md-3 control-label col-form-label">
                                    Kemampuan Baca Al-Qur'an
                                </label>
                                <div class="col-sm-12 col-md-9 pb-2 pt-2">
                                    <select id="id_bcquran" name="id_bcquran" class="form-control select2-show-search"
                                        style="width: 100%" data-placeholder="PILIH KEMAMPUAN MEMBACA QURAN">
                                        <option></option>
                                        @foreach ($bcquran as $item)
                                        <option value="{{ $item->id_bcquran }}">{{ strtoupper($item->bcquran) }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row align-items-center mb-0">
                                <label class="col-sm-12 col-md-3 control-label col-form-label">
                                    Olahraga (Minat / Bakat)
                                </label>
                                <div class="col-sm-12 col-md-9 pb-2 pt-2">
                                    <input type="text" id="olahraga" name="olahraga" class="form-control" value=""
                                        placeholder="MINAT / BAKAT DI BIDANG OLAHRAGA">
                                </div>
                            </div>
                            <div class="form-group row align-items-center mb-0">
                                <label class="col-sm-12 col-md-3 control-label col-form-label">
                                    Kesenian (Minat / Bakat)
                                </label>
                                <div class="col-sm-12 col-md-9 pb-2 pt-2">
                                    <input type="text" id="kesenian" name="kesenian" class="form-control" value=""
                                        placeholder="MINAT / BAKAT DI BIDANG KESENIAN">
                                </div>
                            </div>
                            <div class="form-group row align-items-center mb-0">
                                <label class="col-sm-12 col-md-3 control-label col-form-label">
                                    Hobby
                                </label>
                                <div class="col-sm-12 col-md-9 pb-2 pt-2">
                                    <input type="text" id="hobi" name="hobi" class="form-control" value=""
                                        placeholder="SEBUTKAN HOBBY DIPISAH DENGAN TANDA KOMA">
                                </div>
                            </div>
                            <div class="form-group row align-items-center mb-0">
                                <label class="col-sm-12 col-md-3 control-label col-form-label">
                                    Penyakit Yang Pernah Diderita
                                </label>
                                <div class="col-sm-12 col-md-9 pb-2 pt-2">
                                    <input type="text" id="penyakit" name="penyakit" class="form-control" value=""
                                        placeholder="PENYAKIT YANG PERNAH DIDERITA">
                                </div>
                            </div>
                            <div class="form-group row align-items-center mb-0">
                                <label class="col-sm-12 col-md-3 control-label col-form-label">
                                    Tinggi Badan
                                </label>
                                <div class="col-6 pb-2 pt-2">
                                    <input type="text" id="tinggi_badan" name="tinggi_badan" class="form-control"
                                        value="" maxlength="3" placeholder="TINGGI BADAN"
                                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                </div>
                                CM
                            </div>
                            <div class="form-group row align-items-center mb-0">
                                <label class="col-sm-12 col-md-3 control-label col-form-label">
                                    Berat Badan
                                </label>
                                <div class="col-6 pb-2 pt-2">
                                    <input type="text" id="berat_badan" name="berat_badan" class="form-control" value=""
                                        maxlength="3" placeholder="BERAT BADAN"
                                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                </div>
                                KG
                            </div>
                            <div class="form-group row align-items-center mb-0">
                                <label class="col-sm-12 col-md-3 control-label col-form-label">
                                    Jarak Tempat Tinggal ke Sekolah
                                </label>
                                <div class="col-sm-12 col-md-9 pb-2 pt-2">
                                    <select name="id_jarak" class="form-control select2-show-search" style="width: 100%"
                                        data-placeholder="PILIH JARAK TEMPAT TINGGAL KE SEKOLAH">
                                        <option></option>
                                        @foreach ($jarak as $item)
                                        <option value="{{ $item->id_jarak }}">{{ strtoupper($item->jarak) }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row align-items-center mb-0">
                                <label class="col-sm-12 col-md-3 control-label col-form-label">
                                    Waktu Tempuh ke Sekolah
                                </label>
                                <div class="col-sm-12 col-md-9 pb-2 pt-2">
                                    <select name="id_waktutmph" class="form-control select2-show-search"
                                        style="width: 100%" data-placeholder="PILIH WAKTU TEMPUH KE SEKOLAH">
                                        <option></option>
                                        @foreach ($waktutmph as $item)
                                        <option value="{{ $item->id_waktutmph }}">{{ strtoupper($item->waktutmph) }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row align-items-center mb-0">
                                <label class="col-sm-12 col-md-3 control-label col-form-label">
                                    Jumlah Bersaudara
                                </label>
                                <div class="col-md-9 pb-2 pt-2">
                                    <input type="text" id="jumlah_saudara" name="jumlah_saudara" class="form-control"
                                        value="" maxlength="3" placeholder="JUMLAH BERSAUDARA"
                                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                </div>
                            </div>
                            <div class="form-group row align-items-center mb-0">
                                <label class="col-sm-12 col-md-3 control-label col-form-label">
                                    Anak Ke
                                </label>
                                <div class="col-md-9 pb-2 pt-2">
                                    <input type="text" id="anak_ke" name="anak_ke" class="form-control" value=""
                                        maxlength="3" placeholder="ANAK KE"
                                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                </div>
                            </div>
                            <div class="form-group row align-items-center mb-0">
                                <label class="col-sm-12 col-md-3 control-label col-form-label">
                                    Dari Berapa Bersaudara
                                </label>
                                <div class="col-md-9 pb-2 pt-2">
                                    <input type="text" id="dari_bersaudara" name="dari_bersaudara" class="form-control"
                                        value="" maxlength="3" placeholder="DARI BERAPA BERSAUDARA"
                                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                </div>
                            </div>
                        </div>
                    </section>
                    <h3>DATA ORANG TUA</h3>
                    <section class="bg-light">
                        <div class="card-body">
                            <div class="form-group row align-items-center mb-0">
                                <label class="col-sm-12 col-md-3 control-label col-form-label">
                                    <h6 class="tx-uppercase tx-bold tx-black mg-b-10">
                                        DATA AYAH KANDUNG
                                        <small>(BUKAN AYAH TIRI)</small>
                                    </h6>
                                </label>
                            </div>
                            <div class="form-group row align-items-center mb-0">
                                <label class="col-md-3 control-label col-form-label">
                                    Nama Ayah
                                </label>
                                <div class="col-md-9 pb-2 pt-2">
                                    <input type="text" id="nm_ayah" name="nm_ayah" class="form-control"
                                        placeholder="NAMA LENGKAP AYAH" value="" style="text-transform:uppercase">
                                </div>
                            </div>
                            <div class="form-group row align-items-center mb-0">
                                <label class="col-md-3 control-label col-form-label">
                                    NIK Ayah
                                </label>
                                <div class="col-md-9 pb-2 pt-2">
                                    <input type="text" id="nik_ayah" name="nik_ayah" class="form-control" maxlength="16"
                                        value="" placeholder="BERUPA ANGKA 16 DIGIT"
                                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                </div>
                            </div>
                            <div class="form-group row align-items-center mb-0">
                                <label class="col-md-3 control-label col-form-label">
                                    Tahun Lahir Ayah
                                </label>
                                <div class="col-md-9 pb-2 pt-2">
                                    <input type="text" id="tahun_lahir_ayah" name="tahun_lahir_ayah"
                                        class="form-control" maxlength="4" value="" placeholder="TAHUN"
                                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                </div>
                            </div>
                            <div class="form-group row align-items-center mb-0">
                                <label class="col-md-3 control-label col-form-label">
                                    Pendidikan Terakhir
                                </label>
                                <div class="col-md-9 pb-2 pt-2">
                                    <select id="id_pendidikan_ayah" name="id_pendidikan_ayah"
                                        class="form-control select2-show-search" style="width: 100%"
                                        data-placeholder="PILIH PENDIDIKAN">
                                        <option></option>
                                        @foreach ($pendidikan as $item)
                                        <option value="{{ $item->id_pendidikan }}">{{ strtoupper($item->pendidikan) }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row align-items-center mb-0">
                                <label class="col-md-3 control-label col-form-label">
                                    Pekerjaan Terakhir
                                </label>
                                <div class="col-md-9 pb-2 pt-2">
                                    <select id="id_pekerjaan_ayah" name="id_pekerjaan_ayah"
                                        class="form-control select2-show-search" style="width: 100%"
                                        data-placeholder="PILIH PEKERJAAN">
                                        <option></option>
                                        @foreach ($pekerjaan as $item)
                                        <option value="{{ $item->id_pekerjaan }}">{{ strtoupper($item->pekerjaan) }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row align-items-center mb-0">
                                <label class="col-md-3 control-label col-form-label">
                                    Penghasilan
                                </label>
                                <div class="col-md-9 pb-2 pt-2">
                                    <select id="id_penghasilan_ayah" name="id_penghasilan_ayah"
                                        class="form-control select2-show-search" style="width: 100%"
                                        data-placeholder="PILIH PENGHASILAN">
                                        <option></option>
                                        @foreach ($penghasilan as $item)
                                        <option value="{{ $item->id_penghasilan }}">{{ strtoupper($item->penghasilan) }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row align-items-center mb-0">
                                <label class="col-md-3 control-label col-form-label">
                                    No. HP/Whatsapp
                                </label>
                                <div class="col-md-9 pb-2 pt-2">
                                    <input type="text" id="nohp_ayah" name="nohp_ayah" class="form-control" value=""
                                        placeholder="NOMOR HP/WHATSAPP, CONTOH: 0812345678910" maxlength="13"
                                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                </div>
                            </div>
                            <hr>
                            <div class="form-group row align-items-center mb-0">
                                <label class="col-sm-12 col-md-3 control-label col-form-label">
                                    <h6 class="tx-uppercase tx-bold tx-black mg-b-10">
                                        DATA IBU KANDUNG
                                        <small>(BUKAN IBU TIRI)</small>
                                    </h6>
                                </label>
                            </div>
                            <div class="form-group row align-items-center mb-0">
                                <label class="col-md-3 control-label col-form-label">
                                    Nama Ibu
                                </label>
                                <div class="col-md-9 pb-2 pt-2">
                                    <input type="text" id="nm_ibu" name="nm_ibu" class="form-control"
                                        placeholder="NAMA LENGKAP IBU" value="" style="text-transform:uppercase">
                                </div>
                            </div>
                            <div class="form-group row align-items-center mb-0">
                                <label class="col-md-3 control-label col-form-label">
                                    NIK Ibu
                                </label>
                                <div class="col-md-9 pb-2 pt-2">
                                    <input type="text" id="nik_ibu" name="nik_ibu" class="form-control" maxlength="16"
                                        value="" placeholder="BERUPA ANGKA 16 DIGIT"
                                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                </div>
                            </div>
                            <div class="form-group row align-items-center mb-0">
                                <label class="col-md-3 control-label col-form-label">
                                    Tahun Lahir Ibu
                                </label>
                                <div class="col-md-9 pb-2 pt-2">
                                    <input type="text" id="tahun_lahir_ibu" name="tahun_lahir_ibu" class="form-control"
                                        maxlength="4" value="" placeholder="TAHUN"
                                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                </div>
                            </div>
                            <div class="form-group row align-items-center mb-0">
                                <label class="col-md-3 control-label col-form-label">
                                    Pendidikan Terakhir
                                </label>
                                <div class="col-md-9 pb-2 pt-2">
                                    <select id="id_pendidikan_ibu" name="id_pendidikan_ibu"
                                        class="form-control select2-show-search" style="width: 100%"
                                        data-placeholder="PILIH PENDIDIKAN">
                                        <option></option>
                                        @foreach ($pendidikan as $item)
                                        <option value="{{ $item->id_pendidikan }}">{{ strtoupper($item->pendidikan) }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row align-items-center mb-0">
                                <label class="col-md-3 control-label col-form-label">
                                    Pekerjaan Terakhir
                                </label>
                                <div class="col-md-9 pb-2 pt-2">
                                    <select id="id_pekerjaan_ibu" name="id_pekerjaan_ibu"
                                        class="form-control select2-show-search" style="width: 100%"
                                        data-placeholder="PILIH PEKERJAAN">
                                        <option></option>
                                        @foreach ($pekerjaan as $item)
                                        <option value="{{ $item->id_pekerjaan }}">{{ strtoupper($item->pekerjaan) }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row align-items-center mb-0">
                                <label class="col-md-3 control-label col-form-label">
                                    Penghasilan
                                </label>
                                <div class="col-md-9 pb-2 pt-2">
                                    <select id="id_penghasilan_ibu" name="id_penghasilan_ibu"
                                        class="form-control select2-show-search" style="width: 100%"
                                        data-placeholder="PILIH PENGHASILAN">
                                        <option></option>
                                        @foreach ($penghasilan as $item)
                                        <option value="{{ $item->id_penghasilan }}">{{ strtoupper($item->penghasilan) }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row align-items-center mb-0">
                                <label class="col-md-3 control-label col-form-label">
                                    No. HP/Whatsapp
                                </label>
                                <div class="col-md-9 pb-2 pt-2">
                                    <input type="text" id="nohp_ibu" name="nohp_ibu" class="form-control" value=""
                                        placeholder="NOMOR HP/WHATSAPP, CONTOH: 0812345678910" maxlength="13"
                                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                </div>
                            </div>
                            <hr>
                            <div class="form-group row align-items-center mb-0">
                                <label class="col-sm-12 col-md-3 control-label col-form-label">
                                    <h6 class="tx-uppercase tx-bold tx-black mg-b-10">
                                        DATA WALI
                                        <small>(TERMASUK AYAH/IBU TIRI)</small>
                                    </h6>
                                </label>
                            </div>
                            <div class="form-group row align-items-center mb-0">
                                <label class="col-md-3 control-label col-form-label">
                                    Nama Wali
                                </label>
                                <div class="col-md-9 pb-2 pt-2">
                                    <input type="text" id="nm_wali" name="nm_wali" class="form-control"
                                        placeholder="NAMA LENGKAP WALI" value="" style="text-transform:uppercase">
                                </div>
                            </div>
                            <div class="form-group row align-items-center mb-0">
                                <label class="col-md-3 control-label col-form-label">
                                    NIK Wali
                                </label>
                                <div class="col-md-9 pb-2 pt-2">
                                    <input type="text" id="nik_wali" name="nik_wali" class="form-control" maxlength="16"
                                        value="" placeholder="BERUPA ANGKA 16 DIGIT"
                                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                </div>
                            </div>
                            <div class="form-group row align-items-center mb-0">
                                <label class="col-md-3 control-label col-form-label">
                                    Tahun Lahir Wali
                                </label>
                                <div class="col-md-9 pb-2 pt-2">
                                    <input type="text" id="tahun_lahir_wali" name="tahun_lahir_wali"
                                        class="form-control" maxlength="4" value="" placeholder="TAHUN"
                                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                </div>
                            </div>
                            <div class="form-group row align-items-center mb-0">
                                <label class="col-md-3 control-label col-form-label">
                                    Pendidikan Terakhir
                                </label>
                                <div class="col-md-9 pb-2 pt-2">
                                    <select id="id_pendidikan_wali" name="id_pendidikan_wali"
                                        class="form-control select2-show-search" style="width: 100%"
                                        data-placeholder="PILIH PENDIDIKAN">
                                        <option></option>
                                        @foreach ($pendidikan as $item)
                                        <option value="{{ $item->id_pendidikan }}">{{ strtoupper($item->pendidikan) }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row align-items-center mb-0">
                                <label class="col-md-3 control-label col-form-label">
                                    Pekerjaan Terakhir
                                </label>
                                <div class="col-md-9 pb-2 pt-2">
                                    <select id="id_pekerjaan_wali" name="id_pekerjaan_wali"
                                        class="form-control select2-show-search" style="width: 100%"
                                        data-placeholder="PILIH PEKERJAAN">
                                        <option></option>
                                        @foreach ($pekerjaan as $item)
                                        <option value="{{ $item->id_pekerjaan }}">{{ strtoupper($item->pekerjaan) }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row align-items-center mb-0">
                                <label class="col-md-3 control-label col-form-label">
                                    Penghasilan
                                </label>
                                <div class="col-md-9 pb-2 pt-2">
                                    <select id="id_penghasilan_wali" name="id_penghasilan_wali"
                                        class="form-control select2-show-search" style="width: 100%"
                                        data-placeholder="PILIH PENGHASILAN">
                                        <option></option>
                                        @foreach ($penghasilan as $item)
                                        <option value="{{ $item->id_penghasilan }}">{{ strtoupper($item->penghasilan) }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row align-items-center mb-0">
                                <label class="col-md-3 control-label col-form-label">
                                    No. HP/Whatsapp
                                </label>
                                <div class="col-md-9 pb-2 pt-2">
                                    <input type="text" id="nohp_wali" name="nohp_wali" class="form-control" value=""
                                        placeholder="NOMOR HP/WHATSAPP, CONTOH: 0812345678910" maxlength="13"
                                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                </div>
                            </div>
                        </div>
                    </section>
                    <h3>DOKUMEN</h3>
                    <section class="bg-light">
                        <div class="form-group row align-items-center mb-0">
                            <label class="col-md-12 control-label col-form-label">
                                <h6 class="tx-uppercase tx-bold tx-black mg-b-10">
                                    UNGGAH KELENGKAPAN DOKUMEN
                                </h6>
                                <p>Silakan unggah kelengkapan dokumen yang diperlukan</p>
                            </label>
                        </div>
                        <div class="repeater">
                            <div data-repeater-list="dokumen-group">
                                <div data-repeater-item>
                                    <input type="hidden" name="id_dokumen" id="id_dokumen" />
                                    <div class="form-group row align-items-center mb-0">
                                        <div class="col-md-8">
                                            <select name="id_jenisdokumen" class="form-control select2-show-search dokumen" style="width: 100%"
                                                data-placeholder="PILIH JENIS DOKUMEN">
                                                <option></option>
                                                @foreach ($jenisdokumen as $item)
                                                <option value="{{ $item->id_jenisdokumen }}">
                                                    {{ strtoupper($item->jenisdokumen) }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-3 mg-t-8">
                                            <label class="custom-file col-12">
                                                <input type="file" id="dokumen" class="custom-file-input">
                                                <span class="custom-file-control custom-file-control-primary"></span>
                                            </label>
                                        </div>
                                        <div class="col-md-1 mg-t-1">
                                            <button type="button" data-repeater-delete class="btn btn-danger btn-icon delete">
                                                <div><i class="fa fa-trash"></i></div>
                                            </button>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                            </div>
                            <button type="button" data-repeater-create class="btn btn-success">
                                TAMBAH
                            </button>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>
@include('modals.delete')
@endsection

@push('styles')
<link href="{{ asset('assets/dashboard/lib/select2/css/select2.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/dashboard/lib/jquery.steps/jquery.steps.css') }}" rel="stylesheet">
@endpush

@push('scripts')
<script src="{{ asset('assets/dashboard/lib/select2/js/select2.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/lib/jquery.steps/jquery.steps.js') }}"></script>
<script src="{{ asset('assets/dashboard/lib/jquery.maskedinput/jquery.maskedinput.js') }}"></script>
<script src="{{ asset('assets/dashboard/lib/jquery.repeater/jquery.repeater.js') }}"></script>
<script>
    $(document).ready(function () {
        'use strict';
        
        $('#wizard4').steps({
            headerTag: 'h3',
            bodyTag: 'section',
            autoFocus: true,
            titleTemplate: '<span class="number">#index#</span> <span class="title">#title#</span>',
            cssClass: 'wizard step-equal-width'
        });

        // Datepicker
        var year = new Date().getFullYear();
        $('.fc-datepicker').datepicker({
            dateFormat: 'dd/mm/yy',
            changeYear: true,
            yearRange: (year - 30) + ":" + year,
            changeMonth: true,
            showOtherMonths: true,
            selectOtherMonths: true
        });

        $('#telepon_rumah').mask('(9999) 99999999');

        $('.select2').select2();

        $('.repeater').repeater({
            show: function () {
                console.log('okeeee');
                $(this).slideDown();
                $('.select2-container').remove();
                $('.dokumen').select2();
                $('.select2-container').css('width','100%');
            },
            hide: function (remove) {
                // $(document).on('click', '.delete', function(){
                //     $('#confirm-delete').modal('show');
                // });
                // $('#delete-btn').click(function(){
                //     remove.controlID.slideUp(remove);
                //     $('#confirm-delete').modal('hide');
                // });
                if(confirm('Apakah Anda yakin ingin menghapus dokumen ini?')) {
                    $(this).slideUp(remove);
                }
            }
        });
    });

    // function displayfilename() 
    //     $('#dokumen').change(function(e) {
    //     var fileName = e.target.files[0].name;
    //     alert('The file "' + fileName +  '" has been selected.');
    // });
</script>
@endpush