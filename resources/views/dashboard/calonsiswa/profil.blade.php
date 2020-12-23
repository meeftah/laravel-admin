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
                            <div class="">
                                <div class="form-group row align-items-center mb-0">
                                    <label class="col-md-3 control-label col-form-label">
                                        Nama Peserta Didik
                                        <small>(Sesuai Akta Lahir)</small>
                                    </label>
                                    <div class="col-md-9 border-left pb-2 pt-2">
                                        <input type="text" class="form-control" name="nama" placeholder="NAMA LENGKAP"
                                            value="" style="text-transform:uppercase">
                                    </div>
                                </div>
                                <div class="form-group row align-items-center mb-0">
                                    <label class="col-md-3 control-label col-form-label mb-0">
                                        Jenis Kelamin
                                    </label>
                                    <div class="col-md-9 border-left pb-2 pt-2">
                                        <select name="jk" class="form-control select2-show-search"
                                            data-placeholder="PILIH JENIS KELAMIN">
                                            <option></option>
                                            <option value="L">LAKI-LAKI</option>
                                            <option value="P">PEREMPUAN</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row align-items-center mb-0">
                                    <label class="col-md-3 control-label col-form-label">
                                        NIK
                                        <small>(Nomor Induk Kependudukan)</small>
                                    </label>
                                    <div class="col-md-9 border-left pb-2 pt-2">
                                        <input type="text" class="form-control" maxlength="16" value=""
                                            placeholder="BERUPA ANGKA 16 DIGIT"
                                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                    </div>
                                </div>
                                <div class="form-group row align-items-center mb-0">
                                    <label class="col-md-3 control-label col-form-label">
                                        Tempat / Tgl Lahir
                                    </label>
                                    <div class="col-md-5 border-left pb-2 pt-2">
                                        <input type="text" class="form-control" value="" placeholder="TEMPAT LAHIR"
                                            style="text-transform:uppercase">
                                    </div>
                                    <div class="col-md-4 border-left pb-2 pt-2">
                                        <input type="text" class="form-control fc-datepicker"
                                            placeholder="TANGGAL/BULAN/TAHUN">
                                    </div>
                                </div>
                                <div class="form-group row align-items-center mb-0">
                                    <label class="col-sm-12 col-md-3 control-label col-form-label">
                                        Nomor Registrasi Akta Lahir
                                    </label>
                                    <div class="col-sm-12 col-md-9 border-left pb-2 pt-2">
                                        <input type="text" class="form-control" value="" placeholder="NO AKTA LAHIR">
                                    </div>
                                </div>
                                <div class="form-group row align-items-center mb-0">
                                    <label class="col-sm-12 col-md-3 control-label col-form-label">
                                        Agama
                                    </label>
                                    <div class="col-sm-12 col-md-9 border-left pb-2 pt-2">
                                        <select name="jk" class="form-control select2-show-search"
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
                                    <div class="col-sm-12 col-md-9 border-left pb-2 pt-2">
                                        <input type="text" class="form-control" value=""
                                            style="text-transform:uppercase"
                                            placeholder="TUNA NETRA / RUNGU / INDIGO / NARKOBA / AUTIS / LAINNYA (SEBUTKAN...)">
                                    </div>
                                </div>
                                <div class="form-group row align-items-center mb-0">
                                    <label class="col-12 control-label col-form-label">
                                        Alamat Sekarang
                                        <small>(Saat Sekolah)</small>
                                    </label>
                                </div>
                                <div class="form-group row align-items-center mb-0">
                                    <label class="col-sm-12 col-md-3 control-label col-form-label">
                                        Jalan
                                    </label>
                                    <div class="col-sm-12 col-md-9 border-left pb-2 pt-2">
                                        <input type="text" class="form-control" value="" placeholder="Alamat Lengkap">
                                    </div>
                                </div>
                                <div class="form-group row align-items-center mb-0">
                                    <label class="col-sm-12 col-md-3 control-label col-form-label">
                                        RT / RW
                                    </label>
                                    <div class="col-md-2 border-left pb-2 pt-2">
                                        <input type="text" class="form-control" value=""
                                            placeholder="3 DIGIT, CONTOH: 003"
                                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                    </div>
                                    <div class="col-md-2 border-left pb-2 pt-2">
                                        <input type="text" class="form-control" value=""
                                            placeholder="3 DIGIT, CONTOH: 016"
                                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                    </div>
                                </div>
                                <div class="form-group row align-items-center mb-0">
                                    <label class="col-sm-12 col-md-3 control-label col-form-label">
                                        Desa / Kelurahan
                                    </label>
                                    <div class="col-sm-12 col-md-9 border-left pb-2 pt-2">
                                        <input type="text" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="form-group row align-items-center mb-0">
                                    <label class="col-sm-12 col-md-3 control-label col-form-label">
                                        Kecamatan
                                    </label>
                                    <div class="col-sm-12 col-md-9 border-left pb-2 pt-2">
                                        <input type="text" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="form-group row align-items-center mb-0">
                                    <label class="col-sm-12 col-md-3 control-label col-form-label">
                                        Kabupaten / Kota
                                    </label>
                                    <div class="col-sm-12 col-md-9 border-left pb-2 pt-2">
                                        <input type="text" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="form-group row align-items-center mb-0">
                                    <label class="col-sm-12 col-md-3 control-label col-form-label">
                                        Kode Pos
                                    </label>
                                    <div class="col-sm-12 col-md-9 border-left pb-2 pt-2">
                                        <input type="text" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="form-group row align-items-center mb-0">
                                    <label class="col-sm-12 col-md-3 control-label col-form-label">
                                        Tempat Tinggal
                                    </label>
                                    <div class="col-sm-12 col-md-9 border-left pb-2 pt-2">

                                        <input type="text" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="form-group row align-items-center mb-0">
                                    <label class="col-sm-12 col-md-3 control-label col-form-label">
                                        Jenis Transportasi ke Sekolah
                                    </label>
                                    <div class="col-sm-12 col-md-9 border-left pb-2 pt-2">

                                        <input type="text" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="form-group row align-items-center mb-0">
                                    <label class="col-sm-12 col-md-3 control-label col-form-label">
                                        Nomor Telpon Rumah
                                    </label>
                                    <div class="col-sm-12 col-md-9 border-left pb-2 pt-2">
                                        <input type="text" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="form-group row align-items-center mb-0">
                                    <label class="col-sm-12 col-md-3 control-label col-form-label">
                                        Email
                                    </label>
                                    <div class="col-sm-12 col-md-9 border-left pb-2 pt-2">
                                        <input type="text" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="form-group row align-items-center mb-0">
                                    <label class="col-sm-12 col-md-3 control-label col-form-label">
                                        Nomor KKS
                                        <small>(Kartu Keluarga Sejahtera)</small>
                                    </label>
                                    <div class="col-sm-12 col-md-9 border-left pb-2 pt-2">
                                        <input type="text" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="form-group row align-items-center mb-0">
                                    <label class="col-sm-12 col-md-3 control-label col-form-label">
                                        Penerima KPS
                                        <small>(Kartu Perlin. Sosial)</small>
                                    </label>
                                    <div class="col-sm-12 col-md-9 border-left pb-2 pt-2">
                                        <input type="text" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="form-group row align-items-center mb-0">
                                    <label class="col-sm-12 col-md-3 control-label col-form-label">
                                        Penerima KIP
                                        <small>(Kartu Indonesia Pintar)</small>
                                    </label>
                                    <div class="col-sm-12 col-md-9 border-left pb-2 pt-2">
                                        <input type="text" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="form-group row align-items-center mb-0">
                                    <label class="col-sm-12 col-md-3 control-label col-form-label">
                                        Nama Tertera di KIP
                                    </label>
                                    <div class="col-sm-12 col-md-9 border-left pb-2 pt-2">
                                        <input type="text" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="form-group row align-items-center mb-0">
                                    <label class="col-sm-12 col-md-3 control-label col-form-label">
                                        Memiliki Surat Keterangan Miskin
                                    </label>
                                    <div class="col-sm-12 col-md-9 border-left pb-2 pt-2">
                                        <input type="text" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="form-group row align-items-center mb-0">
                                    <label class="col-sm-12 col-md-3 control-label col-form-label">
                                        Yatim / Yatim Piatu
                                    </label>
                                    <div class="col-sm-12 col-md-9 border-left pb-2 pt-2">
                                        <input type="text" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="form-group row align-items-center mb-0">
                                    <label class="col-sm-12 col-md-3 control-label col-form-label">
                                        Kondisi Belajar di Rumah
                                    </label>
                                    <div class="col-sm-12 col-md-9 border-left pb-2 pt-2">

                                        <input type="text" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="form-group row align-items-center mb-0">
                                    <label class="col-sm-12 col-md-3 control-label col-form-label">
                                        Kemampuan Baca Al-Qur'an
                                    </label>
                                    <div class="col-sm-12 col-md-9 border-left pb-2 pt-2">

                                        <input type="text" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="form-group row align-items-center mb-0">
                                    <label class="col-sm-12 col-md-3 control-label col-form-label">
                                        Olahraga (Minat / Bakat)
                                    </label>
                                    <div class="col-sm-12 col-md-9 border-left pb-2 pt-2">
                                        <input type="text" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="form-group row align-items-center mb-0">
                                    <label class="col-sm-12 col-md-3 control-label col-form-label">
                                        Kesenian (Minat / Bakat)
                                    </label>
                                    <div class="col-sm-12 col-md-9 border-left pb-2 pt-2">
                                        <input type="text" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="form-group row align-items-center mb-0">
                                    <label class="col-sm-12 col-md-3 control-label col-form-label">
                                        Hobby
                                    </label>
                                    <div class="col-sm-12 col-md-9 border-left pb-2 pt-2">
                                        <input type="text" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="form-group row align-items-center mb-0">
                                    <label class="col-sm-12 col-md-3 control-label col-form-label">
                                        Penyakit Yang Pernah Diderita
                                    </label>
                                    <div class="col-sm-12 col-md-9 border-left pb-2 pt-2">
                                        <input type="text" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="form-group row align-items-center mb-0">
                                    <label class="col-sm-12 col-md-3 control-label col-form-label">
                                        Tinggi Badan
                                    </label>
                                    <div class="col-sm-12 col-md-9 border-left pb-2 pt-2">
                                        <input type="text" class="form-control" value="" maxlength="3"
                                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                    </div>
                                </div>
                                <div class="form-group row align-items-center mb-0">
                                    <label class="col-sm-12 col-md-3 control-label col-form-label">
                                        Berat Badan
                                    </label>
                                    <div class="col-sm-12 col-md-9 border-left pb-2 pt-2">
                                        <input type="text" class="form-control" value="" maxlength="3"
                                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                    </div>
                                </div>
                                <div class="form-group row align-items-center mb-0">
                                    <label class="col-sm-12 col-md-3 control-label col-form-label">
                                        Jarak Tempat Tinggal ke Sekolah
                                    </label>
                                    <div class="col-sm-12 col-md-9 border-left pb-2 pt-2">

                                        <input type="text" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="form-group row align-items-center mb-0">
                                    <label class="col-sm-12 col-md-3 control-label col-form-label">
                                        Waktu Tempuh ke Sekolah
                                    </label>
                                    <div class="col-sm-12 col-md-9 border-left pb-2 pt-2">

                                        <input type="text" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="form-group row align-items-center mb-0">
                                    <label class="col-sm-12 col-md-3 control-label col-form-label">
                                        Jumlah Bersaudara
                                    </label>
                                    <div class="col-sm-12 col-md-9 border-left pb-2 pt-2">
                                        <input type="text" class="form-control" value=""
                                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                    </div>
                                </div>
                                <div class="form-group row align-items-center mb-0">
                                    <label class="col-sm-12 col-md-3 control-label col-form-label">
                                        Anak Ke
                                    </label>
                                    <div class="col-sm-12 col-md-9 border-left pb-2 pt-2">
                                        <input type="text" class="form-control" value=""
                                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                    </div>
                                </div>
                                <div class="form-group row align-items-center mb-0">
                                    <label class="col-sm-12 col-md-3 control-label col-form-label">
                                        Dari Berapa Bersaudara
                                    </label>
                                    <div class="col-sm-12 col-md-9 border-left pb-2 pt-2">
                                        <input type="text" class="form-control" value=""
                                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <h3>DATA ORANG TUA</h3>
                    <section>
                        <p>Wonderful transition effects.</p>
                    </section>
                    <h3>DOKUMEN</h3>
                    <section>
                        <p>The next and previous buttons help you to navigate through your content.</p>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<link href="{{ asset('assets/dashboard/lib/select2/css/select2.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/dashboard/lib/jquery.steps/jquery.steps.css') }}" rel="stylesheet">
@endpush

@push('scripts')
<script src="{{ asset('assets/dashboard/lib/select2/js/select2.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/lib/jquery.steps/jquery.steps.js') }}"></script>
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

      $('#jk').select2();

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
    });
</script>
@endpush