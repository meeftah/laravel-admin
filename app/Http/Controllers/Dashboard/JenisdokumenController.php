<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Jenisdokumen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class JenisdokumenController extends Controller
{
    public function datatableJenisdokumenAPI()
    {
        // ambil semua data
        $jenisdokumen = Jenisdokumen::orderBy('created_at', 'ASC')->get();

        return datatables()->of($jenisdokumen)
            ->addIndexColumn()
            ->addColumn(
                'action',
                function ($row) {
                    $btn = '';
                    if (auth()->user()->can('jenisdokumen_ubah')) {
                        $btn   .= '<a href="' . route('dashboard.jenisdokumen.edit', $row['id_jenisdokumen']) . '" class="btn btn-warning btn-sm" title="UBAH"><i class="fa fa-pencil"></i></a> ';
                    }
                    if (auth()->user()->can('jenisdokumen_hapus')) {
                        $btn   .= '<button type="button" id="' . $row['id_jenisdokumen'] . '" class="delete btn btn-danger btn-sm" title="HAPUS"><i class="fa fa-trash"></i></button> ';
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
    public function index()
    {
        abort_if(Gate::denies('jenisdokumen_lihat'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('dashboard.datamaster.jenisdokumen.index');
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
        abort_if(Gate::denies('jenisdokumen_tambah'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rules = [
            'jenisdokumen' => 'required',
        ];

        $messages = [
            'required' => 'Kolom :attribute wajib diisi!'
        ];

        $this->validate($request, $rules, $messages);

        $jenisdokumen = new Jenisdokumen();
        $jenisdokumen->jenisdokumen = $request->jenisdokumen;
        $jenisdokumen->unit = $request->unit;

        if ($jenisdokumen->save()) {
            return back()->with(['success' => 'Data jenis dokumen berhasil ditambah']);
        } else {
            return back()->with(['error' => 'Data jenis dokumen gagal ditambah']);
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
        abort_if(Gate::denies('jenisdokumen_ubah'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jenisdokumen = Jenisdokumen::where('id_jenisdokumen', $id)->first();

        return view('dashboard.datamaster.jenisdokumen.edit', compact('jenisdokumen'));
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

        abort_if(Gate::denies('jenisdokumen_ubah'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rules = [
            'jenisdokumen' => 'required'
        ];

        $messages = [
            'required' => 'Kolom :attribute wajib diisi!'
        ];

        $this->validate($request, $rules, $messages);
        $jenisdokumen = Jenisdokumen::where('id_jenisdokumen', $id)->first();
        $jenisdokumen->jenisdokumen = $request->jenisdokumen;
        $jenisdokumen->unit = $request->unit;

        if ($jenisdokumen->save()) {
            return redirect()->route('dashboard.jenisdokumen.index')->with(['success' => 'Data jenis dokumen berhasil diubah']);
        } else {
            return back()->with(['error' => 'Data jenis dokumen gagal diubah']);
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


        abort_if(Gate::denies('jenisdokumen_hapus'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jenisdokumen = Jenisdokumen::where('id_jenisdokumen', $id)->first();

        if ($jenisdokumen->delete()) {
            return response()->json(['status' => 'success', 'message' => 'Data jenis ujian berhasil dihapus']);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Data jenis ujian gagal dihapus']);
        }
    }
}
