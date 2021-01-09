<div class="card mb-4">
    <div class="card-body">
        <div class="text-justify">
            Anda telah <strong class="text-success">Melengkapi Data Profil Calon Siswa</strong>.
            Silakan pantau berita terbaru dari {{ config('app.name') }} di halaman ini.
            Untuk data yang sudah di isi dan berkas yang sudah di Upload akan kembali <strong class="text-danger">DIVALIDASI</strong> oleh panitia
            jika biodata dan berkas yang diupload sesuai dengan ketentuan panitia, maka status siswa akan berganti menjadi <strong class="text-success">SIAP TEST.</strong> Jika terdapat kekeliruan atau kesalahan data yang diimput, panitia akan menghubungi no whatssApp aktif pada saat registrasi.
        </div>
    </div>
</div>

<div class="br-profile-page">
    <div class="card shadow-base bd-0 rounded-0 widget-4">
        <div class="card-body text-white" style="padding-top: 40px">
            <div class="circular--portrait">
                <img src="{{ url('/' . $casis->foto) }}" alt="" class="cropcircle">
            </div>
            <h4 class="tx-normal tx-roboto tx-white" style="margin-top: 30px">{{ $casis->nm_siswa }}</h4>
            <p class="mg-b-25">{{ strtoupper(auth()->user()->getRoleNames()->implode('')) }}</p>
            @role(config('ppdb.peran.casis.tk'))
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

                        @hasanyrole('Calon Siswa SMP')
                        <div class="form-group row align-items-center mb-0">
                            <label class="col-md-3 control-label col-form-label">
                                Asal SD/MI
                            </label>
                            <div class="col-md-9 pb-2 pt-2">
                                <input type="text" class="form-control" value="{{ $casis->asal_sekolah ?? '-' }}"
                                    disabled>
                            </div>
                        </div>
                        @endhasanyrole

                        @hasanyrole('Calon Siswa SMA')
                        <div class="form-group row align-items-center mb-0">
                            <label class="col-md-3 control-label col-form-label">
                                Asal SMP/MTS
                            </label>
                            <div class="col-md-9 pb-2 pt-2">
                                <input type="text" class="form-control" value="{{ $casis->asal_sekolah ?? '-' }}"
                                    disabled>
                            </div>
                        </div>
                        @endhasanyrole

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
                                    value="{{ trim($casis->tempat_lahir ? $casis->tempat_lahir . ', ' : '') }} {{ $casis->tgl_lahir ? $casis->tgl_lahir->format('d/m/Y') : '' }}"
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
                                <input type="text" class="form-control"
                                    value="{{ $casis->id_transportasi ? strtoupper(App\Models\Transportasi::getDataById($casis->id_transportasi)->transportasi) : '-' }}"
                                    disabled>
                            </div>
                        </div>

                        <div class="form-group row align-items-center mb-0">
                            <label class="col-md-3 control-label col-form-label mb-0">
                                Nomor KKS
                                <small>(Kartu Keluarga Sejahtera)</small>
                            </label>
                            <div class="col-md-9 pb-2 pt-2">
                                <input type="text" class="form-control" value="{{ $casis->no_kks ?? '-' }}" disabled>
                            </div>
                        </div>

                        <div class="form-group row align-items-center mb-0">
                            <label class="col-md-3 control-label col-form-label mb-0">
                                Penerima KPS
                                <small>(Kartu Perlin. Sosial)</small>
                            </label>
                            <div class="col-md-9 pb-2 pt-2">
                                <input type="text" class="form-control" value="{{ $casis->no_kps ?? '-' }}" disabled>
                            </div>
                        </div>

                        <div class="form-group row align-items-center mb-0">
                            <label class="col-md-3 control-label col-form-label mb-0">
                                Penerima KIP
                                <small>(Kartu Indonesia Pintar)</small>
                            </label>
                            <div class="col-md-9 pb-2 pt-2">
                                <input type="text" class="form-control" value="{{ $casis->no_kip ?? '-' }}" disabled>
                            </div>
                        </div>

                        <div class="form-group row align-items-center mb-0">
                            <label class="col-md-3 control-label col-form-label mb-0">
                                Nama Tertera di KIP
                            </label>
                            <div class="col-md-9 pb-2 pt-2">
                                <input type="text" class="form-control" value="{{ $casis->nm_kip ?? '-' }}" disabled>
                            </div>
                        </div>

                        <div class="form-group row align-items-center mb-0">
                            <label class="col-md-3 control-label col-form-label mb-0">
                                Memiliki Surat Keterangan Miskin
                            </label>
                            <div class="col-md-9 pb-2 pt-2">
                                <input type="text" class="form-control"
                                    value="{{ $casis->suket_miskin ? 'YA' : 'TIDAK' }}" disabled>
                            </div>
                        </div>

                        <div class="form-group row align-items-center mb-0">
                            <label class="col-md-3 control-label col-form-label mb-0">
                                Yatim / Yatim Piatu
                            </label>
                            <div class="col-md-9 pb-2 pt-2">
                                <input type="text" class="form-control"
                                    value="{{ $casis->yatim_piatu ? 'YA' : 'TIDAK' }}" disabled>
                            </div>
                        </div>

                        <div class="form-group row align-items-center mb-0">
                            <label class="col-md-3 control-label col-form-label mb-0">
                                Kondisi Belajar di Rumah
                            </label>
                            <div class="col-md-9 pb-2 pt-2">
                                <input type="text" class="form-control"
                                    value="{{ $casis->id_kondisibelajar ? strtoupper(App\Models\Kondisibelajar::getDataById($casis->id_kondisibelajar)->kondisibelajar) : '-' }}"
                                    disabled>
                            </div>
                        </div>

                        <div class="form-group row align-items-center mb-0">
                            <label class="col-md-3 control-label col-form-label mb-0">
                                Kemampuan Baca Al-Qur'an
                            </label>
                            <div class="col-md-9 pb-2 pt-2">
                                <input type="text" class="form-control"
                                    value="{{ $casis->id_bcquran ? strtoupper(App\Models\Bcquran::getDataById($casis->id_bcquran)->bcquran) : '-' }}"
                                    disabled>
                            </div>
                        </div>

                        <div class="form-group row align-items-center mb-0">
                            <label class="col-md-3 control-label col-form-label mb-0">
                                Olahraga (Minat / Bakat)
                            </label>
                            <div class="col-md-9 pb-2 pt-2">
                                <input type="text" class="form-control" value="{{ $casis->olahraga ?? '-' }}" disabled>
                            </div>
                        </div>

                        <div class="form-group row align-items-center mb-0">
                            <label class="col-md-3 control-label col-form-label mb-0">
                                Kesenian (Minat / Bakat)
                            </label>
                            <div class="col-md-9 pb-2 pt-2">
                                <input type="text" class="form-control" value="{{ $casis->kesenian ?? '-' }}" disabled>
                            </div>
                        </div>

                        <div class="form-group row align-items-center mb-0">
                            <label class="col-md-3 control-label col-form-label mb-0">
                                Hobby
                            </label>
                            <div class="col-md-9 pb-2 pt-2">
                                <input type="text" class="form-control" value="{{ $casis->hobby ?? '-' }}" disabled>
                            </div>
                        </div>

                        <div class="form-group row align-items-center mb-0">
                            <label class="col-md-3 control-label col-form-label mb-0">
                                Penyakit Yang Pernah Diderita
                            </label>
                            <div class="col-md-9 pb-2 pt-2">
                                <input type="text" class="form-control" value="{{ $casis->penyakit ?? '-' }}" disabled>
                            </div>
                        </div>

                        <div class="form-group row align-items-center mb-0">
                            <label class="col-md-3 control-label col-form-label mb-0">
                                Tinggi Badan
                            </label>
                            <div class="col-md-9 pb-2 pt-2">
                                <input type="text" class="form-control"
                                    value="{{ $casis->tinggi_badan ? $casis->tinggi_badan . ' CM' : '-' }}" disabled>
                            </div>
                        </div>

                        <div class="form-group row align-items-center mb-0">
                            <label class="col-md-3 control-label col-form-label mb-0">
                                Berat Badan
                            </label>
                            <div class="col-md-9 pb-2 pt-2">
                                <input type="text" class="form-control"
                                    value="{{ $casis->berat_badan ? $casis->berat_badan . ' KG' : '-' }}" disabled>
                            </div>
                        </div>

                        <div class="form-group row align-items-center mb-0">
                            <label class="col-md-3 control-label col-form-label mb-0">
                                Jarak Tempat Tinggal ke Sekolah
                            </label>
                            <div class="col-md-9 pb-2 pt-2">
                                <input type="text" class="form-control"
                                    value="{{ $casis->id_jarak ? strtoupper(App\Models\Jarak::getDataById($casis->id_jarak)->jarak) : '-' }}"
                                    disabled>
                            </div>
                        </div>

                        <div class="form-group row align-items-center mb-0">
                            <label class="col-md-3 control-label col-form-label mb-0">
                                Waktu Tempuh ke Sekolah
                            </label>
                            <div class="col-md-9 pb-2 pt-2">
                                <input type="text" class="form-control"
                                    value="{{ $casis->id_waktutmph ? strtoupper(App\Models\Waktutmph::getDataById($casis->id_waktutmph)->waktutmph) : '-' }}"
                                    disabled>
                            </div>
                        </div>

                        <div class="form-group row align-items-center mb-0">
                            <label class="col-md-3 control-label col-form-label mb-0">
                                Kesenian (Minat / Bakat)
                            </label>
                            <div class="col-md-9 pb-2 pt-2">
                                <input type="text" class="form-control" value="{{ $casis->jumlah_saudara ?? '-' }}"
                                    disabled>
                            </div>
                        </div>

                        <div class="form-group row align-items-center mb-0">
                            <label class="col-md-3 control-label col-form-label mb-0">
                                Hobby
                            </label>
                            <div class="col-md-9 pb-2 pt-2">
                                <input type="text" class="form-control" value="{{ $casis->anak_ke ?? '-' }}" disabled>
                            </div>
                        </div>

                        <div class="form-group row align-items-center mb-0">
                            <label class="col-md-3 control-label col-form-label mb-0">
                                Penyakit Yang Pernah Diderita
                            </label>
                            <div class="col-md-9 pb-2 pt-2">
                                <input type="text" class="form-control" value="{{ $casis->dari_bersaudara ?? '-' }}"
                                    disabled>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="dataortu">
                        <div class="form-group row align-items-center mb-0">
                            <label class="col-md-3 control-label col-form-label mb-0">
                                Nama Ayah
                            </label>
                            <div class="col-md-9 pb-2 pt-2">
                                <input type="text" class="form-control" value="{{ $casis->nm_ayah ?? '-' }}" disabled>
                            </div>
                        </div>

                        <div class="form-group row align-items-center mb-0">
                            <label class="col-md-3 control-label col-form-label mb-0">
                                NIK Ayah
                            </label>
                            <div class="col-md-9 pb-2 pt-2">
                                <input type="text" class="form-control" value="{{ $casis->nik_ayah ?? '-' }}" disabled>
                            </div>
                        </div>

                        <div class="form-group row align-items-center mb-0">
                            <label class="col-md-3 control-label col-form-label mb-0">
                                Tahun Lahir Ayah
                            </label>
                            <div class="col-md-9 pb-2 pt-2">
                                <input type="text" class="form-control" value="{{ $casis->tahun_lahir_ayah ?? '-' }}"
                                    disabled>
                            </div>
                        </div>

                        <div class="form-group row align-items-center mb-0">
                            <label class="col-md-3 control-label col-form-label mb-0">
                                Pendidikan Terakhir Ayah
                            </label>
                            <div class="col-md-9 pb-2 pt-2">
                                <input type="text" class="form-control"
                                    value="{{ $casis->pendidikan_ayah ? strtoupper(App\Models\Pendidikan::getDataById($casis->pendidikan_ayah)->pendidikan) : '-' }}"
                                    disabled>
                            </div>
                        </div>

                        <div class="form-group row align-items-center mb-0">
                            <label class="col-md-3 control-label col-form-label mb-0">
                                Pekerjaan Terakhir Ayah
                            </label>
                            <div class="col-md-9 pb-2 pt-2">
                                <input type="text" class="form-control"
                                    value="{{ $casis->pekerjaan_ayah ? strtoupper(App\Models\Pekerjaan::getDataById($casis->pekerjaan_ayah)->pekerjaan) : '-' }}"
                                    disabled>
                            </div>
                        </div>

                        <div class="form-group row align-items-center mb-0">
                            <label class="col-md-3 control-label col-form-label mb-0">
                                Penghasilan Ayah
                            </label>
                            <div class="col-md-9 pb-2 pt-2">
                                <input type="text" class="form-control"
                                    value="{{ $casis->penghasilan_ayah ? strtoupper(App\Models\Penghasilan::getDataById($casis->penghasilan_ayah)->penghasilan) : '-' }}"
                                    disabled>
                            </div>
                        </div>

                        <div class="form-group row align-items-center mb-0">
                            <label class="col-md-3 control-label col-form-label mb-0">
                                No. HP/Whatsapp Ayah
                            </label>
                            <div class="col-md-9 pb-2 pt-2">
                                <input type="text" class="form-control" value="{{ $casis->nohp_ayah ?? '-' }}" disabled>
                            </div>
                        </div>

                        <div class="form-group row align-items-center mb-0">
                            <label class="col-md-3 control-label col-form-label mb-0">
                                Nama Ibu
                            </label>
                            <div class="col-md-9 pb-2 pt-2">
                                <input type="text" class="form-control" value="{{ $casis->nm_ibu ?? '-' }}" disabled>
                            </div>
                        </div>

                        <div class="form-group row align-items-center mb-0">
                            <label class="col-md-3 control-label col-form-label mb-0">
                                NIK Ibu
                            </label>
                            <div class="col-md-9 pb-2 pt-2">
                                <input type="text" class="form-control" value="{{ $casis->nik_ibu ?? '-' }}" disabled>
                            </div>
                        </div>

                        <div class="form-group row align-items-center mb-0">
                            <label class="col-md-3 control-label col-form-label mb-0">
                                Tahun Lahir Ibu
                            </label>
                            <div class="col-md-9 pb-2 pt-2">
                                <input type="text" class="form-control" value="{{ $casis->tahun_lahir_ibu ?? '-' }}"
                                    disabled>
                            </div>
                        </div>

                        <div class="form-group row align-items-center mb-0">
                            <label class="col-md-3 control-label col-form-label mb-0">
                                Pendidikan Terakhir Ibu
                            </label>
                            <div class="col-md-9 pb-2 pt-2">
                                <input type="text" class="form-control"
                                    value="{{ $casis->pendidikan_ibu ? strtoupper(App\Models\Pendidikan::getDataById($casis->pendidikan_ibu)->pendidikan) : '-' }}"
                                    disabled>
                            </div>
                        </div>

                        <div class="form-group row align-items-center mb-0">
                            <label class="col-md-3 control-label col-form-label mb-0">
                                Pekerjaan Terakhir Ibu
                            </label>
                            <div class="col-md-9 pb-2 pt-2">
                                <input type="text" class="form-control"
                                    value="{{ $casis->pekerjaan_ibu ? strtoupper(App\Models\Pekerjaan::getDataById($casis->pekerjaan_ibu)->pekerjaan) : '-' }}"
                                    disabled>
                            </div>
                        </div>

                        <div class="form-group row align-items-center mb-0">
                            <label class="col-md-3 control-label col-form-label mb-0">
                                Penghasilan Ibu
                            </label>
                            <div class="col-md-9 pb-2 pt-2">
                                <input type="text" class="form-control"
                                    value="{{ $casis->penghasilan_ibu ? strtoupper(App\Models\Penghasilan::getDataById($casis->penghasilan_ibu)->penghasilan) : '-' }}"
                                    disabled>
                            </div>
                        </div>

                        <div class="form-group row align-items-center mb-0">
                            <label class="col-md-3 control-label col-form-label mb-0">
                                No. HP/Whatsapp Ibu
                            </label>
                            <div class="col-md-9 pb-2 pt-2">
                                <input type="text" class="form-control" value="{{ $casis->nohp_ibu ?? '-' }}" disabled>
                            </div>
                        </div>

                        <div class="form-group row align-items-center mb-0">
                            <label class="col-md-3 control-label col-form-label mb-0">
                                Nama Wali
                            </label>
                            <div class="col-md-9 pb-2 pt-2">
                                <input type="text" class="form-control" value="{{ $casis->nm_wali ?? '-' }}" disabled>
                            </div>
                        </div>

                        <div class="form-group row align-items-center mb-0">
                            <label class="col-md-3 control-label col-form-label mb-0">
                                NIK Wali
                            </label>
                            <div class="col-md-9 pb-2 pt-2">
                                <input type="text" class="form-control" value="{{ $casis->nik_wali ?? '-' }}" disabled>
                            </div>
                        </div>

                        <div class="form-group row align-items-center mb-0">
                            <label class="col-md-3 control-label col-form-label mb-0">
                                Tahun Lahir Wali
                            </label>
                            <div class="col-md-9 pb-2 pt-2">
                                <input type="text" class="form-control" value="{{ $casis->tahun_lahir_wali ?? '-' }}"
                                    disabled>
                            </div>
                        </div>

                        <div class="form-group row align-items-center mb-0">
                            <label class="col-md-3 control-label col-form-label mb-0">
                                Pendidikan Terakhir Wali
                            </label>
                            <div class="col-md-9 pb-2 pt-2">
                                <input type="text" class="form-control"
                                    value="{{ $casis->pendidikan_wali ? strtoupper(App\Models\Pendidikan::getDataById($casis->pendidikan_wali)->pendidikan) : '-' }}"
                                    disabled>
                            </div>
                        </div>

                        <div class="form-group row align-items-center mb-0">
                            <label class="col-md-3 control-label col-form-label mb-0">
                                Pekerjaan Terakhir Wali
                            </label>
                            <div class="col-md-9 pb-2 pt-2">
                                <input type="text" class="form-control"
                                    value="{{ $casis->pekerjaan_wali ? strtoupper(App\Models\Pekerjaan::getDataById($casis->pekerjaan_wali)->pekerjaan) : '-' }}"
                                    disabled>
                            </div>
                        </div>

                        <div class="form-group row align-items-center mb-0">
                            <label class="col-md-3 control-label col-form-label mb-0">
                                Penghasilan Wali
                            </label>
                            <div class="col-md-9 pb-2 pt-2">
                                <input type="text" class="form-control"
                                    value="{{ $casis->penghasilan_wali ? strtoupper(App\Models\Penghasilan::getDataById($casis->penghasilan_wali)->penghasilan) : '-' }}"
                                    disabled>
                            </div>
                        </div>

                        <div class="form-group row align-items-center mb-0">
                            <label class="col-md-3 control-label col-form-label mb-0">
                                No. HP/Whatsapp Wali
                            </label>
                            <div class="col-md-9 pb-2 pt-2">
                                <input type="text" class="form-control" value="{{ $casis->nohp_wali ?? '-' }}" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="dokumen">
                        <div>
                            <h4 class="card-title">KTP Ayah</h4>
                            <h6 class="card-subtitle text-dark">Scan atau scan KTP / SIM /
                                Paspor ayah calon siswa</h6>
                            <div style="margin-top: 10px">
                                <a href="{{ $casis->ktp_ayah ? url('/' . $casis->ktp_ayah) : '' }}"
                                    class="btn btn-primary col-md-3"
                                    target="_blank">
                                    LIHAT
                                </a>
                            </div>
                        </div>

                        <hr>
                        <div class="mt-4">
                            <h4 class="card-title">KTP Ibu</h4>
                            <h6 class="card-subtitle text-dark">Scan atau scan KTP / SIM /
                                Paspor Ibu calon siswa</h6>
                            <div style="margin-top: 10px">
                                <a href="{{ $casis->ktp_ibu ? url('/' . $casis->ktp_ibu) : '' }}"
                                    class="btn btn-primary col-md-3"
                                    target="_blank">
                                    LIHAT
                                </a>
                            </div>
                        </div>

                        <hr>
                        <div class="mt-4">
                            <h4 class="card-title">Kartu Keluarga</h4>
                            <h6 class="card-subtitle text-dark">Scan Kartu Keluarga Siswa</h6>
                            <div style="margin-top: 10px">
                                <a href="{{ $casis->kk ? url('/' . $casis->kk) : '' }}"
                                    class="btn btn-primary col-md-3"
                                    target="_blank">
                                    LIHAT
                                </a>
                            </div>
                        </div>

                        <hr>
                        <div class="mt-4">
                            <h4 class="card-title">Akte Lahir</h4>
                            <h6 class="card-subtitle text-dark">Scan Akte Kelahiran</h6>
                            <div style="margin-top: 10px">
                                <a href="{{ $casis->akte ? url('/' . $casis->akte) : '' }}"
                                    class="btn btn-primary col-md-3"
                                    target="_blank">
                                    LIHAT
                                </a>
                            </div>
                        </div>

                        <hr>
                        <div class="mt-4">
                            <h4 class="card-title">Surat Keterangan Dokter</h4>
                            <h6 class="card-subtitle text-dark">Scan Surat Keterangan
                                dokter calon siswa</h6>
                            <div style="margin-top: 10px">
                                <a href="{{ $casis->skd ? url('/' . $casis->skd) : '' }}"
                                    class="btn btn-primary col-md-3"
                                    target="_blank">
                                    LIHAT
                                </a>
                            </div>
                        </div>

                      @role('Calon Siswa SMP')

                        <hr>
                        <div class="mt-4">
                            <h4 class="card-title">Raport Kelas 5 Semester 1</h4>
                            <h6 class="card-subtitle text-dark">Dokument pdf data raport kelas 5 smester 1</h6>
                            <div style="margin-top: 10px">
                                <a href="{{ $casis->kelas5semester1 ? url('/' . $casis->kelas5semester1) : '' }}"
                                    class="btn btn-primary col-md-3"
                                    target="_blank">
                                    LIHAT
                                </a>
                            </div>
                        </div>

                        <hr>
                        <div class="mt-4">
                            <h4 class="card-title">Raport Kelas 5 Semester 2</h4>
                            <h6 class="card-subtitle text-dark">Dokument pdf data raport kelas 5 smester 2</h6>
                            <div style="margin-top: 10px">
                                <a href="{{ $casis->kelas5semester2 ? url('/' . $casis->kelas5semester2) : '' }}"
                                    class="btn btn-primary col-md-3"
                                    target="_blank">
                                    LIHAT
                                </a>
                            </div>
                        </div>

                        <hr>
                        <div class="mt-4">
                            <h4 class="card-title">Raport Kelas 6 Semester 1</h4>
                            <h6 class="card-subtitle text-dark">Dokument pdf data raport kelas 6 smester 1</h6>
                            <div style="margin-top: 10px">
                                <a href="{{ $casis->kelas6semester1 ? url('/' . $casis->kelas6semester1) : '' }}"
                                    class="btn btn-primary col-md-3"
                                    target="_blank">
                                    LIHAT
                                </a>
                            </div>
                        </div>
                        @endrole
                        @role('Calon Siswa SMA')
                        <hr>
                        <div class="mt-4">
                            <h4 class="card-title">Raport Kelas 8 Semester 1</h4>
                            <h6 class="card-subtitle text-dark">Dokument pdf data raport kelas 8 smester 1</h6>
                            <div style="margin-top: 10px">
                                <a href="{{ $casis->kelas8semester1 ? url('/' . $casis->kelas8semester1) : '' }}"
                                    class="btn btn-primary col-md-3"
                                    target="_blank">
                                    LIHAT
                                </a>
                            </div>
                        </div>

                        <hr>
                        <div class="mt-4">
                            <h4 class="card-title">Raport Kelas 8 Semester 1</h4>
                            <h6 class="card-subtitle text-dark">Dokument pdf data raport kelas 8 smester 1</h6>
                            <div style="margin-top: 10px">
                                <a href="{{ $casis->kelas8semester2 ? url('/' . $casis->kelas8semester2) : '' }}"
                                    class="btn btn-primary col-md-3"
                                    target="_blank">
                                    LIHAT
                                </a>
                            </div>
                        </div>

                        <hr>
                        <div class="mt-4">
                            <h4 class="card-title">Raport Kelas 9 Semester 1</h4>
                            <h6 class="card-subtitle text-dark">Dokument pdf data raport kelas 9 smester 1</h6>
                            <div style="margin-top: 10px">
                                <a href="{{ $casis->kelas9semester1 ? url('/' . $casis->kelas9semester1) : '' }}"
                                    class="btn btn-primary col-md-3"
                                    target="_blank">
                                    LIHAT
                                </a>
                            </div>
                        </div>
                        @endrole

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

@push('styles')
<style>
    .circular--portrait {
        /* position: relative; */
        display: block;
        margin-left: auto;
        margin-right: auto;
        overflow: hidden;
        width: 200px;
        height: 200px;
        border-radius: 50%;
    }

    .circular--portrait img {
        width: 100%;
        height: auto;
        margin-top: -0px;
    }
</style>
@endpush