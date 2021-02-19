<?php

namespace App\Http\Controllers\Api\v1\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\InfoTambahan;
use Illuminate\Http\Request;

class Modul2Controller extends Controller
{
    public function index(Request $request)
    {
        $status     = false;
        $message    = 'Gagal memuat data silakan coba kembali beberapa saat lagi';
        $data       = null;

        if (checkUserToken($request->bearerToken(), $request->header('email'))) {
            $infoTambahan = InfoTambahan::select('id', 'judul', 'deskripsi', 'ikon')
                ->with(['infoTambahanDaftar' => function ($query) {
                    $query->select([
                        'id',
                        'id_info_tambahan',
                        'judul',
                        'deskripsi',
                        'ikon'
                    ]);
                }])
                ->orderBy('created_at', 'ASC')
                ->get();

            foreach ($infoTambahan as $item) {
                $item->ikon = $item->ikon ? url('storage/uploads/modul2/' . $item->ikon) : null;
            }

            $data = $infoTambahan;
            $status     = true;
            $message    = 'Berhasil memuat data';
        } else {
            $message = 'Maaf, Anda tidak mempunyai akses. Silakan logout dan login kembali';
        }

        return json_encode(array(
            'status'    => $status,
            'message'   => $message,
            'data'      => $data,
        ));
    }
}
