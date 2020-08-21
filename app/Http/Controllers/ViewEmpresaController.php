<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewEmpresaController extends Controller
{
    //

    public function index()
    {
        //
        $Post = \App\Post::get();

        return view('view/empresa', compact('Post'));

    }

}
