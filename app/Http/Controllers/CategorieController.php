<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    //

    public function index()
    {
        $categories = Categorie::all();
        return view('utilisateurs.index', compact('categories'));

    }

    public function categories()
    {
        $categories = Categorie::all();
        return view('utilisateurs.categories.categories', compact('categories'));

    }

    public function dashboard()
    {
        $categories = Categorie::all();
        return view('admins.dashboard', compact('categories'));
    }
}
