<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Unit;
use App\Models\User;
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
        return view('frontend.register', compact('unit'));
    }

    public function register(Request $request)
    {
        $rules = [
            'username' => 'required|min:3|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'nohp' => 'required|min:11|max:13|unique:users,nohp',
            'password' => 'required|confirmed|min:6',
            'id_unit' => 'required',
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
            'id_unit.required' => 'Kolom unit wajib dipilih!',
        ];

        $this->validate($request, $rules, $messages);

        $user = User::create($request->all());

        $nm_unit = Unit::getDataById($request->id_unit)->nm_unit;
        if ($nm_unit == 'TKIT') {
            $user->assignRole('Calon Siswa TK');
        } else
        if ($nm_unit == 'SDIT') {
            $user->assignRole('Calon Siswa SD');
        } else
        if ($nm_unit == 'SMPIT') {
            $user->assignRole('Calon Siswa SMP');
        } else
        if ($nm_unit == 'SMAIT') {
            $user->assignRole('Calon Siswa SMA');
        } else

        return redirect()->route('login')->with(['success' => 'Anda berhasil terdaftar']);
    }
}
