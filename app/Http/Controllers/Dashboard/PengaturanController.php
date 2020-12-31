<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Unit;
use Illuminate\Http\Request;

class PengaturanController extends Controller
{
    public function index()
    {
        $unit = Unit::get();
        return view('dashboard.pengaturan.index', compact('unit'));
    }
}
