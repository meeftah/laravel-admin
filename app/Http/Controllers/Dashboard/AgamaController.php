<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Agama;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class AgamaController extends Controller
{
    public function datatableAgamaAPI()
    {
        // ambil semua data
        $agama = Agama::orderBy('created_at', 'ASC')->get();

        return datatables()->of($agama)
            ->addIndexColumn()
            ->addColumn(
                'action',
                function ($row) {
                    $btn = '';
                    // if (auth()->user()->can('agama_detail')) {
                    //     $btn    .= '<a href="' . route('dashboard.agama.show', $row['id_agama']) . '" class="btn btn-primary btn-sm waves-effect waves-light" title="DETAIL"><i class="fa fa-eye"></i></a> ';
                    // }
                    if (auth()->user()->can('agama_ubah')) {
                        $btn   .= '<a href="' . route('dashboard.agama.edit', $row['id_agama']) . '" class="btn btn-warning btn-sm" title="UBAH"><i class="fa fa-pencil"></i></a> ';
                    }
                    if (auth()->user()->can('agama_hapus')) {
                        $btn   .= '<button type="button" id="' . $row['id_agama'] . '" class="delete btn btn-danger btn-sm" title="HAPUS"><i class="fa fa-trash"></i></button> ';
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
        abort_if(Gate::denies('agama_lihat'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('dashboard.agama.index');
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
        abort_if(Gate::denies('agama_tambah'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rules = [
            'kode' => 'required',
            'agama' => 'required',
        ];

        $messages = [
            'required' => 'Kolom :attribute wajib diisi!'
        ];

        $this->validate($request, $rules, $messages);

        $agama = new agama();
        $agama->kode = $request->kode;
        $agama->agama = $request->agama;

        if ($agama->save()) {
            return back()->with(['success' => 'Data agama berhasil ditambah']);
        } else {
            return back()->with(['error' => 'Data agama gagal ditambah']);
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
        abort_if(Gate::denies('agama_ubah'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $agama = Agama::where('id_agama', $id)->first();

        return view('dashboard.agama.edit', compact('agama'));
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
        abort_if(Gate::denies('agama_ubah'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rules = [
            'kode' => 'required',
            'agama' => 'required',
        ];

        $messages = [
            'required' => 'Kolom :attribute wajib diisi!'
        ];

        $this->validate($request, $rules, $messages);

        $agama = Agama::where('id_agama', $id)->first();
        $agama->kode = $request->kode;
        $agama->agama = $request->agama;

        if ($agama->save()) {
            return redirect()->route('dashboard.agama.index')->with(['success' => 'Data agama berhasil diubah']);
        } else {
            return back()->with(['error' => 'Data agama gagal diubah']);
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
        abort_if(Gate::denies('agama_hapus'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $agama = Agama::where('id_agama', $id)->first();

        if ($agama->delete()) {
            return response()->json(['status' => 'success', 'message' => 'Data agama berhasil dihapus']);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Data agama gagal dihapus']);
        }
    }
}
