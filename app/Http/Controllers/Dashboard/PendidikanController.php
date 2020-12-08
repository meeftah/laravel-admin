<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Pendidikan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;


class PendidikanController extends Controller
{
    public function datatablePendidikanAPI()
    {
        // ambil semua data
        $pendidikan = Pendidikan::orderBy('created_at', 'ASC')->get();

        return datatables()->of($pendidikan)
            ->addIndexColumn()
            ->addColumn(
                'action',
                function ($row) {
                    $btn = '';
                    // if (auth()->user()->can('pendidikan_detail')) {
                    //     $btn    .= '<a href="' . route('dashboard.pendidikan.show', $row['id_pendidikan']) . '" class="btn btn-primary btn-sm waves-effect waves-light" title="DETAIL"><i class="fa fa-eye"></i></a> ';
                    // }
                    if (auth()->user()->can('pendidikan_ubah')) {
                        $btn   .= '<a href="' . route('dashboard.pendidikan.edit', $row['id_pendidikan']) . '" class="btn btn-warning btn-sm" title="UBAH"><i class="fa fa-pencil"></i></a> ';
                    }
                    if (auth()->user()->can('pendidikan_hapus')) {
                        $btn   .= '<button type="button" id="' . $row['id_pendidikan'] . '" class="delete btn btn-danger btn-sm" title="HAPUS"><i class="fa fa-trash"></i></button> ';
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
        abort_if(Gate::denies('pendidikan_lihat'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('dashboard.pendidikan.index');
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

        abort_if(Gate::denies('pendidikan_tambah'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rules = [
            'kode' => 'required',
            'pendidikan' => 'required',
        ];

        $messages = [
            'required' => 'Kolom :attribute wajib diisi!'
        ];

        $this->validate($request, $rules, $messages);

        $pendidikan = new Pendidikan();
        $pendidikan->kode = $request->kode;
        $pendidikan->pendidikan = $request->pendidikan;

        if ($pendidikan->save()) {
            return back()->with(['success' => 'Data pendidikan berhasil ditambah']);
        } else {
            return back()->with(['error' => 'Data pendidikan gagal ditambah']);
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
        abort_if(Gate::denies('pendidikan_ubah'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pendidikan = Pendidikan::where('id_pendidikan', $id)->first();

        return view('dashboard.pendidikan.edit', compact('pendidikan'));
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
        abort_if(Gate::denies('pendidikan_ubah'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rules = [
            'kode' => 'required',
            'pendidikan' => 'required',
        ];

        $messages = [
            'required' => 'Kolom :attribute wajib diisi!'
        ];

        $this->validate($request, $rules, $messages);

        $pendidikan = Pendidikan::where('id_pendidikan', $id)->first();
        $pendidikan->kode = $request->kode;
        $pendidikan->pendidikan = $request->pendidikan;

        if ($pendidikan->save()) {
            return redirect()->route('dashboard.pendidikan.index')->with(['success' => 'Data pendidikan berhasil diubah']);
        } else {
            return back()->with(['error' => 'Data pendidikan gagal diubah']);
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
        abort_if(Gate::denies('pendidikan_hapus'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pendidikan = Pendidikan::where('id_pendidikan', $id)->first();

        if ($pendidikan->delete()) {
            return response()->json(['status' => 'success', 'message' => 'Data pendidikan berhasil dihapus']);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Data pendidikan gagal dihapus']);
        }
    }
}
