<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\CasisSma;
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
        $casissma = CasisSma::select('tbl_casis_sma.*', 'tbl_va_sma.va', 'tbl_status_casis.status AS statuscasis', 'users.username')
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
                'created_at',
                function ($row) {
                    return $row['created_at']->format('d/m/Y, H:i');
                }
            )
            ->editColumn(
                'statuscasis',
                function ($row) {
                    $status = '';
                    if ($row['statuscasis'] == config('ppdb.status.calon_siswa.terdaftar')) {
                        $status = '<span class="badge badge-secondary p-2" style="font-size: 10pt; font-weight: 400">' . strtolower($row['statuscasis']) . '</span>';
                    }
                    if ($row['statuscasis'] == config('ppdb.status.calon_siswa.terverifikasi')) {
                        $status = '<span class="badge badge-info p-2" style="font-size: 10pt; font-weight: 400">' . strtolower($row['statuscasis']) . '</span>';
                    }
                    if ($row['statuscasis'] == config('ppdb.status.calon_siswa.datalengkap')) {
                        $status = '<span class="badge badge-primary p-2" style="font-size: 10pt; font-weight: 400">' . strtolower($row['statuscasis']) . '</span>';
                    }
                    if ($row['statuscasis'] == config('ppdb.status.calon_siswa.lulus')) {
                        $status = '<span class="badge badge-success p-2" style="font-size: 10pt; font-weight: 400">' . strtolower($row['statuscasis']) . '</span>';
                    }
                    if ($row['statuscasis'] == config('ppdb.status.calon_siswa.nonaktif')) {
                        $status = '<span class="badge badge-danger p-2" style="font-size: 10pt; font-weight: 400">' . strtolower($row['statuscasis']) . '</span>';
                    }
                    return $status;
                }
            )
            ->addColumn(
                'action',
                function ($row) {
                    $btn = '';
                    if (auth()->user()->can('casissma_verifikasi')) {
                        $btn   .= '<button type="button" id="' . $row['id_casis_sma'] . '" class="btn-update-status btn btn-info btn-sm" title="UBAH STATUS"><i class="fa fa-check"></i></button> ';
                    }
                    if (auth()->user()->can('casissma_detail')) {
                        $btn   .= '<a href="' . route('dashboard.calon-siswa.sma.show', $row['id_casis_sma']) . '" class="btn btn-primary btn-sm" title="DETAIL"><i class="fa fa-eye"></i></a> ';
                    }
                    if (auth()->user()->can('casissma_ubah')) {
                        $btn   .= '<a href="' . route('dashboard.calon-siswa.sma.edit', $row['id_casis_sma']) . '" class="btn btn-warning btn-sm" title="UBAH"><i class="fa fa-pencil"></i></a> ';
                    }
                    if (auth()->user()->can('casissma_hapus')) {
                        $btn   .= '<button type="button" id="' . $row['id_casis_sma'] . '" class="delete btn btn-danger btn-sm" title="HAPUS"><i class="fa fa-trash"></i></button> ';
                    }

                    return $btn ?? '';
                }
            )
            ->rawColumns(['created_at', 'statuscasis', 'action'])
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
