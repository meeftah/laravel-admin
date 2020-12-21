<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Smava;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class SmavaController extends Controller
{
    public function datatableSmavaAPI()
    {
        // ambil semua data
        $smava = Smava::orderBy('kode_nama', 'ASC')->get();

        return datatables()->of($smava)
            ->addIndexColumn()
            ->addColumn(
                'action',
                function ($row) {
                    $btn = '';
                    if (auth()->user()->can('smava_ubah')) {
                        $btn   .= '<a href="' . route('dashboard.smava.edit', $row['id_smava']) . '" class="btn btn-warning btn-sm" title="UBAH"><i class="fa fa-pencil"></i></a> ';
                    }
                    if (auth()->user()->can('smava_hapus')) {
                        $btn   .= '<button type="button" id="' . $row['id_smava'] . '" class="delete btn btn-danger btn-sm" title="HAPUS"><i class="fa fa-trash"></i></button> ';
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
        abort_if(Gate::denies('smava_lihat'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('dashboard.smava.index');
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
        abort_if(Gate::denies('smava_tambah'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rules = [
            'smava'     => 'required',
            'kode_nama' => 'required',
            'status'    => 'required'
        ];

        $messages = [
            'required' => 'Kolom :attribute wajib diisi!'
        ];

        $this->validate($request, $rules, $messages);

        $smava = new Smava();
        $smava->smava      = $request->smava;
        $smava->kode_nama  = $request->kode_nama;
        $smava->status     = $request->status;

        if ($smava->save()) {
            return back()->with(['success' => 'Data va sma berhasil ditambah']);
        } else {
            return back()->with(['error' => 'Data va sma gagal ditambah']);
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
        abort_if(Gate::denies('smava_ubah'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $smava = smava::where('id_smava', $id)->first();

        return view('dashboard.smava.edit', compact('smava'));
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
        abort_if(Gate::denies('smava_ubah'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rules = [
            'smava'      => 'required',
            'kode_nama'  => 'required',
            'status'     => 'required'
        ];

        $messages = [
            'required' => 'Kolom :attribute wajib diisi!'
        ];

        $this->validate($request, $rules, $messages);

        $smava = Smava::where('id_smava', $id)->first();
        $smava->smava     = $request->smava;
        $smava->kode_nama = $request->kode_nama;
        $smava->status    = $request->status;

        if ($smava->save()) {
            return redirect()->route('dashboard.smava.index')->with(['success' => 'Data VA berhasil diubah']);
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
        abort_if(Gate::denies('smava_hapus'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $smava = Smava::where('id_smava', $id)->first();

        if ($smava->delete()) {
            return response()->json(['status' => 'success', 'message' => 'Data VA berhasil dihapus']);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Data VA gagal dihapus']);
        }
    }
}
