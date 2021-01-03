<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\CasisSd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class CasissdController extends Controller
{
    public function datatableCasissdAPI()
    {
        // ambil semua data
        $casissd = CasisSd::orderBy('created_at', 'ASC')->get();

        return datatables()->of($casissd)
            ->addIndexColumn()
            ->editColumn(
                'created_at',
                function ($row) {
                    return $row['created_at']->format('d/m/Y');
                }
            )
            ->editColumn(
                'status',
                function ($row) {
                    $status = '';
                    if ($row['status'] == 0) {
                        $status = '<span class="badge badge-danger p-2" style="font-size: 10pt; font-weight: 400">baru diferifikasi</span>';
                    } if ($row['status'] == 1){

                    }else
                    if ($row['status'] == 2) {
                        $status = '<span class="badge badge-success p-2 text-white" style="font-size: 10pt; font-weight: 400">data lengkap</span>';
                    }
                    return $status;
                }
            )
            ->addColumn(
                'action',
                function ($row) {
                    $btn = '';
                    if (auth()->user()->can('casissd_detail')) {
                        $btn   .= '<a href="' . route('dashboard.casissd.show', $row['id_casis_sd']) . '" class="btn btn-primary btn-sm" title="DETAIL"><i class="fa fa-eye"></i></a> ';
                    }
                    if (auth()->user()->can('casissd_ubah')) {
                        $btn   .= '<a href="' . route('dashboard.casissd.edit', $row['id_casis_sd']) . '" class="btn btn-warning btn-sm" title="UBAH"><i class="fa fa-pencil"></i></a> ';
                    }
                    if (auth()->user()->can('casissd_hapus')) {
                        $btn   .= '<button type="button" id="' . $row['id_casis_sd'] . '" class="delete btn btn-danger btn-sm" title="HAPUS"><i class="fa fa-trash"></i></button> ';
                    }

                    return $btn ?? '';
                }
            )
            ->rawColumns(['created_at', 'status','action'])
            ->make(true);
        }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('casissd_lihat'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('dashboard.casis.sd.index');
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
    public function destroy($id)
    {
        //
    }
}
