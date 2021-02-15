<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\InfoTambahan;
use App\Models\InfoTambahanDetail;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;

class InfoTambahanDetailController extends Controller
{
    public function datatableAPI($id)
    {
        // ambil semua data
        $data = InfoTambahanDetail::where('id_info_tambahan', $id)->orderBy('created_at', 'ASC')->get();

        return datatables()->of($data)
            ->addIndexColumn()
            ->addColumn(
                'action',
                function ($row) {
                    $btn = '';
                    if (auth()->user()->can('info-tambahan-detail_detail')) {
                        $btn   .= '<a href="' . route('dashboard.info-tambahan-detail.show', $row['id']) . '" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="LIHAT DETAIL"><i class="fa fa-eye"></i></a> ';
                    }
                    if (auth()->user()->can('info-tambahan-detail_ubah')) {
                        $btn   .= '<a href="' . route('dashboard.info-tambahan-detail.edit', $row['id']) . '" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top" title="UBAH"><i class="fa fa-pencil"></i></a> ';
                    }
                    if (auth()->user()->can('info-tambahan-detail_hapus')) {
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
        abort_if(Gate::denies('info-tambahan-detail_lihat'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('dashboard.infotambahandetail.index', compact('id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        abort_if(Gate::denies('info-tambahan-detail_tambah'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $infoTambahan = InfoTambahan::where('id', $id)->first();

        return view('dashboard.infotambahandetail.create', compact('infoTambahan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        abort_if(Gate::denies('info-tambahan-detail_tambah'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = new InfoTambahanDaftar();
        $data->id_info_tambahan = $request->id_info_tambahan;
        $data->judul = $request->judul;
        
        if ($data->save()) {
            return redirect()->route('dashboard.info-tambahan-detail.index', $request->id_info_tambahan)->with(['success' => 'Berhasil menyimpan data']);
        } else {
            return redirect()->route('dashboard.info-tambahan-detail.index', $request->id_info_tambahan)->with(['error' => 'Gagal menyimpan data, silakan coba kembali']);
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
        abort_if(Gate::denies('info-tambahan-detail_detail'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $infoTambahanDaftar = InfoTambahanDaftar::where('id', $id)->first();

        return view('dashboard.infotambahandetail.show', compact('infoTambahanDaftar'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        abort_if(Gate::denies('info-tambahan-detail_ubah'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $infoTambahanDaftar = InfoTambahanDaftar::where('id', $id)->first();

        return view('dashboard.infotambahandetail.edit', compact('infoTambahanDaftar'));
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
        abort_if(Gate::denies('info-tambahan-detail_ubah'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // dd($request->all());

        $data = InfoTambahanDaftar::where('id', $id)->first();
        $data->id_info_tambahan = $request->id_info_tambahan;
        $data->judul = $request->judul;
        
        if ($data->save()) {
            return redirect()->route('dashboard.info-tambahan-detail.index', $request->id_info_tambahan)->with(['success' => 'Berhasil menyimpan data']);
        } else {
            return redirect()->route('dashboard.info-tambahan-detail.index', $request->id_info_tambahan)->with(['error' => 'Gagal menyimpan data, silakan coba kembali']);
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
        abort_if(Gate::denies('info-tambahan-detail_hapus'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $infoTambahanDaftar = InfoTambahanDaftar::where('id', $id)->first();

        if ($infoTambahanDaftar->delete()) {
            return response()->json(['status' => 'success', 'message' => 'Info tambahan berhasil dihapus']);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Info tambahan gagal dihapus']);
        }
    }
}
