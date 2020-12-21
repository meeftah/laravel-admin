<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Tkva;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class TkvaController extends Controller
{
    public function datatableTkvaAPI()
    {
        // ambil semua data
        $tkva = Tkva::orderBy('kode_nama', 'ASC')->get();

        return datatables()->of($tkva)
            ->addIndexColumn()
            ->addColumn(
                'action',
                function ($row) {
                    $btn = '';
                    if (auth()->user()->can('tkva_ubah')) {
                        $btn   .= '<a href="' . route('dashboard.tkva.edit', $row['id_tkva']) . '" class="btn btn-warning btn-sm" title="UBAH"><i class="fa fa-pencil"></i></a> ';
                    }
                    if (auth()->user()->can('tkva_hapus')) {
                        $btn   .= '<button type="button" id="' . $row['id_tkva'] . '" class="delete btn btn-danger btn-sm" title="HAPUS"><i class="fa fa-trash"></i></button> ';
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
        abort_if(Gate::denies('tkva_lihat'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('dashboard.tkva.index');
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
        abort_if(Gate::denies('tkva_tambah'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rules = [
            'tkva' => 'required',
            'kode_nama' => 'required',
            'status' => 'required'
        ];

        $messages = [
            'required' => 'Kolom :attribute wajib diisi!'
        ];

        $this->validate($request, $rules, $messages);

        $tkva = new Tkva();
        $tkva->tkva      = $request->tkva;
        $tkva->kode_nama = $request->kode_nama;
        $tkva->status    = $request->status;

        if ($tkva->save()) {
            return back()->with(['success' => 'Data va tkit berhasil ditambah']);
        } else {
            return back()->with(['error' => 'Data va tkit gagal ditambah']);
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
        abort_if(Gate::denies('tkva_ubah'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tkva = Tkva::where('id_tkva', $id)->first();

        return view('dashboard.tkva.edit', compact('tkva'));
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
        abort_if(Gate::denies('tkva_ubah'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rules = [
            'tkva'      => 'required',
            'kode_nama' => 'required',
            'status'    => 'required'
        ];

        $messages = [
            'required' => 'Kolom :attribute wajib diisi!'
        ];

        $this->validate($request, $rules, $messages);

        $tkva = Tkva::where('id_tkva', $id)->first();
        $tkva->tkva = $request->tkva;
        $tkva->kode_nama = $request->kode_nama;
        $tkva->status = $request->status;

        if ($tkva->save()) {
            return redirect()->route('dashboard.tkva.index')->with(['success' => 'Data VA berhasil diubah']);
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
        abort_if(Gate::denies('tkva_hapus'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tkva = Tkva::where('id_tkva', $id)->first();

        if ($tkva->delete()) {
            return response()->json(['status' => 'success', 'message' => 'Data VA berhasil dihapus']);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Data VA gagal dihapus']);
        }
    }
}
