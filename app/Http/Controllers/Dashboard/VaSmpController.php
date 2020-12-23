<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\VaSmp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class VaSmpController extends Controller
{
    public function datatableVaSmpAPI()
    {
        // ambil semua data
        $vasmp = VaSmp::orderBy('kode_nama', 'ASC')->get();

        return datatables()->of($vasmp)
            ->addIndexColumn()
            ->addColumn(
                'action',
                function ($row) {
                    $btn = '';
                    if (auth()->user()->can('vasmp_ubah')) {
                        $btn   .= '<a href="' . route('dashboard.va.smp.edit', $row['id_va_smp']) . '" class="btn btn-warning btn-sm" title="UBAH"><i class="fa fa-pencil"></i></a> ';
                    }
                    if (auth()->user()->can('vasmp_hapus')) {
                        $btn   .= '<button type="button" id="' . $row['id_va_smp'] . '" class="delete btn btn-danger btn-sm" title="HAPUS"><i class="fa fa-trash"></i></button> ';
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
        abort_if(Gate::denies('vasmp_lihat'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('dashboard.virtualaccount.smp.index');
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
        abort_if(Gate::denies('vasmp_tambah'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rules = [
            'va'        => 'required',
            'kode_nama' => 'required',
            'status'    => 'required'
        ];

        $messages = [
            'required' => 'Kolom :attribute wajib diisi!'
        ];

        $this->validate($request, $rules, $messages);

        $vasmp = new VaSmp();
        $vasmp->va         = $request->va;
        $vasmp->kode_nama  = $request->kode_nama;
        $vasmp->status     = $request->status;

        if ($vasmp->save()) {
            return back()->with(['success' => 'Data VA SMPIT berhasil ditambah']);
        } else {
            return back()->with(['error' => 'Data VA SMPIT gagal ditambah']);
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
        abort_if(Gate::denies('vasmp_ubah'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $vasmp = VaSmp::where('id_va_smp', $id)->first();

        return view('dashboard.virtualaccount.smp.edit', compact('vasmp'));
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
        abort_if(Gate::denies('vasmp_ubah'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rules = [
            'va'         => 'required',
            'kode_nama'  => 'required',
            'status'     => 'required'
        ];

        $messages = [
            'required' => 'Kolom :attribute wajib diisi!'
        ];

        $this->validate($request, $rules, $messages);

        $vasmp = VaSmp::where('id_va_smp', $id)->first();
        $vasmp->va = $request->va;
        $vasmp->kode_nama = $request->kode_nama;
        $vasmp->status = $request->status;

        if ($vasmp->save()) {
            return redirect()->route('dashboard.va.smp.index')->with(['success' => 'Data VA SMPIT berhasil diubah']);
        } else {
            return back()->with(['error' => 'Data VA SMPIT gagal diubah']);
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
        abort_if(Gate::denies('vasmp_hapus'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $vasmp = VaSmp::where('id_va_smp', $id)->first();

        if ($vasmp->delete()) {
            return response()->json(['status' => 'success', 'message' => 'Data VA SMPIT berhasil dihapus']);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Data VA SMPIT gagal dihapus']);
        }
    }
}
