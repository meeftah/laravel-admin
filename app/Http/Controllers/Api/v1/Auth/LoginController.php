<?php

namespace App\Http\Controllers\Api\v1\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $status = false;
        $message = 'Maaf, terjadi kesalahan. Silakan coba beberapa saat lagi';
        $data = null;

        if ($request->email && $request->password) {
            $user = User::where('email', $request->email)->first();
            if ($user) {
                if (Hash::check($request->password, $user->password)) {
                    if ($user->hasRole('user')) {
                        $data = array(
                            'email'     => $user->email,
                            'api_token' => $user->api_token,
                        );

                        $status = true;
                        $message = 'Berhasil login';
                    } else {
                        $status = false;
                        $message = 'Mohon maaf, Anda tidak mempunyai akses ke aplikasi ini';
                    }
                } else {
                    $status = false;
                    $message = 'Maaf, password anda salah. Silakan coba kembali';
                }
            } else {
                $status = false;
                $message = 'Maaf, anda belum terdaftar. Segera ke halaman register untuk daftar';
            }
        } else {
            $status = false;
            $message = 'Maaf, kolom USERNAME dan PASSWORD tidak boleh kosong';
        }

        return json_encode(array(
            'status'    => $status,
            'message'   => $message,
            'data'      => $data,
        ));
    }
}
