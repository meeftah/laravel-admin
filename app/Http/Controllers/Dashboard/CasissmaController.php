<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\CasisSma;
use App\Models\Dokumensma;
use App\Models\StatusCasis;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpFoundation\Response;

class CasisSmaController extends Controller
{
    public function datatableCasissmaAPI()
    {
        // ambil semua data
        $casissma = CasisSma::select('tbl_casis_sma.*', 'tbl_va_sma.va', 'tbl_status_casis.status AS statuscasis', 'users.username', 'users.email')
            ->leftJoin('tbl_va_sma', 'tbl_va_sma.id_va_sma', '=', 'tbl_casis_sma.id_va_sma')
            ->leftJoin('tbl_status_casis', 'tbl_status_casis.id_status_casis', '=', 'tbl_casis_sma.id_status_casis')
            ->leftJoin('users', 'users.id', '=', 'tbl_casis_sma.id_user')
            ->orderBy('tbl_casis_sma.created_at', 'DESC')
            ->get();

        return datatables()->of($casissma)
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
                    if (auth()->user()->can('casissma_verifikasi')) {
                        $btn   .= '<button type="button" id="' . $row['id_casis_sma'] . '" class="btn-update-status btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="UBAH STATUS"><i class="fa fa-check"></i></button> ';
                    }
                    if (auth()->user()->can('casissma_detail')) {
                        $btn   .= '<a href="' . route('dashboard.calon-siswa.sma.show', $row['id_casis_sma']) . '" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="DETAIL"><i class="fa fa-eye"></i></a> ';
                    }
                    if (auth()->user()->can('casissma_ubah')) {
                        $btn   .= '<a href="' . route('dashboard.calon-siswa.sma.edit', $row['id_casis_sma']) . '" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top" title="UBAH"><i class="fa fa-pencil"></i></a> ';
                    }
                    if (auth()->user()->can('casissma_hapus')) {
                        $btn   .= '<button type="button" id="' . $row['id_casis_sma'] . '" class="delete btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="HAPUS"><i class="fa fa-trash"></i></button> ';
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
        abort_if(Gate::denies('casissma_lihat'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $status_casis = StatusCasis::get();

        return view('dashboard.casis.sma.index', compact('status_casis'));
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


        $casis = CasisSma::where('id_casis_sma', $id)
            ->leftJoin('tbl_data_ortu', 'tbl_casis_sma.id_data_ortu', '=', 'tbl_data_ortu.id_data_ortu')
            ->first();

        // Dokumen Siswa
        $casis->ktp_ayah = Dokumensma::where('id_casis_sma', $id)->where('id_jenisdokumen_sma', '7dfc0b93-dfba-4988-a9c8-b4039210c045')->first()->dokumen ?? '';
        $casis->ktp_ibu  = Dokumensma::where('id_casis_sma', $id)->where('id_jenisdokumen_sma', '43fcd618-6f4b-46b5-bdbd-0f88bb49dad5')->first()->dokumen ?? '';
        $casis->kk       = Dokumensma::where('id_casis_sma', $id)->where('id_jenisdokumen_sma', '0ca3c7f4-5262-40c1-b2b5-4a375553daa0')->first()->dokumen ?? '';
        $casis->akte     = Dokumensma::where('id_casis_sma', $id)->where('id_jenisdokumen_sma', 'c58283e1-7254-4372-a27e-bc1d2fcfe4cd')->first()->dokumen ?? '';
        $casis->skd      = Dokumensma::where('id_casis_sma', $id)->where('id_jenisdokumen_sma', '79c9fb49-7fc9-497e-9802-b6e7de9d5cc3')->first()->dokumen ?? '';
        $casis->kelas8semester1 = Dokumensma::where('id_casis_sma', $id)->where('id_jenisdokumen_sma', 'e939bcab-5053-4c0f-b5ce-9e22e19eeaac')->first()->dokumen ?? '';
        $casis->kelas8semester2 = Dokumensma::where('id_casis_sma', $id)->where('id_jenisdokumen_sma', 'ff3b5ecc-c823-46df-9621-770134fd4e71')->first()->dokumen ?? '';
        $casis->kelas9semester1 = Dokumensma::where('id_casis_sma', $id)->where('id_jenisdokumen_sma', 'bb6bab39-cfed-4016-98ab-f69b59a500f9')->first()->dokumen ?? '';

        return view('dashboard.casis.sma.show', compact('casis'));
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

    public function updateStatus(Request $request)
    {
        abort_if(Gate::denies('casissma_verifikasi'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $casissma = CasisSma::where('id_casis_sma', $request->id_casis_sma)->first();
        $casissma->id_status_casis = $request->id_status_casis;

        if ($casissma->save()) {
            // jika status di update ke terverifikasi
            $statusSiswa = StatusCasis::getDataById($request->id_status_casis)->status;
            if ($statusSiswa == config('ppdb.status.calon_siswa.terverifikasi')) {
                // kirim email verifikasi va
                $kepada     = User::getDataById($casissma->id_user)->username;
                $keEmail    = User::getDataById($casissma->id_user)->email;
                $data       = array(
                    'username' => User::getDataById($casissma->id_user)->username,
                );

                Mail::send('dashboard.mail.verifikasi-va', $data, function ($message) use ($kepada, $keEmail) {
                    $message->to(
                        $keEmail,
                        $kepada
                    )->subject('Verifikasi Akun Calon Siswa SMA ' . config('app.name'));

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

        abort_if(Gate::denies('casissma_hapus'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $casissma = CasisSma::where('id_casis_sma', $id)->first();
        $id_user = $casissma->id_user;

        if ($casissma->delete()) {
            $user = User::where('id', $id_user)->first();
            $user->delete();

            return response()->json(['status' => 'success', 'message' => 'Data calon siswa sma berhasil dihapus']);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Data calon siswa sma gagal dihapus']);
        }
    }
}
