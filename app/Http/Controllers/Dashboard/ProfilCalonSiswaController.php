<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Agama;
use App\Models\Bcquran;
use App\Models\Jarak;
use App\Models\Jenisdokumen;
use App\Models\Kondisibelajar;
use App\Models\Pekerjaan;
use App\Models\Pendidikan;
use App\Models\Penghasilan;
use App\Models\Tempattinggal;
use App\Models\Transportasi;
use App\Models\Waktutmph;
use Illuminate\Http\Request;

class ProfilCalonSiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Display siswa profile
     *
     * @return \Illuminate\Http\Response
     */
    public function profil()
    {
        $agama = Agama::orderBy('kode', 'ASC')->get();
        $jarak = Jarak::orderBy('kode', 'ASC')->get();
        $tempattinggal = Tempattinggal::orderBy('kode', 'ASC')->get();
        $transportasi = Transportasi::orderBy('kode', 'ASC')->get();
        $waktutmph = Waktutmph::orderBy('kode', 'ASC')->get();
        $bcquran = Bcquran::orderBy('kode', 'ASC')->get();
        $kondisibelajar = Kondisibelajar::orderBy('kode', 'ASC')->get();
        $pendidikan = Pendidikan::orderBy('kode', 'ASC')->get();
        $pekerjaan = Pekerjaan::orderBy('kode', 'ASC')->get();
        $penghasilan = Penghasilan::orderBy('kode', 'ASC')->get();
        $jenisdokumen = Jenisdokumen::orderBy('jenisdokumen', 'ASC')->get();
        return view('dashboard.profilcalonsiswa.index', compact('agama', 'jarak', 'tempattinggal', 'transportasi', 'waktutmph', 'bcquran', 'kondisibelajar', 'pendidikan', 'pekerjaan', 'penghasilan', 'jenisdokumen'));
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
        //
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
