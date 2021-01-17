@extends('layouts.admin')

@section('title', 'Profil Calon Siswa')

@section('breadcrumb')
<div class="br-pageheader pd-y-15 pd-l-20">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
        <a class="breadcrumb-item" href="{{ route('dashboard.calonsiswa.profil') }}">
            Profil Calon Siswa
        </a>
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
                        <form id="form-biodata">
                            <div class="card-body">
                                <div class="form-group row align-items-center mb-0">
                                    <label class="col-12 control-label col-form-label">
                                        <h6 class="tx-uppercase tx-bold tx-black mg-b-10">DATA CALON SISWA</h6>
                                    </label>
                                </div>
                                @role('Calon Siswa SMP')
                                <div class="form-group row align-items-center mb-0">
                                    <label class="col-md-3 control-label col-form-label">
                                        Asal SD/MI
                                    </label>
                                    <div class="col-md-9 pb-2 pt-2">
                                        <div id="asalsekolah-slWrapper" class="parsley-style-1">
                                            <input type="text" id="asal_sekolah" name="asal_sekolah"
                                                class="form-control" placeholder="ASAL SD/MI"
                                                value="{{ $casis->asal_sekolah }}" style="text-transform:uppercase"
                                                data-parsley-class-handler="#asalsekolah-slWrapper" required>
                                        </div>
                                    </div>
                                </div>
                                @endrole
                                @role('Calon Siswa SMA')
                                <div class="form-group row align-items-center mb-0">
                                    <label class="col-md-3 control-label col-form-label">
                                        Asal SMP/MTS
                                    </label>
                                    <div class="col-md-9 pb-2 pt-2">
                                        <div id="asalsekolah-slWrapper" class="parsley-style-1">
                                            <input type="text" id="asal_sekolah" name="asal_sekolah"
                                                class="form-control" placeholder="ASAL SMP/MTS"
                                                value="{{ $casis->asal_sekolah }}" style="text-transform:uppercase"
                                                data-parsley-class-handler="#asalsekolah-slWrapper" required>
                                        </div>
                                    </div>
                                </div>
                                @endrole
                                <div class="form-group row align-items-center mb-0">
                                    <label class="col-md-3 control-label col-form-label">
                                        Nama Peserta Didik
                                        <small>(Sesuai Akta Lahir)</small>
                                    </label>
                                    <div class="col-md-9 pb-2 pt-2">
                                        <div id="nmasiswa-slWrapper" class="parsley-style-1">
                                            <input type="text" id="nm_siswa" name="nm_siswa" class="form-control"
                                                placeholder="NAMA LENGKAP" value="{{ $casis->nm_siswa }}" required
                                                style="text-transform:uppercase"
                                                data-parsley-class-handler="#nmasiswa-slWrapper">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row align-items-center mb-0">
                                    <label class="col-md-3 control-label col-form-label mb-0">
                                        Jenis Kelamin
                                    </label>
                                    <div class="col-md-9 pb-2 pt-2">
                                        <div id="jk-slWrapper" class="parsley-style-1">
                                            <select id="jk" name="jk" class="form-control select2-show-search"
                                                data-parsley-errors-container="#jk-parsley-error"
                                                data-parsley-class-handler="#jk-slWrapper" style="width: 100%"
                                                data-placeholder="PILIH JENIS KELAMIN" required>
                                                <option></option>
                                                <option value="L" {{ $casis->jk == 'L' ? 'selected' : '' }}>LAKI-LAKI
                                                </option>
                                                <option value="P" {{ $casis->jk == 'P' ? 'selected' : '' }}>PEREMPUAN
                                                </option>
                                            </select>
                                            <span id="jk-parsley-error"></span>
                                        </div>
                                    </div>
                                </div>
                                @hasanyrole('Calon Siswa SMP|Calon Siswa SMA')
                                <div class="form-group row align-items-center mb-0">
                                    <label class="col-md-3 control-label col-form-label">
                                        NISN
                                        <small>(Nomor Induk Siswa Nasional)</small>
                                    </label>
                                    <div class="col-md-9 pb-2 pt-2">
                                        <div id="nisn-slWrapper" class="parsley-style-1">
                                            <input type="text" id="nisn" name="nisn" class="form-control" maxlength="10"
                                                value="{{ $casis->nisn }}" placeholder="NOMOR INDUK SISWA NASIONAL"
                                                required data-parsley-class-handler="#nisn-slWrapper"
                                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                        </div>
                                    </div>
                                </div>
                                @endhasanyrole
                                <div class="form-group row align-items-center mb-0">
                                    <label class="col-md-3 control-label col-form-label">
                                        NIK
                                        <small>(Nomor Induk Kependudukan)</small>
                                    </label>
                                    <div class="col-md-9 pb-2 pt-2">
                                        <div id="nik-slWrapper" class="parsley-style-1">
                                            <input type="text" id="nik" name="nik" class="form-control" maxlength="16"
                                                value="{{ $casis->nik }}" data-parsley-class-handler="#nik-slWrapper"
                                                placeholder="BISA DILIHAT DI KARTU KELUARGA, BERUPA ANGKA 16 DIGIT"
                                                required
                                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                        </div>
                                    </div>
                                </div>
                                @role('Calon Siswa SMP')
                                <div class="form-group row align-items-center mb-0">
                                    <label class="col-md-3 control-label col-form-label">
                                        Nomor Seri Ijazah SD/MI
                                    </label>
                                    <div class="col-md-9 pb-2 pt-2">
                                        <input type="text" id="no_ijazah" name="no_ijazah" class="form-control"
                                            value="{{ $casis->no_ijazah }}" placeholder="DIISI BILA ADA">
                                    </div>
                                </div>
                                <div class="form-group row align-items-center mb-0">
                                    <label class="col-md-3 control-label col-form-label">
                                        Nomor seri SKHUN SD/MI
                                    </label>
                                    <div class="col-md-9 pb-2 pt-2">
                                        <input type="text" id="no_skhun" name="no_skhun" class="form-control"
                                            value="{{ $casis->no_skhun }}"
                                            placeholder="DIISI BILA ADA (BUKAN NOMOR SERI SKHU SEMENTARA)">
                                    </div>
                                </div>
                                <div class="form-group row align-items-center mb-0">
                                    <label class="col-md-3 control-label col-form-label">
                                        Nomor Ujian Nasional SD/MI
                                    </label>
                                    <div class="col-md-9 pb-2 pt-2">
                                        <input type="text" id="no_un" name="no_un" class="form-control"
                                            value="{{ $casis->no_un }}" placeholder="DIISI BILA ADA">
                                    </div>
                                </div>
                                @endrole
                                @role('Calon Siswa SMA')
                                <div class="form-group row align-items-center mb-0">
                                    <label class="col-md-3 control-label col-form-label">
                                        Nomor Seri Ijazah SMP/MTS
                                    </label>
                                    <div class="col-md-9 pb-2 pt-2">
                                        <input type="text" id="no_ijazah" name="no_ijazah" class="form-control"
                                            value="{{ $casis->no_ijazah }}" placeholder="DIISI BILA ADA">
                                    </div>
                                </div>
                                <div class="form-group row align-items-center mb-0">
                                    <label class="col-md-3 control-label col-form-label">
                                        Nomor seri SKHUN SMP/MTS
                                    </label>
                                    <div class="col-md-9 pb-2 pt-2">
                                        <input type="text" id="no_skhun" name="no_skhun" class="form-control"
                                            value="{{ $casis->no_skhun }}"
                                            placeholder="DIISI BILA ADA (BUKAN NOMOR SERI SKHU SEMENTARA)">
                                    </div>
                                </div>
                                <div class="form-group row align-items-center mb-0">
                                    <label class="col-md-3 control-label col-form-label">
                                        Nomor Ujian Nasional SMP/MTS
                                    </label>
                                    <div class="col-md-9 pb-2 pt-2">
                                        <input type="text" id="no_un" name="no_un" class="form-control"
                                            value="{{ $casis->no_un }}" placeholder="DIISI BILA ADA">
                                    </div>
                                </div>
                                @endrole
                                <div class="form-group row align-items-center mb-0">
                                    <label class="col-md-3 control-label col-form-label">
                                        Tempat / Tgl Lahir
                                    </label>
                                    <div class="col-md-5 pb-2 pt-2">
                                        <div id="tempatlahir-slWrapper" class="parsley-style-1">
                                            <input id="tempat_lahir" name="tempat_lahir" type="text"
                                                class="form-control" value="{{ $casis->tempat_lahir }}"
                                                data-parsley-class-handler="#tempatlahir-slWrapper"
                                                placeholder="TEMPAT LAHIR" style="text-transform:uppercase" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4 pb-2 pt-2">
                                        <div id="tgllahir-slWrapper" class="parsley-style-1">
                                            <input id="tgl_lahir" name="tgl_lahir" type="text" autocomplete="off"
                                                data-parsley-class-handler="#tgllahir-slWrapper" required
                                                value="{{ $casis->tgl_lahir ? $casis->tgl_lahir->format('d/m/Y') : '' }}"
                                                class="form-control fc-datepicker" placeholder="TANGGAL/BULAN/TAHUN">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row align-items-center mb-0">
                                    <label class="col-sm-12 col-md-3 control-label col-form-label">
                                        Nomor Registrasi Akta Lahir
                                    </label>
                                    <div class="col-sm-12 col-md-9 pb-2 pt-2">
                                        <div id="akte-slWrapper" class="parsley-style-1">
                                            <input id="no_akte_lahir" name="no_akte_lahir" type="text"
                                                class="form-control" value="{{ $casis->no_akte_lahir }}"
                                                data-parsley-class-handler="#akte-slWrapper" placeholder="NO AKTA LAHIR"
                                                required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row align-items-center mb-0">
                                    <label class="col-sm-12 col-md-3 control-label col-form-label">
                                        Agama
                                    </label>
                                    <div class="col-sm-12 col-md-9 pb-2 pt-2">
                                        <div id="agama-slWrapper" class="parsley-style-1">
                                            <select id="id_agama" name="id_agama"
                                                class="form-control select2-show-search" style="width: 100%"
                                                data-placeholder="PILIH AGAMA"
                                                data-parsley-class-handler="#agama-slWrapper"
                                                data-parsley-errors-container="#agama-parsley-error" required>
                                                <option selected></option>
                                                @foreach ($agama as $item)
                                                <option value="{{ $item->id_agama }}"
                                                    {{ $casis->id_agama == $item->id_agama ? 'selected' : '' }}>
                                                    {{ strtoupper($item->agama) }}
                                                </option>
                                                @endforeach
                                            </select>
                                            <span id="agama-parsley-error"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row align-items-center mb-0">
                                    <label class="col-sm-12 col-md-3 control-label col-form-label">
                                        Berkebutuhan Khusus
                                    </label>
                                    <div class="col-sm-12 col-md-2 pb-2 pt-2">
                                        <div id="kebutuhankhusus-slWrapper" class="parsley-style-1">
                                            <select id="kebutuhan_khusus_siswa" name="kebutuhan_khusus_siswa"
                                                class="form-control select2-show-search" style="width: 100%" required
                                                data-placeholder="PILIH"
                                                data-parsley-class-handler="#kebutuhankhusus-slWrapper"
                                                data-parsley-errors-container="#kebutuhankhusus-parsley-error">
                                                <option selected></option>
                                                <option value="YA"
                                                    {{ $casis->kebutuhan_khusus != 'TIDAK' && $casis->kebutuhan_khusus != null ? 'selected' : '' }}>
                                                    YA
                                                </option>
                                                <option value="TIDAK"
                                                    {{ $casis->kebutuhan_khusus == 'TIDAK' ? 'selected' : '' }}>TIDAK
                                                </option>
                                            </select>
                                            <span id="kebutuhankhusus-parsley-error"></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-7 pb-2 pt-2">
                                        <div id="kebutuhankhususket-slWrapper" class="parsley-style-1">
                                            <input id="kebutuhan_khusus_siswa_ket" name="kebutuhan_khusus_siswa_ket"
                                                type="text" class="form-control"
                                                data-parsley-class-handler="#kebutuhankhususket-slWrapper"
                                                value="{{ $casis->kebutuhan_khusus != 'TIDAK' && $casis->kebutuhan_khusus != null ? $casis->kebutuhan_khusus : '' }}"
                                                style="text-transform:uppercase"
                                                {{ $casis->kebutuhan_khusus != 'TIDAK' && $casis->kebutuhan_khusus != null ? '' : 'disabled' }}
                                                placeholder="TUNA NETRA / RUNGU / INDIGO / NARKOBA / AUTIS / LAINNYA (SEBUTKAN...)">
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group row align-items-center mb-0">
                                    <label class="col-12 control-label col-form-label">
                                        <h6 class="tx-uppercase tx-bold tx-black mg-b-10">
                                            DATA ALAMAT
                                        </h6>
                                    </label>
                                </div>
                                <div class="form-group row align-items-center mb-0">
                                    <label class="col-sm-12 col-md-3 control-label col-form-label">
                                        Negara
                                    </label>
                                    <div class="col-sm-12 col-md-9 pb-2 pt-2">
                                        <div id="negara-slWrapper" class="parsley-style-1">
                                            <select id="kode_negara" name="kode_negara"
                                                class="form-control select2-show-search" style="width: 100%"
                                                data-parsley-errors-container="#negara-parsley-error"
                                                data-parsley-class-handler="#negara-slWrapper"
                                                data-placeholder="PILIH NEGARA" required>
                                                <option></option>
                                                @foreach ($negara as $item)
                                                <option value="{{ $item->kode }}"
                                                    {{ $casis->kode_negara == $item->kode ? 'selected' : '' }}>
                                                    {{ strtoupper($item->kode) }} - {{ strtoupper($item->negara) }}
                                                </option>
                                                @endforeach
                                            </select>
                                            <span id="negara-parsley-error"></span>
                                        </div>
                                    </div>
                                </div>
                                <div id="kolom-provinsi-asal" class="form-group row align-items-center mb-0 d-none">
                                    <label class="col-sm-12 col-md-3 control-label col-form-label">
                                        Provinsi
                                    </label>
                                    <div class="col-sm-12 col-md-9 pb-2 pt-2">
                                        <div id="provinsiasal-slWrapper" class="parsley-style-1">
                                            <select id="kode_provinsi_asal" name="kode_provinsi_asal"
                                                class="form-control select2-show-search" style="width: 100%"
                                                data-parsley-errors-container="#provinsiasal-parsley-error"
                                                data-parsley-class-handler="#provinsiasal-slWrapper"
                                                data-placeholder="PILIH PROVINSI" required>
                                                <option></option>
                                                @foreach ($provinsi as $item)
                                                <option value="{{ $item->kode }}"
                                                    {{ $casis->kode_provinsi_asal == $item->kode ? 'selected' : '' }}>
                                                    {{ strtoupper($item->wilayah) }}
                                                </option>
                                                @endforeach
                                            </select>
                                            <span id="provinsiasal-parsley-error"></span>
                                        </div>
                                    </div>
                                </div>
                                <div id="kolom-kabkota-asal" class="form-group row align-items-center mb-0 d-none">
                                    <label class="col-sm-12 col-md-3 control-label col-form-label">
                                        Kabupaten / Kota
                                    </label>
                                    <div class="col-sm-12 col-md-9 pb-2 pt-2">
                                        <div id="kabkotaasal-slWrapper" class="parsley-style-1">
                                            <select id="kode_kabkota_asal" name="kode_kabkota_asal"
                                                class="form-control select2-show-search" style="width: 100%"
                                                data-parsley-errors-container="#kabkotaasal-parsley-error"
                                                data-parsley-class-handler="#kabkotaasal-slWrapper"
                                                data-placeholder="PILIH KABUPATEN/KOTA" required>
                                                <option></option>
                                            </select>
                                            <span id="kabkotaasal-parsley-error"></span>
                                        </div>
                                    </div>
                                </div>
                                <div id="kolom-kecamatan-asal" class="form-group row align-items-center mb-0 d-none">
                                    <label class="col-sm-12 col-md-3 control-label col-form-label">
                                        Kecamatan
                                    </label>
                                    <div class="col-sm-12 col-md-9 pb-2 pt-2">
                                        <div id="kecamatanasal-slWrapper" class="parsley-style-1">
                                            <select id="kode_kecamatan_asal" name="kode_kecamatan_asal"
                                                class="form-control select2-show-search" style="width: 100%"
                                                data-parsley-errors-container="#kecamatanasal-parsley-error"
                                                data-parsley-class-handler="#kecamatanasal-slWrapper"
                                                data-placeholder="PILIH KECAMATAN" required>
                                                <option></option>
                                            </select>
                                            <span id="kecamatanasal-parsley-error"></span>
                                        </div>
                                    </div>
                                </div>
                                <div id="kolom-desalurah-asal" class="form-group row align-items-center mb-0 d-none">
                                    <label class="col-sm-12 col-md-3 control-label col-form-label">
                                        Desa / Kelurahan
                                    </label>
                                    <div class="col-sm-12 col-md-9 pb-2 pt-2">
                                        <div id="desalurahasal-slWrapper" class="parsley-style-1">
                                            <select id="kode_desalurah_asal" name="kode_desalurah_asal"
                                                class="form-control select2-show-search" style="width: 100%"
                                                data-parsley-errors-container="#desalurahasal-parsley-error"
                                                data-parsley-class-handler="#desalurahasal-slWrapper"
                                                data-placeholder="PILIH DESA/LURAH" required>
                                                <option></option>
                                            </select>
                                            <span id="desalurahasal-parsley-error"></span>
                                        </div>
                                    </div>
                                </div>
                                <div id="kolom-alamat-asal" class="form-group row align-items-center mb-0 d-none">
                                    <label class="col-sm-12 col-md-3 control-label col-form-label">
                                        Alamat
                                    </label>
                                    <div class="col-sm-12 col-md-9 pb-2 pt-2">
                                        <div id="alamatasal-slWrapper" class="parsley-style-1">
                                            <input id="alamat_asal" name="alamat_asal" type="text" class="form-control"
                                                value="{{ $casis->alamat_asal }}" placeholder="ALAMAT LENGKAP"
                                                data-parsley-class-handler="#alamatasal-slWrapper"
                                                style="text-transform:uppercase" required>
                                        </div>
                                    </div>
                                </div>
                                <div id="kolom-rtrw-asal" class="form-group row align-items-center mb-0 d-none">
                                    <label class="col-sm-12 col-md-3 control-label col-form-label">
                                        RT / RW
                                    </label>
                                    <div class="col-md-4 pb-2 pt-2">
                                        <div id="rtasal-slWrapper" class="parsley-style-1">
                                            <input type="text" id="rt_asal" name="rt_asal" class="form-control"
                                                value="{{ $casis->rt }}" placeholder="RT 3 DIGIT, CONTOH: 003" required
                                                data-parsley-class-handler="#rtasal-slWrapper"
                                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                        </div>
                                    </div>
                                    <div class="col-md-5 pb-2 pt-2">
                                        <div id="rwasal-slWrapper" class="parsley-style-1">
                                            <input type="text" id="rw_asal" name="rw_asal" class="form-control"
                                                value="{{ $casis->rw }}" placeholder="RW 3 DIGIT, CONTOH: 016" required
                                                data-parsley-class-handler="#rwasal-slWrapper"
                                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                        </div>
                                    </div>
                                </div>
                                <div id="kolom-kodepos-asal" class="form-group row align-items-center mb-0 d-none">
                                    <label class="col-sm-12 col-md-3 control-label col-form-label">
                                        Kode Pos
                                    </label>
                                    <div class="col-sm-12 col-md-9 pb-2 pt-2">
                                        <div id="kodeposasal-slWrapper" class="parsley-style-1">
                                            <input type="text" id="kodepos_asal" name="kodepos_asal" class="form-control"
                                                value="{{ $casis->kodepos }}" maxlength="5" placeholder="KODE POS"
                                                data-parsley-class-handler="#kodeposasal-slWrapper" required
                                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="form-group row align-items-center mb-0">
                                    <label class="col-12 control-label col-form-label">
                                        <h6 class="tx-uppercase tx-bold tx-black mg-b-10">
                                            DATA ALAMAT SEKARANG
                                            <small>(Saat Sekolah)</small>
                                        </h6>
                                    </label>
                                </div>
                                <div class="form-group row align-items-center mb-0">
                                    <label class="col-sm-12 col-md-3 control-label col-form-label">
                                        Negara
                                    </label>
                                    <div class="col-sm-12 col-md-9 pb-2 pt-2">
                                        <div id="negara-slWrapper" class="parsley-style-1">
                                            <select id="kode_negara" name="kode_negara"
                                                class="form-control select2-show-search" style="width: 100%"
                                                data-parsley-errors-container="#negara-parsley-error"
                                                data-parsley-class-handler="#negara-slWrapper"
                                                data-placeholder="PILIH NEGARA" required>
                                                <option></option>
                                                @foreach ($negara as $item)
                                                <option value="{{ $item->kode }}"
                                                    {{ $casis->kode_negara == $item->kode ? 'selected' : '' }}>
                                                    {{ strtoupper($item->kode) }} - {{ strtoupper($item->negara) }}
                                                </option>
                                                @endforeach
                                            </select>
                                            <span id="negara-parsley-error"></span>
                                        </div>
                                    </div>
                                </div>
                                <div id="kolom-provinsi" class="form-group row align-items-center mb-0 hidden">
                                    <label class="col-sm-12 col-md-3 control-label col-form-label">
                                        Provinsi
                                    </label>
                                    <div class="col-sm-12 col-md-9 pb-2 pt-2">
                                        <div id="provinsi-slWrapper" class="parsley-style-1">
                                            <select id="kode_provinsi" name="kode_provinsi"
                                                class="form-control select2-show-search" style="width: 100%"
                                                data-parsley-errors-container="#provinsi-parsley-error"
                                                data-parsley-class-handler="#provinsi-slWrapper"
                                                data-placeholder="PILIH PROVINSI" required>
                                                <option></option>
                                                @foreach ($provinsi as $item)
                                                <option value="{{ $item->kode }}"
                                                    {{ $casis->kode_provinsi == $item->kode ? 'selected' : '' }}>
                                                    {{ strtoupper($item->wilayah) }}
                                                </option>
                                                @endforeach
                                            </select>
                                            <span id="provinsi-parsley-error"></span>
                                        </div>
                                    </div>
                                </div>
                                <div id="kolom-alamat" class="form-group row align-items-center mb-0 hidden">
                                    <label class="col-sm-12 col-md-3 control-label col-form-label">
                                        Alamat
                                    </label>
                                    <div class="col-sm-12 col-md-9 pb-2 pt-2">
                                        <div id="jalan-slWrapper" class="parsley-style-1">
                                            <input id="jalan" name="jalan" type="text" class="form-control"
                                                value="{{ $casis->jalan }}" placeholder="ALAMAT LENGKAP"
                                                data-parsley-class-handler="#jalan-slWrapper"
                                                style="text-transform:uppercase" required>
                                        </div>
                                    </div>
                                </div>
                                <div id="kolom-rtrw" class="form-group row align-items-center mb-0 hidden">
                                    <label class="col-sm-12 col-md-3 control-label col-form-label">
                                        RT / RW
                                    </label>
                                    <div class="col-md-4 pb-2 pt-2">
                                        <div id="rt-slWrapper" class="parsley-style-1">
                                            <input type="text" id="rt" name="rt" class="form-control"
                                                value="{{ $casis->rt }}" placeholder="RT 3 DIGIT, CONTOH: 003" required
                                                data-parsley-class-handler="#rt-slWrapper"
                                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                        </div>
                                    </div>
                                    <div class="col-md-5 pb-2 pt-2">
                                        <div id="rw-slWrapper" class="parsley-style-1">
                                            <input type="text" id="rw" name="rw" class="form-control"
                                                value="{{ $casis->rw }}" placeholder="RW 3 DIGIT, CONTOH: 016" required
                                                data-parsley-class-handler="#rw-slWrapper"
                                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                        </div>
                                    </div>
                                </div>
                                <div id="kolom-desalurah" class="form-group row align-items-center mb-0 hidden">
                                    <label class="col-sm-12 col-md-3 control-label col-form-label">
                                        Desa / Kelurahan
                                    </label>
                                    <div class="col-sm-12 col-md-9 pb-2 pt-2">
                                        <div id="desalurah-slWrapper" class="parsley-style-1">
                                            <input type="text" id="desalurah" name="desalurah" class="form-control"
                                                value="{{ $casis->desalurah }}" placeholder="DESA" required
                                                data-parsley-class-handler="#desalurah-slWrapper"
                                                style="text-transform:uppercase">
                                        </div>
                                    </div>
                                </div>
                                <div id="kolom-kecamatan" class="form-group row align-items-center mb-0 hidden">
                                    <label class="col-sm-12 col-md-3 control-label col-form-label">
                                        Kecamatan
                                    </label>
                                    <div class="col-sm-12 col-md-9 pb-2 pt-2">
                                        <div id="kecamatan-slWrapper" class="parsley-style-1">
                                            <input type="text" id="kecamatan" name="kecamatan" class="form-control"
                                                value="{{ $casis->kecamatan }}" placeholder="KECAMATAN" required
                                                data-parsley-class-handler="#kecamatan-slWrapper"
                                                style="text-transform:uppercase">
                                        </div>
                                    </div>
                                </div>
                                <div id="kolom-kabkota" class="form-group row align-items-center mb-0 hidden">
                                    <label class="col-sm-12 col-md-3 control-label col-form-label">
                                        Kabupaten / Kota
                                    </label>
                                    <div class="col-sm-12 col-md-9 pb-2 pt-2">
                                        <div id="kabkota-slWrapper" class="parsley-style-1">
                                            <input type="text" id="kabkota" name="kabkota" class="form-control"
                                                value="{{ $casis->kabkota }}" placeholder="KABUPATEN / KOTA"
                                                data-parsley-class-handler="#kabkota-slWrapper"
                                                style="text-transform:uppercase" required>
                                        </div>
                                    </div>
                                </div>
                                <div id="kolom-kodepos" class="form-group row align-items-center mb-0 hidden">
                                    <label class="col-sm-12 col-md-3 control-label col-form-label">
                                        Kode Pos
                                    </label>
                                    <div class="col-sm-12 col-md-9 pb-2 pt-2">
                                        <div id="kodepos-slWrapper" class="parsley-style-1">
                                            <input type="text" id="kodepos" name="kodepos" class="form-control"
                                                value="{{ $casis->kodepos }}" maxlength="5" placeholder="KODE POS"
                                                data-parsley-class-handler="#kodepos-slWrapper" required
                                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                        </div>
                                    </div>
                                </div> --}}
                                <hr>
                                <div class="form-group row align-items-center mb-0">
                                    <label class="col-12 control-label col-form-label">
                                        <h6 class="tx-uppercase tx-bold tx-black mg-b-10">DATA PELENGKAP</h6>
                                    </label>
                                </div>
                                <div class="form-group row align-items-center mb-0">
                                    <label class="col-sm-12 col-md-3 control-label col-form-label">
                                        Tempat Tinggal
                                    </label>
                                    <div class="col-sm-12 col-md-9 pb-2 pt-2">
                                        <div id="tempattinggal-slWrapper" class="parsley-style-1">
                                            <select id="id_tempattinggal" name="id_tempattinggal"
                                                class="form-control select2-show-search" style="width: 100%"
                                                data-placeholder="PILIH STATUS TEMPAT TINGGAL" required
                                                data-parsley-class-handler="#tempattinggal-slWrapper"
                                                data-parsley-errors-container="#tempattinggal-parsley-error">
                                                <option></option>
                                                @foreach ($tempattinggal as $item)
                                                <option value="{{ $item->id_tempattinggal }}"
                                                    {{ $casis->id_tempattinggal == $item->id_tempattinggal ? 'selected' : '' }}>
                                                    {{ strtoupper($item->tempattinggal) }}
                                                </option>
                                                @endforeach
                                            </select>
                                            <span id="tempattinggal-parsley-error"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row align-items-center mb-0">
                                    <label class="col-sm-12 col-md-3 control-label col-form-label">
                                        Jenis Transportasi ke Sekolah
                                    </label>
                                    <div class="col-sm-12 col-md-9 pb-2 pt-2">
                                        <div id="transportasi-slWrapper" class="parsley-style-1">
                                            <select id="id_transportasi" name="id_transportasi"
                                                class="form-control select2-show-search" style="width: 100%"
                                                data-placeholder="PILIH JENIS TRANSPORTASI" required
                                                data-parsley-class-handler="#transportasi-slWrapper"
                                                data-parsley-errors-container="#transportasi-parsley-error">
                                                <option></option>
                                                @foreach ($transportasi as $item)
                                                <option value="{{ $item->id_transportasi }}"
                                                    {{ $casis->id_transportasi == $item->id_transportasi ? 'selected' : '' }}>
                                                    {{ strtoupper($item->transportasi) }}
                                                </option>
                                                @endforeach
                                            </select>
                                            <span id="transportasi-parsley-error"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row align-items-center mb-0">
                                    <label class="col-sm-12 col-md-3 control-label col-form-label">
                                        Nomor KKS
                                        <small>(Kartu Keluarga Sejahtera)</small>
                                    </label>
                                    <div class="col-sm-12 col-md-2 pb-2 pt-2">
                                        <div id="kks-slWrapper" class="parsley-style-1">
                                            <select id="no_kks" name="no_kks" class="form-control select2-show-search"
                                                style="width: 100%" data-placeholder="PILIH" required
                                                data-parsley-class-handler="#kks-slWrapper"
                                                data-parsley-errors-container="#kks-parsley-error">
                                                <option></option>
                                                <option value="ADA"
                                                    {{ $casis->no_kks != 'TIDAK ADA' && $casis->no_kks != null ? 'selected' : '' }}>
                                                    ADA</option>
                                                <option value="TIDAK ADA"
                                                    {{ $casis->no_kks == 'TIDAK ADA' ? 'selected' : '' }}>
                                                    TIDAK ADA
                                                </option>
                                            </select>
                                            <span id="kks-parsley-error"></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-7 pb-2 pt-2">
                                        <div id="kksket-slWrapper" class="parsley-style-1">
                                            <input id="no_kks_ket" name="no_kks_ket" type="text" class="form-control"
                                                value="{{ $casis->no_kks != 'TIDAK ADA' && $casis->no_kks != null ? $casis->no_kks : '' }}"
                                                placeholder="BIASANYA MENYATU DENGAN KIP (KARTU INDONESIA PINTAR)"
                                                style="text-transform:uppercase"
                                                data-parsley-class-handler="#kksket-slWrapper"
                                                {{ $casis->no_kks != 'TIDAK ADA' && $casis->no_kks != null ? '' : 'disabled' }}>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row align-items-center mb-0">
                                    <label class="col-sm-12 col-md-3 control-label col-form-label">
                                        Penerima KPS
                                        <small>(Kartu Perlin. Sosial)</small>
                                    </label>
                                    <div class="col-sm-12 col-md-2 pb-2 pt-2">
                                        <div id="kps-slWrapper" class="parsley-style-1">
                                            <select id="no_kps" name="no_kps" class="form-control select2-show-search"
                                                style="width: 100%" data-placeholder="PILIH" required
                                                data-parsley-class-handler="#kps-slWrapper"
                                                data-parsley-errors-container="#kps-parsley-error">
                                                <option></option>
                                                <option value="YA"
                                                    {{ $casis->no_kps != 'TIDAK' && $casis->no_kps != null ? 'selected' : '' }}>
                                                    YA</option>
                                                <option value="TIDAK" {{ $casis->no_kps == 'TIDAK' ? 'selected' : '' }}>
                                                    TIDAK
                                                </option>
                                            </select>
                                            <span id="kps-parsley-error"></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-7 pb-2 pt-2">
                                        <div id="kpsket-slWrapper" class="parsley-style-1">
                                            <input id="no_kps_ket" name="no_kps_ket" type="text" class="form-control"
                                                value="{{ $casis->no_kps != 'TIDAK' && $casis->no_kps != null ? $casis->no_kps : '' }}"
                                                placeholder="ISI NO KPS JIKA SEBAGAI PENERIMA KPS"
                                                style="text-transform:uppercase"
                                                data-parsley-class-handler="#kpsket-slWrapper"
                                                {{ $casis->no_kps != 'TIDAK' && $casis->no_kps != null ? '' : 'disabled' }}>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row align-items-center mb-0">
                                    <label class="col-sm-12 col-md-3 control-label col-form-label">
                                        Penerima KIP
                                        <small>(Kartu Indonesia Pintar)</small>
                                    </label>
                                    <div class="col-sm-12 col-md-2 pb-2 pt-2">
                                        <div id="kip-slWrapper" class="parsley-style-1">
                                            <select id="no_kip" name="no_kip" class="form-control select2-show-search"
                                                style="width: 100%" data-placeholder="PILIH" required
                                                data-parsley-class-handler="#kip-slWrapper"
                                                data-parsley-errors-container="#kip-parsley-error">
                                                <option></option>
                                                <option value="YA"
                                                    {{ $casis->no_kip != 'TIDAK' && $casis->no_kip != null ? 'selected' : '' }}>
                                                    YA</option>
                                                <option value="TIDAK" {{ $casis->no_kip == 'TIDAK' ? 'selected' : '' }}>
                                                    TIDAK
                                                </option>
                                            </select>
                                            <span id="kip-parsley-error"></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-7 pb-2 pt-2">
                                        <div id="kipket-slWrapper" class="parsley-style-1">
                                            <input id="no_kip_ket" name="no_kip_ket" type="text" class="form-control"
                                                value="{{ $casis->no_kip != 'TIDAK' && $casis->no_kip != null ? $casis->no_kip : '' }}"
                                                placeholder="ISI NO KIP JIKA SEBAGAI PENERIMA KIP"
                                                style="text-transform:uppercase"
                                                data-parsley-class-handler="#kipket-slWrapper"
                                                {{ $casis->no_kip != 'TIDAK' && $casis->no_kip != null ? '' : 'disabled' }}>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row align-items-center mb-0">
                                    <label class="col-sm-12 col-md-3 control-label col-form-label">
                                        Nama Tertera di KIP
                                    </label>
                                    <div class="col-sm-12 col-md-9 pb-2 pt-2">
                                        <div id="nmkip-slWrapper" class="parsley-style-1">
                                            <input id="nm_kip" name="nm_kip" type="text" class="form-control"
                                                value="{{ $casis->nm_kip }}" placeholder="NAMA YANG TERTERA DI KIP"
                                                data-parsley-class-handler="#nmkip-slWrapper"
                                                style="text-transform:uppercase" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row align-items-center mb-0">
                                    <label class="col-sm-12 col-md-3 control-label col-form-label">
                                        Memiliki Surat Keterangan Miskin {{ $casis->suket_miskin }}
                                    </label>
                                    <div class="col-sm-12 col-md-9 pb-2 pt-2">
                                        <div id="suketmiskin-slWrapper" class="parsley-style-1">
                                            <select id="suket_miskin" name="suket_miskin"
                                                class="form-control select2-show-search" style="width: 100%"
                                                data-placeholder="PILIH" required
                                                data-parsley-class-handler="#suketmiskin-slWrapper"
                                                data-parsley-errors-container="#suketmiskin-parsley-error">
                                                <option></option>
                                                <option value="YA"
                                                    {{ isset($casis->suket_miskin) && $casis->suket_miskin == 1 ? 'selected' : '' }}>
                                                    YA
                                                </option>
                                                <option value="TIDAK"
                                                    {{ isset($casis->suket_miskin) && $casis->suket_miskin == 0 ? 'selected' : '' }}>
                                                    TIDAK
                                                </option>
                                            </select>
                                            <span id="suketmiskin-parsley-error"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row align-items-center mb-0">
                                    <label class="col-sm-12 col-md-3 control-label col-form-label">
                                        Yatim / Yatim Piatu
                                    </label>
                                    <div class="col-sm-12 col-md-9 pb-2 pt-2">
                                        <div id="yatimpiatu-slWrapper" class="parsley-style-1">
                                            <select id="yatim_piatu" name="yatim_piatu"
                                                class="form-control select2-show-search" style="width: 100%"
                                                data-placeholder="PILIH" required
                                                data-parsley-class-handler="#yatimpiatu-slWrapper"
                                                data-parsley-errors-container="#yatimpiatu-parsley-error">
                                                <option></option>
                                                <option value="YA"
                                                    {{ isset($casis->yatim_piatu) && $casis->yatim_piatu == 1 ? 'selected' : '' }}>
                                                    YA
                                                </option>
                                                <option value="TIDAK"
                                                    {{ isset($casis->yatim_piatu) && $casis->yatim_piatu == 0 ? 'selected' : '' }}>
                                                    TIDAK
                                                </option>
                                            </select>
                                            <span id="yatimpiatu-parsley-error"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row align-items-center mb-0">
                                    <label class="col-sm-12 col-md-3 control-label col-form-label">
                                        Kondisi Belajar di Rumah
                                    </label>
                                    <div class="col-sm-12 col-md-9 pb-2 pt-2">
                                        <div id="kondisibelajar-slWrapper" class="parsley-style-1">
                                            <select id="id_kondisibelajar" name="id_kondisibelajar"
                                                class="form-control select2-show-search" style="width: 100%"
                                                data-placeholder="PILIH KONDISI BELAJAR" required
                                                data-parsley-class-handler="#kondisibelajar-slWrapper"
                                                data-parsley-errors-container="#kondisibelajar-parsley-error">
                                                <option></option>
                                                @foreach ($kondisibelajar as $item)
                                                <option value="{{ $item->id_kondisibelajar }}"
                                                    {{ $casis->id_kondisibelajar == $item->id_kondisibelajar ? 'selected' : '' }}>
                                                    {{ strtoupper($item->kondisibelajar) }}
                                                </option>
                                                @endforeach
                                            </select>
                                            <span id="kondisibelajar-parsley-error"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row align-items-center mb-0">
                                    <label class="col-sm-12 col-md-3 control-label col-form-label">
                                        Kemampuan Baca Al-Qur'an
                                    </label>
                                    <div class="col-sm-12 col-md-9 pb-2 pt-2">
                                        <div id="bcquran-slWrapper" class="parsley-style-1">
                                            <select id="id_bcquran" name="id_bcquran"
                                                class="form-control select2-show-search" style="width: 100%"
                                                data-placeholder="PILIH KEMAMPUAN MEMBACA QURAN" required
                                                data-parsley-class-handler="#bcquran-slWrapper"
                                                data-parsley-errors-container="#bcquran-parsley-error">
                                                <option></option>
                                                @foreach ($bcquran as $item)
                                                <option value="{{ $item->id_bcquran }}"
                                                    {{ $casis->id_bcquran == $item->id_bcquran ? 'selected' : '' }}>
                                                    {{ strtoupper($item->bcquran) }}
                                                </option>
                                                @endforeach
                                            </select>
                                            <span id="bcquran-parsley-error"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row align-items-center mb-0">
                                    <label class="col-sm-12 col-md-3 control-label col-form-label">
                                        Olahraga (Minat / Bakat)
                                    </label>
                                    <div class="col-sm-12 col-md-9 pb-2 pt-2">
                                        <div id="olahraga-slWrapper" class="parsley-style-1">
                                            <input type="text" id="olahraga" name="olahraga" class="form-control"
                                                style="text-transform:uppercase" value="{{ $casis->olahraga }}"
                                                data-parsley-class-handler="#olahraga-slWrapper"
                                                placeholder="MINAT / BAKAT DI BIDANG OLAHRAGA" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row align-items-center mb-0">
                                    <label class="col-sm-12 col-md-3 control-label col-form-label">
                                        Kesenian (Minat / Bakat)
                                    </label>
                                    <div class="col-sm-12 col-md-9 pb-2 pt-2">
                                        <div id="kesenian-slWrapper" class="parsley-style-1">
                                            <input type="text" id="kesenian" name="kesenian" class="form-control"
                                                style="text-transform:uppercase" value="{{ $casis->kesenian }}"
                                                data-parsley-class-handler="#kesenian-slWrapper"
                                                placeholder="MINAT / BAKAT DI BIDANG KESENIAN" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row align-items-center mb-0">
                                    <label class="col-sm-12 col-md-3 control-label col-form-label">
                                        Hobby
                                    </label>
                                    <div class="col-sm-12 col-md-9 pb-2 pt-2">
                                        <div id="hobby-slWrapper" class="parsley-style-1">
                                            <input type="text" id="hobby" name="hobby" class="form-control"
                                                value="{{ $casis->hobby }}" style="text-transform:uppercase"
                                                data-parsley-class-handler="#hobby-slWrapper"
                                                placeholder="SEBUTKAN HOBBY DIPISAH DENGAN TANDA KOMA" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row align-items-center mb-0">
                                    <label class="col-sm-12 col-md-3 control-label col-form-label">
                                        Penyakit Yang Pernah Diderita
                                    </label>
                                    <div class="col-sm-12 col-md-9 pb-2 pt-2">
                                        <div id="penyakit-slWrapper" class="parsley-style-1">
                                            <input type="text" id="penyakit" name="penyakit" class="form-control"
                                                style="text-transform:uppercase" value="{{ $casis->penyakit }}"
                                                data-parsley-class-handler="#penyakit-slWrapper"
                                                placeholder="PENYAKIT YANG PERNAH DIDERITA" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row align-items-center mb-0">
                                    <label class="col-sm-12 col-md-3 control-label col-form-label">
                                        Tinggi Badan
                                    </label>
                                    <div class="col-6 pb-2 pt-2">
                                        <div id="tinggibadan-slWrapper" class="parsley-style-1">
                                            <input type="text" id="tinggi_badan" name="tinggi_badan"
                                                class="form-control" value="{{ $casis->tinggi_badan }}" maxlength="3"
                                                placeholder="TINGGI BADAN" required
                                                data-parsley-class-handler="#tinggibadan-slWrapper"
                                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                        </div>
                                    </div>
                                    CM
                                </div>
                                <div class="form-group row align-items-center mb-0">
                                    <label class="col-sm-12 col-md-3 control-label col-form-label">
                                        Berat Badan
                                    </label>
                                    <div class="col-6 pb-2 pt-2">
                                        <div id="beratbadan-slWrapper" class="parsley-style-1">
                                            <input type="text" id="berat_badan" name="berat_badan" class="form-control"
                                                value="{{ $casis->berat_badan }}" maxlength="3"
                                                placeholder="BERAT BADAN" required
                                                data-parsley-class-handler="#beratbadan-slWrapper"
                                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                        </div>
                                    </div>
                                    KG
                                </div>
                                <div class="form-group row align-items-center mb-0">
                                    <label class="col-sm-12 col-md-3 control-label col-form-label">
                                        Jarak Tempat Tinggal ke Sekolah
                                    </label>
                                    <div class="col-sm-12 col-md-9 pb-2 pt-2">
                                        <div id="jarak-slWrapper" class="parsley-style-1">
                                            <select id="id_jarak" name="id_jarak"
                                                class="form-control select2-show-search" style="width: 100%"
                                                data-parsley-errors-container="#jarak-parsley-error"
                                                data-parsley-class-handler="#jarak-slWrapper"
                                                data-placeholder="PILIH JARAK TEMPAT TINGGAL KE SEKOLAH" required>
                                                <option></option>
                                                @foreach ($jarak as $item)
                                                <option value="{{ $item->id_jarak }}"
                                                    {{ $casis->id_jarak == $item->id_jarak ? 'selected' : '' }}>
                                                    {{ strtoupper($item->jarak) }}
                                                </option>
                                                @endforeach
                                            </select>
                                            <span id="jarak-parsley-error"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row align-items-center mb-0">
                                    <label class="col-sm-12 col-md-3 control-label col-form-label">
                                        Waktu Tempuh ke Sekolah
                                    </label>
                                    <div class="col-sm-12 col-md-9 pb-2 pt-2">
                                        <div id="waktutmph-slWrapper" class="parsley-style-1">
                                            <select id="id_waktutmph" name="id_waktutmph"
                                                class="form-control select2-show-search" style="width: 100%"
                                                data-placeholder="PILIH WAKTU TEMPUH KE SEKOLAH" required
                                                data-parsley-class-handler="#waktutmph-slWrapper"
                                                data-parsley-errors-container="#waktutmph-parsley-error">
                                                <option></option>
                                                @foreach ($waktutmph as $item)
                                                <option value="{{ $item->id_waktutmph }}"
                                                    {{ $casis->id_waktutmph == $item->id_waktutmph ? 'selected' : '' }}>
                                                    {{ strtoupper($item->waktutmph) }}
                                                </option>
                                                @endforeach
                                            </select>
                                            <span id="waktutmph-parsley-error"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row align-items-center mb-0">
                                    <label class="col-sm-12 col-md-3 control-label col-form-label">
                                        Jumlah Bersaudara
                                    </label>
                                    <div class="col-md-9 pb-2 pt-2">
                                        <div id="jumlahsaudara-slWrapper" class="parsley-style-1">
                                            <input type="text" id="jumlah_saudara" name="jumlah_saudara"
                                                class="form-control" value="{{ $casis->jumlah_saudara }}" maxlength="3"
                                                placeholder="JUMLAH BERSAUDARA" required
                                                data-parsley-class-handler="#jumlahsaudara-slWrapper"
                                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row align-items-center mb-0">
                                    <label class="col-sm-12 col-md-3 control-label col-form-label">
                                        Anak Ke
                                    </label>
                                    <div class="col-md-9 pb-2 pt-2">
                                        <div id="anakke-slWrapper" class="parsley-style-1">
                                            <input type="text" id="anak_ke" name="anak_ke" class="form-control"
                                                value="{{ $casis->anak_ke }}" maxlength="3" placeholder="ANAK KE"
                                                required data-parsley-class-handler="#anakke-slWrapper"
                                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row align-items-center mb-0">
                                    <label class="col-sm-12 col-md-3 control-label col-form-label">
                                        Dari Berapa Bersaudara
                                    </label>
                                    <div class="col-md-9 pb-2 pt-2">
                                        <div id="daribersaudara-slWrapper" class="parsley-style-1">
                                            <input type="text" id="dari_bersaudara" name="dari_bersaudara"
                                                class="form-control" value="{{ $casis->dari_bersaudara }}" maxlength="3"
                                                placeholder="DARI BERAPA BERSAUDARA" required required
                                                data-parsley-class-handler="#daribersaudara-slWrapper"
                                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </section>
                    <h3>DATA ORANG TUA</h3>
                    <section class="bg-light">
                        <form id="form-dataortu">
                            <div class="card-body">
                                <div class="form-group row align-items-center mb-0">
                                    <label class="col-12 control-label col-form-label">
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
                                        <div id="nmayah-slWrapper" class="parsley-style-1">
                                            <input type="text" id="nm_ayah" name="nm_ayah" class="form-control"
                                                placeholder="NAMA LENGKAP AYAH" value="{{ $casis->nm_ayah }}"
                                                data-parsley-class-handler="#nmayah-slWrapper"
                                                style="text-transform:uppercase" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row align-items-center mb-0">
                                    <label class="col-md-3 control-label col-form-label">
                                        NIK Ayah
                                    </label>
                                    <div class="col-md-9 pb-2 pt-2">
                                        <div id="nikayah-slWrapper" class="parsley-style-1">
                                            <input type="text" id="nik_ayah" name="nik_ayah" class="form-control"
                                                maxlength="16" value="{{ $casis->nik_ayah }}"
                                                placeholder="BERUPA ANGKA 16 DIGIT"
                                                data-parsley-class-handler="#nikayah-slWrapper" required
                                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row align-items-center mb-0">
                                    <label class="col-md-3 control-label col-form-label">
                                        Tahun Lahir Ayah
                                    </label>
                                    <div class="col-md-9 pb-2 pt-2">
                                        <div id="thlahir-slWrapper" class="parsley-style-1">
                                            <input type="text" id="tahun_lahir_ayah" name="tahun_lahir_ayah"
                                                class="form-control" maxlength="4"
                                                value="{{ $casis->tahun_lahir_ayah }}" placeholder="TAHUN"
                                                data-parsley-class-handler="#thlahir-slWrapper" required
                                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row align-items-center mb-0">
                                    <label class="col-md-3 control-label col-form-label">
                                        Pendidikan Terakhir
                                    </label>
                                    <div class="col-md-9 pb-2 pt-2">
                                        <div id="pendidikanayah-slWrapper" class="parsley-style-1">
                                            <select id="pendidikan_ayah" name="pendidikan_ayah"
                                                class="form-control select2-show-search" style="width: 100%"
                                                data-parsley-class-handler="#pendidikanayah-slWrapper"
                                                data-parsley-errors-container="#pendidikanayah-parsley-error"
                                                data-placeholder="PILIH PENDIDIKAN" required>
                                                <option></option>
                                                @foreach ($pendidikan as $item)
                                                <option value="{{ $item->id_pendidikan }}"
                                                    {{ $casis->pendidikan_ayah == $item->id_pendidikan ? 'selected' : '' }}>
                                                    {{ strtoupper($item->pendidikan) }}
                                                </option>
                                                @endforeach
                                            </select>
                                            <span id="pendidikanayah-parsley-error"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row align-items-center mb-0">
                                    <label class="col-md-3 control-label col-form-label">
                                        Pekerjaan Terakhir
                                    </label>
                                    <div class="col-md-9 pb-2 pt-2">
                                        <div id="pekerjaanayah-slWrapper" class="parsley-style-1">
                                            <select id="pekerjaan_ayah" name="pekerjaan_ayah"
                                                class="form-control select2-show-search" style="width: 100%"
                                                data-parsley-class-handler="#pekerjaanayah-slWrapper"
                                                data-parsley-errors-container="#pekerjaanayah-parsley-error"
                                                data-placeholder="PILIH PEKERJAAN" required>
                                                <option></option>
                                                @foreach ($pekerjaan as $item)
                                                <option value="{{ $item->id_pekerjaan }}"
                                                    {{ $casis->pekerjaan_ayah == $item->id_pekerjaan ? 'selected' : '' }}>
                                                    {{ strtoupper($item->pekerjaan) }}
                                                </option>
                                                @endforeach
                                            </select>
                                            <span id="pekerjaanayah-parsley-error"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row align-items-center mb-0">
                                    <label class="col-md-3 control-label col-form-label">
                                        Penghasilan
                                    </label>
                                    <div class="col-md-9 pb-2 pt-2">
                                        <div id="penghasilanayah-slWrapper" class="parsley-style-1">
                                            <select id="penghasilan_ayah" name="penghasilan_ayah"
                                                class="form-control select2-show-search" style="width: 100%"
                                                data-parsley-class-handler="#penghasilanayah-slWrapper"
                                                data-parsley-errors-container="#penghasilanayah-parsley-error"
                                                data-placeholder="PILIH PENGHASILAN" required>
                                                <option></option>
                                                @foreach ($penghasilan as $item)
                                                <option value="{{ $item->id_penghasilan }}"
                                                    {{ $casis->penghasilan_ayah == $item->id_penghasilan ? 'selected' : '' }}>
                                                    {{ strtoupper($item->penghasilan) }}
                                                </option>
                                                @endforeach
                                            </select>
                                            <span id="penghasilanayah-parsley-error"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row align-items-center mb-0">
                                    <label class="col-md-3 control-label col-form-label">
                                        No. HP/Whatsapp
                                    </label>
                                    <div class="col-md-9 pb-2 pt-2">
                                        <div id="nohpayah-slWrapper" class="parsley-style-1">
                                            <input type="text" id="nohp_ayah" name="nohp_ayah" class="form-control"
                                                value="{{ $casis->nohp_ayah }}" required
                                                data-parsley-class-handler="#nohpayah-slWrapper"
                                                placeholder="NOMOR HP/WHATSAPP, CONTOH: 0812345678910" maxlength="13"
                                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group row align-items-center mb-0">
                                    <label class="col-12 control-label col-form-label">
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
                                        <div id="nmibu-slWrapper" class="parsley-style-1">
                                            <input type="text" id="nm_ibu" name="nm_ibu" class="form-control"
                                                placeholder="NAMA LENGKAP IBU" value="{{ $casis->nm_ibu }}"
                                                data-parsley-class-handler="#nmibu-slWrapper"
                                                style="text-transform:uppercase" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row align-items-center mb-0">
                                    <label class="col-md-3 control-label col-form-label">
                                        NIK Ibu
                                    </label>
                                    <div class="col-md-9 pb-2 pt-2">
                                        <div id="nikibu-slWrapper" class="parsley-style-1">
                                            <input type="text" id="nik_ibu" name="nik_ibu" class="form-control"
                                                maxlength="16" value="{{ $casis->nik_ibu }}"
                                                placeholder="BERUPA ANGKA 16 DIGIT" required
                                                data-parsley-class-handler="#nikibu-slWrapper"
                                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row align-items-center mb-0">
                                    <label class="col-md-3 control-label col-form-label">
                                        Tahun Lahir Ibu
                                    </label>
                                    <div class="col-md-9 pb-2 pt-2">
                                        <div id="thnlahiribu-slWrapper" class="parsley-style-1">
                                            <input type="text" id="tahun_lahir_ibu" name="tahun_lahir_ibu"
                                                class="form-control" maxlength="4" value="{{ $casis->tahun_lahir_ibu }}"
                                                placeholder="TAHUN" required
                                                data-parsley-class-handler="#thnlahiribu-slWrapper"
                                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row align-items-center mb-0">
                                    <label class="col-md-3 control-label col-form-label">
                                        Pendidikan Terakhir
                                    </label>
                                    <div class="col-md-9 pb-2 pt-2">
                                        <div id="pendidikanibu-slWrapper" class="parsley-style-1">
                                            <select id="pendidikan_ibu" name="pendidikan_ibu"
                                                class="form-control select2-show-search" style="width: 100%"
                                                data-parsley-class-handler="#pendidikanibu-slWrapper"
                                                data-parsley-errors-container="#pendidikanibu-parsley-error"
                                                data-placeholder="PILIH PENDIDIKAN" required>
                                                <option></option>
                                                @foreach ($pendidikan as $item)
                                                <option value="{{ $item->id_pendidikan }}"
                                                    {{ $casis->pendidikan_ibu == $item->id_pendidikan ? 'selected' : '' }}>
                                                    {{ strtoupper($item->pendidikan) }}
                                                </option>
                                                @endforeach
                                            </select>
                                            <span id="pendidikanibu-parsley-error"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row align-items-center mb-0">
                                    <label class="col-md-3 control-label col-form-label">
                                        Pekerjaan Terakhir
                                    </label>
                                    <div class="col-md-9 pb-2 pt-2">
                                        <div id="pekerjaanibu-slWrapper" class="parsley-style-1">
                                            <select id="pekerjaan_ibu" name="pekerjaan_ibu"
                                                class="form-control select2-show-search" style="width: 100%"
                                                data-parsley-class-handler="#pekerjaanibu-slWrapper"
                                                data-parsley-errors-container="#pekerjaanibu-parsley-error"
                                                data-placeholder="PILIH PEKERJAAN" required>
                                                <option></option>
                                                @foreach ($pekerjaan as $item)
                                                <option value="{{ $item->id_pekerjaan }}"
                                                    {{ $casis->pekerjaan_ibu == $item->id_pekerjaan ? 'selected' : '' }}>
                                                    {{ strtoupper($item->pekerjaan) }}
                                                </option>
                                                @endforeach
                                            </select>
                                            <span id="pekerjaanibu-parsley-error"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row align-items-center mb-0">
                                    <label class="col-md-3 control-label col-form-label">
                                        Penghasilan
                                    </label>
                                    <div class="col-md-9 pb-2 pt-2">
                                        <div id="penghasilanibu-slWrapper" class="parsley-style-1">
                                            <select id="penghasilan_ibu" name="penghasilan_ibu"
                                                class="form-control select2-show-search" style="width: 100%"
                                                data-parsley-class-handler="#penghasilanibu-slWrapper"
                                                data-parsley-errors-container="#penghasilanibu-parsley-error"
                                                data-placeholder="PILIH PENGHASILAN" required>
                                                <option></option>
                                                @foreach ($penghasilan as $item)
                                                <option value="{{ $item->id_penghasilan }}"
                                                    {{ $casis->penghasilan_ibu == $item->id_penghasilan ? 'selected' : '' }}>
                                                    {{ strtoupper($item->penghasilan) }}
                                                </option>
                                                @endforeach
                                            </select>
                                            <span id="penghasilanibu-parsley-error"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row align-items-center mb-0">
                                    <label class="col-md-3 control-label col-form-label">
                                        No. HP/Whatsapp
                                    </label>
                                    <div class="col-md-9 pb-2 pt-2">
                                        <div id="nohpibu-slWrapper" class="parsley-style-1">
                                            <input type="text" id="nohp_ibu" name="nohp_ibu" class="form-control"
                                                value="{{ $casis->nohp_ibu }}"
                                                data-parsley-class-handler="#nohpibu-slWrapper"
                                                placeholder="NOMOR HP/WHATSAPP, CONTOH: 0812345678910" maxlength="13"
                                                required
                                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group row align-items-center mb-0">
                                    <label class="col-12 control-label col-form-label">
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
                                            placeholder="NAMA LENGKAP WALI" value="{{ $casis->nm_wali }}"
                                            style="text-transform:uppercase">
                                    </div>
                                </div>
                                <div class="form-group row align-items-center mb-0">
                                    <label class="col-md-3 control-label col-form-label">
                                        NIK Wali
                                    </label>
                                    <div class="col-md-9 pb-2 pt-2">
                                        <input type="text" id="nik_wali" name="nik_wali" class="form-control"
                                            maxlength="16" value="{{ $casis->nik_wali }}"
                                            placeholder="BERUPA ANGKA 16 DIGIT"
                                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                    </div>
                                </div>
                                <div class="form-group row align-items-center mb-0">
                                    <label class="col-md-3 control-label col-form-label">
                                        Tahun Lahir Wali
                                    </label>
                                    <div class="col-md-9 pb-2 pt-2">
                                        <input type="text" id="tahun_lahir_wali" name="tahun_lahir_wali"
                                            class="form-control" maxlength="4" value="{{ $casis->tahun_lahir_wali }}"
                                            placeholder="TAHUN"
                                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                    </div>
                                </div>
                                <div class="form-group row align-items-center mb-0">
                                    <label class="col-md-3 control-label col-form-label">
                                        Pendidikan Terakhir
                                    </label>
                                    <div class="col-md-9 pb-2 pt-2">
                                        <select id="pendidikan_wali" name="pendidikan_wali"
                                            class="form-control select2-show-search" style="width: 100%"
                                            data-placeholder="PILIH PENDIDIKAN">
                                            <option></option>
                                            @foreach ($pendidikan as $item)
                                            <option value="{{ $item->id_pendidikan }}"
                                                {{ $casis->pendidikan_wali == $item->id_pendidikan ? 'selected' : '' }}>
                                                {{ strtoupper($item->pendidikan) }}
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
                                        <select id="pekerjaan_wali" name="pekerjaan_wali"
                                            class="form-control select2-show-search" style="width: 100%"
                                            data-placeholder="PILIH PEKERJAAN">
                                            <option></option>
                                            @foreach ($pekerjaan as $item)
                                            <option value="{{ $item->id_pekerjaan }}"
                                                {{ $casis->pekerjaan_wali == $item->id_pekerjaan ? 'selected' : '' }}>
                                                {{ strtoupper($item->pekerjaan) }}
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
                                        <select id="penghasilan_wali" name="penghasilan_wali"
                                            class="form-control select2-show-search" style="width: 100%"
                                            data-placeholder="PILIH PENGHASILAN">
                                            <option></option>
                                            @foreach ($penghasilan as $item)
                                            <option value="{{ $item->id_penghasilan }}"
                                                {{ $casis->penghasilan_wali == $item->id_penghasilan ? 'selected' : '' }}>
                                                {{ strtoupper($item->penghasilan) }}
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
                                        <input type="text" id="nohp_wali" name="nohp_wali" class="form-control"
                                            value="{{ $casis->nohp_wali }}"
                                            placeholder="NOMOR HP/WHATSAPP, CONTOH: 0812345678910" maxlength="13"
                                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </section>
                    <h3>DOKUMEN</h3>
                    <section class="bg-light">
                        <div class="form-group row align-items-center mb-0">
                            <label class="col-12 control-label col-form-label">
                                <h6 class="tx-uppercase tx-bold tx-black mg-b-10">
                                    UNGGAH KELENGKAPAN DOKUMEN
                                </h6>
                                <p>Silakan unggah kelengkapan dokumen yang diperlukan</p>
                            </label>
                        </div>
                        <form id="form-dokumen">
                            <div>
                                <h4 class="card-title">Foto</h4>
                                <h6 class="card-subtitle text-dark mb-2">Scan Foto 4x6</h6>
                                <p>Maksimal ukuran 200 Kb</p>
                                <div class="input-group">
                                    <div class="input-group-prepend mr-2 mg-t-7">
                                        <a href="{{ $casis->foto ? url('/' . $casis->foto) : '' }}" id="link_foto"
                                            class="btn btn-primary btn-sm @if(empty($casis->foto)) disabled @endif"
                                            target="_blank">
                                            LIHAT
                                        </a>
                                    </div>
                                    <div class="mt-2">
                                        <div id="filefoto-slWrapper" class="parsley-style-1">
                                            <input type="file" id="foto" name="foto" accept="image/jpeg, image/png"
                                                data-parsley-class-handler="#filefoto-slWrapper"
                                                data-parsley-max-file-size="200" @if(empty($casis->foto)) required
                                            @endif>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-5">
                                <h4 class="card-title">KTP Ayah <span class="text-danger">*</span></h4>
                                <h6 class="card-subtitle text-dark mb-2">
                                    Fotokopi atau scan KTP / SIM / Paspor ayah calon siswa
                                </h6>
                                <p>Maksimal ukuran 200 Kb</p>
                                <div class="input-group">
                                    <div class="input-group-prepend mr-2 mg-t-7">
                                        <a href="{{ $casis->ktp_ayah ? url('/' . $casis->ktp_ayah) : '' }}"
                                            id="link_ktp_ayah"
                                            class="btn btn-primary btn-sm @if(empty($casis->ktp_ayah)) disabled @endif"
                                            target="_blank">
                                            LIHAT
                                        </a>
                                    </div>
                                    <div class="mt-2">
                                        <div id="filektpayah-slWrapper" class="parsley-style-1">
                                            <input type="file" id="ktp_ayah" name="ktp_ayah"
                                                accept="image/jpeg, image/png"
                                                data-parsley-class-handler="#filektpayah-slWrapper"
                                                data-parsley-max-file-size="200" @if(empty($casis->ktp_ayah)) required
                                            @endif>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-5">
                                <h4 class="card-title">KTP Ibu <span class="text-danger">*</span></h4>
                                <h6 class="card-subtitle text-dark mb-2">
                                    Fotokopi atau scan KTP / SIM / Paspor ibu calon siswa
                                </h6>
                                <p>Maksimal ukuran 200 Kb</p>
                                <div class="input-group">
                                    <div class="input-group-prepend mr-2 mg-t-7">
                                        <a href="{{ $casis->ktp_ibu ? url('/' . $casis->ktp_ibu) : '' }}"
                                            id="link_ktp_ibu"
                                            class="btn btn-primary btn-sm @if(empty($casis->ktp_ibu)) disabled @endif"
                                            target="_blank">
                                            LIHAT
                                        </a>
                                    </div>
                                    <div class="mt-2">
                                        <div id="filektpibu-slWrapper" class="parsley-style-1">
                                            <input type="file" id="ktp_ibu" name="ktp_ibu"
                                                accept="image/jpeg, image/png"
                                                data-parsley-class-handler="#filektpibu-slWrapper"
                                                data-parsley-max-file-size="200" @if(empty($casis->ktp_ibu)) required
                                            @endif>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-5">
                                <h4 class="card-title">Kartu Keluarga <span class="text-danger">*</span>
                                </h4>
                                <h6 class="card-subtitle text-dark mb-2">
                                    Fotokopi atau scan Kartu Keluarga calon siswa
                                </h6>
                                <p>Maksimal ukuran 300 Kb</p>
                                <div class="input-group">
                                    <div class="input-group-prepend mr-2 mg-t-7">
                                        <a href="{{ $casis->kk ? url('/' . $casis->kk) : '' }}" id="link_kk"
                                            class="btn btn-primary btn-sm @if(empty($casis->kk)) disabled @endif"
                                            target="_blank">
                                            LIHAT
                                        </a>
                                    </div>
                                    <div class="mt-2">
                                        <div id="filekk-slWrapper" class="parsley-style-1">
                                            <input type="file" id="kk" name="kk" accept="image/jpeg, image/png"
                                                data-parsley-class-handler="#filekk-slWrapper"
                                                data-parsley-max-file-size="300" @if(empty($casis->kk)) required @endif>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-5">
                                <h4 class="card-title">Akte Lahir <span class="text-danger">*</span>
                                </h4>
                                <h6 class="card-subtitle text-dark mb-2">
                                    Fotokopi atau scan akte lahir calon siswa
                                </h6>
                                <p>Maksimal ukuran 300 Kb</p>
                                <div class="input-group">
                                    <div class="input-group-prepend mr-2 mg-t-7">
                                        <a href="{{ $casis->akte ? url('/' . $casis->akte) : '' }}" id="link_akte"
                                            class="btn btn-primary btn-sm @if(empty($casis->akte)) disabled @endif"
                                            target="_blank">
                                            LIHAT
                                        </a>
                                    </div>
                                    <div class="mt-2">
                                        <div id="fileakte-slWrapper" class="parsley-style-1">
                                            <input type="file" id="akte" name="akte" accept="image/jpeg, image/png"
                                                data-parsley-class-handler="#fileakte-slWrapper"
                                                data-parsley-max-file-size="300" @if(empty($casis->akte)) required
                                            @endif>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-5">
                                <h4 class="card-title">Surat Keterangan Dokter</h4>
                                <h6 class="card-subtitle text-dark mb-2">
                                    Fotokopi atau scan surat keterangan dokter calon siswa</h6>
                                <p>Maksimal ukuran 200 Kb</p>
                                <div class="input-group">
                                    <div class="input-group-prepend mr-2 mg-t-7">
                                        <a href="{{ $casis->skd ? url('/' . $casis->skd) : '' }}" id="link_skd"
                                            class="btn btn-primary btn-sm @if(empty($casis->skd)) disabled @endif"
                                            target="_blank">
                                            LIHAT
                                        </a>
                                    </div>
                                    <div class="mt-2">
                                        <div id="fileskd-slWrapper" class="parsley-style-1">
                                            <input type="file" id="skd" name="skd"
                                                accept="image/jpeg, image/png, application/pdf"
                                                data-parsley-class-handler="#fileskd-slWrapper"
                                                data-parsley-max-file-size="200" @if(empty($casis->skd)) required
                                            @endif>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @role('Calon Siswa SMP')
                            <div class="mt-5">
                                <h4 class="card-title">Raport Kelas 5 Semester 1</h4>
                                <h6 class="card-subtitle text-dark mb-2">
                                    Fotokopi atau scan raport kelas 5 semester 1
                                </h6>
                                <p>Maksimal ukuran 1.5 Mb</p>
                                <div class="input-group">
                                    <div class="input-group-prepend mr-2 mg-t-7">
                                        <a href="{{ $casis->kelas5semester1 ? url('/' . $casis->kelas5semester1) : '' }}"
                                            id="link_kelas5semester1"
                                            class="btn btn-primary btn-sm @if(empty($casis->kelas5semester1)) disabled @endif"
                                            target="_blank">
                                            LIHAT
                                        </a>
                                    </div>
                                    <div class="mt-2">
                                        <div id="filekelas5semester1-slWrapper" class="parsley-style-1">
                                            <input type="file" id="kelas5semester1" name="kelas5semester1"
                                                accept="image/jpeg, image/png, application/pdf"
                                                data-parsley-class-handler="#filekelas5semester1-slWrapper"
                                                data-parsley-max-file-size="1500" @if(empty($casis->kelas5semester1))
                                            required @endif>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-5">
                                <h4 class="card-title">Raport Kelas 5 Semester 2</h4>
                                <h6 class="card-subtitle text-dark mb-2">
                                    Fotokopi atau scan raport kelas 5 semester 2
                                </h6>
                                <p>Maksimal ukuran 1.5 Mb</p>
                                <div class="input-group">
                                    <div class="input-group-prepend mr-2 mg-t-7">
                                        <a href="{{ $casis->kelas5semester2 ? url('/' . $casis->kelas5semester2) : '' }}"
                                            id="link_kelas5semester2"
                                            class="btn btn-primary btn-sm @if(empty($casis->kelas5semester2)) disabled @endif"
                                            target="_blank">
                                            LIHAT
                                        </a>
                                    </div>
                                    <div class="mt-2">
                                        <div id="filekelas5semester2-slWrapper" class="parsley-style-1">
                                            <input type="file" id="kelas5semester2" name="kelas5semester2"
                                                accept="image/jpeg, image/png, application/pdf"
                                                data-parsley-class-handler="#filekelas5semester2-slWrapper"
                                                data-parsley-max-file-size="1500" @if(empty($casis->kelas5semester2))
                                            required @endif>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-5">
                                <h4 class="card-title">Raport Kelas 6 Semester 1</h4>
                                <h6 class="card-subtitle text-dark mb-2">
                                    Fotokopi atau scan raport kelas 6 semester 1
                                </h6>
                                <p>Maksimal ukuran 1.5 Mb</p>
                                <div class="input-group">
                                    <div class="input-group-prepend mr-2 mg-t-7">
                                        <a href="{{ $casis->kelas6semester1 ? url('/' . $casis->kelas6semester1) : '' }}"
                                            id="link_kelas6semester1"
                                            class="btn btn-primary btn-sm @if(empty($casis->kelas6semester1)) disabled @endif"
                                            target="_blank">
                                            LIHAT
                                        </a>
                                    </div>
                                    <div class="mt-2">
                                        <div id="filekelas6semester1-slWrapper" class="parsley-style-1">
                                            <input type="file" id="kelas6semester1" name="kelas6semester1"
                                                accept="image/jpeg, image/png, application/pdf"
                                                data-parsley-class-handler="#filekelas6semester1-slWrapper"
                                                data-parsley-max-file-size="1500" @if(empty($casis->kelas6semester1))
                                            required @endif>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endrole
                            @role('Calon Siswa SMA')
                            <div class="mt-5">
                                <h4 class="card-title">Raport Kelas 8 Semester 1</h4>
                                <h6 class="card-subtitle text-dark mb-2">
                                    Fotokopi atau scan raport kelas 8 semester 1
                                </h6>
                                <p>Maksimal ukuran 1.5 Mb</p>
                                <div class="input-group">
                                    <div class="input-group-prepend mr-2 mg-t-7">
                                        <a href="{{ $casis->kelas8semester1 ? url('/' . $casis->kelas8semester1) : '' }}"
                                            id="link_kelas8semester1"
                                            class="btn btn-primary btn-sm @if(empty($casis->kelas8semester1)) disabled @endif"
                                            target="_blank">
                                            LIHAT
                                        </a>
                                    </div>
                                    <div class="mt-2">
                                        <div id="filekelas8semester1-slWrapper" class="parsley-style-1">
                                            <input type="file" id="kelas8semester1" name="kelas8semester1"
                                                accept="image/jpeg, image/png, application/pdf"
                                                data-parsley-class-handler="#filekelas8semester1-slWrapper"
                                                data-parsley-max-file-size="1500" @if(empty($casis->kelas8semester1))
                                            required @endif>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-5">
                                <h4 class="card-title">Raport Kelas 8 Semester 2</h4>
                                <h6 class="card-subtitle text-dark mb-2">
                                    Fotokopi atau scan raport kelas 8 semester 2
                                </h6>
                                <p>Maksimal ukuran 1.5 Mb</p>
                                <div class="input-group">
                                    <div class="input-group-prepend mr-2 mg-t-7">
                                        <a href="{{ $casis->kelas8semester2 ? url('/' . $casis->kelas8semester2) : '' }}"
                                            id="link_kelas8semester2"
                                            class="btn btn-primary btn-sm @if(empty($casis->kelas8semester2)) disabled @endif"
                                            target="_blank">
                                            LIHAT
                                        </a>
                                    </div>
                                    <div class="mt-2">
                                        <div id="filekelas8semester2-slWrapper" class="parsley-style-1">
                                            <input type="file" id="kelas8semester2" name="kelas8semester2"
                                                accept="image/jpeg, image/png, application/pdf"
                                                data-parsley-class-handler="#filekelas8semester2-slWrapper"
                                                data-parsley-max-file-size="1500" @if(empty($casis->kelas8semester2))
                                            required @endif>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-5">
                                <h4 class="card-title">Raport Kelas 9 Semester 1</h4>
                                <h6 class="card-subtitle text-dark mb-2">
                                    Fotokopi atau scan raport kelas 9 semester 1
                                </h6>
                                <p>Maksimal ukuran 1.5 Mb</p>
                                <div class="input-group">
                                    <div class="input-group-prepend mr-2 mg-t-7">
                                        <a href="{{ $casis->kelas9semester1 ? url('/' . $casis->kelas9semester1) : '' }}"
                                            id="link_kelas9semester1"
                                            class="btn btn-primary btn-sm @if(empty($casis->kelas9semester1)) disabled @endif"
                                            target="_blank">
                                            LIHAT
                                        </a>
                                    </div>
                                    <div class="mt-2">
                                        <div id="filekelas9semester1-slWrapper" class="parsley-style-1">
                                            <input type="file" id="kelas9semester1" name="kelas9semester1"
                                                accept="image/jpeg, image/png, application/pdf"
                                                data-parsley-class-handler="#filekelas9semester1-slWrapper"
                                                data-parsley-max-file-size="1500" @if(empty($casis->kelas9semester1))
                                            required @endif>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endrole
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>
@include('modals.lengkapidata')
@endsection

