<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $LANG = config('app.lang');
        return view('admin.index', compact('LANG'));
    }
}
