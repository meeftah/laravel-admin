<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\VaSma;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class VaSmaController extends Controller
{
    public function datatableVaSmaAPI()
    {
        // ambil semua data
        $vasma = VaSma::orderBy('kode_nama', 'ASC')->get();

        return datatables()->of($vasma)
            ->addIndexColumn()
            ->addColumn(
                'action',
                function ($row) {
                    $btn = '';
                    if (auth()->user()->can('vasma_ubah')) {
                        $btn   .= '<a href="' . route('dashboard.va.sma.edit', $row['id_va_sma']) . '" class="btn btn-warning btn-sm" title="UBAH"><i class="fa fa-pencil"></i></a> ';
                    }
                    if (auth()->user()->can('vasma_hapus')) {
                        $btn   .= '<button type="button" id="' . $row['id_va_sma'] . '" class="delete btn btn-danger btn-sm" title="HAPUS"><i class="fa fa-trash"></i></button> ';
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
        abort_if(Gate::denies('vasma_lihat'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('dashboard.virtualaccount.sma.index');
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
        abort_if(Gate::denies('vasma_tambah'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rules = [
            'va'        => 'required',
            'kode_nama' => 'required',
            'status'    => 'required'
        ];

        $messages = [
            'required' => 'Kolom :attribute wajib diisi!'
        ];

        $this->validate($request, $rules, $messages);

        $vasma = new VaSma();
        $vasma->va         = $request->va;
        $vasma->kode_nama  = $request->kode_nama;
        $vasma->status     = $request->status;

        if ($vasma->save()) {
            return back()->with(['success' => 'Data VA SMAIT berhasil ditambah']);
        } else {
            return back()->with(['error' => 'Data VA SMAIT gagal ditambah']);
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
        abort_if(Gate::denies('vasma_ubah'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $vasma = VaSma::where('id_va_sma', $id)->first();

        return view('dashboard.virtualaccount.sma.edit', compact('vasma'));
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
        abort_if(Gate::denies('vasma_ubah'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rules = [
            'va'         => 'required',
            'kode_nama'  => 'required',
            'status'     => 'required'
        ];

        $messages = [
            'required' => 'Kolom :attribute wajib diisi!'
        ];

        $this->validate($request, $rules, $messages);

        $vasma = VaSma::where('id_va_sma', $id)->first();
        $vasma->va        = $request->va;
        $vasma->kode_nama = $request->kode_nama;
        $vasma->status    = $request->status;

        if ($vasma->save()) {
            return redirect()->route('dashboard.va.sma.index')->with(['success' => 'Data VA SMAIT berhasil diubah']);
        } else {
            return back()->with(['error' => 'Data VA SMAIT gagal diubah']);
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
        abort_if(Gate::denies('vasma_hapus'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $vasma = VaSma::where('id_va_sma', $id)->first();

        if ($vasma->delete()) {
            return response()->json(['status' => 'success', 'message' => 'Data VA SMAIT berhasil dihapus']);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Data VA SMAIT gagal dihapus']);
        }
    }
}
