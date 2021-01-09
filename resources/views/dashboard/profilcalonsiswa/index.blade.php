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
                                    <input type="text" id="asal_sekolah" name="asal_sekolah" class="form-control"
                                        placeholder="ASAL SD/MI" value="{{ $casis->asal_sekolah }}"
                                        style="text-transform:uppercase">
                                </div>
                            </div>
                            @endrole
                            @role('Calon Siswa SMA')
                            <div class="form-group row align-items-center mb-0">
                                <label class="col-md-3 control-label col-form-label">
                                    Asal SMP/MTS
                                </label>
                                <div class="col-md-9 pb-2 pt-2">
                                    <input type="text" id="asal_sekolah" name="asal_sekolah" class="form-control"
                                        placeholder="ASAL SMP/MTS" value="{{ $casis->asal_sekolah }}"
                                        style="text-transform:uppercase">
                                </div>
                            </div>
                            @endrole
                            <div class="form-group row align-items-center mb-0">
                                <label class="col-md-3 control-label col-form-label">
                                    Nama Peserta Didik
                                    <small>(Sesuai Akta Lahir)</small>
                                </label>
                                <div class="col-md-9 pb-2 pt-2">
                                    <input type="text" id="nm_siswa" name="nm_siswa" class="form-control"
                                        placeholder="NAMA LENGKAP" value="{{ $casis->nm_siswa }}"
                                        style="text-transform:uppercase">
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
                                        <option value="L" {{ $casis->jk == 'L' ? 'selected' : '' }}>LAKI-LAKI</option>
                                        <option value="P" {{ $casis->jk == 'P' ? 'selected' : '' }}>PEREMPUAN</option>
                                    </select>
                                </div>
                            </div>
                            @hasanyrole('Calon Siswa SMP|Calon Siswa SMA')
                            <div class="form-group row align-items-center mb-0">
                                <label class="col-md-3 control-label col-form-label">
                                    NISN
                                    <small>(Nomor Induk Siswa Nasional)</small>
                                </label>
                                <div class="col-md-9 pb-2 pt-2">
                                    <input type="text" id="nisn" name="nisn" class="form-control" maxlength="10"
                                        value="{{ $casis->nisn }}" placeholder="NOMOR INDUK SISWA NASIONAL"
                                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                </div>
                            </div>
                            @endhasanyrole
                            <div class="form-group row align-items-center mb-0">
                                <label class="col-md-3 control-label col-form-label">
                                    NIK
                                    <small>(Nomor Induk Kependudukan)</small>
                                </label>
                                <div class="col-md-9 pb-2 pt-2">
                                    <input type="text" id="nik" name="nik" class="form-control" maxlength="16"
                                        value="{{ $casis->nik }}"
                                        placeholder="BISA DILIHAT DI KARTU KELUARGA, BERUPA ANGKA 16 DIGIT"
                                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
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
                                    <input id="tempat_lahir" name="tempat_lahir" type="text" class="form-control"
                                        value="{{ $casis->tempat_lahir }}" placeholder="TEMPAT LAHIR"
                                        style="text-transform:uppercase">
                                </div>
                                <div class="col-md-4 pb-2 pt-2">
                                    <input id="tgl_lahir" name="tgl_lahir" type="text" autocomplete="off"
                                        value="{{ $casis->tgl_lahir ? $casis->tgl_lahir->format('d/m/Y') : '' }}"
                                        class="form-control fc-datepicker" placeholder="TANGGAL/BULAN/TAHUN">
                                </div>
                            </div>
                            <div class="form-group row align-items-center mb-0">
                                <label class="col-sm-12 col-md-3 control-label col-form-label">
                                    Nomor Registrasi Akta Lahir
                                </label>
                                <div class="col-sm-12 col-md-9 pb-2 pt-2">
                                    <input id="no_akte_lahir" name="no_akte_lahir" type="text" class="form-control"
                                        value="{{ $casis->no_akte_lahir }}" placeholder="NO AKTA LAHIR">
                                </div>
                            </div>
                            <div class="form-group row align-items-center mb-0">
                                <label class="col-sm-12 col-md-3 control-label col-form-label">
                                    Agama
                                </label>
                                <div class="col-sm-12 col-md-9 pb-2 pt-2">
                                    <select id="id_agama" name="id_agama" class="form-control select2-show-search"
                                        style="width: 100%" data-placeholder="PILIH AGAMA">
                                        <option selected></option>
                                        @foreach ($agama as $item)
                                        <option value="{{ $item->id_agama }}"
                                            {{ $casis->id_agama == $item->id_agama ? 'selected' : '' }}>
                                            {{ strtoupper($item->agama) }}
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
                                        <option selected></option>
                                        <option value="YA"
                                            {{ $casis->kebutuhan_khusus != 'TIDAK' && $casis->kebutuhan_khusus != null ? 'selected' : '' }}>
                                            YA
                                        </option>
                                        <option value="TIDAK"
                                            {{ $casis->kebutuhan_khusus == 'TIDAK' ? 'selected' : '' }}>TIDAK
                                        </option>
                                    </select>
                                </div>
                                <div class="col-sm-12 col-md-7 pb-2 pt-2">
                                    <input id="kebutuhan_khusus_siswa_ket" name="kebutuhan_khusus_siswa_ket" type="text"
                                        class="form-control"
                                        value="{{ $casis->kebutuhan_khusus != 'TIDAK' && $casis->kebutuhan_khusus != null ? $casis->kebutuhan_khusus : '' }}"
                                        style="text-transform:uppercase"
                                        {{ $casis->kebutuhan_khusus != 'TIDAK' && $casis->kebutuhan_khusus != null ? '' : 'disabled' }}
                                        placeholder="TUNA NETRA / RUNGU / INDIGO / NARKOBA / AUTIS / LAINNYA (SEBUTKAN...)">
                                </div>
                            </div>
                            <hr>
                            <div class="form-group row align-items-center mb-0">
                                <label class="col-12 control-label col-form-label">
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
                                    <input id="jalan" name="jalan" type="text" class="form-control"
                                        value="{{ $casis->jalan }}" placeholder="ALAMAT LENGKAP"
                                        style="text-transform:uppercase">
                                </div>
                            </div>
                            <div class="form-group row align-items-center mb-0">
                                <label class="col-sm-12 col-md-3 control-label col-form-label">
                                    RT / RW
                                </label>
                                <div class="col-md-4 pb-2 pt-2">
                                    <input type="text" id="rt" name="rt" class="form-control" value="{{ $casis->rt }}"
                                        placeholder="RT 3 DIGIT, CONTOH: 003"
                                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                </div>
                                <div class="col-md-5 pb-2 pt-2">
                                    <input type="text" id="rw" name="rw" class="form-control" value="{{ $casis->rw }}"
                                        placeholder="RW 3 DIGIT, CONTOH: 016"
                                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                </div>
                            </div>
                            <div class="form-group row align-items-center mb-0">
                                <label class="col-sm-12 col-md-3 control-label col-form-label">
                                    Desa / Kelurahan
                                </label>
                                <div class="col-sm-12 col-md-9 pb-2 pt-2">
                                    <input type="text" id="desalurah" name="desalurah" class="form-control"
                                        value="{{ $casis->desalurah }}" placeholder="DESA"
                                        style="text-transform:uppercase">
                                </div>
                            </div>
                            <div class="form-group row align-items-center mb-0">
                                <label class="col-sm-12 col-md-3 control-label col-form-label">
                                    Kecamatan
                                </label>
                                <div class="col-sm-12 col-md-9 pb-2 pt-2">
                                    <input type="text" id="kecamatan" name="kecamatan" class="form-control"
                                        value="{{ $casis->kecamatan }}" placeholder="KECAMATAN"
                                        style="text-transform:uppercase">
                                </div>
                            </div>
                            <div class="form-group row align-items-center mb-0">
                                <label class="col-sm-12 col-md-3 control-label col-form-label">
                                    Kabupaten / Kota
                                </label>
                                <div class="col-sm-12 col-md-9 pb-2 pt-2">
                                    <input type="text" id="kabkota" name="kabkota" class="form-control"
                                        value="{{ $casis->kabkota }}" placeholder="KABUPATEN / KOTA"
                                        style="text-transform:uppercase">
                                </div>
                            </div>
                            <div class="form-group row align-items-center mb-0">
                                <label class="col-sm-12 col-md-3 control-label col-form-label">
                                    Kode Pos
                                </label>
                                <div class="col-sm-12 col-md-9 pb-2 pt-2">
                                    <input type="text" id="kodepos" name="kodepos" class="form-control"
                                        value="{{ $casis->kodepos }}" maxlength="5" placeholder="KODE POS"
                                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                </div>
                            </div>
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
                                    <select id="id_tempattinggal" name="id_tempattinggal"
                                        class="form-control select2-show-search" style="width: 100%"
                                        data-placeholder="PILIH STATUS TEMPAT TINGGAL">
                                        <option></option>
                                        @foreach ($tempattinggal as $item)
                                        <option value="{{ $item->id_tempattinggal }}"
                                            {{ $casis->id_tempattinggal == $item->id_tempattinggal ? 'selected' : '' }}>
                                            {{ strtoupper($item->tempattinggal) }}
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
                                    <select id="id_transportasi" name="id_transportasi"
                                        class="form-control select2-show-search" style="width: 100%"
                                        data-placeholder="PILIH JENIS TRANSPORTASI">
                                        <option></option>
                                        @foreach ($transportasi as $item)
                                        <option value="{{ $item->id_transportasi }}"
                                            {{ $casis->id_transportasi == $item->id_transportasi ? 'selected' : '' }}>
                                            {{ strtoupper($item->transportasi) }}
                                        </option>
                                        @endforeach
                                    </select>
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
                                        <option value="ADA"
                                            {{ $casis->no_kks != 'TIDAK ADA' && $casis->no_kks != null ? 'selected' : '' }}>
                                            ADA</option>
                                        <option value="TIDAK ADA" {{ $casis->no_kks == 'TIDAK ADA' ? 'selected' : '' }}>
                                            TIDAK ADA
                                        </option>
                                    </select>
                                </div>
                                <div class="col-sm-12 col-md-7 pb-2 pt-2">
                                    <input id="no_kks_ket" name="no_kks_ket" type="text" class="form-control"
                                        value="{{ $casis->no_kks != 'TIDAK ADA' && $casis->no_kks != null ? $casis->no_kks : '' }}"
                                        placeholder="BIASANYA MENYATU DENGAN KIP (KARTU INDONESIA PINTAR)"
                                        style="text-transform:uppercase"
                                        {{ $casis->no_kks != 'TIDAK ADA' && $casis->no_kks != null ? '' : 'disabled' }}>
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
                                        <option value="YA"
                                            {{ $casis->no_kps != 'TIDAK' && $casis->no_kps != null ? 'selected' : '' }}>
                                            YA</option>
                                        <option value="TIDAK" {{ $casis->no_kps == 'TIDAK' ? 'selected' : '' }}>TIDAK
                                        </option>
                                    </select>
                                </div>
                                <div class="col-sm-12 col-md-7 pb-2 pt-2">
                                    <input id="no_kps_ket" name="no_kps_ket" type="text" class="form-control"
                                        value="{{ $casis->no_kps != 'TIDAK' && $casis->no_kps != null ? $casis->no_kps : '' }}"
                                        placeholder="ISI NO KPS JIKA SEBAGAI PENERIMA KPS"
                                        style="text-transform:uppercase"
                                        {{ $casis->no_kps != 'TIDAK' && $casis->no_kps != null ? '' : 'disabled' }}>
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
                                        <option value="YA"
                                            {{ $casis->no_kip != 'TIDAK' && $casis->no_kip != null ? 'selected' : '' }}>
                                            YA</option>
                                        <option value="TIDAK" {{ $casis->no_kip == 'TIDAK' ? 'selected' : '' }}>TIDAK
                                        </option>
                                    </select>
                                </div>
                                <div class="col-sm-12 col-md-7 pb-2 pt-2">
                                    <input id="no_kip_ket" name="no_kip_ket" type="text" class="form-control"
                                        value="{{ $casis->no_kip != 'TIDAK' && $casis->no_kip != null ? $casis->no_kip : '' }}"
                                        placeholder="ISI NO KIP JIKA SEBAGAI PENERIMA KIP"
                                        style="text-transform:uppercase"
                                        {{ $casis->no_kip != 'TIDAK' && $casis->no_kip != null ? '' : 'disabled' }}>
                                </div>
                            </div>
                            <div class="form-group row align-items-center mb-0">
                                <label class="col-sm-12 col-md-3 control-label col-form-label">
                                    Nama Tertera di KIP
                                </label>
                                <div class="col-sm-12 col-md-9 pb-2 pt-2">
                                    <input id="nm_kip" name="nm_kip" type="text" class="form-control"
                                        value="{{ $casis->nm_kip }}" placeholder="NAMA YANG TERTERA DI KIP"
                                        style="text-transform:uppercase">
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
                                        <option value="YA" {{ $casis->suket_miskin == 1 ? 'selected' : '' }}>YA</option>
                                        <option value="TIDAK" {{ $casis->suket_miskin == 0 ? 'selected' : '' }}>
                                            TIDAK
                                        </option>
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
                                        <option value="YA" {{ $casis->yatim_piatu == 1 ? 'selected' : '' }}>YA</option>
                                        <option value="TIDAK" {{ $casis->yatim_piatu == 0 ? 'selected' : '' }}>
                                            TIDAK
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row align-items-center mb-0">
                                <label class="col-sm-12 col-md-3 control-label col-form-label">
                                    Kondisi Belajar di Rumah
                                </label>
                                <div class="col-sm-12 col-md-9 pb-2 pt-2">
                                    <select id="id_kondisibelajar" name="id_kondisibelajar"
                                        class="form-control select2-show-search" style="width: 100%"
                                        data-placeholder="PILIH KONDISI BELAJAR">
                                        <option></option>
                                        @foreach ($kondisibelajar as $item)
                                        <option value="{{ $item->id_kondisibelajar }}"
                                            {{ $casis->id_kondisibelajar == $item->id_kondisibelajar ? 'selected' : '' }}>
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
                                        <option value="{{ $item->id_bcquran }}"
                                            {{ $casis->id_bcquran == $item->id_bcquran ? 'selected' : '' }}>
                                            {{ strtoupper($item->bcquran) }}
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
                                    <input type="text" id="olahraga" name="olahraga" class="form-control" style="text-transform:uppercase"
                                        value="{{ $casis->olahraga }}" placeholder="MINAT / BAKAT DI BIDANG OLAHRAGA">
                                </div>
                            </div>
                            <div class="form-group row align-items-center mb-0">
                                <label class="col-sm-12 col-md-3 control-label col-form-label">
                                    Kesenian (Minat / Bakat)
                                </label>
                                <div class="col-sm-12 col-md-9 pb-2 pt-2">
                                    <input type="text" id="kesenian" name="kesenian" class="form-control" style="text-transform:uppercase"
                                        value="{{ $casis->kesenian }}" placeholder="MINAT / BAKAT DI BIDANG KESENIAN">
                                </div>
                            </div>
                            <div class="form-group row align-items-center mb-0">
                                <label class="col-sm-12 col-md-3 control-label col-form-label">
                                    Hobby
                                </label>
                                <div class="col-sm-12 col-md-9 pb-2 pt-2">
                                    <input type="text" id="hobby" name="hobby" class="form-control"
                                        value="{{ $casis->hobby }}" style="text-transform:uppercase"
                                        placeholder="SEBUTKAN HOBBY DIPISAH DENGAN TANDA KOMA">
                                </div>
                            </div>
                            <div class="form-group row align-items-center mb-0">
                                <label class="col-sm-12 col-md-3 control-label col-form-label">
                                    Penyakit Yang Pernah Diderita
                                </label>
                                <div class="col-sm-12 col-md-9 pb-2 pt-2">
                                    <input type="text" id="penyakit" name="penyakit" class="form-control" style="text-transform:uppercase"
                                        value="{{ $casis->penyakit }}" placeholder="PENYAKIT YANG PERNAH DIDERITA">
                                </div>
                            </div>
                            <div class="form-group row align-items-center mb-0">
                                <label class="col-sm-12 col-md-3 control-label col-form-label">
                                    Tinggi Badan
                                </label>
                                <div class="col-6 pb-2 pt-2">
                                    <input type="text" id="tinggi_badan" name="tinggi_badan" class="form-control"
                                        value="{{ $casis->tinggi_badan }}" maxlength="3" placeholder="TINGGI BADAN"
                                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                </div>
                                CM
                            </div>
                            <div class="form-group row align-items-center mb-0">
                                <label class="col-sm-12 col-md-3 control-label col-form-label">
                                    Berat Badan
                                </label>
                                <div class="col-6 pb-2 pt-2">
                                    <input type="text" id="berat_badan" name="berat_badan" class="form-control"
                                        value="{{ $casis->berat_badan }}" maxlength="3" placeholder="BERAT BADAN"
                                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                </div>
                                KG
                            </div>
                            <div class="form-group row align-items-center mb-0">
                                <label class="col-sm-12 col-md-3 control-label col-form-label">
                                    Jarak Tempat Tinggal ke Sekolah
                                </label>
                                <div class="col-sm-12 col-md-9 pb-2 pt-2">
                                    <select id="id_jarak" name="id_jarak" class="form-control select2-show-search"
                                        style="width: 100%" data-placeholder="PILIH JARAK TEMPAT TINGGAL KE SEKOLAH">
                                        <option></option>
                                        @foreach ($jarak as $item)
                                        <option value="{{ $item->id_jarak }}"
                                            {{ $casis->id_jarak == $item->id_jarak ? 'selected' : '' }}>
                                            {{ strtoupper($item->jarak) }}
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
                                    <select id="id_waktutmph" name="id_waktutmph"
                                        class="form-control select2-show-search" style="width: 100%"
                                        data-placeholder="PILIH WAKTU TEMPUH KE SEKOLAH">
                                        <option></option>
                                        @foreach ($waktutmph as $item)
                                        <option value="{{ $item->id_waktutmph }}"
                                            {{ $casis->id_waktutmph == $item->id_waktutmph ? 'selected' : '' }}>
                                            {{ strtoupper($item->waktutmph) }}
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
                                        value="{{ $casis->jumlah_saudara }}" maxlength="3"
                                        placeholder="JUMLAH BERSAUDARA"
                                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                </div>
                            </div>
                            <div class="form-group row align-items-center mb-0">
                                <label class="col-sm-12 col-md-3 control-label col-form-label">
                                    Anak Ke
                                </label>
                                <div class="col-md-9 pb-2 pt-2">
                                    <input type="text" id="anak_ke" name="anak_ke" class="form-control"
                                        value="{{ $casis->anak_ke }}" maxlength="3" placeholder="ANAK KE"
                                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                </div>
                            </div>
                            <div class="form-group row align-items-center mb-0">
                                <label class="col-sm-12 col-md-3 control-label col-form-label">
                                    Dari Berapa Bersaudara
                                </label>
                                <div class="col-md-9 pb-2 pt-2">
                                    <input type="text" id="dari_bersaudara" name="dari_bersaudara" class="form-control"
                                        value="{{ $casis->dari_bersaudara }}" maxlength="3"
                                        placeholder="DARI BERAPA BERSAUDARA"
                                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                </div>
                            </div>
                        </div>
                    </section>
                    <h3>DATA ORANG TUA</h3>
                    <section class="bg-light">
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
                                    <input type="text" id="nm_ayah" name="nm_ayah" class="form-control"
                                        placeholder="NAMA LENGKAP AYAH" value="{{ $casis->nm_ayah }}"
                                        style="text-transform:uppercase">
                                </div>
                            </div>
                            <div class="form-group row align-items-center mb-0">
                                <label class="col-md-3 control-label col-form-label">
                                    NIK Ayah
                                </label>
                                <div class="col-md-9 pb-2 pt-2">
                                    <input type="text" id="nik_ayah" name="nik_ayah" class="form-control" maxlength="16"
                                        value="{{ $casis->nik_ayah }}" placeholder="BERUPA ANGKA 16 DIGIT"
                                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                </div>
                            </div>
                            <div class="form-group row align-items-center mb-0">
                                <label class="col-md-3 control-label col-form-label">
                                    Tahun Lahir Ayah
                                </label>
                                <div class="col-md-9 pb-2 pt-2">
                                    <input type="text" id="tahun_lahir_ayah" name="tahun_lahir_ayah"
                                        class="form-control" maxlength="4" value="{{ $casis->tahun_lahir_ayah }}"
                                        placeholder="TAHUN"
                                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                </div>
                            </div>
                            <div class="form-group row align-items-center mb-0">
                                <label class="col-md-3 control-label col-form-label">
                                    Pendidikan Terakhir
                                </label>
                                <div class="col-md-9 pb-2 pt-2">
                                    <select id="pendidikan_ayah" name="pendidikan_ayah"
                                        class="form-control select2-show-search" style="width: 100%"
                                        data-placeholder="PILIH PENDIDIKAN">
                                        <option></option>
                                        @foreach ($pendidikan as $item)
                                        <option value="{{ $item->id_pendidikan }}"
                                            {{ $casis->pendidikan_ayah == $item->id_pendidikan ? 'selected' : '' }}>
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
                                    <select id="pekerjaan_ayah" name="pekerjaan_ayah"
                                        class="form-control select2-show-search" style="width: 100%"
                                        data-placeholder="PILIH PEKERJAAN">
                                        <option></option>
                                        @foreach ($pekerjaan as $item)
                                        <option value="{{ $item->id_pekerjaan }}"
                                            {{ $casis->pekerjaan_ayah == $item->id_pekerjaan ? 'selected' : '' }}>
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
                                    <select id="penghasilan_ayah" name="penghasilan_ayah"
                                        class="form-control select2-show-search" style="width: 100%"
                                        data-placeholder="PILIH PENGHASILAN">
                                        <option></option>
                                        @foreach ($penghasilan as $item)
                                        <option value="{{ $item->id_penghasilan }}"
                                            {{ $casis->penghasilan_ayah == $item->id_penghasilan ? 'selected' : '' }}>
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
                                    <input type="text" id="nohp_ayah" name="nohp_ayah" class="form-control"
                                        value="{{ $casis->nohp_ayah }}"
                                        placeholder="NOMOR HP/WHATSAPP, CONTOH: 0812345678910" maxlength="13"
                                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
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
                                    <input type="text" id="nm_ibu" name="nm_ibu" class="form-control"
                                        placeholder="NAMA LENGKAP IBU" value="{{ $casis->nm_ibu }}"
                                        style="text-transform:uppercase">
                                </div>
                            </div>
                            <div class="form-group row align-items-center mb-0">
                                <label class="col-md-3 control-label col-form-label">
                                    NIK Ibu
                                </label>
                                <div class="col-md-9 pb-2 pt-2">
                                    <input type="text" id="nik_ibu" name="nik_ibu" class="form-control" maxlength="16"
                                        value="{{ $casis->nik_ibu }}" placeholder="BERUPA ANGKA 16 DIGIT"
                                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                </div>
                            </div>
                            <div class="form-group row align-items-center mb-0">
                                <label class="col-md-3 control-label col-form-label">
                                    Tahun Lahir Ibu
                                </label>
                                <div class="col-md-9 pb-2 pt-2">
                                    <input type="text" id="tahun_lahir_ibu" name="tahun_lahir_ibu" class="form-control"
                                        maxlength="4" value="{{ $casis->tahun_lahir_ibu }}" placeholder="TAHUN"
                                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                </div>
                            </div>
                            <div class="form-group row align-items-center mb-0">
                                <label class="col-md-3 control-label col-form-label">
                                    Pendidikan Terakhir
                                </label>
                                <div class="col-md-9 pb-2 pt-2">
                                    <select id="pendidikan_ibu" name="pendidikan_ibu"
                                        class="form-control select2-show-search" style="width: 100%"
                                        data-placeholder="PILIH PENDIDIKAN">
                                        <option></option>
                                        @foreach ($pendidikan as $item)
                                        <option value="{{ $item->id_pendidikan }}"
                                            {{ $casis->pendidikan_ibu == $item->id_pendidikan ? 'selected' : '' }}>
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
                                    <select id="pekerjaan_ibu" name="pekerjaan_ibu"
                                        class="form-control select2-show-search" style="width: 100%"
                                        data-placeholder="PILIH PEKERJAAN">
                                        <option></option>
                                        @foreach ($pekerjaan as $item)
                                        <option value="{{ $item->id_pekerjaan }}"
                                            {{ $casis->pekerjaan_ibu == $item->id_pekerjaan ? 'selected' : '' }}>
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
                                    <select id="penghasilan_ibu" name="penghasilan_ibu"
                                        class="form-control select2-show-search" style="width: 100%"
                                        data-placeholder="PILIH PENGHASILAN">
                                        <option></option>
                                        @foreach ($penghasilan as $item)
                                        <option value="{{ $item->id_penghasilan }}"
                                            {{ $casis->penghasilan_ibu == $item->id_penghasilan ? 'selected' : '' }}>
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
                                    <input type="text" id="nohp_ibu" name="nohp_ibu" class="form-control"
                                        value="{{ $casis->nohp_ibu }}"
                                        placeholder="NOMOR HP/WHATSAPP, CONTOH: 0812345678910" maxlength="13"
                                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
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
                                    <input type="text" id="nik_wali" name="nik_wali" class="form-control" maxlength="16"
                                        value="{{ $casis->nik_wali }}" placeholder="BERUPA ANGKA 16 DIGIT"
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
                        {{-- <div class="repeater">
                            <div data-repeater-list="dokumen-group">
                                <div data-repeater-item>
                                    <input type="hidden" name="id_dokumen" id="id_dokumen" />
                                    <div class="form-group row align-items-center mb-0">
                                        <div class="col-md-8">
                                            <select name="id_jenisdokumen"
                                                class="form-control select2-show-search dokumen" style="width: 100%"
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
                                            <button type="button" data-repeater-delete
                                                class="btn btn-danger btn-icon delete">
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
                        </div> --}}
                        <div>
                            <h4 class="card-title">Foto <span class="text-danger">*</span></h4>
                            <h6 class="card-subtitle text-dark mb-2">Scan Foto 4x6</h6>
                            <div class="input-group">
                                <div class="input-group-prepend mr-2">
                                    <a href="{{ $casis->foto ? url('/' . $casis->foto) : '' }}" id="link_foto"
                                        class="btn btn-primary @if(empty($casis->foto)) disabled @endif"
                                        target="_blank">
                                        LIHAT
                                    </a>
                                </div>
                                <div class="mt-2">
                                    <input type="file" id="foto" name="foto"
                                        accept="image/jpeg, image/png">
                                </div>
                            </div>
                        </div>
                        <div class="mt-5">
                            <h4 class="card-title">KTP Ayah <span class="text-danger">*</span></h4>
                            <h6 class="card-subtitle text-dark mb-2">Fotokopi atau scan KTP / SIM /
                                Paspor ayah calon siswa</h6>
                            <div class="input-group">
                                <div class="input-group-prepend mr-2">
                                    <a href="{{ $casis->ktp_ayah ? url('/' . $casis->ktp_ayah) : '' }}" id="link_ktp_ayah"
                                        class="btn btn-primary @if(empty($casis->ktp_ayah)) disabled @endif"
                                        target="_blank">
                                        LIHAT
                                    </a>
                                </div>
                                <div class="mt-2">
                                    <input type="file" id="ktp_ayah" name="ktp_ayah"
                                        accept="image/jpeg, image/png">
                                </div>
                            </div>
                        </div>
                        <div class="mt-5">
                            <h4 class="card-title">KTP Ibu <span class="text-danger">*</span></h4>
                            <h6 class="card-subtitle text-dark mb-2">Fotokopi atau scan KTP / SIM /
                                Paspor ibu calon siswa</h6>
                            <div class="input-group">
                                <div class="input-group-prepend mr-2">
                                    <a href="{{ $casis->ktp_ibu ? url('/' . $casis->ktp_ibu) : '' }}" id="link_ktp_ibu"
                                        class="btn btn-primary @if(empty($casis->ktp_ibu)) disabled @endif"
                                        target="_blank">
                                        LIHAT
                                    </a>
                                </div>
                                <div class="mt-2">
                                    <input type="file" id="ktp_ibu" name="ktp_ibu"
                                        accept="image/jpeg, image/png">
                                </div>
                            </div>
                        </div>
                        <div class="mt-5">
                            <h4 class="card-title">Kartu Keluarga <span class="text-danger">*</span>
                            </h4>
                            <h6 class="card-subtitle text-dark mb-2">Fotokopi atau scan Kartu Keluarga
                                calon siswa</h6>
                            <div class="input-group">
                                <div class="input-group-prepend mr-2">
                                    <a href="{{ $casis->kk ? url('/' . $casis->kk) : '' }}" id="link_kk"
                                        class="btn btn-primary @if(empty($casis->kk)) disabled @endif" target="_blank">
                                        LIHAT
                                    </a>
                                </div>
                                <div class="mt-2">
                                    <input type="file" id="kk" name="kk"
                                        accept="image/jpeg, image/png">
                                </div>
                            </div>
                        </div>
                        <div class="mt-5">
                            <h4 class="card-title">Akte Lahir <span class="text-danger">*</span>
                            </h4>
                            <h6 class="card-subtitle text-dark mb-2">Fotokopi atau scan akte lahir calon
                                siswa</h6>
                            <div class="input-group">
                                <div class="input-group-prepend mr-2">
                                    <a href="{{ $casis->akte ? url('/' . $casis->akte) : '' }}" id="link_akte"
                                        class="btn btn-primary @if(empty($casis->akte)) disabled @endif"
                                        target="_blank">
                                        LIHAT
                                    </a>
                                </div>
                                <div class="mt-2">
                                    <input type="file" id="akte" name="akte"
                                        accept="image/jpeg, image/png">
                                </div>
                            </div>
                        </div>
                        <div class="mt-5">
                            <h4 class="card-title">Surat Keterangan Dokter</h4>
                            <h6 class="card-subtitle text-dark mb-2">Fotokopi atau scan surat keterangan
                                dokter calon siswa</h6>
                            <div class="input-group">
                                <div class="input-group-prepend mr-2">
                                    <a href="{{ $casis->skd ? url('/' . $casis->skd) : '' }}" id="link_skd"
                                        class="btn btn-primary @if(empty($casis->skd)) disabled @endif" target="_blank">
                                        LIHAT
                                    </a>
                                </div>
                                <div class="mt-2">
                                    <input type="file" id="skd" name="skd"
                                        accept="image/jpeg, image/png">
                                </div>
                            </div>
                        </div>
                        @role('Calon Siswa SMP')
                        <div class="mt-5">
                            <h4 class="card-title">Raport Kelas 5 Semester 1</h4>
                            <h6 class="card-subtitle text-dark mb-2">Fotokopi atau scan raport kelas 5 semester 1</h6>
                            <div class="input-group">
                                <div class="input-group-prepend mr-2">
                                    <a href="{{ $casis->kelas5semester1 ? url('/' . $casis->kelas5semester1) : '' }}" id="link_kelas5semester1"
                                        class="btn btn-primary @if(empty($casis->kelas5semester1)) disabled @endif"
                                        target="_blank">
                                        LIHAT
                                    </a>
                                </div>
                                <div class="mt-2">
                                    <input type="file" id="kelas5semester1" name="kelas5semester1"
                                        accept="image/jpeg, image/png, application/pdf">
                                </div>
                            </div>
                        </div>
                        <div class="mt-5">
                            <h4 class="card-title">Raport Kelas 5 Semester 2</h4>
                            <h6 class="card-subtitle text-dark mb-2">Fotokopi atau scan raport kelas 5 semester 2
                                dokter calon siswa</h6>
                            <div class="input-group">
                                <div class="input-group-prepend mr-2">
                                    <a href="{{ $casis->kelas5semester2 ? url('/' . $casis->kelas5semester2) : '' }}" id="link_kelas5semester2"
                                        class="btn btn-primary @if(empty($casis->kelas5semester2)) disabled @endif"
                                        target="_blank">
                                        LIHAT
                                    </a>
                                </div>
                                <div class="mt-2">
                                    <input type="file" id="kelas5semester2" name="kelas5semester2"
                                        accept="image/jpeg, image/png, application/pdf">
                                </div>
                            </div>
                        </div>
                        <div class="mt-5">
                            <h4 class="card-title">Raport Kelas 6 Semester 1</h4>
                            <h6 class="card-subtitle text-dark mb-2">Fotokopi atau scan raport kelas 6 semester 1</h6>
                            <div class="input-group">
                                <div class="input-group-prepend mr-2">
                                    <a href="{{ $casis->kelas6semester1 ? url('/' . $casis->kelas6semester1) : '' }}" id="link_kelas6semester1"
                                        class="btn btn-primary @if(empty($casis->kelas6semester1)) disabled @endif"
                                        target="_blank">
                                        LIHAT
                                    </a>
                                </div>
                                <div class="mt-2">
                                    <input type="file" id="kelas6semester1" name="kelas6semester1"
                                        accept="image/jpeg, image/png, application/pdf">
                                </div>
                            </div>
                        </div>
                        @endrole
                        @role('Calon Siswa SMA')
                        <div class="mt-5">
                            <h4 class="card-title">Raport Kelas 8 Semester 1</h4>
                            <h6 class="card-subtitle text-dark mb-2">Fotokopi atau scan raport kelas 8 semester 1</h6>
                            <div class="input-group">
                                <div class="input-group-prepend mr-2">
                                    <a href="{{ $casis->kelas8semester1 ? url('/' . $casis->kelas8semester1) : '' }}" id="link_kelas8semester1"
                                        class="btn btn-primary @if(empty($casis->kelas8semester1)) disabled @endif"
                                        target="_blank">
                                        LIHAT
                                    </a>
                                </div>
                                <div class="mt-2">
                                    <input type="file" id="kelas8semester1" name="kelas8semester1"
                                        accept="image/jpeg, image/png, application/pdf">
                                </div>
                            </div>
                        </div>
                        <div class="mt-5">
                            <h4 class="card-title">Raport Kelas 8 Semester 2</h4>
                            <h6 class="card-subtitle text-dark mb-2">Fotokopi atau scan raport kelas 8 semester 2</h6>
                            <div class="input-group">
                                <div class="input-group-prepend mr-2">
                                    <a href="{{ $casis->kelas8semester2 ? url('/' . $casis->kelas8semester2) : '' }}" id="link_kelas8semester2"
                                        class="btn btn-primary @if(empty($casis->kelas8semester2)) disabled @endif"
                                        target="_blank">
                                        LIHAT
                                    </a>
                                </div>
                                <div class="mt-2">
                                    <input type="file" id="kelas8semester2" name="kelas8semester2"
                                        accept="image/jpeg, image/png, application/pdf">
                                </div>
                            </div>
                        </div>
                        <div class="mt-5">
                            <h4 class="card-title">Raport Kelas 9 Semester 1</h4>
                            <h6 class="card-subtitle text-dark mb-2">Fotokopi atau scan raport kelas 9 semester 1</h6>
                            <div class="input-group">
                                <div class="input-group-prepend mr-2">
                                    <a href="{{ $casis->kelas9semester1 ? url('/' . $casis->kelas9semester1) : '' }}" id="link_kelas9semester1"
                                        class="btn btn-primary @if(empty($casis->kelas9semester1)) disabled @endif"
                                        target="_blank">
                                        LIHAT
                                    </a>
                                </div>
                                <div class="mt-2">
                                    <input type="file" id="kelas9semester1" name="kelas9semester1"
                                        accept="image/jpeg, image/png, application/pdf">
                                </div>
                            </div>
                        </div>
                        @endrole
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
                if (currentIndex > newIndex) {
                    return true;
                }

                // Simpan data halaman pertama
                if (currentIndex == 0) {
                    updateBiodata();
                } else 
                // Simpan data halaman kedua
                if (currentIndex == 1) {
                    updateDataOrtu();
                }
                return true;
            },
            onFinished: function (event, currentIndex) {
                $('#lengkapi-data').modal('show');
            }
        });

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

        $('#kebutuhan_khusus_siswa').change(function () {
            var kebutuhan_khusus_siswa = $(this).val();
            if (kebutuhan_khusus_siswa == 'YA') {
                $('#kebutuhan_khusus_siswa_ket').prop('disabled', false);
            } else {
                $('#kebutuhan_khusus_siswa_ket').val('');
                $('#kebutuhan_khusus_siswa_ket').prop('disabled', true);
            }
        });
        $('#no_kks').change(function () {
            var noKKS = $(this).val();
            if (noKKS == 'ADA') {
                $('#no_kks_ket').prop('disabled', false);
            } else {
                $('#no_kks_ket').val('');
                $('#no_kks_ket').prop('disabled', true);
            }
        });
        $('#no_kps').change(function () {
            var noKPS = $(this).val();
            if (noKPS == 'YA') {
                $('#no_kps_ket').prop('disabled', false);
            } else {
                $('#no_kps_ket').val('');
                $('#no_kps_ket').prop('disabled', true);
            }
        });
        $('#no_kip').change(function () {
            var noKIP = $(this).val();
            if (noKIP == 'YA') {
                $('#no_kip_ket').prop('disabled', false);
            } else {
                $('#no_kip_ket').val('');
                $('#no_kip_ket').prop('disabled', true);
            }
        });

        $('#foto').change(function () {
            var file_data = $(this)[0].files[0];
            uploadFile('foto', file_data, 'Foto');
        });
        $('#ktp_ayah').change(function () {
            var file_data = $(this)[0].files[0];
            uploadFile('ktp_ayah', file_data, 'KTP Ayah');
        });
        $('#ktp_ibu').change(function () {
            var file_data = $(this)[0].files[0];
            uploadFile('ktp_ibu', file_data, 'KTP Ibu');
        });
        $('#kk').change(function () {
            var file_data = $(this)[0].files[0];
            uploadFile('kk', file_data, 'Kartu Keluarga');
        });
        $('#akte').change(function () {
            var file_data = $(this)[0].files[0];
            uploadFile('akte', file_data, 'Akte Lahir');
        });
        $('#skd').change(function () {
            var file_data = $(this)[0].files[0];
            uploadFile('skd', file_data, 'SKD');
        });

        @role('Calon Siswa SMP')
        $('#kelas5semester1').change(function () {
            var file_data = $(this)[0].files[0];
            uploadFile('kelas5semester1', file_data, 'Raport Kelas 5 Semester 1');
        });
        $('#kelas5semester2').change(function () {
            var file_data = $(this)[0].files[0];
            uploadFile('kelas5semester2', file_data, 'Raport Kelas 5 Semester 2');
        });
        $('#kelas6semester1').change(function () {
            var file_data = $(this)[0].files[0];
            uploadFile('kelas6semester1', file_data, 'Raport Kelas 6 Semester 1');
        });
        @endrole

        @role('Calon Siswa SMA')
        $('#kelas8semester1').change(function () {
            var file_data = $(this)[0].files[0];
            uploadFile('kelas8semester1', file_data, 'Raport Kelas 8 Semester 1');
        });
        $('#kelas8semester2').change(function () {
            var file_data = $(this)[0].files[0];
            uploadFile('kelas8semester2', file_data, 'Raport Kelas 8 Semester 2');
        });
        $('#kelas9semester1').change(function () {
            var file_data = $(this)[0].files[0];
            uploadFile('kelas9semester1', file_data, 'Raport Kelas 9 Semester 1');
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
                jalan: $('#jalan').val(),
                rt: $('#rt').val(),
                rw: $('#rw').val(),
                desalurah: $('#desalurah').val(),
                kecamatan: $('#kecamatan').val(),
                kabkota: $('#kabkota').val(),
                kodepos: $('#kodepos').val(),
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
                    }
                    if (file_name === 'ktp_ayah') {
                        $('#link_ktp_ayah')
                            .attr('href', "{{ url('/') . '/' }}" + result.file)
                            .removeClass('disabled');
                    }
                    if (file_name === 'ktp_ibu') {
                        $('#link_ktp_ibu')
                            .attr('href', "{{ url('/') . '/' }}" + result.file)
                            .removeClass('disabled');
                    }
                    if (file_name === 'kk') {
                        $('#link_kk')
                            .attr('href', "{{ url('/') . '/' }}" + result.file)
                            .removeClass('disabled');
                    }
                    if (file_name === 'akte') {
                        $('#link_akte')
                            .attr('href', "{{ url('/') . '/' }}" + result.file)
                            .removeClass('disabled');
                    }
                    if (file_name === 'skd') {
                        $('#link_skd')
                            .attr('href', "{{ url('/') . '/' }}" + result.file)
                            .removeClass('disabled');
                    }
                    @role('Calon Siswa SMP')
                    if (file_name === 'kelas5semester1') {
                        $('#link_kelas5semester1')
                            .attr('href', "{{ url('/') . '/' }}" + result.file)
                            .removeClass('disabled');
                    }
                    if (file_name === 'kelas5semester2') {
                        $('#link_kelas5semester2')
                            .attr('href', "{{ url('/') . '/' }}" + result.file)
                            .removeClass('disabled');
                    }
                    if (file_name === 'kelas6semester1') {
                        $('#link_kelas6semester1')
                            .attr('href', "{{ url('/') . '/' }}" + result.file)
                            .removeClass('disabled');
                    }
                    @endrole
                    @role('Calon Siswa SMA')
                    if (file_name === 'kelas8semester1') {
                        $('#link_kelas8semester1')
                            .attr('href', "{{ url('/') . '/' }}" + result.file)
                            .removeClass('disabled');
                    }
                    if (file_name === 'kelas8semester2') {
                        $('#link_kelas8semester2')
                            .attr('href', "{{ url('/') . '/' }}" + result.file)
                            .removeClass('disabled');
                    }
                    if (file_name === 'kelas9semester1') {
                        $('#link_kelas9semester1')
                            .attr('href', "{{ url('/') . '/' }}" + result.file)
                            .removeClass('disabled');
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