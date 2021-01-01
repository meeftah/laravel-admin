<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Tempattinggal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class TempattinggalController extends Controller
{
    public function datatabletempattinggalAPI()
    {
        // ambil semua data
        $tempattinggal = Tempattinggal::orderBy('kode', 'ASC')->get();

        return datatables()->of($tempattinggal)
            ->addIndexColumn()
            ->addColumn(
                'action',
                function ($row) {
                    $btn = '';
                    if (auth()->user()->can('tempattinggal_ubah')) {
                        $btn   .= '<a href="' . route('dashboard.tempattinggal.edit', $row['id_tempattinggal']) . '" class="btn btn-warning btn-sm" title="UBAH"><i class="fa fa-pencil"></i></a> ';
                    }
                    if (auth()->user()->can('tempattinggal_hapus')) {
                        $btn   .= '<button type="button" id="' . $row['id_tempattinggal'] . '" class="delete btn btn-danger btn-sm" title="HAPUS"><i class="fa fa-trash"></i></button> ';
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
        abort_if(Gate::denies('tempattinggal_lihat'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('dashboard.datamaster.tempattinggal.index');
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
        abort_if(Gate::denies('tempattinggal_tambah'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rules = [
            'kode' => 'required',
            'tempattinggal' => 'required',
        ];

        $messages = [
            'required' => 'Kolom :attribute wajib diisi!'
        ];

        $this->validate($request, $rules, $messages);

        $tempattinggal = new Tempattinggal();
        $tempattinggal->kode = $request->kode;
        $tempattinggal->tempattinggal = $request->tempattinggal;

        if ($tempattinggal->save()) {
            return back()->with(['success' => 'Data tempat tinggal berhasil ditambah']);
        } else {
            return back()->with(['error' => 'Data tempat tinggal gagal ditambah']);
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
        abort_if(Gate::denies('tempattinggal_ubah'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tempattinggal = Tempattinggal::where('id_tempattinggal', $id)->first();

        return view('dashboard.datamaster.tempattinggal.edit', compact('tempattinggal'));
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

        abort_if(Gate::denies('tempattinggal_ubah'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rules = [
            'kode' => 'required',
            'tempattinggal' => 'required',
        ];

        $messages = [
            'required' => 'Kolom :attribute wajib diisi!'
        ];

        $this->validate($request, $rules, $messages);

        $tempattinggal = Tempattinggal::where('id_tempattinggal', $id)->first();
        $tempattinggal->kode = $request->kode;
        $tempattinggal->tempattinggal = $request->tempattinggal;

        if ($tempattinggal->save()) {
            return redirect()->route('dashboard.tempattinggal.index')->with(['success' => 'Data tempat tinggal berhasil diubah']);
        } else {
            return back()->with(['error' => 'Data tempat tinggal gagal diubah']);
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

        abort_if(Gate::denies('tempattinggal_hapus'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tempattinggal = Tempattinggal::where('id_tempattinggal', $id)->first();

        if ($tempattinggal->delete()) {
            return response()->json(['status' => 'success', 'message' => 'Data tempat tinggal berhasil dihapus']);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Data tempat tinggal gagal dihapus']);
        }

    }
}
