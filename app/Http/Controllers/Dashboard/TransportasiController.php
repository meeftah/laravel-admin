<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Transportasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class TransportasiController extends Controller
{

    public function datatableTransportasiAPI()
    {
        // ambil semua data
        $transportasi = Transportasi::orderBy('kode', 'ASC')->get();

        return datatables()->of($transportasi)
            ->addIndexColumn()
            ->addColumn(
                'action',
                function ($row) {
                    $btn = '';
                    if (auth()->user()->can('transportasi_ubah')) {
                        $btn   .= '<a href="' . route('dashboard.transportasi.edit', $row['id_transportasi']) . '" class="btn btn-warning btn-sm" title="UBAH"><i class="fa fa-pencil"></i></a> ';
                    }
                    if (auth()->user()->can('transportasi_hapus')) {
                        $btn   .= '<button type="button" id="' . $row['id_transportasi'] . '" class="delete btn btn-danger btn-sm" title="HAPUS"><i class="fa fa-trash"></i></button> ';
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
        abort_if(Gate::denies('transportasi_lihat'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('dashboard.masterdata.transportasi.index');
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


        abort_if(Gate::denies('transportasi_tambah'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rules = [
            'kode' => 'required',
            'transportasi' => 'required',
        ];

        $messages = [
            'required' => 'Kolom :attribute wajib diisi!'
        ];

        $this->validate($request, $rules, $messages);

        $transportasi = new Transportasi();
        $transportasi->kode = $request->kode;
        $transportasi->transportasi = $request->transportasi;

        if ($transportasi->save()) {
            return back()->with(['success' => 'Data transportasi berhasil ditambah']);
        } else {
            return back()->with(['error' => 'Data transportasi gagal ditambah']);
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
        abort_if(Gate::denies('transportasi_ubah'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $transportasi = Transportasi::where('id_transportasi', $id)->first();

        return view('dashboard.masterdata.transportasi.edit', compact('transportasi'));
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
        abort_if(Gate::denies('transportasi_ubah'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rules = [
            'kode' => 'required',
            'transportasi' => 'required',
        ];

        $messages = [
            'required' => 'Kolom :attribute wajib diisi!'
        ];

        $this->validate($request, $rules, $messages);

        $transportasi = Transportasi::where('id_transportasi', $id)->first();
        $transportasi->kode = $request->kode;
        $transportasi->transportasi = $request->transportasi;

        if ($transportasi->save()) {
            return redirect()->route('dashboard.transportasi.index')->with(['success' => 'Data transportasi berhasil diubah']);
        } else {
            return back()->with(['error' => 'Data transportasi gagal diubah']);
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
        abort_if(Gate::denies('transportasi_hapus'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $transportasi = Transportasi::where('id_transportasi', $id)->first();

        if ($transportasi->delete()) {
            return response()->json(['status' => 'success', 'message' => 'Data transportasi berhasil dihapus']);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Data transportasi gagal dihapus']);
        }
    }
}
