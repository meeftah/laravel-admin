<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Slidefrontend;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class SlidefrontendController extends Controller
{
    public function datatableSlidefrontendAPI()
    {
        // ambil semua data
        $slidefrontend = Slidefrontend::orderBy('created_at', 'ASC')->get();

        return datatables()->of($slidefrontend)
            ->addIndexColumn()
            ->editColumn(
                'status',
                function ($row) {
                    $status = '';
                    if ($row['status'] == 0) {
                        $status = '<span class="badge badge-success p-2" style="font-size: 10pt; font-weight: 400">tidak aktif</span>';
                    }
                    if ($row['status'] == 1) {
                        $status = '<span class="badge badge-warning p-2 text-white" style="font-size: 10pt; font-weight: 400">aktif</span>';
                    }
                    return $status;
                }
            )
            ->addColumn(
                'action',
                function ($row) {
                    $btn = '';
                    if (auth()->user()->can('slidefrontend_detail')) {
                        $btn   .= '<a href="' . route('dashboard.slidefrontend.show', $row['id_slidefrontend']) . '" class="btn btn-primary btn-sm" title="DETAIL"><i class="fa fa-eye"></i></a> ';
                    }
                    if (auth()->user()->can('slidefrontend_ubah')) {
                        $btn   .= '<a href="' . route('dashboard.slidefrontend.edit', $row['id_slidefrontend']) . '" class="btn btn-warning btn-sm" title="UBAH"><i class="fa fa-pencil"></i></a> ';
                    }
                    if (auth()->user()->can('slidefrontend_hapus')) {
                        $btn   .= '<button type="button" id="' . $row['id_slidefrontend'] . '" class="delete btn btn-danger btn-sm" title="HAPUS"><i class="fa fa-trash"></i></button> ';
                    }

                    return $btn ?? '';
                }
            )
            ->rawColumns(['action', 'status'])
            ->make(true);
    }


    public function index()
    {
        abort_if(Gate::denies('slidefrontend_lihat'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('dashboard.slidefrontend.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('slidefrontend_tambah'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('dashboard.slidefrontend.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        abort_if(Gate::denies('slidefrontend_tambah'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rules = [
            'gambar' => 'required',
            'status' => 'required',
        ];

        $messages = [
            'gambar.required' => 'Gambar wajib di isi!',
            'status.required' => 'Status tidak boleh kosong!',
        ];

        $this->validate($request, $rules, $messages);

        $slidefrontend = Slidefrontend::create($request->all());

        if($request->has('roles')) {
            $slidefrontend->assignRole($request->input('roles'));
        }

        return redirect()->route('dashboard.slidefrontend.index')->with(['success' => 'Slidefrontend created']);

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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
