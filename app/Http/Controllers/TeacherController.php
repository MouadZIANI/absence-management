<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;

class TeacherController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:teacher');
    }

    /**
     * Show the application admin.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (View::exists('admin.index')) 
            return view('admin.index');
        else
            return view('errors.404');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function element()
    {
        if (View::exists('admin.element')) 
            return view('admin.element');
        else
            return view('errors.404');
    }
}