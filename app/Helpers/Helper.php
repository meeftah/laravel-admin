<?php

use App\Models\User;
use Illuminate\Support\Facades\Request;

function set_active($route, $output = 'active')
{
    if (is_array($route)) {
        return in_array(Request::path(), $route) ? $output : '';
    }
    return Request::path() == $route ? $output : '';
}

function get_greeting() {
    $time = date("H");
    $greet = 'Hai';
    
    if ($time <= "10") {
        $greet = 'Selamat Pagi';
    } else if ($time >= "11" && $time <= "14") {
        $greet = 'Selamat Siang';
    } else if ($time >= "15" && $time <= "17") {
        $greet = 'Selamat Sore';
    } else {
        $greet = 'Selamat Malam';
    }

    return $greet;
}