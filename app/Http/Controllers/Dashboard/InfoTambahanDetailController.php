<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\InfoTambahan;
use App\Models\InfoTambahanDetail;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class InfoTambahanDetailController extends Controller
{
    public function datatableAPI($id)
    {
        // ambil semua data
        $data = InfoTambahanDetail::where('id_info_tambahan', $id)->orderBy('created_at', 'ASC')->get();

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
                    if (auth()->user()->can('info-tambahan-detail_detail')) {
                        $btn   .= '<a href="' . route('dashboard.info-tambahan-detail.show', $row['id']) . '" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="LIHAT DETAIL"><i class="fa fa-eye"></i></a> ';
                    }
                    if (auth()->user()->can('info-tambahan-detail_ubah')) {
                        $btn   .= '<a href="' . route('dashboard.info-tambahan-detail.edit', $row['id']) . '" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top" title="UBAH"><i class="fa fa-pencil"></i></a> ';
                    }
                    if (auth()->user()->can('info-tambahan-detail_hapus')) {
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
    public function index($id)
    {
        abort_if(Gate::denies('info-tambahan-detail_lihat'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $infoTambahan = InfoTambahan::where('id', $id)->first();

        return view('dashboard.infotambahandetail.index', compact('infoTambahan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        abort_if(Gate::denies('info-tambahan-detail_tambah'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $infoTambahan = InfoTambahan::where('id', $id)->first();

        return view('dashboard.infotambahandetail.create', compact('infoTambahan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        abort_if(Gate::denies('info-tambahan-detail_tambah'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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

        $infoTambahanDetail = new InfoTambahanDetail();
        $infoTambahanDetail->id_info_tambahan = $request->id_info_tambahan;
        $infoTambahanDetail->judul = $request->judul;

        $deskripsi = $request->deskripsi;
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

            $infoTambahanDetail->deskripsi = $dom->saveHTML();
        }

        if ($request->hasFile('ikon')) {
            // upload ikon
            $img = $request->file('ikon');
            $image = Image::make($img->getRealPath());
            $fileName = time() . '.' . $img->getClientOriginalExtension();
            $upload = Storage::disk('uploads_modul2')->put($fileName, $image->encode());
            if ($upload) {
                $infoTambahanDetail->ikon = $fileName;
            }
        }

        if ($infoTambahanDetail->save()) {
            return redirect()->route('dashboard.info-tambahan-detail.index', $request->id_info_tambahan)->with(['success' => 'Berhasil menyimpan data']);
        } else {
            return redirect()->route('dashboard.info-tambahan-detail.index', $request->id_info_tambahan)->with(['error' => 'Gagal menyimpan data, silakan coba kembali']);
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
        abort_if(Gate::denies('info-tambahan-detail_detail'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $infoTambahanDaftar = InfoTambahanDaftar::where('id', $id)->first();

        return view('dashboard.infotambahandetail.show', compact('infoTambahanDaftar'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        abort_if(Gate::denies('info-tambahan-detail_ubah'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $infoTambahanDetail = InfoTambahanDetail::where('id', $id)->first();
        // lokasi ikon = storage -> uploads -> modul2
        $infoTambahanDetail->ikon = $infoTambahanDetail->ikon ? 'storage/uploads/modul2/' . $infoTambahanDetail->ikon : null;

        return view('dashboard.infotambahandetail.edit', compact('infoTambahanDetail'));
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
        abort_if(Gate::denies('info-tambahan-detail_ubah'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $infoTambahanDetail = InfoTambahanDetail::where('id', $id)->first();
        if ($infoTambahanDetail->ikon) {
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

        $infoTambahanDetail->id_info_tambahan = $request->id_info_tambahan;
        $infoTambahanDetail->judul = $request->judul;

        $deskripsi = $request->deskripsi;
        if ($deskripsi) {
            $dom = new \DomDocument();
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

            $infoTambahanDetail->deskripsi = $dom->saveHTML();
        }

        if ($request->hasFile('ikon')) {
            // upload ikon
            $img = $request->file('ikon');
            $image = Image::make($img->getRealPath());
            $fileName = time() . '.' . $img->getClientOriginalExtension();
            $upload = Storage::disk('uploads_modul2')->put($fileName, $image->encode());
            if ($upload) {
                $infoTambahanDetail->ikon = $fileName;
            }
        }

        if ($infoTambahanDetail->save()) {
            return redirect()->route('dashboard.info-tambahan-detail.index', $request->id_info_tambahan)->with(['success' => 'Berhasil menyimpan data']);
        } else {
            return redirect()->route('dashboard.info-tambahan-detail.index', $request->id_info_tambahan)->with(['error' => 'Gagal menyimpan data, silakan coba kembali']);
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
        abort_if(Gate::denies('info-tambahan-detail_hapus'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $hapusInfoTambahanDetail = InfoTambahanDetail::where('id', $id)->first();

        // jika ada file yang lama maka hapus
        if (Storage::disk('uploads_modul2')->exists($hapusInfoTambahanDetail->ikon)) {
            Storage::disk('uploads_modul2')->delete($hapusInfoTambahanDetail->ikon);
            $hapusInfoTambahanDetail->ikon = null;
        }

        if ($hapusInfoTambahanDetail->delete()) {
            return response()->json(['status' => 'success', 'message' => 'Detail berhasil dihapus']);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Detail gagal dihapus']);
        }
    }
}
