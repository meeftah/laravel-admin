<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\InfoTambahan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class InfoTambahanController extends Controller
{
    public function datatableAPI()
    {
        // ambil semua data
        $data = InfoTambahan::orderBy('created_at', 'ASC')->get();

        return datatables()->of($data)
            ->addIndexColumn()
            ->editColumn(
                'ikon',
                function ($row) {
                    $ikon = '';
                    if ($row['ikon']) {
                        // lokasi ikon = storage -> uploads -> modul2
                        $path = 'storage/uploads/modul2/';
                        $ikon = '<img src="' . url($path . $row['ikon']) . '" width="200px">';
                    }
                    return $ikon;
                }
            )
            ->addColumn(
                'action',
                function ($row) {
                    $btn = '';
                    if (auth()->user()->can('info-tambahan-detail_tambah')) {
                        $btn   .= '<a href="' . route('dashboard.info-tambahan-detail.index', $row['id']) . '" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="TAMBAH DETAIL"><i class="fa fa-plus-circle"></i></a> ';
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
            ->rawColumns(['ikon', 'action'])
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
            'ikon'    => 'required|mimes:jpeg,png,jpg|max:2000'
        ];

        $messages = [
            'judul.required' => 'Kolom judul wajib diisi!',
            'ikon.required' => 'Kolom ikon wajib diisi!',
            'ikon.mimes'    => 'Kolom gambar harus berformat jpg/png',
            'ikon.max'      => 'Kolom gambar maksimal 2MB',
        ];

        $this->validate($request, $rules, $messages);

        $infoTambahan           = new InfoTambahan();
        $infoTambahan->judul    = $request->judul;

        $deskripsi              = $request->deskripsi;
        if ($deskripsi) {
            $dom = new \DomDocument();
            $dom->loadHtml($deskripsi, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
            $semuaGambar = $dom->getElementsByTagName('img');

            foreach ($semuaGambar as $k => $gambar) {
                $data = $gambar->getAttribute('src');

                list($type, $data) = explode(';', $data);
                list(, $data)      = explode(',', $data);
                $data = base64_decode($data);

                $fileName = time() . '_' . $k . '.png';
                $upload = Storage::disk('uploads_modul2')->put($fileName, $data);

                $gambar->removeAttribute('src');
                $gambar->setAttribute('src', url('storage/uploads/modul2/' . $fileName));
            }

            $infoTambahan->deskripsi = $dom->saveHTML();
        }

        if ($request->hasFile('ikon')) {
            // upload ikon
            $img = $request->file('ikon');
            $image = Image::make($img->getRealPath());
            $fileName = time() . '.' . $img->getClientOriginalExtension();
            $upload = Storage::disk('uploads_modul2')->put($fileName, $image->encode());
            if ($upload) {
                $infoTambahan->ikon = $fileName;
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

        $infoTambahan = InfoTambahan::select('id', 'judul', 'deskripsi', 'ikon')
            ->with(['infoTambahanDaftar' => function ($query) {
                $query->select('id', 'id_info_tambahan', 'judul');
                $query->orderBy('created_at', 'ASC');
            }])
            ->where('id', $id)
            ->first();

        // lokasi ikon = storage -> uploads -> modul2
        $infoTambahan->ikon = $infoTambahan->ikon ? 'storage/uploads/modul2/' . $infoTambahan->ikon : null;

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
        // lokasi ikon = storage -> uploads -> modul2
        $infoTambahan->ikon = $infoTambahan->ikon ? 'storage/uploads/modul2/' . $infoTambahan->ikon : null;

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

        $infoTambahan           = InfoTambahan::where('id', $id)->first();
        if ($infoTambahan->ikon) {
            $rules = [
                'judul' => 'required',
                'ikon'    => 'sometimes|image|mimes:jpeg,png,jpg|max:2000'
            ];

            $messages = [
                'judul.required' => 'Kolom judul wajib diisi!',
                'ikon.image'    => 'File harus berupa gambar',
                'ikon.mimes'    => 'Kolom gambar harus berformat jpg/png',
                'ikon.max'      => 'Kolom gambar maksimal 2MB',
            ];
        } else {
            $rules = [
                'judul' => 'required',
                'ikon'    => 'required|image|mimes:jpeg,png,jpg|max:2000'
            ];

            $messages = [
                'judul.required' => 'Kolom judul wajib diisi!',
                'ikon.required' => 'Kolom ikon wajib diisi!',
                'ikon.image'    => 'File harus berupa gambar',
                'ikon.mimes'    => 'Kolom gambar harus berformat jpg/png',
                'ikon.max'      => 'Kolom gambar maksimal 2MB',
            ];
        }

        $this->validate($request, $rules, $messages);

        $infoTambahan->judul    = $request->judul;

        $deskripsi  = $request->deskripsi;
        if ($deskripsi) {
            $dom        = new \DomDocument();
            $dom->loadHtml($deskripsi, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
            $semuaGambar = $dom->getElementsByTagName('img');

            foreach ($semuaGambar as $k => $gambar) {
                $data = $gambar->getAttribute('src');

                if (!Str::contains($data, 'storage/uploads/modul2/')) {
                    list($type, $data) = explode(';', $data);
                    list(, $data)      = explode(',', $data);
                    $data = base64_decode($data);

                    $fileName = time() . '_' . $k . '.png';
                    $upload = Storage::disk('uploads_modul2')->put($fileName, $data);

                    $gambar->removeAttribute('src');
                    $gambar->setAttribute('src', url('storage/uploads/modul2/' . $fileName));
                }
            }

            $infoTambahan->deskripsi = $dom->saveHTML();
        }

        if ($request->hasFile('ikon')) {
            // upload ikon
            $img = $request->file('ikon');
            $image = Image::make($img->getRealPath());
            $fileName = time() . '.' . $img->getClientOriginalExtension();
            $upload = Storage::disk('uploads_modul2')->put($fileName, $image->encode());
            if ($upload) {
                $infoTambahan->ikon = $fileName;
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

        $hapusInfoTambahan = InfoTambahan::where('id', $infoTambahan->id)->first();

        // jika ada file yang lama maka hapus
        if (Storage::disk('uploads_modul2')->exists($hapusInfoTambahan->ikon)) {
            Storage::disk('uploads_modul2')->delete($hapusInfoTambahan->ikon);
            $hapusInfoTambahan->ikon = null;
        }

        if ($hapusInfoTambahan->delete()) {
            return response()->json(['status' => 'success', 'message' => 'Info tambahan berhasil dihapus']);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Info tambahan gagal dihapus']);
        }
    }

    public function deleteIkon(Request $request)
    {
        abort_if(Gate::denies('info-tambahan_hapus'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $infoTambahan = InfoTambahan::where('id', $request->id)->first();

        // jika ada file yang lama maka hapus
        if (Storage::disk('uploads_modul2')->exists($infoTambahan->ikon)) {
            Storage::disk('uploads_modul2')->delete($infoTambahan->ikon);
            $infoTambahan->ikon = null;
        }

        if ($infoTambahan->save()) {
            return response()->json(['status' => 'success', 'message' => 'Ikon berhasil dihapus']);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Ikon gagal dihapus']);
        }
    }
}
