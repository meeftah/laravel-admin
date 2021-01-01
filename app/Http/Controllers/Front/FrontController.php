<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\CasisSd;
use App\Models\CasisSma;
use App\Models\CasisSmp;
use App\Models\CasisTk;
use App\Models\StatusCasis;
use App\Models\StatusPendaftaran;
use App\Models\Unit;
use App\Models\User;
use App\Models\VaSd;
use App\Models\VaSma;
use App\Models\VaSmp;
use App\Models\VaTk;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('frontend.index');
    }

    public function registerForm()
    {
        $unit = Unit::orderBy('kode_unit')->get();
        $statusPendaftaran = StatusPendaftaran::get();
        return view('frontend.register', compact('unit', 'statusPendaftaran'));
    }

    public function register(Request $request)
    {
        $rules = [
            'username' => 'required|min:3|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'nohp' => 'required|min:11|max:13|unique:users,nohp',
            'password' => 'required|confirmed|min:6',
            'id_unit' => 'required',
            'id_status_pendaftaran' => 'required',
        ];

        $messages = [
            'username.required' => 'Kolom Nama wajib diisi!',
            'username.min' => 'Kolom Nama minimal 3 karakter!',
            'username.unique' => 'Username sudah dipakai, silakan pilih username lain!',
            'email.required' => 'Kolom Email wajib diisi!',
            'email.email' => 'Format Email tidak sesuai!',
            'email.unique' => 'Email sudah terdaftar, silakan pilih email yang lain!',
            'nohp.required' => 'No Whatsapp wajib diisi!',
            'nohp.min' => 'No Whatsapp minimal 11 digit!',
            'nohp.max' => 'No Whatsapp maksimal 13 digit!',
            'nohp.unique' => 'No Whatsapp sudah terdaftar, silakan pilih nomor yang lain!',
            'password.required' => 'Kolom Password wajib diisi!',
            'password.confirmed' => 'Kolom Password tidak sama dengan Konfirmasi Password!',
            'password.min' => 'Kolom Password minimal 6 karakter!',
            'id_unit.required' => 'Wajib pilih unit!',
            'id_status_pendaftaran.required' => 'Wajib pilih pendaftaran!',
        ];

        $this->validate($request, $rules, $messages);

        // dapatkan nama unit
        $nm_unit = Unit::getDataById($request->id_unit)->nm_unit;
        // set ke default, status registrasi: FALSE, message: GAGAL DAFTAR
        $statusRegister = false;
        $message = 'Gagal mendaftar, silakan coba kembali beberapa saat lagi';
        // Jika user daftar sebagai siswa TK
        if ($nm_unit == 'TKIT') {
            // cek va tk apakah masih ada slot kosong
            $slotVaTk = VaTk::where('status', 0)->orderBy('va', 'ASC')->first();

            if ($slotVaTk) {
                // jika masih ada slot kosong, maka buat user baru
                // dan set va tersebut ke calon siswa tersebut
                $user = User::create($request->all());

                // register user baru ke calon siswa tk
                $casis = new CasisTk();
                $casis->id_va_tk            = $slotVaTk->id_va_tk;
                $casis->id_user             = $user->id;
                $casis->id_status_casis     = StatusCasis::getDataByNama('Terdaftar')->id_status_casis;
                $casis->kelas               = 'KELAS A';
                if ($casis->save()) {
                    // update status va menjadi aktif
                    $tanggalSekarang = Carbon::now();
                    $slotVaTk->tanggal_aktif    = $tanggalSekarang->format('Y-m-d H:i:s');
                    $slotVaTk->tanggal_berakhir = $tanggalSekarang->addDays(2)->format('Y-m-d H:i:s');
                    $slotVaTk->status = 1;
                    if ($slotVaTk->save()) {
                        // set peran calon siswa TK
                        $user->assignRole('Calon Siswa TK');
                        $statusRegister = true;
                        $message = 'Anda berhasil mendaftar sebagai Calon Siswa TKIT Al-Fityan Kubu Raya, silakan login menggunakan Username/Email dan Password Anda';
                    } else {
                        $casis->delete();
                        $user->delete();
                        $message = 'Gagal mendapatkan Virtual Account, silakan coba kembali';
                    }
                } else {
                    $user->delete();
                    $message = 'Gagal mendaftarkan sebagai calon siswa TKIT, silakan coba kembali';
                }
            } else {
                $message = 'Slot Virtual Account untuk Calon Siswa TKIT telah habis, silakan hubungi pihak Al-Fityan Kubu Raya';
            }
        } else
        if ($nm_unit == 'SDIT') {
            // cek va sd apakah masih ada slot kosong
            $slotVaSd = VaSd::where('status', 0)->orderBy('va', 'ASC')->first();

            if ($slotVaSd) {
                // jika masih ada slot kosong, maka buat user baru
                // dan set va tersebut ke calon siswa tersebut
                $user = User::create($request->all());

                // register user baru ke calon siswa sd
                $casis = new CasisSd();
                $casis->id_va_sd            = $slotVaSd->id_va_sd;
                $casis->id_user             = $user->id;
                $casis->id_status_casis     = StatusCasis::getDataByNama('Terdaftar')->id_status_casis;
                if ($casis->save()) {
                    // update status va menjadi aktif
                    $tanggalSekarang = Carbon::now();
                    $slotVaSd->tanggal_aktif    = $tanggalSekarang->format('Y-m-d H:i:s');
                    $slotVaSd->tanggal_berakhir = $tanggalSekarang->addDays(2)->format('Y-m-d H:i:s');
                    $slotVaSd->status = 1;
                    if ($slotVaSd->save()) {
                        // set peran calon siswa SD
                        $user->assignRole('Calon Siswa SD');
                        $statusRegister = true;
                        $message = 'Anda berhasil mendaftar sebagai Calon Siswa SDIT Al-Fityan Kubu Raya, silakan login menggunakan Username/Email dan Password Anda';
                    } else {
                        $casis->delete();
                        $user->delete();
                        $message = 'Gagal mendapatkan Virtual Account, silakan coba kembali';
                    }
                } else {
                    $user->delete();
                    $message = 'Gagal mendaftarkan sebagai calon siswa SDIT, silakan coba kembali';
                }
            } else {
                $message = 'Slot Virtual Account untuk Calon Siswa SDIT telah habis, silakan hubungi pihak Al-Fityan Kubu Raya';
            }
        } else
        if ($nm_unit == 'SMPIT') {
            // cek va smp apakah masih ada slot kosong
            $slotVaSmp = VaSmp::where('status', 0)->orderBy('va', 'ASC')->first();

            if ($slotVaSmp) {
                // jika masih ada slot kosong, maka buat user baru
                // dan set va tersebut ke calon siswa tersebut
                $user = User::create($request->all());

                // register user baru ke calon siswa smp
                $casis = new CasisSmp();
                $casis->id_va_smp            = $slotVaSmp->id_va_smp;
                $casis->id_user             = $user->id;
                $casis->id_status_casis     = StatusCasis::getDataByNama('Terdaftar')->id_status_casis;
                if ($casis->save()) {
                    // update status va menjadi aktif
                    $tanggalSekarang = Carbon::now();
                    $slotVaSmp->tanggal_aktif    = $tanggalSekarang->format('Y-m-d H:i:s');
                    $slotVaSmp->tanggal_berakhir = $tanggalSekarang->addDays(2)->format('Y-m-d H:i:s');
                    $slotVaSmp->status = 1;
                    if ($slotVaSmp->save()) {
                        // set peran calon siswa SMP
                        $user->assignRole('Calon Siswa SMP');
                        $statusRegister = true;
                        $message = 'Anda berhasil mendaftar sebagai Calon Siswa SMPIT Al-Fityan Kubu Raya, silakan login menggunakan Username/Email dan Password Anda';
                    } else {
                        $casis->delete();
                        $user->delete();
                        $message = 'Gagal mendapatkan Virtual Account, silakan coba kembali';
                    }
                } else {
                    $user->delete();
                    $message = 'Gagal mendaftarkan sebagai calon siswa SMPIT, silakan coba kembali';
                }
            } else {
                $message = 'Slot Virtual Account untuk Calon Siswa SMPIT telah habis, silakan hubungi pihak Al-Fityan Kubu Raya';
            }
        } else {
            // cek va sd apakah masih ada slot kosong
            $slotVaSma = VaSma::where('status', 0)->orderBy('va', 'ASC')->first();

            if ($slotVaSma) {
                // jika masih ada slot kosong, maka buat user baru
                // dan set va tersebut ke calon siswa tersebut
                $user = User::create($request->all());

                // register user baru ke calon siswa sma
                $casis = new CasisSma();
                $casis->id_va_sma            = $slotVaSma->id_va_sma;
                $casis->id_user             = $user->id;
                $casis->id_status_casis     = StatusCasis::getDataByNama('Terdaftar')->id_status_casis;
                if ($casis->save()) {
                    // update status va menjadi aktif
                    $tanggalSekarang = Carbon::now();
                    $slotVaSma->tanggal_aktif    = $tanggalSekarang->format('Y-m-d H:i:s');
                    $slotVaSma->tanggal_berakhir = $tanggalSekarang->addDays(2)->format('Y-m-d H:i:s');
                    $slotVaSma->status = 1;
                    if ($slotVaSma->save()) {
                        // set peran calon siswa SMA
                        $user->assignRole('Calon Siswa SMA');
                        $statusRegister = true;
                        $message = 'Anda berhasil mendaftar sebagai Calon Siswa SMAIT Al-Fityan Kubu Raya, silakan login menggunakan Username/Email dan Password Anda';
                    } else {
                        $casis->delete();
                        $user->delete();
                        $message = 'Gagal mendapatkan Virtual Account, silakan coba kembali';
                    }
                } else {
                    $user->delete();
                    $message = 'Gagal mendaftarkan sebagai calon siswa SMAIT, silakan coba kembali';
                }
            } else {
                $message = 'Slot Virtual Account untuk Calon Siswa SMAIT telah habis, silakan hubungi pihak Al-Fityan Kubu Raya';
            }
        }

        if ($statusRegister) {
            return redirect()->route('login')->with(['success' => $message]);
        } else {
            return redirect()->back()->with(['error' => $message]);
        }
    }
}