@push('styles')
<link href="{{ asset('assets/dashboard/lib/select2/css/select2.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/dashboard/lib/jquery.steps/jquery.steps.css') }}" rel="stylesheet">
<style>
    .parsley-required {
        list-style-type: none !important;
    }

    .input-validation-error~.select2 .select2-selection {
        border: 1px solid red;
    }
</style>
@endpush

@push('scripts')
<script src="{{ asset('assets/dashboard/lib/select2/js/select2.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/lib/jquery.steps/jquery.steps.js') }}"></script>
<script src="{{ asset('assets/dashboard/lib/jquery.maskedinput/jquery.maskedinput.js') }}"></script>
<script src="{{ asset('assets/dashboard/lib/parsleyjs/parsley.js') }}"></script>
<script>
    $(document).ready(function () {
        'use strict';

        $('#wizard4').steps({
            headerTag: 'h3',
            bodyTag: 'section',
            autoFocus: true,
            titleTemplate: '<span class="number">#index#</span> <span class="title">#title#</span>',
            cssClass: 'wizard step-equal-width',
            labels: {
                current: "current step:",
                pagination: "Halaman",
                finish: "Selesai Melengkapi Data",
                next: "Selanjutnya",
                previous: "Sebelumnya",
                loading: "Memuat ..."
            },
            onStepChanging: function(e, currentIndex, newIndex){
                // Simpan data halaman pertama
                if (currentIndex == 0) {
                    // validasi form biodata
                    var formBiodata = $('#form-biodata').parsley();
                    formBiodata.options.requiredMessage = "Wajib diisi!";
                    if (formBiodata.isValid()) {
                        updateBiodata();
                    } else {
                        formBiodata.validate();
                        return false;
                    }
                } else 
                // Simpan data halaman kedua
                if (currentIndex == 1) {
                    // validasi form data ortu
                    var formBiodata = $('#form-dataortu').parsley();
                    formBiodata.options.requiredMessage = "Wajib diisi!";
                    if (formBiodata.isValid()) {
                        updateDataOrtu();
                    } else {
                        formBiodata.validate();
                        return false;
                    }
                }
                return true;
            },
            onFinished: function (event, currentIndex) {
                // validasi form data ortu
                var formBiodata = $('#form-dokumen').parsley();
                formBiodata.options.requiredMessage = "Wajib diisi!";
                if (formBiodata.isValid()) {
                    $('#lengkapi-data').modal('show');
                } else {
                    formBiodata.validate();
                    return false;
                }
            }
        });

        // validasi pada select2
        $('#jk').change(function() {
            $(this).parsley().validate();
        });

        $('#id_agama').change(function() {
            $(this).parsley().validate();
        });

        $('#kebutuhan_khusus_siswa').change(function () {
            $(this).parsley().validate();
            var kebutuhan_khusus_siswa = $(this).val();
            if (kebutuhan_khusus_siswa == 'YA') {
                $('#kebutuhan_khusus_siswa_ket').prop('disabled', false);
                $('#kebutuhan_khusus_siswa_ket').prop('required', true);
            } else {
                $('#kebutuhan_khusus_siswa_ket').val('');
                $('#kebutuhan_khusus_siswa_ket').prop('disabled', true);
                $('#kebutuhan_khusus_siswa_ket').prop('required', false);
            }
        });

        $('#no_kks').change(function () {
            $(this).parsley().validate();
            var noKKS = $(this).val();
            if (noKKS == 'ADA') {
                $('#no_kks_ket').prop('disabled', false);
                $('#no_kks_ket').prop('required', true);
            } else {
                $('#no_kks_ket').val('');
                $('#no_kks_ket').prop('disabled', true);
                $('#no_kks_ket').prop('required', false);
            }
        });

        $('#no_kps').change(function () {
            $(this).parsley().validate();
            var noKPS = $(this).val();
            if (noKPS == 'YA') {
                $('#no_kps_ket').prop('disabled', false);
                $('#no_kps_ket').prop('required', true);
            } else {
                $('#no_kps_ket').val('');
                $('#no_kps_ket').prop('disabled', true);
                $('#no_kps_ket').prop('required', false);
            }
        });

        $('#no_kip').change(function () {
            $(this).parsley().validate();
            var noKIP = $(this).val();
            if (noKIP == 'YA') {
                $('#no_kip_ket').prop('disabled', false);
                $('#no_kip_ket').prop('required', true);
            } else {
                $('#no_kip_ket').val('');
                $('#no_kip_ket').prop('disabled', true);
                $('#no_kip_ket').prop('required', false);
            }
        });

        $('#suket_miskin').change(function() {
            $(this).parsley().validate();
        });

        $('#yatim_piatu').change(function() {
            $(this).parsley().validate();
        });

        $('#id_kondisibelajar').change(function() {
            $(this).parsley().validate();
        });

        $('#id_bcquran').change(function() {
            $(this).parsley().validate();
        });

        $('#id_tempattinggal').change(function() {
            $(this).parsley().validate();
        });

        $('#id_jarak').change(function() {
            $(this).parsley().validate();
        });

        $('#id_waktutmph').change(function() {
            $(this).parsley().validate();
        });

        $('#pendidikan_ayah').change(function() {
            $(this).parsley().validate();
        });

        $('#pekerjaan_ayah').change(function() {
            $(this).parsley().validate();
        });

        $('#penghasilan_ayah').change(function() {
            $(this).parsley().validate();
        });

        $('#pendidikan_ibu').change(function() {
            $(this).parsley().validate();
        });

        $('#pekerjaan_ibu').change(function() {
            $(this).parsley().validate();
        });

        $('#penghasilan_ibu').change(function() {
            $(this).parsley().validate();
        });

        // ketika klik selesai
        $('#lengkapi-data-btn').click(function() {
            updateLengkapiData();
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

        $('#kode_negara').on("change", function(e) { 
            $('#kode_provinsi_asal').val('').trigger('change');
            $('#kode_kabkota_asal').empty();
            $('#kode_kecamatan_asal').empty();
            $('#kode_desalurah_asal').empty();
            $('#alamat_asal').val('');
            $('#rt_asal').val('');
            $('#rw_asal').val('');
            $('#kodepos_asal').val('');
            if ($(this).val() == 'ID') {
                $('#kolom-provinsi-asal').removeClass('d-none');
                $('#kolom-kabkota-asal').removeClass('d-none');
                $('#kolom-kecamatan-asal').removeClass('d-none');
                $('#kolom-desalurah-asal').removeClass('d-none');
                $('#kolom-alamat-asal').removeClass('d-none');
                $('#kolom-rtrw-asal').removeClass('d-none');
                $('#kolom-kodepos-asal').removeClass('d-none');
            } else {
                $('#kolom-alamat-asal').removeClass('d-none');
                
                $('#kolom-provinsi-asal').addClass('d-none');
                $('#kolom-kabkota-asal').addClass('d-none');
                $('#kolom-kecamatan-asal').addClass('d-none');
                $('#kolom-desalurah-asal').addClass('d-none');
                $('#kolom-rtrw-asal').addClass('d-none');
                $('#kolom-kodepos-asal').addClass('d-none');
            }
        });

        $('#kode_provinsi_asal').on("change", function(e) { 
            if ($(this).val() != '') {
                $.ajax({
                    url: "{{ url('/dashboard/wilayah/kabkota') }}/" + $(this).val(),
                    type:'GET',
                    success:function(data) {
                        $('#kode_kabkota_asal').empty();
                        $('#kode_kecamatan_asal').empty();
                        $('#kode_desalurah_asal').empty();
                        $('#kode_kabkota_asal').append($("<option></option>"));
                        $.each(data, function(value, key) {
                            $('#kode_kabkota_asal').append($("<option></option>").attr("value", value).text(key)); 
                        });
                    }
                });
            }
        });

        $('#kode_kabkota_asal').on("change", function(e) { 
            if ($(this).val() != '') {
                $.ajax({
                    url: "{{ url('/dashboard/wilayah/kecamatan') }}/" + $(this).val(),
                    type:'GET',
                    success:function(data) {
                        $('#kode_kecamatan_asal').empty();
                        $('#kode_desalurah_asal').empty();
                        $('#kode_kecamatan_asal').append($("<option></option>"));
                        $.each(data, function(value, key) {
                            $('#kode_kecamatan_asal').append($("<option></option>").attr("value", value).text(key)); 
                        });
                    }
                });
            }
        });

        $('#kode_kecamatan_asal').on("change", function(e) { 
            if ($(this).val() != '') {
                $.ajax({
                    url: "{{ url('/dashboard/wilayah/desalurah') }}/" + $(this).val(),
                    type:'GET',
                    success:function(data) {
                        $('#kode_desalurah_asal').empty();
                        $('#kode_desalurah_asal').append($("<option></option>"));
                        $.each(data, function(value, key) {
                            $('#kode_desalurah_asal').append($("<option></option>").attr("value", value).text(key)); 
                        });
                    }
                });
            }
        });

        window.Parsley.addValidator('maxFileSize', {
            validateString: function(_value, maxSize, parsleyInstance) {
                if (!window.FormData) {
                    alert('Segera update browser Anda!');
                    return true;
                }
                var files = parsleyInstance.$element[0].files;
                return files.length != 1  || files[0].size <= maxSize * 1024;
            },
            requirementType: 'integer',
            messages: {
                en: 'File ini tidak boleh melebihi %s Kb',
            }
        });

        $('#foto').change(function () {
            $(this).parsley().validate();
            if ($(this).parsley().isValid()) {
                var file_data = $(this)[0].files[0];
                uploadFile('foto', file_data, 'Foto');
            } else {
                $(this).parsley().validate();
            }
        });

        $('#ktp_ayah').change(function () {
            $(this).parsley().validate();
            if ($(this).parsley().isValid()) {
                var file_data = $(this)[0].files[0];
                uploadFile('ktp_ayah', file_data, 'KTP Ayah');
            } else {
                $(this).parsley().validate();
            }
        });

        $('#ktp_ibu').change(function () {
            $(this).parsley().validate();
            if ($(this).parsley().isValid()) {
                var file_data = $(this)[0].files[0];
                uploadFile('ktp_ibu', file_data, 'KTP Ibu');
            } else {
                $(this).parsley().validate();
            }
        });

        $('#kk').change(function () {
            $(this).parsley().validate();
            if ($(this).parsley().isValid()) {
                var file_data = $(this)[0].files[0];
                uploadFile('kk', file_data, 'Kartu Keluarga');
            } else {
                $(this).parsley().validate();
            }
        });

        $('#akte').change(function () {
            $(this).parsley().validate();
            if ($(this).parsley().isValid()) {
                var file_data = $(this)[0].files[0];
                uploadFile('akte', file_data, 'Akte Lahir');
            } else {
                $(this).parsley().validate();
            }
        });
        $('#skd').change(function () {
            $(this).parsley().validate();
            if ($(this).parsley().isValid()) {
                var file_data = $(this)[0].files[0];
                uploadFile('skd', file_data, 'SKD');
            } else {
                $(this).parsley().validate();
            }
        });

        @role('Calon Siswa SMP')
        $('#kelas5semester1').change(function () {
            $(this).parsley().validate();
            if ($(this).parsley().isValid()) {
                var file_data = $(this)[0].files[0];
                uploadFile('kelas5semester1', file_data, 'Raport Kelas 5 Semester 1');
            } else {
                $(this).parsley().validate();
            }
        });

        $('#kelas5semester2').change(function () {
            $(this).parsley().validate();
            if ($(this).parsley().isValid()) {
                var file_data = $(this)[0].files[0];
                uploadFile('kelas5semester2', file_data, 'Raport Kelas 5 Semester 2');
            } else {
                $(this).parsley().validate();
            }
        });

        $('#kelas6semester1').change(function () {
            $(this).parsley().validate();
            if ($(this).parsley().isValid()) {
                var file_data = $(this)[0].files[0];
                uploadFile('kelas6semester1', file_data, 'Raport Kelas 6 Semester 1');
            } else {
                $(this).parsley().validate();
            }
        });
        @endrole

        @role('Calon Siswa SMA')
        $('#kelas8semester1').change(function () {
            $(this).parsley().validate();
            if ($(this).parsley().isValid()) {
                var file_data = $(this)[0].files[0];
                uploadFile('kelas8semester1', file_data, 'Raport Kelas 8 Semester 1');
            } else {
                $(this).parsley().validate();
            }
        });
        $('#kelas8semester2').change(function () {
            $(this).parsley().validate();
            if ($(this).parsley().isValid()) {
                var file_data = $(this)[0].files[0];
                uploadFile('kelas8semester2', file_data, 'Raport Kelas 8 Semester 2');
            } else {
                $(this).parsley().validate();
            }
        });
        $('#kelas9semester1').change(function () {
            $(this).parsley().validate();
            if ($(this).parsley().isValid()) {
                var file_data = $(this)[0].files[0];
                uploadFile('kelas9semester1', file_data, 'Raport Kelas 9 Semester 1');
            } else {
                $(this).parsley().validate();
            }
        });
        @endrole

    });

    function updateBiodata() {
        var kebutuhan_khusus_siswa = $('#kebutuhan_khusus_siswa').val() == 'YA' ? $('#kebutuhan_khusus_siswa_ket').val() : $('#kebutuhan_khusus_siswa').val() == 'TIDAK' ? 'TIDAK' : '';
        var no_kks = $('#no_kks').val() == 'ADA' ? $('#no_kks_ket').val() : $('#no_kks').val() == 'TIDAK ADA' ? 'TIDAK ADA' : '';
        var no_kps = $('#no_kps').val() == 'YA' ? $('#no_kps_ket').val() : $('#no_kps').val() == 'TIDAK' ? 'TIDAK' : '';
        var no_kip = $('#no_kip').val() == 'YA' ? $('#no_kip_ket').val() : $('#no_kip').val() == 'TIDAK' ? 'TIDAK' : '';

        $.ajax({
            type: 'POST',
            url: "{{ route('dashboard.calonsiswa.profil.update.biodata') }}",
            headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"},
            cache: false,
            dataType: 'json',
            beforeSend: function(){
                $("#overlay").fadeIn(300);
            },
            complete: function(){
                $("#overlay").fadeOut(300);
            },
            data: {
                @hasanyrole('Calon Siswa SMP|Calon Siswa SMA')
                asal_sekolah: $('#asal_sekolah').val(),
                nisn: $('#nisn').val(),
                no_ijazah: $('#no_ijazah').val(),
                no_skhun: $('#no_skhun').val(),
                no_un: $('#no_un').val(),
                @endhasanyrole
                nm_siswa: $('#nm_siswa').val(),
                jk: $('#jk').val(),
                nik: $('#nik').val(),
                tempat_lahir: $('#tempat_lahir').val(),
                tgl_lahir: $('#tgl_lahir').val(),
                no_akte_lahir: $('#no_akte_lahir').val(),
                id_agama: $('#id_agama').val(),
                kebutuhan_khusus_siswa: kebutuhan_khusus_siswa,
                kode_negara: $('#kode_negara').val(),
                kode_provinsi_asal: $('#kode_provinsi_asal').val(),
                kode_kabkota_asal: $('#kode_kabkota_asal').val(),
                kode_kecamatan_asal: $('#kode_kecamatan_asal').val(),
                kode_desalurah_asal: $('#kode_desalurah_asal').val(),
                alamat_asal: $('#alamat_asal').val(),
                rt_asal: $('#rt_asal').val(),
                rw_asal: $('#rw_asal').val(),
                kodepos_asal: $('#kodepos_asal').val(),
                id_tempattinggal: $('#id_tempattinggal').val(),
                id_transportasi: $('#id_transportasi').val(),
                no_kks: no_kks,
                no_kps: no_kps,
                no_kip: no_kip,
                nm_kip: $('#nm_kip').val(),
                suket_miskin: $('#suket_miskin').val(),
                yatim_piatu: $('#yatim_piatu').val(),
                id_kondisibelajar: $('#id_kondisibelajar').val(),
                id_bcquran: $('#id_bcquran').val(),
                olahraga: $('#olahraga').val(),
                kesenian: $('#kesenian').val(),
                hobby: $('#hobby').val(),
                penyakit: $('#penyakit').val(),
                tinggi_badan: $('#tinggi_badan').val(),
                berat_badan: $('#berat_badan').val(),
                id_jarak: $('#id_jarak').val(),
                id_waktutmph: $('#id_waktutmph').val(),
                jumlah_saudara: $('#jumlah_saudara').val(),
                anak_ke: $('#anak_ke').val(),
                dari_bersaudara: $('#dari_bersaudara').val(),
            },
            success: function (result) {
                if (result.status) {
                    toastr.success(result.message);
                }
            },
            error: function (result) {
                toastr.error(result.message);
                console.log('An error occurred.');
                console.log(result);
            },
        });
    }

    function updateDataOrtu() {
        $.ajax({
            type: 'POST',
            url: "{{ route('dashboard.calonsiswa.profil.update.dataortu') }}",
            headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"},
            cache: false,
            dataType: 'json',
            beforeSend: function(){
                $("#overlay").fadeIn(300);
            },
            complete: function(){
                $("#overlay").fadeOut(300);
            },
            data: {
                nm_ayah: $('#nm_ayah').val(),
                nik_ayah: $('#nik_ayah').val(),
                tahun_lahir_ayah: $('#tahun_lahir_ayah').val(),
                pendidikan_ayah: $('#pendidikan_ayah').val(),
                pekerjaan_ayah: $('#pekerjaan_ayah').val(),
                penghasilan_ayah: $('#penghasilan_ayah').val(),
                nohp_ayah: $('#nohp_ayah').val(),
                nm_ibu: $('#nm_ibu').val(),
                nik_ibu: $('#nik_ibu').val(),
                tahun_lahir_ibu: $('#tahun_lahir_ibu').val(),
                pekerjaan_ibu: $('#pekerjaan_ibu').val(),
                penghasilan_ibu: $('#penghasilan_ibu').val(),
                pendidikan_ibu: $('#pendidikan_ibu').val(),
                nohp_ibu: $('#nohp_ibu').val(),
                nm_wali: $('#nm_wali').val(),
                nik_wali: $('#nik_wali').val(),
                tahun_lahir_wali: $('#tahun_lahir_wali').val(),
                pekerjaan_wali: $('#pekerjaan_wali').val(),
                penghasilan_wali: $('#penghasilan_wali').val(),
                pendidikan_wali: $('#pendidikan_wali').val(),
                nohp_wali: $('#nohp_wali').val(),
            },
            success: function (result) {
                if (result.status) {
                    toastr.success(result.message);
                }
            },
            error: function (result) {
                toastr.error(result.message);
                console.log('An error occurred.');
                console.log(result);
            },
        });
    }

    function uploadFile(file_name, file_data, message) {
        var form_data = new FormData();
        form_data.append(file_name, file_data);

        $.ajax({
            type: 'POST',
            url: "{{ route('dashboard.calonsiswa.profil.update.dokumen') }}",
            headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"},
            processData: false,
            contentType: false,
            cache: false,
            dataType: 'json',
            data: form_data,
            beforeSend: function(){
                $("#overlay").fadeIn(300);
            },
            complete: function(){
                $("#overlay").fadeOut(300);
            },
            success: function (result) {
                if (result.status) {
                    // -------- perbaharui data preview file
                    if (file_name === 'foto') {
                        $('#link_foto')
                            .attr('href', "{{ url('/') . '/' }}" + result.file)
                            .removeClass('disabled');
                        $('#foto').prop('required', false);
                    }
                    if (file_name === 'ktp_ayah') {
                        $('#link_ktp_ayah')
                            .attr('href', "{{ url('/') . '/' }}" + result.file)
                            .removeClass('disabled');
                        $('#ktp_ayah').prop('required', false);
                    }
                    if (file_name === 'ktp_ibu') {
                        $('#link_ktp_ibu')
                            .attr('href', "{{ url('/') . '/' }}" + result.file)
                            .removeClass('disabled');
                        $('#ktp_ibu').prop('required', false);
                    }
                    if (file_name === 'kk') {
                        $('#link_kk')
                            .attr('href', "{{ url('/') . '/' }}" + result.file)
                            .removeClass('disabled');
                        $('#kk').prop('required', false);
                    }
                    if (file_name === 'akte') {
                        $('#link_akte')
                            .attr('href', "{{ url('/') . '/' }}" + result.file)
                            .removeClass('disabled');
                        $('#akte').prop('required', false);
                    }
                    if (file_name === 'skd') {
                        $('#link_skd')
                            .attr('href', "{{ url('/') . '/' }}" + result.file)
                            .removeClass('disabled');
                        $('#skd').prop('required', false);
                    }
                    @role('Calon Siswa SMP')
                    if (file_name === 'kelas5semester1') {
                        $('#link_kelas5semester1')
                            .attr('href', "{{ url('/') . '/' }}" + result.file)
                            .removeClass('disabled');
                        $('#kelas5semester1').prop('required', false);
                    }
                    if (file_name === 'kelas5semester2') {
                        $('#link_kelas5semester2')
                            .attr('href', "{{ url('/') . '/' }}" + result.file)
                            .removeClass('disabled');
                        $('#kelas5semester2').prop('required', false);
                    }
                    if (file_name === 'kelas6semester1') {
                        $('#link_kelas6semester1')
                            .attr('href', "{{ url('/') . '/' }}" + result.file)
                            .removeClass('disabled');
                        $('#kelas6semester1').prop('required', false);
                    }
                    @endrole
                    @role('Calon Siswa SMA')
                    if (file_name === 'kelas8semester1') {
                        $('#link_kelas8semester1')
                            .attr('href', "{{ url('/') . '/' }}" + result.file)
                            .removeClass('disabled');
                        $('#kelas8semester1').prop('required', false);
                    }
                    if (file_name === 'kelas8semester2') {
                        $('#link_kelas8semester2')
                            .attr('href', "{{ url('/') . '/' }}" + result.file)
                            .removeClass('disabled');
                        $('#kelas8semester2').prop('required', false);
                    }
                    if (file_name === 'kelas9semester1') {
                        $('#link_kelas9semester1')
                            .attr('href', "{{ url('/') . '/' }}" + result.file)
                            .removeClass('disabled');
                        $('#kelas9semester1').prop('required', false);
                    }
                    @endrole
                    toastr.success('Berhasil upload ' + message);
                } else {
                    toastr.error('Gagal upload ' + message);
                }
            },
            error: function (result) {
                console.log('An error occurred.');
                console.log(result);
            }
        });
    }

    function updateLengkapiData() {
        $.ajax({
            type: 'GET',
            url: "{{ route('dashboard.calonsiswa.profil.update.lengkapidata') }}",
            async: false,
            cache: false,
            dataType: 'json',
            success: function (result) {
                if (result.status) {
                    toastr.success(result.message);
                    window.location.href = "{{URL::to('dashboard/home')}}"
                } else {
                    toastr.error(result.message);
                }
                $('#lengkapi-data').modal('hide');
            },
            error: function (result) {
                $('#lengkapi-data').modal('hide');
                console.log('An error occurred.');
                console.log(result);
            },
        });
    }
</script>
@endpush