<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Agama;
use App\Models\Bcquran;
use App\Models\CasisSd;
use App\Models\CasisSma;
use App\Models\CasisSmp;
use App\Models\CasisTk;
use App\Models\DataOrtu;
use App\Models\Dokumensd;
use App\Models\Dokumensma;
use App\Models\Dokumensmp;
use App\Models\Dokumentk;
use App\Models\Jarak;
use App\Models\Jenisdokumen;
use App\Models\Kondisibelajar;
use App\Models\Pekerjaan;
use App\Models\Pendidikan;
use App\Models\Penghasilan;
use App\Models\StatusCasis;
use App\Models\Tempattinggal;
use App\Models\Transportasi;
use App\Models\Waktutmph;
use Carbon\Carbon;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;
use Image;

class ProfilCalonSiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Display siswa profile
     *
     * @return \Illuminate\Http\Response
     */
    public function profil()
    {
        abort_if(Gate::denies('profilcalonsiswa_lihat'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $statusSiswa = StatusCasis::getDataById(Auth::user()->getDataCasisKu()->id_status_casis)->status;
        if ($statusSiswa == config('status_ppdb.calon_siswa.terverifikasi')) {
            if (Auth::user()->hasRole('Calon Siswa TK')) {
                $casis = CasisTk::where('id_user', Auth::user()->id)
                    ->leftJoin('tbl_data_ortu', 'tbl_casis_tk.id_data_ortu', '=', 'tbl_data_ortu.id_data_ortu')
                    ->first();

                // Dokumen Siswa
                $casis->ktp_ayah = Dokumentk::where('id_casis_tk', $casis->id_casis_tk)->where('id_jenisdokumen_tk', '7dfc0b93-dfba-4988-a9c8-b4039210c045')->first()->dokumen ?? '';
                $casis->ktp_ibu = Dokumentk::where('id_casis_tk', $casis->id_casis_tk)->where('id_jenisdokumen_tk', '43fcd618-6f4b-46b5-bdbd-0f88bb49dad5')->first()->dokumen ?? '';
                $casis->kk = Dokumentk::where('id_casis_tk', $casis->id_casis_tk)->where('id_jenisdokumen_tk', '0ca3c7f4-5262-40c1-b2b5-4a375553daa0')->first()->dokumen ?? '';
                $casis->akte = Dokumentk::where('id_casis_tk', $casis->id_casis_tk)->where('id_jenisdokumen_tk', 'c58283e1-7254-4372-a27e-bc1d2fcfe4cd')->first()->dokumen ?? '';
                $casis->skd = Dokumentk::where('id_casis_tk', $casis->id_casis_tk)->where('id_jenisdokumen_tk', '79c9fb49-7fc9-497e-9802-b6e7de9d5cc3')->first()->dokumen ?? '';
            } else if (Auth::user()->hasRole('Calon Siswa SD')) {
                $casis = CasisSd::where('id_user', Auth::user()->id)
                    ->leftJoin('tbl_data_ortu', 'tbl_casis_sd.id_data_ortu', '=', 'tbl_data_ortu.id_data_ortu')
                    ->first();

                // Dokumen Siswa
                $casis->ktp_ayah = Dokumensd::where('id_casis_sd', $casis->id_casis_sd)->where('id_jenisdokumen_sd', '7dfc0b93-dfba-4988-a9c8-b4039210c045')->first()->dokumen ?? '';
                $casis->ktp_ibu = Dokumensd::where('id_casis_sd', $casis->id_casis_sd)->where('id_jenisdokumen_sd', '43fcd618-6f4b-46b5-bdbd-0f88bb49dad5')->first()->dokumen ?? '';
                $casis->kk = Dokumensd::where('id_casis_sd', $casis->id_casis_sd)->where('id_jenisdokumen_sd', '0ca3c7f4-5262-40c1-b2b5-4a375553daa0')->first()->dokumen ?? '';
                $casis->akte = Dokumensd::where('id_casis_sd', $casis->id_casis_sd)->where('id_jenisdokumen_sd', 'c58283e1-7254-4372-a27e-bc1d2fcfe4cd')->first()->dokumen ?? '';
                $casis->skd = Dokumensd::where('id_casis_sd', $casis->id_casis_sd)->where('id_jenisdokumen_sd', '79c9fb49-7fc9-497e-9802-b6e7de9d5cc3')->first()->dokumen ?? '';
            } else if (Auth::user()->hasRole('Calon Siswa SMP')) {
                $casis = CasisSmp::where('id_user', Auth::user()->id)
                    ->leftJoin('tbl_data_ortu', 'tbl_casis_smp.id_data_ortu', '=', 'tbl_data_ortu.id_data_ortu')
                    ->first();

                // Dokumen Siswa
                $casis->ktp_ayah = Dokumensmp::where('id_casis_smp', $casis->id_casis_smp)->where('id_jenisdokumen_smp', '7dfc0b93-dfba-4988-a9c8-b4039210c045')->first()->dokumen ?? '';
                $casis->ktp_ibu = Dokumensmp::where('id_casis_smp', $casis->id_casis_smp)->where('id_jenisdokumen_smp', '43fcd618-6f4b-46b5-bdbd-0f88bb49dad5')->first()->dokumen ?? '';
                $casis->kk = Dokumensmp::where('id_casis_smp', $casis->id_casis_smp)->where('id_jenisdokumen_smp', '0ca3c7f4-5262-40c1-b2b5-4a375553daa0')->first()->dokumen ?? '';
                $casis->akte = Dokumensmp::where('id_casis_smp', $casis->id_casis_smp)->where('id_jenisdokumen_smp', 'c58283e1-7254-4372-a27e-bc1d2fcfe4cd')->first()->dokumen ?? '';
                $casis->skd = Dokumensmp::where('id_casis_smp', $casis->id_casis_smp)->where('id_jenisdokumen_smp', '79c9fb49-7fc9-497e-9802-b6e7de9d5cc3')->first()->dokumen ?? '';
                $casis->kelas5semester1 = Dokumensmp::where('id_casis_smp', $casis->id_casis_smp)->where('id_jenisdokumen_smp', '7274cd7c-a6df-4bbd-82b3-ea4784a4318f')->first()->dokumen ?? '';
                $casis->kelas5semester2 = Dokumensmp::where('id_casis_smp', $casis->id_casis_smp)->where('id_jenisdokumen_smp', '90b72f46-27cf-4ebc-9ce8-df93816f10f7')->first()->dokumen ?? '';
                $casis->kelas6semester1 = Dokumensmp::where('id_casis_smp', $casis->id_casis_smp)->where('id_jenisdokumen_smp', '8d8a2ab1-eba0-4607-b021-3afd9453f536')->first()->dokumen ?? '';
            } else {
                $casis = CasisSma::where('id_user', Auth::user()->id)
                    ->leftJoin('tbl_data_ortu', 'tbl_casis_sma.id_data_ortu', '=', 'tbl_data_ortu.id_data_ortu')
                    ->first();

                // Dokumen Siswa
                $casis->ktp_ayah = Dokumensma::where('id_casis_sma', $casis->id_casis_sma)->where('id_jenisdokumen_sma', '7dfc0b93-dfba-4988-a9c8-b4039210c045')->first()->dokumen ?? '';
                $casis->ktp_ibu = Dokumensma::where('id_casis_sma', $casis->id_casis_sma)->where('id_jenisdokumen_sma', '43fcd618-6f4b-46b5-bdbd-0f88bb49dad5')->first()->dokumen ?? '';
                $casis->kk = Dokumensma::where('id_casis_sma', $casis->id_casis_sma)->where('id_jenisdokumen_sma', '0ca3c7f4-5262-40c1-b2b5-4a375553daa0')->first()->dokumen ?? '';
                $casis->akte = Dokumensma::where('id_casis_sma', $casis->id_casis_sma)->where('id_jenisdokumen_sma', 'c58283e1-7254-4372-a27e-bc1d2fcfe4cd')->first()->dokumen ?? '';
                $casis->skd = Dokumensma::where('id_casis_sma', $casis->id_casis_sma)->where('id_jenisdokumen_sma', '79c9fb49-7fc9-497e-9802-b6e7de9d5cc3')->first()->dokumen ?? '';
                $casis->kelas8semester1 = Dokumensma::where('id_casis_sma', $casis->id_casis_sma)->where('id_jenisdokumen_sma', 'e939bcab-5053-4c0f-b5ce-9e22e19eeaac')->first()->dokumen ?? '';
                $casis->kelas8semester2 = Dokumensma::where('id_casis_sma', $casis->id_casis_sma)->where('id_jenisdokumen_sma', 'ff3b5ecc-c823-46df-9621-770134fd4e71')->first()->dokumen ?? '';
                $casis->kelas9semester1 = Dokumensma::where('id_casis_sma', $casis->id_casis_sma)->where('id_jenisdokumen_sma', 'bb6bab39-cfed-4016-98ab-f69b59a500f9')->first()->dokumen ?? '';
            }

            $agama = Agama::orderBy('kode', 'ASC')->get();
            $jarak = Jarak::orderBy('kode', 'ASC')->get();
            $tempattinggal = Tempattinggal::orderBy('kode', 'ASC')->get();
            $transportasi = Transportasi::orderBy('kode', 'ASC')->get();
            $waktutmph = Waktutmph::orderBy('kode', 'ASC')->get();
            $bcquran = Bcquran::orderBy('kode', 'ASC')->get();
            $kondisibelajar = Kondisibelajar::orderBy('kode', 'ASC')->get();
            $pendidikan = Pendidikan::orderBy('kode', 'ASC')->get();
            $pekerjaan = Pekerjaan::orderBy('kode', 'ASC')->get();
            $penghasilan = Penghasilan::orderBy('kode', 'ASC')->get();
            $jenisdokumen = Jenisdokumen::orderBy('jenisdokumen', 'ASC')->get();

            return view('dashboard.profilcalonsiswa.index', compact('casis', 'agama', 'jarak', 'tempattinggal', 'transportasi', 'waktutmph', 'bcquran', 'kondisibelajar', 'pendidikan', 'pekerjaan', 'penghasilan', 'jenisdokumen'));
        } else {
            return redirect()->route('dashboard.home');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function updateBiodata(Request $request)
    {
        abort_if(Gate::denies('profilcalonsiswa_ubah'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $updateBiodata = Auth::user()->getDataCasisKu();

        if (Auth::user()->hasAnyRole(['Calon Siswa SMP', 'Calon Siswa SMA'])) {
            $updateBiodata->nisn = $request->nisn ?? null;
            $updateBiodata->no_ijazah = $request->no_ijazah ?? null;
            $updateBiodata->no_skhun = $request->no_skhun ?? null;
            $updateBiodata->no_un = $request->no_un ?? null;
        }

        $updateBiodata->nm_siswa = $request->nm_siswa ? strtoupper($request->nm_siswa) : null;
        $updateBiodata->jk = $request->jk ?? null;
        $updateBiodata->nik = $request->nik ?? null;
        $updateBiodata->tempat_lahir = $request->tempat_lahir ? strtoupper($request->tempat_lahir) : null;
        $updateBiodata->tgl_lahir = $request->tgl_lahir ? Carbon::createFromFormat('d/m/Y', $request->tgl_lahir)->format('Y-m-d') : null;
        $updateBiodata->no_akte_lahir = $request->no_akte_lahir ?? null;
        $updateBiodata->id_agama = $request->id_agama ?? null;
        $updateBiodata->kebutuhan_khusus = $request->kebutuhan_khusus_siswa ? strtoupper($request->kebutuhan_khusus_siswa) : null;
        $updateBiodata->jalan = $request->jalan ? strtoupper($request->jalan) : null;
        $updateBiodata->rt = $request->rt ?? null;
        $updateBiodata->rw = $request->rw ?? null;
        $updateBiodata->desalurah = $request->desalurah ? strtoupper($request->desalurah) : null;
        $updateBiodata->kecamatan = $request->kecamatan ? strtoupper($request->kecamatan) : null;
        $updateBiodata->kabkota = $request->kabkota ? strtoupper($request->kabkota) : null;
        $updateBiodata->kodepos = $request->kodepos ?? null;
        $updateBiodata->id_tempattinggal = $request->id_tempattinggal ?? null;
        $updateBiodata->id_transportasi = $request->id_transportasi ?? null;
        $updateBiodata->no_kks = $request->no_kks ?? null;
        $updateBiodata->no_kps = $request->no_kps ?? null;
        $updateBiodata->no_kip = $request->no_kip ?? null;
        $updateBiodata->nm_kip = $request->nm_kip ? strtoupper($request->nm_kip) : null;
        $updateBiodata->suket_miskin = $request->suket_miskin == 'YA' ? 1 : ($request->suket_miskin == 'TIDAK' ? 0 : null);
        $updateBiodata->yatim_piatu = $request->yatim_piatu == 'YA' ? 1 : ($request->yatim_piatu == 'TIDAK' ? 0 : null);
        $updateBiodata->id_kondisibelajar = $request->id_kondisibelajar ?? null;
        $updateBiodata->id_bcquran = $request->id_bcquran ?? null;
        $updateBiodata->olahraga = $request->olahraga ? strtoupper($request->olahraga) : null;
        $updateBiodata->kesenian = $request->kesenian ? strtoupper($request->kesenian) : null;
        $updateBiodata->hobby = $request->hobby ? strtoupper($request->hobby) : null;
        $updateBiodata->penyakit = $request->penyakit ? strtoupper($request->penyakit) : null;
        $updateBiodata->tinggi_badan = $request->tinggi_badan ?? null;
        $updateBiodata->berat_badan = $request->berat_badan ?? null;
        $updateBiodata->id_jarak = $request->id_jarak ?? null;
        $updateBiodata->id_waktutmph = $request->id_waktutmph ?? null;
        $updateBiodata->jumlah_saudara = $request->jumlah_saudara ?? null;
        $updateBiodata->anak_ke = $request->anak_ke ?? null;
        $updateBiodata->dari_bersaudara = $request->dari_bersaudara ?? null;

        if ($updateBiodata->save()) {
            return json_encode(array(
                'status' => true,
                'message' => 'Berhasil menyimpan biodata',
            ));
        } else {
            return json_encode(array(
                'status' => false,
                'message' => 'Gagal menyimpan biodata',
            ));
        }
    }

    public function updateDataOrtu(Request $request)
    {
        abort_if(Gate::denies('profilcalonsiswa_ubah'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if (Auth::user()->getDataCasisKu()->id_data_ortu) {
            $updateDataOrtu = DataOrtu::where('id_data_ortu', Auth::user()->getDataCasisKu()->id_data_ortu)->first();
        } else {
            $updateDataOrtu = new DataOrtu();
        }

        $updateDataOrtu->nm_ayah = $request->nm_ayah ? strtoupper($request->nm_ayah) : null;
        $updateDataOrtu->nik_ayah = $request->nik_ayah ?? null;
        $updateDataOrtu->tahun_lahir_ayah = $request->tahun_lahir_ayah ?? null;
        $updateDataOrtu->pekerjaan_ayah = $request->pekerjaan_ayah ?? null;
        $updateDataOrtu->penghasilan_ayah = $request->penghasilan_ayah ?? null;
        $updateDataOrtu->pendidikan_ayah = $request->pendidikan_ayah ?? null;
        $updateDataOrtu->nohp_ayah = $request->nohp_ayah ?? null;
        $updateDataOrtu->nm_ibu = $request->nm_ibu ? strtoupper($request->nm_ibu) : null;
        $updateDataOrtu->nik_ibu = $request->nik_ibu ?? null;
        $updateDataOrtu->tahun_lahir_ibu = $request->tahun_lahir_ibu ?? null;
        $updateDataOrtu->pekerjaan_ibu = $request->pekerjaan_ibu ?? null;
        $updateDataOrtu->penghasilan_ibu = $request->penghasilan_ibu ?? null;
        $updateDataOrtu->pendidikan_ibu = $request->pendidikan_ibu ?? null;
        $updateDataOrtu->nohp_ibu = $request->nohp_ibu ?? null;
        $updateDataOrtu->nm_wali = $request->nm_wali ? strtoupper($request->nm_wali) : null;
        $updateDataOrtu->nik_wali = $request->nik_wali ?? null;
        $updateDataOrtu->tahun_lahir_wali = $request->tahun_lahir_wali ?? null;
        $updateDataOrtu->pekerjaan_wali = $request->pekerjaan_wali ?? null;
        $updateDataOrtu->penghasilan_wali = $request->penghasilan_wali ?? null;
        $updateDataOrtu->pendidikan_wali = $request->pendidikan_wali ?? null;
        $updateDataOrtu->nohp_wali = $request->nohp_wali ?? null;

        if ($updateDataOrtu->save()) {
            if (!Auth::user()->getDataCasisKu()->id_data_ortu) {
                $updateIdDataOrtu = Auth::user()->getDataCasisKu();
                $updateIdDataOrtu->id_data_ortu = $updateDataOrtu->id_data_ortu;
                $updateIdDataOrtu->save();
            }

            return json_encode(array(
                'status' => true,
                'message' => 'Berhasil menyimpan data orang tua',
            ));
        } else {
            return json_encode(array(
                'status' => false,
                'message' => 'Gagal menyimpan data orang tua',
            ));
        }
    }

    public function updateDokumen(Request $request)
    {
        abort_if(Gate::denies('profilcalonsiswa_ubah'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if (Auth::user()->hasRole('Calon Siswa TK')) {
            $idCasis = CasisTk::where('id_user', Auth::user()->id)->first()->id_casis_tk;

            // ---------- KTP AYAH
            if ($request->hasFile('ktp_ayah')) {
                // cek apakah ada upload file ktp ayah sebelumnya? jika ada maka update, jika tidak maka input baru
                $updateKTPAyah = Dokumentk::where('id_casis_tk', $idCasis)
                    ->where('id_jenisdokumen_tk', '7dfc0b93-dfba-4988-a9c8-b4039210c045')
                    ->first();
                if (!$updateKTPAyah) {
                    $updateKTPAyah = new Dokumentk();
                    $updateKTPAyah->id_casis_tk = $idCasis;
                    $updateKTPAyah->id_jenisdokumen_tk = '7dfc0b93-dfba-4988-a9c8-b4039210c045';
                }

                // jika ada file yang lama maka hapus
                if (Storage::disk('casis')->exists($updateKTPAyah->dokumen)) {
                    Storage::disk('casis')->delete($updateKTPAyah->dokumen);
                }

                // upload file
                $img = $request->file('ktp_ayah');
                $image = Image::make($img->getRealPath());
                $fileName = Auth::user()->getDataVaKu()->va . '_ktp_ayah' . '.' . $img->getClientOriginalExtension();
                $upload = Storage::disk('casis')->put('dokumen/' . Carbon::now()->year . '/calonsiswa/tk/' . Auth::user()->getDataVaKu()->va . '/' . $fileName, $image->encode());
                if ($upload) {
                    $updateKTPAyah->dokumen = 'storage/casis/dokumen/' . Carbon::now()->year . '/calonsiswa/tk/' . Auth::user()->getDataVaKu()->va . '/'  . $fileName;
                    $file = 'storage/casis/dokumen/' . Carbon::now()->year . '/calonsiswa/tk/' . Auth::user()->getDataVaKu()->va . '/'  . $fileName;
                }

                if ($updateKTPAyah->save()) {
                    return json_encode(array(
                        'status' => true,
                        'file' => $file
                    ));
                } else {
                    return json_encode(array(
                        'status' => false,
                    ));
                };
            }

            // ---------- KTP IBU
            if ($request->hasFile('ktp_ibu')) {
                $updateKTPIbu = Dokumentk::where('id_casis_tk', $idCasis)
                    ->where('id_jenisdokumen_tk', '43fcd618-6f4b-46b5-bdbd-0f88bb49dad5')
                    ->first();
                if (!$updateKTPIbu) {
                    $updateKTPIbu = new Dokumentk();
                    $updateKTPIbu->id_casis_tk = $idCasis;
                    $updateKTPIbu->id_jenisdokumen_tk = '43fcd618-6f4b-46b5-bdbd-0f88bb49dad5';
                }

                // jika ada file yang lama maka hapus
                if (Storage::disk('casis')->exists($updateKTPIbu->dokumen)) {
                    Storage::disk('casis')->delete($updateKTPIbu->dokumen);
                }

                // upload file
                $img = $request->file('ktp_ibu');
                $image = Image::make($img->getRealPath());
                $fileName = Auth::user()->getDataVaKu()->va . '_ktp_ibu' . '.' . $img->getClientOriginalExtension();
                $upload = Storage::disk('casis')->put('dokumen/' . Carbon::now()->year . '/calonsiswa/tk/' . Auth::user()->getDataVaKu()->va . '/' . $fileName, $image->encode());
                if ($upload) {
                    $updateKTPIbu->dokumen = 'storage/casis/dokumen/' . Carbon::now()->year . '/calonsiswa/tk/' . Auth::user()->getDataVaKu()->va . '/'  . $fileName;
                    $file = 'storage/casis/dokumen/' . Carbon::now()->year . '/calonsiswa/tk/' . Auth::user()->getDataVaKu()->va . '/'  . $fileName;
                }

                if ($updateKTPIbu->save()) {
                    return json_encode(array(
                        'status' => true,
                        'file' => $file
                    ));
                } else {
                    return json_encode(array(
                        'status' => false,
                    ));
                };
            }

            // ---------- Kartu Keluarga
            if ($request->hasFile('kk')) {
                $updateKK = Dokumentk::where('id_casis_tk', $idCasis)
                    ->where('id_jenisdokumen_tk', '0ca3c7f4-5262-40c1-b2b5-4a375553daa0')
                    ->first();
                if (!$updateKK) {
                    $updateKK = new Dokumentk();
                    $updateKK->id_casis_tk = $idCasis;
                    $updateKK->id_jenisdokumen_tk = '0ca3c7f4-5262-40c1-b2b5-4a375553daa0';
                }

                // jika ada file yang lama maka hapus
                if (Storage::disk('casis')->exists($updateKK->dokumen)) {
                    Storage::disk('casis')->delete($updateKK->dokumen);
                }

                // upload file
                $img = $request->file('kk');
                $image = Image::make($img->getRealPath());
                $fileName = Auth::user()->getDataVaKu()->va . '_kk' . '.' . $img->getClientOriginalExtension();
                $upload = Storage::disk('casis')->put('dokumen/' . Carbon::now()->year . '/calonsiswa/tk/' . Auth::user()->getDataVaKu()->va . '/' . $fileName, $image->encode());
                if ($upload) {
                    $updateKK->dokumen = 'storage/casis/dokumen/' . Carbon::now()->year . '/calonsiswa/tk/' . Auth::user()->getDataVaKu()->va . '/'  . $fileName;
                    $file = 'storage/casis/dokumen/' . Carbon::now()->year . '/calonsiswa/tk/' . Auth::user()->getDataVaKu()->va . '/'  . $fileName;
                }

                if ($updateKK->save()) {
                    return json_encode(array(
                        'status' => true,
                        'file' => $file
                    ));
                } else {
                    return json_encode(array(
                        'status' => false,
                    ));
                };
            }

            // ---------- Akte Lahir
            if ($request->hasFile('akte')) {
                $updateAkte = Dokumentk::where('id_casis_tk', $idCasis)
                    ->where('id_jenisdokumen_tk', 'c58283e1-7254-4372-a27e-bc1d2fcfe4cd')
                    ->first();
                if (!$updateAkte) {
                    $updateAkte = new Dokumentk();
                    $updateAkte->id_casis_tk = $idCasis;
                    $updateAkte->id_jenisdokumen_tk = 'c58283e1-7254-4372-a27e-bc1d2fcfe4cd';
                }

                // jika ada file yang lama maka hapus
                if (Storage::disk('casis')->exists($updateAkte->dokumen)) {
                    Storage::disk('casis')->delete($updateAkte->dokumen);
                }

                // upload file
                $img = $request->file('akte');
                $image = Image::make($img->getRealPath());
                $fileName = Auth::user()->getDataVaKu()->va . '_akte' . '.' . $img->getClientOriginalExtension();
                $upload = Storage::disk('casis')->put('dokumen/' . Carbon::now()->year . '/calonsiswa/tk/' . Auth::user()->getDataVaKu()->va . '/' . $fileName, $image->encode());
                if ($upload) {
                    $updateAkte->dokumen = 'storage/casis/dokumen/' . Carbon::now()->year . '/calonsiswa/tk/' . Auth::user()->getDataVaKu()->va . '/'  . $fileName;
                    $file = 'storage/casis/dokumen/' . Carbon::now()->year . '/calonsiswa/tk/' . Auth::user()->getDataVaKu()->va . '/'  . $fileName;
                }

                if ($updateAkte->save()) {
                    return json_encode(array(
                        'status' => true,
                        'file' => $file
                    ));
                } else {
                    return json_encode(array(
                        'status' => false,
                    ));
                };
            }

            // ---------- Surat Keterangan Dokter
            if ($request->hasFile('skd')) {
                $updateSkd = Dokumentk::where('id_casis_tk', $idCasis)
                    ->where('id_jenisdokumen_tk', '79c9fb49-7fc9-497e-9802-b6e7de9d5cc3')
                    ->first();
                if (!$updateSkd) {
                    $updateSkd = new Dokumentk();
                    $updateSkd->id_casis_tk = $idCasis;
                    $updateSkd->id_jenisdokumen_tk = '79c9fb49-7fc9-497e-9802-b6e7de9d5cc3';
                }

                // jika ada file yang lama maka hapus
                if (Storage::disk('casis')->exists($updateSkd->dokumen)) {
                    Storage::disk('casis')->delete($updateSkd->dokumen);
                }

                // upload file
                $img = $request->file('skd');
                $image = Image::make($img->getRealPath());
                $fileName = Auth::user()->getDataVaKu()->va . '_skd' . '.' . $img->getClientOriginalExtension();
                $upload = Storage::disk('casis')->put('dokumen/' . Carbon::now()->year . '/calonsiswa/tk/' . Auth::user()->getDataVaKu()->va . '/' . $fileName, $image->encode());
                if ($upload) {
                    $updateSkd->dokumen = 'storage/casis/dokumen/' . Carbon::now()->year . '/calonsiswa/tk/' . Auth::user()->getDataVaKu()->va . '/'  . $fileName;
                    $file = 'storage/casis/dokumen/' . Carbon::now()->year . '/calonsiswa/tk/' . Auth::user()->getDataVaKu()->va . '/'  . $fileName;
                }

                if ($updateSkd->save()) {
                    return json_encode(array(
                        'status' => true,
                        'file' => $file
                    ));
                } else {
                    return json_encode(array(
                        'status' => false,
                    ));
                };
            }
        } else if (Auth::user()->hasRole('Calon Siswa SD')) {
            $idCasis = CasisSd::where('id_user', Auth::user()->id)->first()->id_casis_sd;

            // ---------- KTP AYAH
            if ($request->hasFile('ktp_ayah')) {
                $updateKTPAyah = Dokumensd::where('id_casis_sd', $idCasis)
                    ->where('id_jenisdokumen_sd', '7dfc0b93-dfba-4988-a9c8-b4039210c045')
                    ->first();
                if (!$updateKTPAyah) {
                    $updateKTPAyah = new Dokumensd();
                    $updateKTPAyah->id_casis_sd = $idCasis;
                    $updateKTPAyah->id_jenisdokumen_sd = '7dfc0b93-dfba-4988-a9c8-b4039210c045';
                }

                // jika ada file yang lama maka hapus
                if (Storage::disk('casis')->exists($updateKTPAyah->dokumen)) {
                    Storage::disk('casis')->delete($updateKTPAyah->dokumen);
                }

                // upload file
                $img = $request->file('ktp_ayah');
                $image = Image::make($img->getRealPath());
                $fileName = Auth::user()->getDataVaKu()->va . '_ktp_ayah' . '.' . $img->getClientOriginalExtension();
                $upload = Storage::disk('casis')->put('dokumen/' . Carbon::now()->year . '/calonsiswa/sd/' . Auth::user()->getDataVaKu()->va . '/' . $fileName, $image->encode());
                if ($upload) {
                    $updateKTPAyah->dokumen = 'storage/casis/dokumen/' . Carbon::now()->year . '/calonsiswa/sd/' . Auth::user()->getDataVaKu()->va . '/'  . $fileName;
                    $file = 'storage/casis/dokumen/' . Carbon::now()->year . '/calonsiswa/sd/' . Auth::user()->getDataVaKu()->va . '/'  . $fileName;
                }

                if ($updateKTPAyah->save()) {
                    return json_encode(array(
                        'status' => true,
                        'file' => $file
                    ));
                } else {
                    return json_encode(array(
                        'status' => false,
                    ));
                };
            }

            // ---------- KTP IBU
            if ($request->hasFile('ktp_ibu')) {
                $updateKTPIbu = Dokumensd::where('id_casis_sd', $idCasis)
                    ->where('id_jenisdokumen_sd', '43fcd618-6f4b-46b5-bdbd-0f88bb49dad5')
                    ->first();
                if (!$updateKTPIbu) {
                    $updateKTPIbu = new Dokumensd();
                    $updateKTPIbu->id_casis_sd = $idCasis;
                    $updateKTPIbu->id_jenisdokumen_sd = '43fcd618-6f4b-46b5-bdbd-0f88bb49dad5';
                }

                // jika ada file yang lama maka hapus
                if (Storage::disk('casis')->exists($updateKTPIbu->dokumen)) {
                    Storage::disk('casis')->delete($updateKTPIbu->dokumen);
                }

                // upload file
                $img = $request->file('ktp_ibu');
                $image = Image::make($img->getRealPath());
                $fileName = Auth::user()->getDataVaKu()->va . '_ktp_ibu' . '.' . $img->getClientOriginalExtension();
                $upload = Storage::disk('casis')->put('dokumen/' . Carbon::now()->year . '/calonsiswa/sd/' . Auth::user()->getDataVaKu()->va . '/' . $fileName, $image->encode());
                if ($upload) {
                    $updateKTPIbu->dokumen = 'storage/casis/dokumen/' . Carbon::now()->year . '/calonsiswa/sd/' . Auth::user()->getDataVaKu()->va . '/'  . $fileName;
                    $file = 'storage/casis/dokumen/' . Carbon::now()->year . '/calonsiswa/sd/' . Auth::user()->getDataVaKu()->va . '/'  . $fileName;
                }

                if ($updateKTPIbu->save()) {
                    return json_encode(array(
                        'status' => true,
                        'file' => $file
                    ));
                } else {
                    return json_encode(array(
                        'status' => false,
                    ));
                };
            }

            // ---------- Kartu Keluarga
            if ($request->hasFile('kk')) {
                $updateKK = Dokumensd::where('id_casis_sd', $idCasis)
                    ->where('id_jenisdokumen_sd', '0ca3c7f4-5262-40c1-b2b5-4a375553daa0')
                    ->first();
                if (!$updateKK) {
                    $updateKK = new Dokumensd();
                    $updateKK->id_casis_sd = $idCasis;
                    $updateKK->id_jenisdokumen_sd = '0ca3c7f4-5262-40c1-b2b5-4a375553daa0';
                }

                // jika ada file yang lama maka hapus
                if (Storage::disk('casis')->exists($updateKK->dokumen)) {
                    Storage::disk('casis')->delete($updateKK->dokumen);
                }

                // upload file
                $img = $request->file('kk');
                $image = Image::make($img->getRealPath());
                $fileName = Auth::user()->getDataVaKu()->va . '_kk' . '.' . $img->getClientOriginalExtension();
                $upload = Storage::disk('casis')->put('dokumen/' . Carbon::now()->year . '/calonsiswa/sd/' . Auth::user()->getDataVaKu()->va . '/' . $fileName, $image->encode());
                if ($upload) {
                    $updateKK->dokumen = 'storage/casis/dokumen/' . Carbon::now()->year . '/calonsiswa/sd/' . Auth::user()->getDataVaKu()->va . '/'  . $fileName;
                    $file = 'storage/casis/dokumen/' . Carbon::now()->year . '/calonsiswa/sd/' . Auth::user()->getDataVaKu()->va . '/'  . $fileName;
                }

                if ($updateKK->save()) {
                    return json_encode(array(
                        'status' => true,
                        'file' => $file
                    ));
                } else {
                    return json_encode(array(
                        'status' => false,
                    ));
                };
            }

            // ---------- Akte Lahir
            if ($request->hasFile('akte')) {
                $updateAkte = Dokumensd::where('id_casis_sd', $idCasis)
                    ->where('id_jenisdokumen_sd', 'c58283e1-7254-4372-a27e-bc1d2fcfe4cd')
                    ->first();
                if (!$updateAkte) {
                    $updateAkte = new Dokumensd();
                    $updateAkte->id_casis_sd = $idCasis;
                    $updateAkte->id_jenisdokumen_sd = 'c58283e1-7254-4372-a27e-bc1d2fcfe4cd';
                }

                // jika ada file yang lama maka hapus
                if (Storage::disk('casis')->exists($updateAkte->dokumen)) {
                    Storage::disk('casis')->delete($updateAkte->dokumen);
                }

                // upload file
                $img = $request->file('akte');
                $image = Image::make($img->getRealPath());
                $fileName = Auth::user()->getDataVaKu()->va . '_akte' . '.' . $img->getClientOriginalExtension();
                $upload = Storage::disk('casis')->put('dokumen/' . Carbon::now()->year . '/calonsiswa/sd/' . Auth::user()->getDataVaKu()->va . '/' . $fileName, $image->encode());
                if ($upload) {
                    $updateAkte->dokumen = 'storage/casis/dokumen/' . Carbon::now()->year . '/calonsiswa/sd/' . Auth::user()->getDataVaKu()->va . '/'  . $fileName;
                    $file = 'storage/casis/dokumen/' . Carbon::now()->year . '/calonsiswa/sd/' . Auth::user()->getDataVaKu()->va . '/'  . $fileName;
                }

                if ($updateAkte->save()) {
                    return json_encode(array(
                        'status' => true,
                        'file' => $file
                    ));
                } else {
                    return json_encode(array(
                        'status' => false,
                    ));
                };
            }

            // ---------- Surat Keterangan Dokter
            if ($request->hasFile('skd')) {
                $updateSkd = Dokumensd::where('id_casis_sd', $idCasis)
                    ->where('id_jenisdokumen_sd', '79c9fb49-7fc9-497e-9802-b6e7de9d5cc3')
                    ->first();
                if (!$updateSkd) {
                    $updateSkd = new Dokumensd();
                    $updateSkd->id_casis_sd = $idCasis;
                    $updateSkd->id_jenisdokumen_sd = '79c9fb49-7fc9-497e-9802-b6e7de9d5cc3';
                }

                // jika ada file yang lama maka hapus
                if (Storage::disk('casis')->exists($updateSkd->dokumen)) {
                    Storage::disk('casis')->delete($updateSkd->dokumen);
                }

                // upload file
                $img = $request->file('skd');
                $image = Image::make($img->getRealPath());
                $fileName = Auth::user()->getDataVaKu()->va . '_skd' . '.' . $img->getClientOriginalExtension();
                $upload = Storage::disk('casis')->put('dokumen/' . Carbon::now()->year . '/calonsiswa/sd/' . Auth::user()->getDataVaKu()->va . '/' . $fileName, $image->encode());
                if ($upload) {
                    $updateSkd->dokumen = 'storage/casis/dokumen/' . Carbon::now()->year . '/calonsiswa/sd/' . Auth::user()->getDataVaKu()->va . '/'  . $fileName;
                    $file = 'storage/casis/dokumen/' . Carbon::now()->year . '/calonsiswa/sd/' . Auth::user()->getDataVaKu()->va . '/'  . $fileName;
                }

                if ($updateSkd->save()) {
                    return json_encode(array(
                        'status' => true,
                        'file' => $file
                    ));
                } else {
                    return json_encode(array(
                        'status' => false,
                    ));
                };
            }
        } else if (Auth::user()->hasRole('Calon Siswa SMP')) {
            $idCasis = CasisSmp::where('id_user', Auth::user()->id)->first()->id_casis_smp;

            // ---------- KTP AYAH
            if ($request->hasFile('ktp_ayah')) {
                $updateKTPAyah = Dokumensmp::where('id_casis_smp', $idCasis)
                    ->where('id_jenisdokumen_smp', '7dfc0b93-dfba-4988-a9c8-b4039210c045')
                    ->first();
                if (!$updateKTPAyah) {
                    $updateKTPAyah = new Dokumensmp();
                    $updateKTPAyah->id_casis_smp = $idCasis;
                    $updateKTPAyah->id_jenisdokumen_smp = '7dfc0b93-dfba-4988-a9c8-b4039210c045';
                }

                // jika ada file yang lama maka hapus
                if (Storage::disk('casis')->exists($updateKTPAyah->dokumen)) {
                    Storage::disk('casis')->delete($updateKTPAyah->dokumen);
                }

                // upload file
                $img = $request->file('ktp_ayah');
                $image = Image::make($img->getRealPath());
                $fileName = Auth::user()->getDataVaKu()->va . '_ktp_ayah' . '.' . $img->getClientOriginalExtension();
                $upload = Storage::disk('casis')->put('dokumen/' . Carbon::now()->year . '/calonsiswa/smp/' . Auth::user()->getDataVaKu()->va . '/' . $fileName, $image->encode());
                if ($upload) {
                    $updateKTPAyah->dokumen = 'storage/casis/dokumen/' . Carbon::now()->year . '/calonsiswa/smp/' . Auth::user()->getDataVaKu()->va . '/'  . $fileName;
                    $file = 'storage/casis/dokumen/' . Carbon::now()->year . '/calonsiswa/smp/' . Auth::user()->getDataVaKu()->va . '/'  . $fileName;
                }

                if ($updateKTPAyah->save()) {
                    return json_encode(array(
                        'status' => true,
                        'file' => $file
                    ));
                } else {
                    return json_encode(array(
                        'status' => false,
                    ));
                };
            }

            // ---------- KTP IBU
            if ($request->hasFile('ktp_ibu')) {
                $updateKTPIbu = Dokumensmp::where('id_casis_smp', $idCasis)
                    ->where('id_jenisdokumen_smp', '43fcd618-6f4b-46b5-bdbd-0f88bb49dad5')
                    ->first();
                if (!$updateKTPIbu) {
                    $updateKTPIbu = new Dokumensmp();
                    $updateKTPIbu->id_casis_smp = $idCasis;
                    $updateKTPIbu->id_jenisdokumen_smp = '43fcd618-6f4b-46b5-bdbd-0f88bb49dad5';
                }

                // jika ada file yang lama maka hapus
                if (Storage::disk('casis')->exists($updateKTPIbu->dokumen)) {
                    Storage::disk('casis')->delete($updateKTPIbu->dokumen);
                }

                // upload file
                $img = $request->file('ktp_ibu');
                $image = Image::make($img->getRealPath());
                $fileName = Auth::user()->getDataVaKu()->va . '_ktp_ibu' . '.' . $img->getClientOriginalExtension();
                $upload = Storage::disk('casis')->put('dokumen/' . Carbon::now()->year . '/calonsiswa/smp/' . Auth::user()->getDataVaKu()->va . '/' . $fileName, $image->encode());
                if ($upload) {
                    $updateKTPIbu->dokumen = 'storage/casis/dokumen/' . Carbon::now()->year . '/calonsiswa/smp/' . Auth::user()->getDataVaKu()->va . '/'  . $fileName;
                    $file = 'storage/casis/dokumen/' . Carbon::now()->year . '/calonsiswa/smp/' . Auth::user()->getDataVaKu()->va . '/'  . $fileName;
                }

                if ($updateKTPIbu->save()) {
                    return json_encode(array(
                        'status' => true,
                        'file' => $file
                    ));
                } else {
                    return json_encode(array(
                        'status' => false,
                    ));
                };
            }

            // ---------- Kartu Keluarga
            if ($request->hasFile('kk')) {
                $updateKK = Dokumensmp::where('id_casis_smp', $idCasis)
                    ->where('id_jenisdokumen_smp', '0ca3c7f4-5262-40c1-b2b5-4a375553daa0')
                    ->first();
                if (!$updateKK) {
                    $updateKK = new Dokumensmp();
                    $updateKK->id_casis_smp = $idCasis;
                    $updateKK->id_jenisdokumen_smp = '0ca3c7f4-5262-40c1-b2b5-4a375553daa0';
                }

                // jika ada file yang lama maka hapus
                if (Storage::disk('casis')->exists($updateKK->dokumen)) {
                    Storage::disk('casis')->delete($updateKK->dokumen);
                }

                // upload file
                $img = $request->file('kk');
                $image = Image::make($img->getRealPath());
                $fileName = Auth::user()->getDataVaKu()->va . '_kk' . '.' . $img->getClientOriginalExtension();
                $upload = Storage::disk('casis')->put('dokumen/' . Carbon::now()->year . '/calonsiswa/smp/' . Auth::user()->getDataVaKu()->va . '/' . $fileName, $image->encode());
                if ($upload) {
                    $updateKK->dokumen = 'storage/casis/dokumen/' . Carbon::now()->year . '/calonsiswa/smp/' . Auth::user()->getDataVaKu()->va . '/'  . $fileName;
                    $file = 'storage/casis/dokumen/' . Carbon::now()->year . '/calonsiswa/smp/' . Auth::user()->getDataVaKu()->va . '/'  . $fileName;
                }

                if ($updateKK->save()) {
                    return json_encode(array(
                        'status' => true,
                        'file' => $file
                    ));
                } else {
                    return json_encode(array(
                        'status' => false,
                    ));
                };
            }

            // ---------- Akte Lahir
            if ($request->hasFile('akte')) {
                $updateAkte = Dokumensmp::where('id_casis_smp', $idCasis)
                    ->where('id_jenisdokumen_smp', 'c58283e1-7254-4372-a27e-bc1d2fcfe4cd')
                    ->first();
                if (!$updateAkte) {
                    $updateAkte = new Dokumensmp();
                    $updateAkte->id_casis_smp = $idCasis;
                    $updateAkte->id_jenisdokumen_smp = 'c58283e1-7254-4372-a27e-bc1d2fcfe4cd';
                }

                // jika ada file yang lama maka hapus
                if (Storage::disk('casis')->exists($updateAkte->dokumen)) {
                    Storage::disk('casis')->delete($updateAkte->dokumen);
                }

                // upload file
                $img = $request->file('akte');
                $image = Image::make($img->getRealPath());
                $fileName = Auth::user()->getDataVaKu()->va . '_akte' . '.' . $img->getClientOriginalExtension();
                $upload = Storage::disk('casis')->put('dokumen/' . Carbon::now()->year . '/calonsiswa/smp/' . Auth::user()->getDataVaKu()->va . '/' . $fileName, $image->encode());
                if ($upload) {
                    $updateAkte->dokumen = 'storage/casis/dokumen/' . Carbon::now()->year . '/calonsiswa/smp/' . Auth::user()->getDataVaKu()->va . '/'  . $fileName;
                    $file = 'storage/casis/dokumen/' . Carbon::now()->year . '/calonsiswa/smp/' . Auth::user()->getDataVaKu()->va . '/'  . $fileName;
                }

                if ($updateAkte->save()) {
                    return json_encode(array(
                        'status' => true,
                        'file' => $file
                    ));
                } else {
                    return json_encode(array(
                        'status' => false,
                    ));
                };
            }

            // ---------- Surat Keterangan Dokter
            if ($request->hasFile('skd')) {
                $updateSkd = Dokumensmp::where('id_casis_smp', $idCasis)
                    ->where('id_jenisdokumen_smp', '79c9fb49-7fc9-497e-9802-b6e7de9d5cc3')
                    ->first();
                if (!$updateSkd) {
                    $updateSkd = new Dokumensmp();
                    $updateSkd->id_casis_smp = $idCasis;
                    $updateSkd->id_jenisdokumen_smp = '79c9fb49-7fc9-497e-9802-b6e7de9d5cc3';
                }

                // jika ada file yang lama maka hapus
                if (Storage::disk('casis')->exists($updateSkd->dokumen)) {
                    Storage::disk('casis')->delete($updateSkd->dokumen);
                }

                // upload file
                $img = $request->file('skd');
                $image = Image::make($img->getRealPath());
                $fileName = Auth::user()->getDataVaKu()->va . '_skd' . '.' . $img->getClientOriginalExtension();
                $upload = Storage::disk('casis')->put('dokumen/' . Carbon::now()->year . '/calonsiswa/smp/' . Auth::user()->getDataVaKu()->va . '/' . $fileName, $image->encode());
                if ($upload) {
                    $updateSkd->dokumen = 'storage/casis/dokumen/' . Carbon::now()->year . '/calonsiswa/smp/' . Auth::user()->getDataVaKu()->va . '/'  . $fileName;
                    $file = 'storage/casis/dokumen/' . Carbon::now()->year . '/calonsiswa/smp/' . Auth::user()->getDataVaKu()->va . '/'  . $fileName;
                }

                if ($updateSkd->save()) {
                    return json_encode(array(
                        'status' => true,
                        'file' => $file
                    ));
                } else {
                    return json_encode(array(
                        'status' => false,
                    ));
                };
            }

            // ---------- Raport Kelas 5 Semester 1
            if ($request->hasFile('kelas5semester1')) {
                $updateKelas5Sem1 = Dokumensmp::where('id_casis_smp', $idCasis)
                    ->where('id_jenisdokumen_smp', '7274cd7c-a6df-4bbd-82b3-ea4784a4318f')
                    ->first();
                if (!$updateKelas5Sem1) {
                    $updateKelas5Sem1 = new Dokumensmp();
                    $updateKelas5Sem1->id_casis_smp = $idCasis;
                    $updateKelas5Sem1->id_jenisdokumen_smp = '7274cd7c-a6df-4bbd-82b3-ea4784a4318f';
                }

                // jika ada file yang lama maka hapus
                if (Storage::disk('casis')->exists($updateKelas5Sem1->dokumen)) {
                    Storage::disk('casis')->delete($updateKelas5Sem1->dokumen);
                }

                // upload file
                $img = $request->file('kelas5semester1');
                $image = Image::make($img->getRealPath());
                $fileName = Auth::user()->getDataVaKu()->va . '_kelas5semester1' . '.' . $img->getClientOriginalExtension();
                $upload = Storage::disk('casis')->put('dokumen/' . Carbon::now()->year . '/calonsiswa/smp/' . Auth::user()->getDataVaKu()->va . '/' . $fileName, $image->encode());
                if ($upload) {
                    $updateKelas5Sem1->dokumen = 'storage/casis/dokumen/' . Carbon::now()->year . '/calonsiswa/smp/' . Auth::user()->getDataVaKu()->va . '/'  . $fileName;
                    $file = 'storage/casis/dokumen/' . Carbon::now()->year . '/calonsiswa/smp/' . Auth::user()->getDataVaKu()->va . '/'  . $fileName;
                }

                if ($updateKelas5Sem1->save()) {
                    return json_encode(array(
                        'status' => true,
                        'file' => $file
                    ));
                } else {
                    return json_encode(array(
                        'status' => false,
                    ));
                };
            }

            // ---------- Raport Kelas 5 Semester 1
            if ($request->hasFile('kelas5semeste2')) {
                $updateKelas5Sem2 = Dokumensmp::where('id_casis_smp', $idCasis)
                    ->where('id_jenisdokumen_smp', '90b72f46-27cf-4ebc-9ce8-df93816f10f7')
                    ->first();
                if (!$updateKelas5Sem2) {
                    $updateKelas5Sem2 = new Dokumensmp();
                    $updateKelas5Sem2->id_casis_smp = $idCasis;
                    $updateKelas5Sem2->id_jenisdokumen_smp = '90b72f46-27cf-4ebc-9ce8-df93816f10f7';
                }

                // jika ada file yang lama maka hapus
                if (Storage::disk('casis')->exists($updateKelas5Sem2->dokumen)) {
                    Storage::disk('casis')->delete($updateKelas5Sem2->dokumen);
                }

                // upload file
                $img = $request->file('kelas5semester2');
                $image = Image::make($img->getRealPath());
                $fileName = Auth::user()->getDataVaKu()->va . '_kelas5semester2' . '.' . $img->getClientOriginalExtension();
                $upload = Storage::disk('casis')->put('dokumen/' . Carbon::now()->year . '/calonsiswa/smp/' . Auth::user()->getDataVaKu()->va . '/' . $fileName, $image->encode());
                if ($upload) {
                    $updateKelas5Sem2->dokumen = 'storage/casis/dokumen/' . Carbon::now()->year . '/calonsiswa/smp/' . Auth::user()->getDataVaKu()->va . '/'  . $fileName;
                    $file = 'storage/casis/dokumen/' . Carbon::now()->year . '/calonsiswa/smp/' . Auth::user()->getDataVaKu()->va . '/'  . $fileName;
                }

                if ($updateKelas5Sem2->save()) {
                    return json_encode(array(
                        'status' => true,
                        'file' => $file
                    ));
                } else {
                    return json_encode(array(
                        'status' => false,
                    ));
                };
            }

            // ---------- Raport Kelas 6 Semester 1
            if ($request->hasFile('kelas6semester1')) {
                $updateKelas6Sem1 = Dokumensmp::where('id_casis_smp', $idCasis)
                    ->where('id_jenisdokumen_smp', '8d8a2ab1-eba0-4607-b021-3afd9453f536')
                    ->first();
                if (!$updateKelas6Sem1) {
                    $updateKelas6Sem1 = new Dokumensmp();
                    $updateKelas6Sem1->id_casis_smp = $idCasis;
                    $updateKelas6Sem1->id_jenisdokumen_smp = '8d8a2ab1-eba0-4607-b021-3afd9453f536';
                }

                // jika ada file yang lama maka hapus
                if (Storage::disk('casis')->exists($updateKelas6Sem1->dokumen)) {
                    Storage::disk('casis')->delete($updateKelas6Sem1->dokumen);
                }

                // upload file
                $img = $request->file('kelas6semester1');
                $image = Image::make($img->getRealPath());
                $fileName = Auth::user()->getDataVaKu()->va . '_kelas6semester1' . '.' . $img->getClientOriginalExtension();
                $upload = Storage::disk('casis')->put('dokumen/' . Carbon::now()->year . '/calonsiswa/smp/' . Auth::user()->getDataVaKu()->va . '/' . $fileName, $image->encode());
                if ($upload) {
                    $updateKelas6Sem1->dokumen = 'storage/casis/dokumen/' . Carbon::now()->year . '/calonsiswa/smp/' . Auth::user()->getDataVaKu()->va . '/'  . $fileName;
                    $file = 'storage/casis/dokumen/' . Carbon::now()->year . '/calonsiswa/smp/' . Auth::user()->getDataVaKu()->va . '/'  . $fileName;
                }

                if ($updateKelas6Sem1->save()) {
                    return json_encode(array(
                        'status' => true,
                        'file' => $file
                    ));
                } else {
                    return json_encode(array(
                        'status' => false,
                    ));
                };
            }
        } else {
            $idCasis = CasisSma::where('id_user', Auth::user()->id)->first()->id_casis_sma;

            // ---------- KTP AYAH
            if ($request->hasFile('ktp_ayah')) {
                $updateKTPAyah = Dokumensma::where('id_casis_sma', $idCasis)
                    ->where('id_jenisdokumen_sma', '7dfc0b93-dfba-4988-a9c8-b4039210c045')
                    ->first();
                if (!$updateKTPAyah) {
                    $updateKTPAyah = new Dokumensma();
                    $updateKTPAyah->id_casis_sma = $idCasis;
                    $updateKTPAyah->id_jenisdokumen_sma = '7dfc0b93-dfba-4988-a9c8-b4039210c045';
                }

                // jika ada file yang lama maka hapus
                if (Storage::disk('casis')->exists($updateKTPAyah->dokumen)) {
                    Storage::disk('casis')->delete($updateKTPAyah->dokumen);
                }

                // upload file
                $img = $request->file('ktp_ayah');
                $image = Image::make($img->getRealPath());
                $fileName = Auth::user()->getDataVaKu()->va . '_ktp_ayah' . '.' . $img->getClientOriginalExtension();
                $upload = Storage::disk('casis')->put('dokumen/' . Carbon::now()->year . '/calonsiswa/sma/' . Auth::user()->getDataVaKu()->va . '/' . $fileName, $image->encode());
                if ($upload) {
                    $updateKTPAyah->dokumen = 'storage/casis/dokumen/' . Carbon::now()->year . '/calonsiswa/sma/' . Auth::user()->getDataVaKu()->va . '/'  . $fileName;
                    $file = 'storage/casis/dokumen/' . Carbon::now()->year . '/calonsiswa/sma/' . Auth::user()->getDataVaKu()->va . '/'  . $fileName;
                }

                if ($updateKTPAyah->save()) {
                    return json_encode(array(
                        'status' => true,
                        'file' => $file
                    ));
                } else {
                    return json_encode(array(
                        'status' => false,
                    ));
                };
            }

            // ---------- KTP IBU
            if ($request->hasFile('ktp_ibu')) {
                $updateKTPIbu = Dokumensma::where('id_casis_sma', $idCasis)
                    ->where('id_jenisdokumen_sma', '43fcd618-6f4b-46b5-bdbd-0f88bb49dad5')
                    ->first();
                if (!$updateKTPIbu) {
                    $updateKTPIbu = new Dokumensma();
                    $updateKTPIbu->id_casis_sma = $idCasis;
                    $updateKTPIbu->id_jenisdokumen_sma = '43fcd618-6f4b-46b5-bdbd-0f88bb49dad5';
                }

                // jika ada file yang lama maka hapus
                if (Storage::disk('casis')->exists($updateKTPIbu->dokumen)) {
                    Storage::disk('casis')->delete($updateKTPIbu->dokumen);
                }

                // upload file
                $img = $request->file('ktp_ibu');
                $image = Image::make($img->getRealPath());
                $fileName = Auth::user()->getDataVaKu()->va . '_ktp_ibu' . '.' . $img->getClientOriginalExtension();
                $upload = Storage::disk('casis')->put('dokumen/' . Carbon::now()->year . '/calonsiswa/sma/' . Auth::user()->getDataVaKu()->va . '/' . $fileName, $image->encode());
                if ($upload) {
                    $updateKTPIbu->dokumen = 'storage/casis/dokumen/' . Carbon::now()->year . '/calonsiswa/sma/' . Auth::user()->getDataVaKu()->va . '/'  . $fileName;
                    $file = 'storage/casis/dokumen/' . Carbon::now()->year . '/calonsiswa/sma/' . Auth::user()->getDataVaKu()->va . '/'  . $fileName;
                }

                if ($updateKTPIbu->save()) {
                    return json_encode(array(
                        'status' => true,
                        'file' => $file
                    ));
                } else {
                    return json_encode(array(
                        'status' => false,
                    ));
                };
            }

            // ---------- Kartu Keluarga
            if ($request->hasFile('kk')) {
                $updateKK = Dokumensma::where('id_casis_sma', $idCasis)
                    ->where('id_jenisdokumen_sma', '0ca3c7f4-5262-40c1-b2b5-4a375553daa0')
                    ->first();
                if (!$updateKK) {
                    $updateKK = new Dokumensma();
                    $updateKK->id_casis_sma = $idCasis;
                    $updateKK->id_jenisdokumen_sma = '0ca3c7f4-5262-40c1-b2b5-4a375553daa0';
                }

                // jika ada file yang lama maka hapus
                if (Storage::disk('casis')->exists($updateKK->dokumen)) {
                    Storage::disk('casis')->delete($updateKK->dokumen);
                }

                // upload file
                $img = $request->file('kk');
                $image = Image::make($img->getRealPath());
                $fileName = Auth::user()->getDataVaKu()->va . '_kk' . '.' . $img->getClientOriginalExtension();
                $upload = Storage::disk('casis')->put('dokumen/' . Carbon::now()->year . '/calonsiswa/sma/' . Auth::user()->getDataVaKu()->va . '/' . $fileName, $image->encode());
                if ($upload) {
                    $updateKK->dokumen = 'storage/casis/dokumen/' . Carbon::now()->year . '/calonsiswa/sma/' . Auth::user()->getDataVaKu()->va . '/'  . $fileName;
                    $file = 'storage/casis/dokumen/' . Carbon::now()->year . '/calonsiswa/sma/' . Auth::user()->getDataVaKu()->va . '/'  . $fileName;
                }

                if ($updateKK->save()) {
                    return json_encode(array(
                        'status' => true,
                        'file' => $file
                    ));
                } else {
                    return json_encode(array(
                        'status' => false,
                    ));
                };
            }

            // ---------- Akte Lahir
            if ($request->hasFile('akte')) {
                $updateAkte = Dokumensma::where('id_casis_sma', $idCasis)
                    ->where('id_jenisdokumen_sma', 'c58283e1-7254-4372-a27e-bc1d2fcfe4cd')
                    ->first();
                if (!$updateAkte) {
                    $updateAkte = new Dokumensma();
                    $updateAkte->id_casis_sma = $idCasis;
                    $updateAkte->id_jenisdokumen_sma = 'c58283e1-7254-4372-a27e-bc1d2fcfe4cd';
                }

                // jika ada file yang lama maka hapus
                if (Storage::disk('casis')->exists($updateAkte->dokumen)) {
                    Storage::disk('casis')->delete($updateAkte->dokumen);
                }

                // upload file
                $img = $request->file('akte');
                $image = Image::make($img->getRealPath());
                $fileName = Auth::user()->getDataVaKu()->va . '_akte' . '.' . $img->getClientOriginalExtension();
                $upload = Storage::disk('casis')->put('dokumen/' . Carbon::now()->year . '/calonsiswa/sma/' . Auth::user()->getDataVaKu()->va . '/' . $fileName, $image->encode());
                if ($upload) {
                    $updateAkte->dokumen = 'storage/casis/dokumen/' . Carbon::now()->year . '/calonsiswa/sma/' . Auth::user()->getDataVaKu()->va . '/'  . $fileName;
                    $file = 'storage/casis/dokumen/' . Carbon::now()->year . '/calonsiswa/sma/' . Auth::user()->getDataVaKu()->va . '/'  . $fileName;
                }

                if ($updateAkte->save()) {
                    return json_encode(array(
                        'status' => true,
                        'file' => $file
                    ));
                } else {
                    return json_encode(array(
                        'status' => false,
                    ));
                };
            }

            // ---------- Surat Keterangan Dokter
            if ($request->hasFile('skd')) {
                $updateSkd = Dokumensma::where('id_casis_sma', $idCasis)
                    ->where('id_jenisdokumen_sma', '79c9fb49-7fc9-497e-9802-b6e7de9d5cc3')
                    ->first();
                if (!$updateSkd) {
                    $updateSkd = new Dokumensma();
                    $updateSkd->id_casis_sma = $idCasis;
                    $updateSkd->id_jenisdokumen_sma = '79c9fb49-7fc9-497e-9802-b6e7de9d5cc3';
                }

                // jika ada file yang lama maka hapus
                if (Storage::disk('casis')->exists($updateSkd->dokumen)) {
                    Storage::disk('casis')->delete($updateSkd->dokumen);
                }

                // upload file
                $img = $request->file('skd');
                $image = Image::make($img->getRealPath());
                $fileName = Auth::user()->getDataVaKu()->va . '_skd' . '.' . $img->getClientOriginalExtension();
                $upload = Storage::disk('casis')->put('dokumen/' . Carbon::now()->year . '/calonsiswa/sma/' . Auth::user()->getDataVaKu()->va . '/' . $fileName, $image->encode());
                if ($upload) {
                    $updateSkd->dokumen = 'storage/casis/dokumen/' . Carbon::now()->year . '/calonsiswa/sma/' . Auth::user()->getDataVaKu()->va . '/'  . $fileName;
                    $file = 'storage/casis/dokumen/' . Carbon::now()->year . '/calonsiswa/sma/' . Auth::user()->getDataVaKu()->va . '/'  . $fileName;
                }

                if ($updateSkd->save()) {
                    return json_encode(array(
                        'status' => true,
                        'file' => $file
                    ));
                } else {
                    return json_encode(array(
                        'status' => false,
                    ));
                };
            }

            // ---------- Raport Kelas 8 Semester 1
            if ($request->hasFile('kelas8semester1')) {
                $updateKelas8Sem1 = Dokumensma::where('id_casis_sma', $idCasis)
                    ->where('id_jenisdokumen_sma', 'e939bcab-5053-4c0f-b5ce-9e22e19eeaac')
                    ->first();
                if (!$updateKelas8Sem1) {
                    $updateKelas8Sem1 = new Dokumensma();
                    $updateKelas8Sem1->id_casis_sma = $idCasis;
                    $updateKelas8Sem1->id_jenisdokumen_sma = 'e939bcab-5053-4c0f-b5ce-9e22e19eeaac';
                }

                // jika ada file yang lama maka hapus
                if (Storage::disk('casis')->exists($updateKelas8Sem1->dokumen)) {
                    Storage::disk('casis')->delete($updateKelas8Sem1->dokumen);
                }

                // upload file
                $img = $request->file('kelas8semester1');
                $image = Image::make($img->getRealPath());
                $fileName = Auth::user()->getDataVaKu()->va . '_kelas8semester1' . '.' . $img->getClientOriginalExtension();
                $upload = Storage::disk('casis')->put('dokumen/' . Carbon::now()->year . '/calonsiswa/sma/' . Auth::user()->getDataVaKu()->va . '/' . $fileName, $image->encode());
                if ($upload) {
                    $updateKelas8Sem1->dokumen = 'storage/casis/dokumen/' . Carbon::now()->year . '/calonsiswa/sma/' . Auth::user()->getDataVaKu()->va . '/'  . $fileName;
                    $file = 'storage/casis/dokumen/' . Carbon::now()->year . '/calonsiswa/sma/' . Auth::user()->getDataVaKu()->va . '/'  . $fileName;
                }

                if ($updateKelas8Sem1->save()) {
                    return json_encode(array(
                        'status' => true,
                        'file' => $file
                    ));
                } else {
                    return json_encode(array(
                        'status' => false,
                    ));
                };
            }

            // ---------- Raport Kelas 8 Semester 2
            if ($request->hasFile('kelas8semester2')) {
                $updateKelas8Sem2 = Dokumensma::where('id_casis_sma', $idCasis)
                    ->where('id_jenisdokumen_sma', 'ff3b5ecc-c823-46df-9621-770134fd4e71')
                    ->first();
                if (!$updateKelas8Sem2) {
                    $updateKelas8Sem2 = new Dokumensma();
                    $updateKelas8Sem2->id_casis_sma = $idCasis;
                    $updateKelas8Sem2->id_jenisdokumen_sma = 'ff3b5ecc-c823-46df-9621-770134fd4e71';
                }

                // jika ada file yang lama maka hapus
                if (Storage::disk('casis')->exists($updateKelas8Sem2->dokumen)) {
                    Storage::disk('casis')->delete($updateKelas8Sem2->dokumen);
                }

                // upload file
                $img = $request->file('kelas8semester2');
                $image = Image::make($img->getRealPath());
                $fileName = Auth::user()->getDataVaKu()->va . '_kelas8semester2' . '.' . $img->getClientOriginalExtension();
                $upload = Storage::disk('casis')->put('dokumen/' . Carbon::now()->year . '/calonsiswa/sma/' . Auth::user()->getDataVaKu()->va . '/' . $fileName, $image->encode());
                if ($upload) {
                    $updateKelas8Sem2->dokumen = 'storage/casis/dokumen/' . Carbon::now()->year . '/calonsiswa/sma/' . Auth::user()->getDataVaKu()->va . '/'  . $fileName;
                    $file = 'storage/casis/dokumen/' . Carbon::now()->year . '/calonsiswa/sma/' . Auth::user()->getDataVaKu()->va . '/'  . $fileName;
                }

                if ($updateKelas8Sem2->save()) {
                    return json_encode(array(
                        'status' => true,
                        'file' => $file
                    ));
                } else {
                    return json_encode(array(
                        'status' => false,
                    ));
                };
            }

            // ---------- Raport Kelas 9 Semester 1
            if ($request->hasFile('kelas9semester1')) {
                $updateKelas9Sem1 = Dokumensma::where('id_casis_sma', $idCasis)
                    ->where('id_jenisdokumen_sma', 'bb6bab39-cfed-4016-98ab-f69b59a500f9')
                    ->first();
                if (!$updateKelas9Sem1) {
                    $updateKelas9Sem1 = new Dokumensma();
                    $updateKelas9Sem1->id_casis_sma = $idCasis;
                    $updateKelas9Sem1->id_jenisdokumen_sma = 'bb6bab39-cfed-4016-98ab-f69b59a500f9';
                }

                // jika ada file yang lama maka hapus
                if (Storage::disk('casis')->exists($updateKelas9Sem1->dokumen)) {
                    Storage::disk('casis')->delete($updateKelas9Sem1->dokumen);
                }

                // upload file
                $img = $request->file('kelas9semester1');
                $image = Image::make($img->getRealPath());
                $fileName = Auth::user()->getDataVaKu()->va . '_kelas9semester1' . '.' . $img->getClientOriginalExtension();
                $upload = Storage::disk('casis')->put('dokumen/' . Carbon::now()->year . '/calonsiswa/sma/' . Auth::user()->getDataVaKu()->va . '/' . $fileName, $image->encode());
                if ($upload) {
                    $updateKelas9Sem1->dokumen = 'storage/casis/dokumen/' . Carbon::now()->year . '/calonsiswa/sma/' . Auth::user()->getDataVaKu()->va . '/'  . $fileName;
                    $file = 'storage/casis/dokumen/' . Carbon::now()->year . '/calonsiswa/sma/' . Auth::user()->getDataVaKu()->va . '/'  . $fileName;
                }

                if ($updateKelas9Sem1->save()) {
                    return json_encode(array(
                        'status' => true,
                        'file' => $file
                    ));
                } else {
                    return json_encode(array(
                        'status' => false,
                    ));
                };
            }
        }
    }

    public function lengkapiDataCasis()
    {
        abort_if(Gate::denies('profilcalonsiswa_ubah'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $updateStatusCasis = Auth::user()->getDataCasisKu();
        $updateStatusCasis->id_status_casis = StatusCasis::getDataByNama(config('status_ppdb.calon_siswa.datalengkap'))->id_status_casis;

        if ($updateStatusCasis->save()) {
            return json_encode(array(
                'status' => true,
                'message' => 'Berhasil melengkapi data calon siswa',
            ));
        } else {
            return json_encode(array(
                'status' => false,
                'message' => 'Gagal melengkapi data calon siswa',
            ));
        }
    }
}
