<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests;

class DashboardController extends Controller
{

    public function index()
    {
        return view('dashboard.beranda.index');
    }
}
