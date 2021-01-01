<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Jarak;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class JarakController extends Controller
{
    public function datatableJarakAPI()
    {
        // ambil semua data
        $jarak = Jarak::orderBy('kode', 'ASC')->get();

        return datatables()->of($jarak)
            ->addIndexColumn()
            ->addColumn(
                'action',
                function ($row) {
                    $btn = '';
                    if (auth()->user()->can('jarak_ubah')) {
                        $btn   .= '<a href="' . route('dashboard.jarak.edit', $row['id_jarak']) . '" class="btn btn-warning btn-sm" title="UBAH"><i class="fa fa-pencil"></i></a> ';
                    }
                    if (auth()->user()->can('jarak_hapus')) {
                        $btn   .= '<button type="button" id="' . $row['id_jarak'] . '" class="delete btn btn-danger btn-sm" title="HAPUS"><i class="fa fa-trash"></i></button> ';
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
        abort_if(Gate::denies('jarak_lihat'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('dashboard.datamaster.jarak.index');
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
        abort_if(Gate::denies('jarak_tambah'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rules = [
            'kode' => 'required',
            'jarak' => 'required',
        ];

        $messages = [
            'required' => 'Kolom :attribute wajib diisi!'
        ];

        $this->validate($request, $rules, $messages);

        $jarak = new Jarak();
        $jarak->kode = $request->kode;
        $jarak->jarak = $request->jarak;

        if ($jarak->save()) {
            return back()->with(['success' => 'Data jarak berhasil ditambah']);
        } else {
            return back()->with(['error' => 'Data jarak gagal ditambah']);
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
        abort_if(Gate::denies('jarak_ubah'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jarak = Jarak::where('id_jarak', $id)->first();

        return view('dashboard.datamaster.jarak.edit', compact('jarak'));
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
        abort_if(Gate::denies('jarak_ubah'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rules = [
            'kode' => 'required',
            'jarak' => 'required',
        ];

        $messages = [
            'required' => 'Kolom :attribute wajib diisi!'
        ];

        $this->validate($request, $rules, $messages);

        $jarak = Jarak::where('id_jarak', $id)->first();
        $jarak->kode = $request->kode;
        $jarak->jarak = $request->jarak;

        if ($jarak->save()) {
            return redirect()->route('dashboard.jarak.index')->with(['success' => 'Data jarak berhasil diubah']);
        } else {
            return back()->with(['error' => 'Data jarak gagal diubah']);
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
        abort_if(Gate::denies('jarak_hapus'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jarak = Jarak::where('id_jarak', $id)->first();

        if ($jarak->delete()) {
            return response()->json(['status' => 'success', 'message' => 'Data jarak berhasil dihapus']);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Data jarak gagal dihapus']);
        }
    }
}
