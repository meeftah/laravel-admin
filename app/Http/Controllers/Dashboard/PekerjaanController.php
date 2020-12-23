<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Pekerjaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class PekerjaanController extends Controller
{
    public function datatablePekerjaanAPI()
    {
        // ambil semua data
        $pekerjaan = Pekerjaan::orderBy('kode', 'ASC')->get();

        return datatables()->of($pekerjaan)
            ->addIndexColumn()
            ->addColumn(
                'action',
                function ($row) {
                    $btn = '';
                    if (auth()->user()->can('pekerjaan_ubah')) {
                        $btn   .= '<a href="' . route('dashboard.pekerjaan.edit', $row['id_pekerjaan']) . '" class="btn btn-warning btn-sm" title="UBAH"><i class="fa fa-pencil"></i></a> ';
                    }
                    if (auth()->user()->can('pekerjaan_hapus')) {
                        $btn   .= '<button type="button" id="' . $row['id_pekerjaan'] . '" class="delete btn btn-danger btn-sm" title="HAPUS"><i class="fa fa-trash"></i></button> ';
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
        abort_if(Gate::denies('pekerjaan_lihat'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('dashboard.masterdata.pekerjaan.index');
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

        abort_if(Gate::denies('pekerjaan_tambah'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rules = [
            'kode' => 'required',
            'pekerjaan' => 'required',
        ];

        $messages = [
            'required' => 'Kolom :attribute wajib diisi!'
        ];

        $this->validate($request, $rules, $messages);

        $pekerjaan = new Pekerjaan();
        $pekerjaan->kode = $request->kode;
        $pekerjaan->pekerjaan = $request->pekerjaan;

        if ($pekerjaan->save()) {
            return back()->with(['success' => 'Data pekerjaan berhasil ditambah']);
        } else {
            return back()->with(['error' => 'Data pekerjaan gagal ditambah']);
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
        abort_if(Gate::denies('pekerjaan_ubah'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pekerjaan = Pekerjaan::where('id_pekerjaan', $id)->first();

        return view('dashboard.masterdata.pekerjaan.edit', compact('pekerjaan'));
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

        abort_if(Gate::denies('pekerjaan_ubah'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rules = [
            'kode' => 'required',
            'pekerjaan' => 'required',
        ];

        $messages = [
            'required' => 'Kolom :attribute wajib diisi!'
        ];

        $this->validate($request, $rules, $messages);

        $pekerjaan = Pekerjaan::where('id_pekerjaan', $id)->first();
        $pekerjaan->kode = $request->kode;
        $pekerjaan->pekerjaan = $request->pekerjaan;

        if ($pekerjaan->save()) {
            return redirect()->route('dashboard.pekerjaan.index')->with(['success' => 'Data pekerjaan berhasil diubah']);
        } else {
            return back()->with(['error' => 'Data pekerjaan gagal diubah']);
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

        abort_if(Gate::denies('pekerjaan_hapus'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pekerjaan = Pekerjaan::where('id_pekerjaan', $id)->first();

        if ($pekerjaan->delete()) {
            return response()->json(['status' => 'success', 'message' => 'Data pekerjaan berhasil dihapus']);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Data pekerjaan gagal dihapus']);
        }
    }
}
