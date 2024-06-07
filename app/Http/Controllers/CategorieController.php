<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategorieController extends Controller
{
    //

    public function index()
    {
        return view('utilisateurs.index');
    }

    public function dashboard()
    {
        return view('admins.dashboard');
    }
}
