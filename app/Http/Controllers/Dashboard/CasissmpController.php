<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\CasisSmp;
use App\Models\Dokumensmp;
use App\Models\StatusCasis;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class CasisSmpController extends Controller
{
    public function datatableCasissmpAPI()
    {
        // ambil semua data
        $casissmp = CasisSmp::select('tbl_casis_smp.*', 'tbl_va_smp.va', 'tbl_status_casis.status AS statuscasis', 'users.username', 'users.email')
            ->leftJoin('tbl_va_smp', 'tbl_va_smp.id_va_smp', '=', 'tbl_casis_smp.id_va_smp')
            ->leftJoin('tbl_status_casis', 'tbl_status_casis.id_status_casis', '=', 'tbl_casis_smp.id_status_casis')
            ->leftJoin('users', 'users.id', '=', 'tbl_casis_smp.id_user')
            ->orderBy('tbl_casis_smp.created_at', 'DESC')
            ->get();

        return datatables()->of($casissmp)
            ->addIndexColumn()
            ->editColumn(
                'nm_siswa',
                function ($row) {
                    return $row['nm_siswa'] ? strtoupper($row['nm_siswa']) : strtoupper($row['username']);
                }
            )
            ->editColumn(
                'va',
                function ($row) {
                    $statusva = '';
                    if ($row['statuscasis'] == config('ppdb.status.calon_siswa.terdaftar')) {
                        $statusva = '<span class="badge badge-secondary p-2" style="font-size: 10pt; font-weight: 400">' . strtolower($row['va']) . '</span>';
                    }
                    if ($row['statuscasis'] == config('ppdb.status.calon_siswa.terverifikasi')) {
                        $statusva = '<span class="badge badge-info p-2" style="font-size: 10pt; font-weight: 400">' . strtolower($row['va']) . '</span>';
                    }
                    if ($row['statuscasis'] == config('ppdb.status.calon_siswa.datalengkap')) {
                        $statusva = '<span class="badge badge-primary p-2" style="font-size: 10pt; font-weight: 400">' . strtolower($row['va']) . '</span>';
                    }
                    if ($row['statuscasis'] == config('ppdb.status.calon_siswa.lulus')) {
                        $statusva = '<span class="badge badge-success p-2" style="font-size: 10pt; font-weight: 400">' . strtolower($row['va']) . '</span>';
                    }
                    if ($row['statuscasis'] == config('ppdb.status.calon_siswa.nonaktif')) {
                        $statusva = '<span class="badge badge-danger p-2" style="font-size: 10pt; font-weight: 400">' . strtolower($row['va']) . '</span>';
                    }
                    
                    return $statusva;
                }
            )
            ->editColumn(
                'created_at',
                function ($row) {
                    return $row['created_at']->isoFormat('DD MMM YYYY, HH:mm');
                }
            )
            ->addColumn(
                'action',
                function ($row) {
                    $btn = '';
                    if (auth()->user()->can('casissmp_verifikasi')) {
                        $btn   .= '<button type="button" id="' . $row['id_casis_smp'] . '" class="btn-update-status btn btn-info btn-sm" title="UBAH STATUS"><i class="fa fa-check"></i></button> ';
                    }
                    if (auth()->user()->can('casissmp_detail')) {
                        $btn   .= '<a href="' . route('dashboard.calon-siswa.smp.show', $row['id_casis_smp']) . '" class="btn btn-primary btn-sm" title="DETAIL"><i class="fa fa-eye"></i></a> ';
                    }
                    if (auth()->user()->can('casissmp_ubah')) {
                        $btn   .= '<a href="' . route('dashboard.calon-siswa.smp.edit', $row['id_casis_smp']) . '" class="btn btn-warning btn-sm" title="UBAH"><i class="fa fa-pencil"></i></a> ';
                    }
                    if (auth()->user()->can('casissmp_hapus')) {
                        $btn   .= '<button type="button" id="' . $row['id_casis_smp'] . '" class="delete btn btn-danger btn-sm" title="HAPUS"><i class="fa fa-trash"></i></button> ';
                    }

                    if (!empty($btn)) {
                        $divGroupPrefix = '<div class="btn-group" role="group" aria-label="Aksi Group Button">';
                        $divGroupSuffix = '</div';
                        $btn = $divGroupPrefix . $btn . $divGroupSuffix;

                    }

                    return $btn ?? '';
                }
            )
            ->rawColumns(['created_at', 'va', 'action'])
            ->make(true);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('casissmp_lihat'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $status_casis = StatusCasis::get();

        return view('dashboard.casis.smp.index', compact('status_casis'));
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

        $casis = CasisSmp::where('id_casis_smp', $id)
            ->leftJoin('tbl_data_ortu', 'tbl_casis_smp.id_data_ortu', '=', 'tbl_data_ortu.id_data_ortu')
            ->first();

        // Dokumen Siswa
        $casis->ktp_ayah = Dokumensmp::where('id_casis_smp', $id)->where('id_jenisdokumen_smp', '7dfc0b93-dfba-4988-a9c8-b4039210c045')->first()->dokumen ?? '';
        $casis->ktp_ibu  = Dokumensmp::where('id_casis_smp', $id)->where('id_jenisdokumen_smp', '43fcd618-6f4b-46b5-bdbd-0f88bb49dad5')->first()->dokumen ?? '';
        $casis->kk       = Dokumensmp::where('id_casis_smp', $id)->where('id_jenisdokumen_smp', '0ca3c7f4-5262-40c1-b2b5-4a375553daa0')->first()->dokumen ?? '';
        $casis->akte     = Dokumensmp::where('id_casis_smp', $id)->where('id_jenisdokumen_smp', 'c58283e1-7254-4372-a27e-bc1d2fcfe4cd')->first()->dokumen ?? '';
        $casis->skd      = Dokumensmp::where('id_casis_smp', $id)->where('id_jenisdokumen_smp', '79c9fb49-7fc9-497e-9802-b6e7de9d5cc3')->first()->dokumen ?? '';
        $casis->kelas5semester1 = Dokumensmp::where('id_casis_smp', $id)->where('id_jenisdokumen_smp', '7274cd7c-a6df-4bbd-82b3-ea4784a4318f')->first()->dokumen ?? '';
        $casis->kelas5semester2 = Dokumensmp::where('id_casis_smp', $id)->where('id_jenisdokumen_smp', '90b72f46-27cf-4ebc-9ce8-df93816f10f7')->first()->dokumen ?? '';
        $casis->kelas6semester1 = Dokumensmp::where('id_casis_smp', $id)->where('id_jenisdokumen_smp', '8d8a2ab1-eba0-4607-b021-3afd9453f536')->first()->dokumen ?? '';

        return view('dashboard.casis.smp.show', compact('casis'));
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
    public function updateStatus(Request $request)
    {
        abort_if(Gate::denies('casissmp_verifikasi'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $casissmp = CasisSmp::where('id_casis_smp', $request->id_casis_smp)->first();
        $casissmp->id_status_casis = $request->id_status_casis;

        if ($casissmp->save()) {
            // jika status di update ke terverifikasi
            $statusSiswa = StatusCasis::getDataById($request->id_status_casis)->status;
            if ($statusSiswa == config('ppdb.status.calon_siswa.terverifikasi')) {
                // kirim email verifikasi va
                $kepada     = User::getDataById($casissmp->id_user)->username;
                $keEmail    = User::getDataById($casissmp->id_user)->email;
                $data       = array(
                    'username' => User::getDataById($casissmp->id_user)->username,
                );

                Mail::send('dashboard.mail.verifikasi-va', $data, function ($message) use ($kepada, $keEmail) {
                    $message->to(
                        $keEmail,
                        $kepada
                    )->subject('Verifikasi Akun Calon Siswa SMP ' . config('app.name'));

                    $message->from(
                        config('mail.from.address'),
                        config('app.name')
                    );
                });

                // jika gagal kirim email
                if (Mail::failures()) {
                    return response()->json(['status' => 'warning', 'message' => 'Status berhasil diubah, namun gagal mengirimkan notifikasi ke email']);
                }
            }

            return response()->json(['status' => 'success', 'message' => 'Status berhasil diubah']);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Status gagal diubah']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        abort_if(Gate::denies('casissmp_hapus'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // hapus data calon siswa di tabel calon siswa
        $casissmp = CasisSmp::where('id_casis_smp', $id)->first();

        // dapatkan id user
        $id_user = $casissmp->id_user;

        if ($casissmp->delete()) {
            // hapus data calon siswa di tabel user
            $user = User::where('id', $id_user)->first();
            $user->delete();

            // hapus semua file calon siswa
            $dokumen = Dokumensmp::where('id_casis_smp', $id_user)->get();
            if ($dokumen->count() > 0) {
                foreach ($dokumen as $item) {
                    if (Storage::disk('casis')->exists($item->dokumen)) {
                        Storage::disk('casis')->delete($item->dokumen);
                    }
                }
            }

            return response()->json(['status' => 'success', 'message' => 'Data calon siswa SMP berhasil dihapus']);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Data calon siswa SMP gagal dihapus']);
        }
    }
}
