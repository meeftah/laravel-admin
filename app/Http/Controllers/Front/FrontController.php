<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\CasisTk;
use App\Models\StatusCasis;
use App\Models\StatusPendaftaran;
use App\Models\Unit;
use App\Models\User;
use App\Models\VaTK;
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
        $unit = Unit::get();
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

        $user = User::create($request->all());

        $nm_unit = Unit::getDataById($request->id_unit)->nm_unit;
        // Jika user daftar sebagai siswa TK
        if ($nm_unit == 'TKIT') {
            // set peran calon siswa TK
            $user->assignRole('Calon Siswa TK');

            // ambil data VA TK
            $va_tk = VaTK::where('status', 0)->orderBy('va', 'ASC')->first();
            $id_va_tk = $va_tk->id_va_tk;

            // register user baru ke calon siswa tk
            $casis = new CasisTk();
            $casis->id_va_tk            = $id_va_tk;
            $casis->id_user             = $user->id;
            $casis->id_status_casis     = StatusCasis::getDataByNama('Terdaftar')->id_status_casis;
            $casis->kelas               = 'KELAS A';
            if ($casis->save()) {
                // update status va menjadi aktif
                $va_tk->status = 1;
                $va_tk->save();
            }
        } else
        if ($nm_unit == 'SDIT') {
            // set peran calon siswa SD
            $user->assignRole('Calon Siswa SD');
        } else
        if ($nm_unit == 'SMPIT') {
            // set peran calon siswa SMP
            $user->assignRole('Calon Siswa SMP');
        } else {
            // set peran calon siswa SMA
            $user->assignRole('Calon Siswa SMA');
        }

        return redirect()->route('login')->with(['success' => 'Anda berhasil terdaftar']);
    }
}
