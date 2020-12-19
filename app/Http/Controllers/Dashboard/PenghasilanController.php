<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Penghasilan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class PenghasilanController extends Controller
{
    public function datatablePenghasilanAPI()
    {
        // ambil semua data
        $penghasilan = Penghasilan::orderBy('kode', 'ASC')->get();

        return datatables()->of($penghasilan)
            ->addIndexColumn()
            ->addColumn(
                'action',
                function ($row) {
                    $btn = '';
                    if (auth()->user()->can('penghasilan_ubah')) {
                        $btn   .= '<a href="' . route('dashboard.penghasilan.edit', $row['id_penghasilan']) . '" class="btn btn-warning btn-sm" title="UBAH"><i class="fa fa-pencil"></i></a> ';
                    }
                    if (auth()->user()->can('penghasilan_hapus')) {
                        $btn   .= '<button type="button" id="' . $row['id_penghasilan'] . '" class="delete btn btn-danger btn-sm" title="HAPUS"><i class="fa fa-trash"></i></button> ';
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
        abort_if(Gate::denies('penghasilan_lihat'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('dashboard.penghasilan.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // kosong
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        abort_if(Gate::denies('penghasilan_tambah'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rules = [
            'kode' => 'required',
            'penghasilan' => 'required',
        ];

        $messages = [
            'required' => 'Kolom :attribute wajib diisi!'
        ];

        $this->validate($request, $rules, $messages);

        $penghasilan = new Penghasilan();
        $penghasilan->kode = $request->kode;
        $penghasilan->penghasilan = $request->penghasilan;

        if ($penghasilan->save()) {
            return back()->with(['success' => 'Data penghasilan berhasil ditambah']);
        } else {
            return back()->with(['error' => 'Data penghasilan gagal ditambah']);
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
        // kosong
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        abort_if(Gate::denies('penghasilan_ubah'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $penghasilan = Penghasilan::where('id_penghasilan', $id)->first();

        return view('dashboard.penghasilan.edit', compact('penghasilan'));
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
        abort_if(Gate::denies('penghasilan_ubah'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rules = [
            'kode' => 'required',
            'penghasilan' => 'required',
        ];

        $messages = [
            'required' => 'Kolom :attribute wajib diisi!'
        ];

        $this->validate($request, $rules, $messages);

        $penghasilan = Penghasilan::where('id_penghasilan', $id)->first();
        $penghasilan->kode = $request->kode;
        $penghasilan->penghasilan = $request->penghasilan;

        if ($penghasilan->save()) {
            return redirect()->route('dashboard.penghasilan.index')->with(['success' => 'Data penghasilan berhasil diubah']);
        } else {
            return back()->with(['error' => 'Data penghasilan gagal diubah']);
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
        abort_if(Gate::denies('penghasilan_hapus'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $penghasilan = Penghasilan::where('id_penghasilan', $id)->first();

        if ($penghasilan->delete()) {
            return response()->json(['status' => 'success', 'message' => 'Data penghasilan berhasil dihapus']);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Data penghasilan gagal dihapus']);
        }
    }
}
