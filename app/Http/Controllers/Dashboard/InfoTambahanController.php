<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\InfoTambahan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;
use Intervention\Image\Facades\Image;

class InfoTambahanController extends Controller
{
    public function datatableAPI()
    {
        // ambil semua data
        $data = InfoTambahan::orderBy('created_at', 'ASC')->get();

        return datatables()->of($data)
            ->addIndexColumn()
            ->addColumn(
                'action',
                function ($row) {
                    $btn = '';
                    if (auth()->user()->can('info-tambahan-sub_tambah')) {
                        $btn   .= '<a href="' . route('dashboard.info-tambahan.create-sub', $row['id']) . '" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="TAMBAH DETAIL"><i class="fa fa-plus-circle"></i></a> ';
                    }
                    if (auth()->user()->can('info-tambahan_detail')) {
                        $btn   .= '<a href="' . route('dashboard.info-tambahan.show', $row['id']) . '" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="LIHAT DETAIL"><i class="fa fa-eye"></i></a> ';
                    }
                    if (auth()->user()->can('info-tambahan_ubah')) {
                        $btn   .= '<a href="' . route('dashboard.info-tambahan.edit', $row['id']) . '" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top" title="UBAH"><i class="fa fa-pencil"></i></a> ';
                    }
                    if (auth()->user()->can('info-tambahan_hapus')) {
                        $btn   .= '<button type="button" id="' . $row['id'] . '" class="delete btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="HAPUS"><i class="fa fa-trash"></i></button> ';
                    }

                    if (!empty($btn)) {
                        $divGroupPrefix = '<div class="btn-group" role="group" aria-label="Aksi Group Button">';
                        $divGroupSuffix = '</div';
                        $btn = $divGroupPrefix . $btn . $divGroupSuffix;
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
        abort_if(Gate::denies('info-tambahan_lihat'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('dashboard.infotambahan.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('info-tambahan_tambah'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('dashboard.infotambahan.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createSub()
    {
        abort_if(Gate::denies('info-tambahan-sub_tambah'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('dashboard.infotambahan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        abort_if(Gate::denies('info-tambahan_tambah'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rules = [
            'judul' => 'required',
            'gambar'    => 'sometimes|image|mimes:jpeg,png,jpg|max:2000'
        ];

        $messages = [
            'judul.required' => 'Kolom judul wajib diisi!',
            'gambar.image'   => 'File harus berupa gambar',
            'gambar.mimes'   => 'Kolom gambar harus berformat jpg/png',
            'gambar.max'     => 'Kolom gambar maksimal 2MB',
        ];

        $this->validate($request, $rules, $messages);

        $infoTambahan = new InfoTambahan();
        $infoTambahan->judul = $request->judul;
        $infoTambahan->deskripsi = $request->deskripsi;
        if ($request->hasFile('gambar')) {
            // upload gambar
            $img = $request->file('gambar');
            $image = Image::make($img->getRealPath());
            $fileName = time() . '.' . $img->getClientOriginalExtension();
            $upload = Storage::disk('uploads_modul2')->put($fileName, $image->encode());
            if ($upload) {
                $infoTambahan->gambar = $fileName;
            }
        }

        if ($infoTambahan->save()) {
            return redirect()->route('dashboard.info-tambahan.index')->with(['success' => 'Info tambahan berhasil ditambah']);
        } else {
            return redirect()->route('dashboard.info-tambahan.index')->with(['error' => 'Info tambahan gagal ditambah, silakan coba kembali']);
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
        abort_if(Gate::denies('info-tambahan_detail'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $infoTambahan = InfoTambahan::where('id', $id)->first();
        // lokasi gambar = storage -> uploads -> modul2
        $infoTambahan->gambar = $infoTambahan->gambar ? 'storage/uploads/modul2/' . $infoTambahan->gambar : null;

        return view('dashboard.infotambahan.show', compact('infoTambahan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        abort_if(Gate::denies('info-tambahan_ubah'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $infoTambahan = InfoTambahan::where('id', $id)->first();
        // lokasi gambar = storage -> uploads -> modul2
        $infoTambahan->gambar = $infoTambahan->gambar ? 'storage/uploads/modul2/' . $infoTambahan->gambar : null;

        return view('dashboard.infotambahan.edit', compact('infoTambahan'));
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
        abort_if(Gate::denies('info-tambahan_ubah'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rules = [
            'judul'     => 'required',
            'gambar'    => 'sometimes|image|mimes:jpeg,png,jpg|max:2000'
        ];

        $messages = [
            'judul.required' => 'Kolom judul wajib diisi!',
            'gambar.image'   => 'File harus berupa gambar',
            'gambar.mimes'   => 'Kolom gambar harus berformat jpg/png',
            'gambar.max'     => 'Kolom gambar maksimal 2MB',
        ];

        $this->validate($request, $rules, $messages);

        $infoTambahan = InfoTambahan::where('id', $id)->first();
        $infoTambahan->judul = $request->judul;
        $infoTambahan->deskripsi = $request->deskripsi;
        if ($request->hasFile('gambar')) {
            // upload gambar
            // cek apakah ada upload gambar sebelumnya?
            if (Storage::disk('uploads_modul2')->exists($infoTambahan->gambar)) {
                Storage::disk('uploads_modul2')->delete($infoTambahan->gambar);
            }

            $img = $request->file('gambar');
            $image = Image::make($img->getRealPath());
            $fileName = time() . '.' . $img->getClientOriginalExtension();
            $upload = Storage::disk('uploads_modul2')->put($fileName, $image->encode());
            if ($upload) {
                $infoTambahan->gambar = $fileName;
            }
        }

        if ($infoTambahan->save()) {
            return redirect()->route('dashboard.info-tambahan.index')->with(['success' => 'Info tambahan berhasil diubah']);
        } else {
            return redirect()->route('dashboard.info-tambahan.index')->with(['error' => 'Info tambahan gagal diubah, silakan coba kembali']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(InfoTambahan $infoTambahan)
    {
        abort_if(Gate::denies('info-tambahan_hapus'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($infoTambahan->delete()) {
            return response()->json(['status' => 'success', 'message' => 'Info tambahan berhasil dihapus']);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Info tambahan gagal dihapus']);
        }
    }

    public function deleteGambar($id)
    {
        abort_if(Gate::denies('info-tambahan_hapus'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $infoTambahan = InfoTambahan::where('id', $id)->first();

        // jika ada file yang lama maka hapus
        if (Storage::disk('uploads_modul2')->exists($infoTambahan->gambar)) {
            Storage::disk('uploads_modul2')->delete($infoTambahan->gambar);
            $infoTambahan->gambar = null;
        }

        if ($infoTambahan->save()) {
            return response()->json(['status' => 'success', 'message' => 'Info tambahan berhasil dihapus']);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Info tambahan gagal dihapus']);
        }
    }
}
