<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\CasisSd;
use App\Models\CasisTk;
use App\Models\StatusCasis;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpFoundation\Response;

class CasisTkController extends Controller
{
    public function datatableCasistkAPI()
    {
        // ambil semua data
        $casistk = CasisTk::select('tbl_casis_tk.*', 'tbl_va_tk.va', 'tbl_status_casis.status AS statuscasis', 'users.username')
            ->leftJoin('tbl_va_tk', 'tbl_va_tk.id_va_tk', '=', 'tbl_casis_tk.id_va_tk')
            ->leftJoin('tbl_status_casis', 'tbl_status_casis.id_status_casis', '=', 'tbl_casis_tk.id_status_casis')
            ->leftJoin('users', 'users.id', '=', 'tbl_casis_tk.id_user')
            ->orderBy('tbl_casis_tk.created_at', 'DESC')
            ->get();

        return datatables()->of($casistk)
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
                    if (auth()->user()->can('casistk_verifikasi')) {
                        $btn   .= '<button type="button" id="' . $row['id_casis_tk'] . '" class="btn-update-status btn btn-info btn-sm" title="UBAH STATUS"><i class="fa fa-check"></i></button> ';
                    }
                    if (auth()->user()->can('casistk_detail')) {
                        $btn   .= '<a href="' . route('dashboard.calon-siswa.tk.show', $row['id_casis_tk']) . '" class="btn btn-primary btn-sm" title="DETAIL"><i class="fa fa-eye"></i></a> ';
                    }
                    if (auth()->user()->can('casistk_ubah')) {
                        $btn   .= '<a href="' . route('dashboard.calon-siswa.tk.edit', $row['id_casis_tk']) . '" class="btn btn-warning btn-sm" title="UBAH"><i class="fa fa-pencil"></i></a> ';
                    }
                    if (auth()->user()->can('casistk_hapus')) {
                        $btn   .= '<button type="button" id="' . $row['id_casis_tk'] . '" class="delete btn btn-danger btn-sm" title="HAPUS"><i class="fa fa-trash"></i></button> ';
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
        abort_if(Gate::denies('casistk_lihat'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $status_casis = StatusCasis::get();

        return view('dashboard.casis.tk.index', compact('status_casis'));
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
        abort_if(Gate::denies('casistk_verifikasi'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $casistk = CasisTk::where('id_casis_tk', $request->id_casis_tk)->first();
        $casistk->id_status_casis = $request->id_status_casis;

        if ($casistk->save()) {
            // jika status di update ke terverifikasi
            $statusSiswa = StatusCasis::getDataById($request->id_status_casis)->status;
            if ($statusSiswa == config('ppdb.status.calon_siswa.terverifikasi')) {
                // kirim email verifikasi va
                $kepada     = User::getDataById($casistk->id_user)->username;
                $keEmail    = User::getDataById($casistk->id_user)->email;
                $data       = array(
                    'username' => User::getDataById($casistk->id_user)->username,
                );

                Mail::send('dashboard.mail.verifikasi-va', $data, function ($message) use ($kepada, $keEmail) {
                    $message->to(
                        $keEmail,
                        $kepada
                    )->subject('Verifikasi Akun Calon Siswa TK ' . config('app.name'));

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
        abort_if(Gate::denies('casissd_hapus'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $casissd = CasisSd::where('id_casis_sd', $id)->first();
        $id_user = $casissd->id_user;

        if ($casissd->delete()) {
            $user = User::where('id', $id_user)->first();
            $user->delete();

            return response()->json(['status' => 'success', 'message' => 'Data calon siswa SD berhasil dihapus']);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Data calon siswa SD gagal dihapus']);
        }
    }
}
