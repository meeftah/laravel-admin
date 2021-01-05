<div class="card mb-4">
    <div class="card-body">
        <div class="text-justify">
            Anda telah <strong class="text-success">Melengkapi Data Profil Calon Siswa</strong>.
            Silakan pantau berita terbaru dari {{ config('app.name') }} di halaman ini.
            Anda juga dapat mencetak kartu ujian serta formulir di halaman ini.
        </div>
    </div>
</div>

<div class="br-profile-page">
    <div class="card shadow-base bd-0 rounded-0 widget-4">
        <div class="card-body text-white">
            <div class="card-profile-img">
                <img src="{{ asset('assets/dashboard/img/img44.jpg') }}" alt="">
            </div>
            <h4 class="tx-normal tx-roboto tx-white" style="margin-top: 80px">{{ $casis->nm_siswa }}</h4>
            <p class="mg-b-25">{{ strtoupper(auth()->user()->getRoleNames()->implode('')) }}</p>
            @role('Calon Siswa TK')
            <p>{{ $casis->kelas }}</p>
            @endrole

            <p class="wd-md-500 mg-md-l-auto mg-md-r-auto mg-b-25">
                {{ $casis->jalan }} {{ $casis->rt }}{{ $casis->rw ? '/' . $casis->rw . ', ' : '' }}
                {{ $casis->desalurah ? $casis->desalurah . ', ' : '' }}
                {{ $casis->kecamatan ? $casis->kecamatan . ', ' : '' }}
                {{ $casis->kabkota ? $casis->kabkota : '' }} {{ $casis->kodepos }}
            </p>
        </div>
    </div>

    <div class="ht-70 bg-gray-100 pd-x-20 d-flex align-items-center justify-content-center shadow-base">
        <ul class="nav nav-outline active-info align-items-center flex-row" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#biodata" role="tab">
                    Biodata
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#dataortu" role="tab">
                    Data Orang Tua
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#dokumen" role="tab">
                    Dokumen
                </a>
            </li>
        </ul>
    </div>

    <div class="row mt-4">
        <div class="col-md-8 mb-4">
            <div class="bg-white rounded shadow-base p-4">
                <div class="tab-content">
                    <div class="tab-pane fade active show" id="biodata">
                        <div class="form-group row align-items-center mb-0">
                            <label class="col-md-3 control-label col-form-label">
                                Virtual Account
                            </label>
                            <div class="col-md-9 pb-2 pt-2">
                                <input type="text" class="form-control"
                                    value="{{ auth()->user()->getDataVaKu()->va ?? '-' }}" disabled>
                            </div>
                        </div>

                        <div class="form-group row align-items-center mb-0">
                            <label class="col-md-3 control-label col-form-label mb-0">
                                Jenis Kelamin
                            </label>
                            <div class="col-md-9 pb-2 pt-2">
                                <input type="text" class="form-control"
                                    value="{{ $casis->jk == 'L' ? 'LAKI-LAKI' : ($casis->jk == 'P' ? 'PEREMPUAN' : '-') }}"
                                    disabled>
                            </div>
                        </div>

                        @hasanyrole('Calon Siswa SMP|Calon Siswa SMA')
                        <div class="form-group row align-items-center mb-0">
                            <label class="col-md-3 control-label col-form-label">
                                NISN
                                <small>(Nomor Induk Siswa Nasional)</small>
                            </label>
                            <div class="col-md-9 pb-2 pt-2">
                                <input type="text" class="form-control" value="{{ $casis->nisn ?? '-' }}" disabled>
                            </div>
                        </div>
                        @endhasanyrole

                        <div class="form-group row align-items-center mb-0">
                            <label class="col-md-3 control-label col-form-label mb-0">
                                NIK
                                <small>(Nomor Induk Kependudukan)</small>
                            </label>
                            <div class="col-md-9 pb-2 pt-2">
                                <input type="text" class="form-control" value="{{ $casis->nik ?? '-' }}" disabled>
                            </div>
                        </div>

                        @role('Calon Siswa SMP')
                        <div class="form-group row align-items-center mb-0">
                            <label class="col-md-3 control-label col-form-label">
                                Nomor Seri Ijazah SD/MI
                            </label>
                            <div class="col-md-9 pb-2 pt-2">
                                <input type="text" class="form-control" value="{{ $casis->no_ijazah ?? '-' }}" disabled>
                            </div>
                        </div>

                        <div class="form-group row align-items-center mb-0">
                            <label class="col-md-3 control-label col-form-label">
                                Nomor seri SKHUN SD/MI
                            </label>
                            <div class="col-md-9 pb-2 pt-2">
                                <input type="text" class="form-control" value="{{ $casis->no_skhun ?? '-' }}" disabled>
                            </div>
                        </div>

                        <div class="form-group row align-items-center mb-0">
                            <label class="col-md-3 control-label col-form-label">
                                Nomor Ujian Nasional SD/MI
                            </label>
                            <div class="col-md-9 pb-2 pt-2">
                                <input type="text" class="form-control" value="{{ $casis->no_un ?? '-' }}" disabled>
                            </div>
                        </div>
                        @endrole

                        @role('Calon Siswa SMA')
                        <div class="form-group row align-items-center mb-0">
                            <label class="col-md-3 control-label col-form-label">
                                Nomor Seri Ijazah SMP/MTS
                            </label>
                            <div class="col-md-9 pb-2 pt-2">
                                <input type="text" class="form-control" value="{{ $casis->no_ijazah ?? '-' }}" disabled>
                            </div>
                        </div>
                        <div class="form-group row align-items-center mb-0">
                            <label class="col-md-3 control-label col-form-label">
                                Nomor seri SKHUN SMP/MTS
                            </label>
                            <div class="col-md-9 pb-2 pt-2">
                                <input type="text" class="form-control" value="{{ $casis->no_skhun ?? '-' }}" disabled>
                            </div>
                        </div>
                        <div class="form-group row align-items-center mb-0">
                            <label class="col-md-3 control-label col-form-label">
                                Nomor Ujian Nasional SMP/MTS
                            </label>
                            <div class="col-md-9 pb-2 pt-2">
                                <input type="text" class="form-control" value="{{ $casis->no_un ?? '-' }}" disabled>
                            </div>
                        </div>
                        @endrole

                        <div class="form-group row align-items-center mb-0">
                            <label class="col-md-3 control-label col-form-label mb-0">
                                Tempat / Tgl Lahir
                            </label>
                            <div class="col-md-9 pb-2 pt-2">
                                <input type="text" class="form-control"
                                    value="{{ trim($casis->tempat_lahir ? $casis->tempat_lahir . ', ' : '') }} {{ $casis->tgl_lahir->format('d/m/Y') }}"
                                    disabled>
                            </div>
                        </div>

                        <div class="form-group row align-items-center mb-0">
                            <label class="col-md-3 control-label col-form-label mb-0">
                                Nomor Registrasi Akta Lahir
                            </label>
                            <div class="col-md-9 pb-2 pt-2">
                                <input type="text" class="form-control" value="{{ $casis->no_akte_lahir ?? '-' }}"
                                    disabled>
                            </div>
                        </div>

                        <div class="form-group row align-items-center mb-0">
                            <label class="col-md-3 control-label col-form-label mb-0">
                                Agama
                            </label>
                            <div class="col-md-9 pb-2 pt-2">
                                <input type="text" class="form-control"
                                    value="{{ $casis->id_agama ? strtoupper(App\Models\Agama::getDataById($casis->id_agama)->agama) : '-' }}"
                                    disabled>
                            </div>
                        </div>

                        <div class="form-group row align-items-center mb-0">
                            <label class="col-md-3 control-label col-form-label mb-0">
                                Berkebutuhan Khusus
                            </label>
                            <div class="col-md-9 pb-2 pt-2">
                                <input type="text" class="form-control" value="{{ $casis->kebutuhan_khusus ?? '-' }}"
                                    disabled>
                            </div>
                        </div>

                        <div class="form-group row align-items-center mb-0">
                            <label class="col-md-3 control-label col-form-label mb-0">
                                Tempat Tinggal
                            </label>
                            <div class="col-md-9 pb-2 pt-2">
                                <input type="text" class="form-control"
                                    value="{{ $casis->id_tempattinggal ? strtoupper(App\Models\Tempattinggal::getDataById($casis->id_tempattinggal)->tempattinggal) : '-' }}"
                                    disabled>
                            </div>
                        </div>

                        <div class="form-group row align-items-center mb-0">
                            <label class="col-md-3 control-label col-form-label mb-0">
                                Jenis Transportasi ke Sekolah
                            </label>
                            <div class="col-md-9 pb-2 pt-2">
                                <input type="text" class="form-control" value="" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="dataortu">
                        data ortu
                    </div>
                    <div class="tab-pane fade" id="dokumen">
                        dokumen
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card pd-20 pd-xs-30 shadow-base bd-0">
                <h6 class="tx-gray-800 tx-uppercase tx-semibold tx-13 mg-b-25">Berita Terbaru</h6>

                belum ada berita terbaru
            </div>

            {{-- <div class="card mt-4 pd-20 pd-xs-30 shadow-base bd-0">
                <h6 class="tx-gray-800 tx-uppercase tx-semibold tx-13 mg-b-25">Berita Terbaru</h6>
            </div> --}}
        </div>
    </div>
</div>