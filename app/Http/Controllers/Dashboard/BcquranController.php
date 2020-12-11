<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Bcquran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class BcquranController extends Controller
{
    public function datatableBcquranAPI()
    {
        // ambil semua data
        $bcquran = Bcquran::orderBy('created_at', 'ASC')->get();

        return datatables()->of($bcquran)
            ->addIndexColumn()
            ->addColumn(
                'action',
                function ($row) {
                    $btn = '';
                    // if (auth()->user()->can('bcquran_detail')) {
                    //     $btn    .= '<a href="' . route('dashboard.bcquran.show', $row['id_bcquran']) . '" class="btn btn-primary btn-sm waves-effect waves-light" title="DETAIL"><i class="fa fa-eye"></i></a> ';
                    // }
                    if (auth()->user()->can('bcquran_ubah')) {
                        $btn   .= '<a href="' . route('dashboard.bcquran.edit', $row['id_bcquran']) . '" class="btn btn-warning btn-sm" title="UBAH"><i class="fa fa-pencil"></i></a> ';
                    }
                    if (auth()->user()->can('bcquran_hapus')) {
                        $btn   .= '<button type="button" id="' . $row['id_bcquran'] . '" class="delete btn btn-danger btn-sm" title="HAPUS"><i class="fa fa-trash"></i></button> ';
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
        abort_if(Gate::denies('bcquran_lihat'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('dashboard.bcquran.index');
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
        abort_if(Gate::denies('bcquran_tambah'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rules = [
            'kode' => 'required',
            'bcquran' => 'required',
        ];

        $messages = [
            'required' => 'Kolom :attribute wajib diisi!'
        ];

        $this->validate($request, $rules, $messages);

        $bcquran = new Bcquran();
        $bcquran->kode = $request->kode;
        $bcquran->bcquran = $request->bcquran;

        if ($bcquran->save()) {
            return back()->with(['success' => 'Data baca quran berhasil ditambah']);
        } else {
            return back()->with(['error' => 'Data baca quran gagal ditambah']);
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
        abort_if(Gate::denies('bcquran_ubah'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bcquran = Bcquran::where('id_bcquran', $id)->first();

        return view('dashboard.bcquran.edit', compact('bcquran'));
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
        abort_if(Gate::denies('bcquran_ubah'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rules = [
            'kode' => 'required',
            'bcquran' => 'required',
        ];

        $messages = [
            'required' => 'Kolom :attribute wajib diisi!'
        ];

        $this->validate($request, $rules, $messages);

        $bcquran = Bcquran::where('id_bcquran', $id)->first();
        $bcquran->kode = $request->kode;
        $bcquran->bcquran = $request->bcquran;

        if ($bcquran->save()) {
            return redirect()->route('dashboard.bcquran.index')->with(['success' => 'Data baca quran berhasil diubah']);
        } else {
            return back()->with(['error' => 'Data baca quran gagal diubah']);
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
        abort_if(Gate::denies('bcquran_hapus'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bcquran = Bcquran::where('id_bcquran', $id)->first();

        if ($bcquran->delete()) {
            return response()->json(['status' => 'success', 'message' => 'Data baca quran berhasil dihapus']);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Data baca quran gagal dihapus']);
        }
    }
}
