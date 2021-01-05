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
use Symfony\Component\HttpFoundation\Response;

class CasisSmpController extends Controller
{
    public function datatableCasissmpAPI()
    {
        // ambil semua data
        $casissmp = CasisSmp::select('tbl_casis_smp.*', 'tbl_va_smp.va', 'tbl_status_casis.status AS statuscasis', 'users.username')
            ->leftJoin('tbl_va_smp', 'tbl_va_smp.id_va_smp', '=', 'tbl_casis_smp.id_va_smp')
            ->leftJoin('tbl_status_casis', 'tbl_status_casis.id_status_casis', '=', 'tbl_casis_smp.id_status_casis')
            ->leftJoin('users', 'users.id', '=', 'tbl_casis_smp.id_user')
            ->orderBy('tbl_casis_smp.created_at', 'ASC')
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
                'created_at',
                function ($row) {
                    return $row['created_at']->format('d/m/Y');
                }
            )
            ->editColumn(
                'statuscasis',
                function ($row) {
                    $status = '';
                    if ($row['statuscasis'] == config('status_ppdb.calon_siswa.terdaftar')) {
                        $status = '<span class="badge badge-secondary p-2" style="font-size: 10pt; font-weight: 400">' . strtolower($row['statuscasis']) . '</span>';
                    }
                    if ($row['statuscasis'] == config('status_ppdb.calon_siswa.terverifikasi')) {
                        $status = '<span class="badge badge-info p-2" style="font-size: 10pt; font-weight: 400">' . strtolower($row['statuscasis']) . '</span>';
                    }
                    if ($row['statuscasis'] == config('status_ppdb.calon_siswa.datalengkap')) {
                        $status = '<span class="badge badge-primary p-2" style="font-size: 10pt; font-weight: 400">' . strtolower($row['statuscasis']) . '</span>';
                    }
                    if ($row['statuscasis'] == config('status_ppdb.calon_siswa.lulus')) {
                        $status = '<span class="badge badge-success p-2" style="font-size: 10pt; font-weight: 400">' . strtolower($row['statuscasis']) . '</span>';
                    }
                    if ($row['statuscasis'] == config('status_ppdb.calon_siswa.nonaktif')) {
                        $status = '<span class="badge badge-danger p-2" style="font-size: 10pt; font-weight: 400">' . strtolower($row['statuscasis']) . '</span>';
                    }
                    return $status;
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
            if ($statusSiswa == config('status_ppdb.calon_siswa.terverifikasi')) {
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
                        config('app.name'));
                });
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
