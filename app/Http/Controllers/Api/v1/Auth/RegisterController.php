<?php

namespace App\Http\Controllers\Api\v1\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $status = false;
        $message = 'Maaf, terjadi kesalahan. Silakan coba beberapa saat lagi';
        $data = null;

        $rules = [
            'name'      => 'required',
            // 'username'  => [
            //     'required',
            //     'min:3',
            //     'unique:users,username',
            //     new WithoutSpaces('Kolom Username tidak boleh ada spasi!'),
            //     new NoDash('Kolom Username tidak boleh menggunakan tanda pisah (-)!'),
            //     new MustLowercase('Kolom Username harus menggunakan huruf kecil!')
            // ],
            'email'     => 'required|email|unique:users,email',
            'password'  => 'required|confirmed|min:6',
        ];

        $messages = [
            'name.required'             => 'Kolom Nama wajib diisi!',
            // 'username.required'         => 'Kolom Username wajib diisi!',
            // 'username.min'              => 'Kolom Username minimal 3 karakter!',
            // 'username.unique'           => 'Username sudah dipakai, silakan pilih username lain!',
            'email.required'            => 'Kolom Email wajib diisi!',
            'email.email'               => 'Format Email tidak sesuai!',
            'email.unique'              => 'Email sudah terdaftar, silakan pilih email yang lain!',
            'password.required'         => 'Kolom Password wajib diisi!',
            'password.confirmed'        => 'Kolom Password tidak sama dengan Konfirmasi Password!',
            'password.min'              => 'Kolom Password minimal 6 karakter!',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            $message = $validator->errors()->first();
        } else {
            // generate api token untuk akses mobile
            $request->merge(['api_token' => generateApiToken(60)]);
            // insert record user baru
            $user = User::create($request->all());
            if ($user) {
                $user->assignRole('user');

                $data = array(
                    'email'     => $user->email,
                    'api_token' => $user->api_token,
                );

                $status = true;
                $message = 'Berhasil daftar';
            }
        }

        return json_encode(array(
            'status'    => $status,
            'message'   => $message,
            'data'      => $data,
        ));
    }
}
