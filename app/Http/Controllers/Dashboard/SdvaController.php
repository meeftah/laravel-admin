<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Sdva;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class SdvaController extends Controller
{
    public function datatableSdvaAPI()
    {
        // ambil semua data
        $sdva = Sdva::orderBy('kode_nama', 'ASC')->get();

        return datatables()->of($sdva)
            ->addIndexColumn()
            ->addColumn(
                'action',
                function ($row) {
                    $btn = '';
                    if (auth()->user()->can('sdva_ubah')) {
                        $btn   .= '<a href="' . route('dashboard.sdva.edit', $row['id_sdva']) . '" class="btn btn-warning btn-sm" title="UBAH"><i class="fa fa-pencil"></i></a> ';
                    }
                    if (auth()->user()->can('sdva_hapus')) {
                        $btn   .= '<button type="button" id="' . $row['id_sdva'] . '" class="delete btn btn-danger btn-sm" title="HAPUS"><i class="fa fa-trash"></i></button> ';
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
        abort_if(Gate::denies('sdva_lihat'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('dashboard.sdva.index');
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
        abort_if(Gate::denies('sdva_tambah'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rules = [
            'sdva'      => 'required',
            'kode_nama' => 'required',
            'status'    => 'required'
        ];

        $messages = [
            'required' => 'Kolom :attribute wajib diisi!'
        ];

        $this->validate($request, $rules, $messages);

        $sdva = new Sdva();
        $sdva->sdva      = $request->sdva;
        $sdva->kode_nama = $request->kode_nama;
        $sdva->status    = $request->status;

        if ($sdva->save()) {
            return back()->with(['success' => 'Data va sdit berhasil ditambah']);
        } else {
            return back()->with(['error' => 'Data va sdit gagal ditambah']);
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
        abort_if(Gate::denies('sdva_ubah'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sdva = Sdva::where('id_sdva', $id)->first();

        return view('dashboard.sdva.edit', compact('sdva'));
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
        abort_if(Gate::denies('sdva_ubah'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rules = [
            'sdva'      => 'required',
            'kode_nama' => 'required',
            'status'    => 'required'
        ];

        $messages = [
            'required' => 'Kolom :attribute wajib diisi!'
        ];

        $this->validate($request, $rules, $messages);

        $sdva = Sdva::where('id_sdva', $id)->first();
        $sdva->sdva      = $request->sdva;
        $sdva->kode_nama = $request->kode_nama;
        $sdva->status    = $request->status;

        if ($sdva->save()) {
            return redirect()->route('dashboard.sdva.index')->with(['success' => 'Data VA berhasil diubah']);
        } else {
            return back()->with(['error' => 'Data VA gagal diubah']);
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
        abort_if(Gate::denies('sdva_hapus'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sdva = Sdva::where('id_sdva', $id)->first();

        if ($sdva->delete()) {
            return response()->json(['status' => 'success', 'message' => 'Data VA berhasil dihapus']);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Data VA gagal dihapus']);
        }
    }
}
