<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Waktutmph;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class WaktutmphController extends Controller
{
    public function datatableWaktutmphAPI()
    {
        // ambil semua data
        $waktutmph = Waktutmph::orderBy('created_at', 'ASC')->get();

        return datatables()->of($waktutmph)
            ->addIndexColumn()
            ->addColumn(
                'action',
                function ($row) {
                    $btn = '';
                    if (auth()->user()->can('waktutmph_ubah')) {
                        $btn   .= '<a href="' . route('dashboard.waktutmph.edit', $row['id_waktutmph']) . '" class="btn btn-warning btn-sm" title="UBAH"><i class="fa fa-pencil"></i></a> ';
                    }
                    if (auth()->user()->can('waktutmph_hapus')) {
                        $btn   .= '<button type="button" id="' . $row['id_waktutmph'] . '" class="delete btn btn-danger btn-sm" title="HAPUS"><i class="fa fa-trash"></i></button> ';
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
        abort_if(Gate::denies('waktutmph_lihat'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('dashboard.masterdata.waktutmph.index');
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
        abort_if(Gate::denies('waktutmph_tambah'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rules = [
            'kode' => 'required',
            'waktutmph' => 'required',
        ];

        $messages = [
            'required' => 'Kolom :attribute wajib diisi!'
        ];

        $this->validate($request, $rules, $messages);

        $waktutmph = new Waktutmph();
        $waktutmph->kode = $request->kode;
        $waktutmph->waktutmph = $request->waktutmph;

        if ($waktutmph->save()) {
            return back()->with(['success' => 'Data waktutmph berhasil ditambah']);
        } else {
            return back()->with(['error' => 'Data waktutmph gagal ditambah']);
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

        abort_if(Gate::denies('waktutmph_ubah'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $waktutmph = Waktutmph::where('id_waktutmph', $id)->first();

        return view('dashboard.masterdata.waktutmph.edit', compact('waktutmph'));
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

        abort_if(Gate::denies('waktutmph_ubah'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rules = [
            'kode'      => 'required',
            'waktutmph' => 'required',
        ];

        $messages = [
            'required' => 'Kolom :attribute wajib diisi!'
        ];

        $this->validate($request, $rules, $messages);

        $waktutmph = Waktutmph::where('id_waktutmph', $id)->first();
        $waktutmph->kode = $request->kode;
        $waktutmph->waktutmph = $request->waktutmph;

        if ($waktutmph->save()) {
            return redirect()->route('dashboard.waktutmph.index')->with(['success' => 'Data waktu tempuh berhasil diubah']);
        } else {
            return back()->with(['error' => 'Data waktu tempuh gagal diubah']);
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
        abort_if(Gate::denies('waktutmph_hapus'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $waktutmph = Waktutmph::where('id_waktutmph', $id)->first();

        if ($waktutmph->delete()) {
            return response()->json(['status' => 'success', 'message' => 'Data waktu tempuh berhasil dihapus']);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Data waktu tempuh gagal dihapus']);
        }

    }
}
