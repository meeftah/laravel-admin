<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Agama;
use App\Models\Alamat;
use App\Models\Bcquran;
use App\Models\Jarak;
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
        $waktutmph = Waktutmph::orderBy('kode', 'ASC')->get();
        $bcquran = Bcquran::orderBy('kode', 'ASC')->get();
        return view('dashboard.profilcalonsiswa.index', compact('agama', 'jarak', 'waktutmph', 'bcquran'));
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
