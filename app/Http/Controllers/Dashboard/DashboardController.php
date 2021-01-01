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
        if (Auth::user()->hasRole('Calon Siswa TK')) {
            $idVa = 
            $biaya_formulir = Unit::where('nm_unit', 'TKIT')->first()->biaya_formulir;
        } else
        if (Auth::user()->hasRole('Calon Siswa SD')) {
            $biaya_formulir = Unit::where('nm_unit', 'SDIT')->first()->biaya_formulir;
        } else
        if (Auth::user()->hasRole('Calon Siswa SMP')) {
            $biaya_formulir = Unit::where('nm_unit', 'SMPIT')->first()->biaya_formulir;
        } else {
            $biaya_formulir = Unit::where('nm_unit', 'SMAIT')->first()->biaya_formulir;
        }
        
        return view('dashboard.beranda.index', compact('biaya_formulir'));
    }
}
