<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\VaTK;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class VaTkController extends Controller
{
    public function datatableTkvaAPI()
    {
        // ambil semua data
        $vatk = VaTK::orderBy('kode_nama', 'ASC')->get();

        return datatables()->of($vatk)
            ->addIndexColumn()
            ->addColumn(
                'action',
                function ($row) {
                    $btn = '';
                    if (auth()->user()->can('vatk_ubah')) {
                        $btn   .= '<a href="' . route('dashboard.va.tk.edit', $row['id_va_tk']) . '" class="btn btn-warning btn-sm" title="UBAH"><i class="fa fa-pencil"></i></a> ';
                    }
                    if (auth()->user()->can('vatk_hapus')) {
                        $btn   .= '<button type="button" id="' . $row['id_va_tk'] . '" class="delete btn btn-danger btn-sm" title="HAPUS"><i class="fa fa-trash"></i></button> ';
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
        abort_if(Gate::denies('vatk_lihat'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('dashboard.virtualaccount.tk.index');
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
        abort_if(Gate::denies('vatk_tambah'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rules = [
            'va' => 'required',
            'kode_nama' => 'required',
            'status' => 'required'
        ];

        $messages = [
            'required' => 'Kolom :attribute wajib diisi!'
        ];

        $this->validate($request, $rules, $messages);

        $vatk = new VaTK();
        $vatk->va        = $request->va;
        $vatk->kode_nama = $request->kode_nama;
        $vatk->status    = $request->status;

        if ($vatk->save()) {
            return back()->with(['success' => 'Data VA TKIT berhasil ditambah']);
        } else {
            return back()->with(['error' => 'Data VA TKIT gagal ditambah']);
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
        abort_if(Gate::denies('vatk_ubah'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $vatk = VaTK::where('id_va_tk', $id)->first();

        return view('dashboard.virtualaccount.tk.edit', compact('vatk'));
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
        abort_if(Gate::denies('vatk_ubah'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rules = [
            'va'      => 'required',
            'kode_nama' => 'required',
            'status'    => 'required'
        ];

        $messages = [
            'required' => 'Kolom :attribute wajib diisi!'
        ];

        $this->validate($request, $rules, $messages);

        $vatk = VaTK::where('id_va_tk', $id)->first();
        $vatk->va        = $request->va;
        $vatk->kode_nama = $request->kode_nama;
        $vatk->status    = $request->status;

        if ($vatk->save()) {
            return redirect()->route('dashboard.va.tk.index')->with(['success' => 'Data VA TKIT berhasil diubah']);
        } else {
            return back()->with(['error' => 'Data VA TKIT gagal diubah']);
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
        abort_if(Gate::denies('vatk_hapus'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $vatk = VaTK::where('id_va_tk', $id)->first();

        if ($vatk->delete()) {
            return response()->json(['status' => 'success', 'message' => 'Data VA TKIT berhasil dihapus']);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Data VA TKIT gagal dihapus']);
        }
    }
}
