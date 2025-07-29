<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct()
    {
        // dd('hi');

        // if(auth()->user()) {
        //     return 'hi welcome to admin panel';
        // }

        //    dd('hi welcome to admin panel');

    }


    public function index()
    {
        // return view('admin.home');

        // $number = 15; 

        // return view('home', ['number' => $number]);
        DB::update('update set');
        return view('home');
    }
        
        

    public function about()
    {
        return view('about');
    }
}
