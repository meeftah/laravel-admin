<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\CasisSd;
use App\Models\CasisSma;
use App\Models\CasisSmp;
use App\Models\CasisTk;
use App\Models\Dokumensd;
use App\Models\Dokumensma;
use App\Models\Dokumensmp;
use App\Models\Dokumentk;
use App\Models\StatusCasis;
use App\Models\TahunAjaran;
use App\Models\Unit;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    public function index()
    {

        // Jika yang login adalah Calon siswa
        if (Auth::user()->hasAnyRole(['Calon Siswa TK', 'Calon Siswa SD', 'Calon Siswa SMP', 'Calon Siswa SMA'])) {
            $statusSiswa = StatusCasis::getDataById(Auth::user()->getDataCasisKu()->id_status_casis)->status;
            if ($statusSiswa == config('status_ppdb.calon_siswa.datalengkap')) {
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
                } else if ($statusSiswa == config('status_ppdb.calon_siswa.terverifikasi')) {
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

                return view('dashboard.beranda.index', compact('casis'));
            } else {
                // biaya formulir
                $biayaFormulir = Auth::user()->getDataUnitKu()->biaya_formulir;

                // masa aktif va
                if (config('va_config.masa_aktif.format') == 'jam') {
                    // masa aktif bersarkan konfigurasi va
                    $masaAktif = config('va_config.masa_aktif.satuan') . ' jam';
                } else if (config('va_config.masa_aktif.format') == 'menit') {
                    // jika format berupa menit
                    $masaAktif = config('va_config.masa_aktif.satuan') . ' menit';
                } else {
                    // jika format berupa menit
                    $masaAktif = config('va_config.masa_aktif.satuan') . 'x24 jam';
                }
                return view('dashboard.beranda.index', compact('biayaFormulir', 'masaAktif'));
            }
        }

        return view('dashboard.beranda.index');
    }
}
