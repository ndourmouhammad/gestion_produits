<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
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
        $categories = Categorie::all();
        return view('admins.dashboard', compact('categories'));
    }
}
