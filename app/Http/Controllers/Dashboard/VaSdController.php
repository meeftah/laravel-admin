<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\VaSd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class VaSdController extends Controller
{
    public function datatableVaSdAPI()
    {
        // ambil semua data
        $vasd = VaSd::orderBy('kode_nama', 'ASC')->get();

        return datatables()->of($vasd)
            ->addIndexColumn()
            ->addColumn(
                'action',
                function ($row) {
                    $btn = '';
                    if (auth()->user()->can('vasd_ubah')) {
                        $btn   .= '<a href="' . route('dashboard.va.sd.edit', $row['id_va_sd']) . '" class="btn btn-warning btn-sm" title="UBAH"><i class="fa fa-pencil"></i></a> ';
                    }
                    if (auth()->user()->can('vasd_hapus')) {
                        $btn   .= '<button type="button" id="' . $row['id_va_sd'] . '" class="delete btn btn-danger btn-sm" title="HAPUS"><i class="fa fa-trash"></i></button> ';
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
        abort_if(Gate::denies('vasd_lihat'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('dashboard.virtualaccount.sd.index');
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
        abort_if(Gate::denies('vasd_tambah'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rules = [
            'va'        => 'required',
            'kode_nama' => 'required',
            'status'    => 'required'
        ];

        $messages = [
            'required' => 'Kolom :attribute wajib diisi!'
        ];

        $this->validate($request, $rules, $messages);

        $vasd            = new VaSd();
        $vasd->va        = $request->va;
        $vasd->kode_nama = $request->kode_nama;
        $vasd->status    = $request->status;

        if ($vasd->save()) {
            return back()->with(['success' => 'Data VA SDIT berhasil ditambah']);
        } else {
            return back()->with(['error' => 'Data VA SDIT gagal ditambah']);
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
        abort_if(Gate::denies('vasd_ubah'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $vasd = VaSd::where('id_va_sd', $id)->first();

        return view('dashboard.virtualaccount.sd.edit', compact('vasd'));
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
        abort_if(Gate::denies('vasd_ubah'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rules = [
            'va'        => 'required',
            'kode_nama' => 'required',
            'status'    => 'required'
        ];

        $messages = [
            'required' => 'Kolom :attribute wajib diisi!'
        ];

        $this->validate($request, $rules, $messages);

        $vasd = VaSd::where('id_va_sd', $id)->first();
        $vasd->va        = $request->va;
        $vasd->kode_nama = $request->kode_nama;
        $vasd->status    = $request->status;

        if ($vasd->save()) {
            return redirect()->route('dashboard.va.sd.index')->with(['success' => 'Data VA SDIT berhasil diubah']);
        } else {
            return back()->with(['error' => 'Data VA SDIT gagal diubah']);
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
        abort_if(Gate::denies('vasd_hapus'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $vasd = VaSd::where('id_va_sd', $id)->first();

        if ($vasd->delete()) {
            return response()->json(['status' => 'success', 'message' => 'Data VA SDIT berhasil dihapus']);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Data VA SDIT gagal dihapus']);
        }
    }
}
