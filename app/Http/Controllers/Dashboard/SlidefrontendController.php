<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Slidefrontend;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use Image;

class SlidefrontendController extends Controller
{
    public function datatableSlidefrontendAPI()
    {
        // ambil semua data
        $slidefrontend = Slidefrontend::orderBy('created_at', 'ASC')->get();

        return datatables()->of($slidefrontend)
            ->addIndexColumn()
            ->editColumn(
                'gambar',
                function ($row) {
                    $status = '';
                    if ($row['gambar']) {
                        $status = '<img src="' . $row['gambar'] . '" width="200px">';
                    }
                    return $status;
                }
            )
            ->editColumn(
                'status',
                function ($row) {
                    $status = '';
                    if ($row['status'] == 0) {
                        $status = '<span class="badge badge-danger p-2" style="font-size: 10pt; font-weight: 400">tidak aktif</span>';
                    } else
                    if ($row['status'] == 1) {
                        $status = '<span class="badge badge-success p-2 text-white" style="font-size: 10pt; font-weight: 400">aktif</span>';
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
            ->rawColumns(['gambar', 'status','action'])
            ->make(true);
    }


    public function index()
    {
        abort_if(Gate::denies('slidefrontend_lihat'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('dashboard.datawebsite.slidefrontend.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('slidefrontend_tambah'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('dashboard.datawebsite.slidefrontend.create');
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
            'slideImage' => 'required|mimes:jpg,jpeg,png|max:4096',
            'status' => 'required',
        ];

        $messages = [
            'slideImage.required' => 'Gambar wajib di isi!',
            'slideImage.mimes' => 'Upload gambar hanya JPG atau PNG!',
            'slideImage.max' => 'Gambar maksimal 4MB!',
            'status.required' => 'Status tidak boleh kosong!',
        ];

        $this->validate($request, $rules, $messages);

        // upload gambar
        $extension = $request->file('slideImage')->getClientOriginalExtension();
        $filenametostore = 'slider_' . time() . '.' . $extension;
        // dd(public_path('assets/frontend/img/slider/') . $filenametostore);
        $request->file('slideImage')->move(public_path('assets/frontend/img/slider'), $filenametostore);

        if (!file_exists(public_path('assets/frontend/img/slider/crop'))) {
            File::makeDirectory(public_path('assets/frontend/img/slider/crop/'), 0755, true);
            // mkdir(public_path('assets/frontend/slider/crop'), 0755);
        }

        // crop image
        $img = Image::make(public_path('assets/frontend/img/slider/' . $filenametostore));
        $croppath = public_path('assets/frontend/img/slider/crop/' . $filenametostore);

        if ($request->input('w') && $request->input('h') && $request->input('x1') && $request->input('y1')) {
            $img->crop($request->input('w'), $request->input('h'), $request->input('x1'), $request->input('y1'));
            $img->save($croppath);

            $path = asset('assets/frontend/img/slider/crop/' . $filenametostore);
        } else {
            $path = asset('assets/frontend/img/slider/' . $filenametostore);
        }

        $slidefrontend = new Slidefrontend();
        $slidefrontend->gambar = $path;
        $slidefrontend->judul  = $request->judul;
        $slidefrontend->deskripsi = $request->deskripsi;
        $slidefrontend->url = $request->url;
        $slidefrontend->url_teks = $request->url_teks;
        $slidefrontend->status = $request->status;
        $slidefrontend->save();

        return redirect()->route('dashboard.slidefrontend.index')->with(['success' => 'Berhasil menambahkan slide']);
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
