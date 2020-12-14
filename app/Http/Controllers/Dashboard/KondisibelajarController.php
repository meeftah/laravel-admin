<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Kondisibelajar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class KondisibelajarController extends Controller
{
    public function datatableKondisibelajarAPI()
    {
        // ambil semua data
        $kondisibelajar = Kondisibelajar::orderBy('created_at', 'ASC')->get();

        return datatables()->of($kondisibelajar)
            ->addIndexColumn()
            ->addColumn(
                'action',
                function ($row) {
                    $btn = '';
                    if (auth()->user()->can('kondisibelajar_ubah')) {
                        $btn   .= '<a href="' . route('dashboard.kondisibelajar.edit', $row['id_kondisibelajar']) . '" class="btn btn-warning btn-sm" title="UBAH"><i class="fa fa-pencil"></i></a> ';
                    }
                    if (auth()->user()->can('kondisibelajar_hapus')) {
                        $btn   .= '<button type="button" id="' . $row['id_kondisibelajar'] . '" class="delete btn btn-danger btn-sm" title="HAPUS"><i class="fa fa-trash"></i></button> ';
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
        abort_if(Gate::denies('kondisibelajar_lihat'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('dashboard.kondisibelajar.index');
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
        abort_if(Gate::denies('kondisibelajar_tambah'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rules = [
            'kode' => 'required',
            'kondisibelajar' => 'required',
        ];

        $messages = [
            'required' => 'Kolom :attribute wajib diisi!'
        ];

        $this->validate($request, $rules, $messages);

        $kondisibelajar = new Kondisibelajar();
        $kondisibelajar->kode = $request->kode;
        $kondisibelajar->kondisibelajar = $request->kondisibelajar;

        if ($kondisibelajar->save()) {
            return back()->with(['success' => 'Data kondisi belajar berhasil ditambah']);
        } else {
            return back()->with(['error' => 'Data kondisi belajar gagal ditambah']);
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
        abort_if(Gate::denies('kondisibelajar_ubah'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $kondisibelajar = Kondisibelajar::where('id_kondisibelajar', $id)->first();

        return view('dashboard.kondisibelajar.edit', compact('kondisibelajar'));
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
        abort_if(Gate::denies('kondisibelajar_ubah'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rules = [
            'kode' => 'required',
            'kondisibelajar' => 'required',
        ];

        $messages = [
            'required' => 'Kolom :attribute wajib diisi!'
        ];

        $this->validate($request, $rules, $messages);

        $kondisibelajar = Kondisibelajar::where('id_kondisibelajar', $id)->first();
        $kondisibelajar->kode = $request->kode;
        $kondisibelajar->kondisibelajar = $request->kondisibelajar;

        if ($kondisibelajar->save()) {
            return redirect()->route('dashboard.kondisibelajar.index')->with(['success' => 'Data kondisi belajar berhasil diubah']);
        } else {
            return back()->with(['error' => 'Data kondisi belajar gagal diubah']);
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
        abort_if(Gate::denies('kondisibelajar_hapus'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $kondisibelajar = Kondisibelajar::where('id_kondisibelajar', $id)->first();

        if ($kondisibelajar->delete()) {
            return response()->json(['status' => 'success', 'message' => 'Data kondisi belajar berhasil dihapus']);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Data kondisi belajar gagal dihapus']);
        }
    }
}
