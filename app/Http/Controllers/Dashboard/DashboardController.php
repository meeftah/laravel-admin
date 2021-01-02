<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Unit;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    public function index()
    {
        // biaya formulir perunit
        if (Auth::user()->hasRole('Calon Siswa TK')) {
            $biayaFormulir = Unit::where('nm_unit', 'TKIT')->first()->biaya_formulir;
        } else
        if (Auth::user()->hasRole('Calon Siswa SD')) {
            $biayaFormulir = Unit::where('nm_unit', 'SDIT')->first()->biaya_formulir;
        } else
        if (Auth::user()->hasRole('Calon Siswa SMP')) {
            $biayaFormulir = Unit::where('nm_unit', 'SMPIT')->first()->biaya_formulir;
        } else {
            $biayaFormulir = Unit::where('nm_unit', 'SMAIT')->first()->biaya_formulir;
        }

        // masa aktif bersarkan konfigurasi va
        if (config('va_config.masa_aktif.format') == 'jam') {
            $masaAktif = config('va_config.masa_aktif.satuan') . ' jam';
        } else
        // jika format berupa menit
        if (config('va_config.masa_aktif.format') == 'menit') {
            $masaAktif = config('va_config.masa_aktif.satuan') . ' menit';
        } 
        // jika format berupa menit
        else {
            $masaAktif = config('va_config.masa_aktif.satuan') . 'x24 jam';
        }
        
        return view('dashboard.beranda.index', compact('biayaFormulir', 'masaAktif'));
    }
}
