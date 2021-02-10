<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\InfoTambahan;
use App\Models\InfoTambahanDaftar;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;

class InfoTambahanDaftarController extends Controller
{
    public function datatableAPI()
    {
        // ambil semua data
        $data = InfoTambahanDaftar::orderBy('created_at', 'ASC')->get();

        return datatables()->of($data)
            ->addIndexColumn()
            ->addColumn(
                'action',
                function ($row) {
                    $btn = '';
                    if (auth()->user()->can('info-tambahan-detail_tambah')) {
                        $btn   .= '<a href="' . route('dashboard.info-tambahan-daftar.index', $row['id']) . '" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="TAMBAH DAFTAR"><i class="fa fa-plus-circle"></i></a> ';
                    }
                    if (auth()->user()->can('info-tambahan_detail')) {
                        $btn   .= '<a href="' . route('dashboard.info-tambahan.show', $row['id']) . '" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="LIHAT DETAIL"><i class="fa fa-eye"></i></a> ';
                    }
                    if (auth()->user()->can('info-tambahan_ubah')) {
                        $btn   .= '<a href="' . route('dashboard.info-tambahan.edit', $row['id']) . '" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top" title="UBAH"><i class="fa fa-pencil"></i></a> ';
                    }
                    if (auth()->user()->can('info-tambahan_hapus')) {
                        $btn   .= '<button type="button" id="' . $row['id'] . '" class="delete btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="HAPUS"><i class="fa fa-trash"></i></button> ';
                    }

                    if (!empty($btn)) {
                        $divGroupPrefix = '<div class="btn-group" role="group" aria-label="Aksi Group Button">';
                        $divGroupSuffix = '</div';
                        $btn = $divGroupPrefix . $btn . $divGroupSuffix;
                    }

                    return $btn ?? '';
                }
            )
            ->rawColumns(['action'])
            ->make(true);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        abort_if(Gate::denies('info-tambahan-daftar_lihat'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $infoTambahan = InfoTambahan::where('id', $id)->first();
        if ($infoTambahan) {
            return view('dashboard.infotambahandaftar.index', compact('infoTambahan', 'id'));
        } else {
            return redirect()->route('dashboard.info-tambahan.index')->with(['error' => 'Data tidak ditemukan']);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        abort_if(Gate::denies('info-tambahan-daftar_tambah'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $infoTambahan = InfoTambahan::where('id', $id)->first();

        return view('dashboard.infotambahandaftar.create', compact('infoTambahan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        abort_if(Gate::denies('info-tambahan-daftar_tambah'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = new InfoTambahanDaftar();
        $data->id_info_tambahan = $id;
        $data->judul = $request->judul;
        
        if ($data->save()) {
            return redirect()->route('dashboard.info-tambahan-daftar.index', $id)->with(['success' => 'Berhasil menyimpan data']);
        } else {
            return redirect()->route('dashboard.info-tambahan-daftar.index', $id)->with(['error' => 'Gagal menyimpan data, silakan coba kembali']);
        }
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
