<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Smpva;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class SmpvaController extends Controller
{
    public function datatableSmpvaAPI()
    {
        // ambil semua data
        $smpva = Smpva::orderBy('kode_nama', 'ASC')->get();

        return datatables()->of($smpva)
            ->addIndexColumn()
            ->addColumn(
                'action',
                function ($row) {
                    $btn = '';
                    if (auth()->user()->can('smpva_ubah')) {
                        $btn   .= '<a href="' . route('dashboard.smpva.edit', $row['id_smpva']) . '" class="btn btn-warning btn-sm" title="UBAH"><i class="fa fa-pencil"></i></a> ';
                    }
                    if (auth()->user()->can('smpva_hapus')) {
                        $btn   .= '<button type="button" id="' . $row['id_smpva'] . '" class="delete btn btn-danger btn-sm" title="HAPUS"><i class="fa fa-trash"></i></button> ';
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
        abort_if(Gate::denies('smpva_lihat'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('dashboard.smpva.index');
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
        abort_if(Gate::denies('smpva_tambah'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rules = [
            'smpva'     => 'required',
            'kode_nama' => 'required',
            'status'    => 'required'
        ];

        $messages = [
            'required' => 'Kolom :attribute wajib diisi!'
        ];

        $this->validate($request, $rules, $messages);

        $smpva = new Smpva();
        $smpva->smpva      = $request->smpva;
        $smpva->kode_nama  = $request->kode_nama;
        $smpva->status     = $request->status;

        if ($smpva->save()) {
            return back()->with(['success' => 'Data va smp berhasil ditambah']);
        } else {
            return back()->with(['error' => 'Data va smp gagal ditambah']);
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
        abort_if(Gate::denies('smpva_ubah'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $smpva = Smpva::where('id_smpva', $id)->first();

        return view('dashboard.smpva.edit', compact('smpva'));
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
        abort_if(Gate::denies('smpva_ubah'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rules = [
            'smpva'      => 'required',
            'kode_nama'  => 'required',
            'status'     => 'required'
        ];

        $messages = [
            'required' => 'Kolom :attribute wajib diisi!'
        ];

        $this->validate($request, $rules, $messages);

        $smpva = Smpva::where('id_smpva', $id)->first();
        $smpva->smpva = $request->smpva;
        $smpva->kode_nama = $request->kode_nama;
        $smpva->status = $request->status;

        if ($smpva->save()) {
            return redirect()->route('dashboard.smpva.index')->with(['success' => 'Data VA berhasil diubah']);
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
        abort_if(Gate::denies('smpva_hapus'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $smpva = Smpva::where('id_smpva', $id)->first();

        if ($smpva->delete()) {
            return response()->json(['status' => 'success', 'message' => 'Data VA berhasil dihapus']);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Data VA gagal dihapus']);
        }
    }
}
