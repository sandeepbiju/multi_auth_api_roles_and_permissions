<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function superAdminHome() {
        return view('superAdmin.superAdminHome');
    }
}
