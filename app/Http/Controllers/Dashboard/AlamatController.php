<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Alamat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class AlamatController extends Controller
{
    public function datatableAlamatAPI()
    {
        // ambil semua data
        $alamat = Alamat::orderBy('kode', 'ASC')->get();

        return datatables()->of($alamat)
            ->addIndexColumn()
            ->addColumn(
                'action',
                function ($row) {
                    $btn = '';
                    if (auth()->user()->can('alamat_ubah')) {
                        $btn   .= '<a href="' . route('dashboard.alamat.edit', $row['id_alamat']) . '" class="btn btn-warning btn-sm" title="UBAH"><i class="fa fa-pencil"></i></a> ';
                    }
                    if (auth()->user()->can('alamat_hapus')) {
                        $btn   .= '<button type="button" id="' . $row['id_alamat'] . '" class="delete btn btn-danger btn-sm" title="HAPUS"><i class="fa fa-trash"></i></button> ';
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
        abort_if(Gate::denies('alamat_lihat'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('dashboard.alamat.index');
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
        abort_if(Gate::denies('alamat_tambah'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rules = [
            'kode' => 'required',
            'alamat' => 'required',
        ];

        $messages = [
            'required' => 'Kolom :attribute wajib diisi!'
        ];

        $this->validate($request, $rules, $messages);

        $alamat = new alamat();
        $alamat->kode = $request->kode;
        $alamat->alamat = $request->alamat;

        if ($alamat->save()) {
            return back()->with(['success' => 'Data alamat berhasil ditambah']);
        } else {
            return back()->with(['error' => 'Data alamat gagal ditambah']);
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
        abort_if(Gate::denies('alamat_ubah'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $alamat = Alamat::where('id_alamat', $id)->first();

        return view('dashboard.alamat.edit', compact('alamat'));
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
        abort_if(Gate::denies('alamat_ubah'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rules = [
            'kode' => 'required',
            'alamat' => 'required',
        ];

        $messages = [
            'required' => 'Kolom :attribute wajib diisi!'
        ];

        $this->validate($request, $rules, $messages);

        $alamat = Alamat::where('id_alamat', $id)->first();
        $alamat->kode = $request->kode;
        $alamat->alamat = $request->alamat;

        if ($alamat->save()) {
            return redirect()->route('dashboard.alamat.index')->with(['success' => 'Data alamat berhasil diubah']);
        } else {
            return back()->with(['error' => 'Data alamat gagal diubah']);
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
        abort_if(Gate::denies('alamat_hapus'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $alamat = Alamat::where('id_alamat', $id)->first();

        if ($alamat->delete()) {
            return response()->json(['status' => 'success', 'message' => 'Data alamat berhasil dihapus']);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Data alamat gagal dihapus']);
        }
    }
}
