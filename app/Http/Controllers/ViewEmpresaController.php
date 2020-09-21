<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewEmpresaController extends Controller
{
    //

    public function index()
    {
        //
        $Post = \App\Post::where(['status_log' => 1] )->get();
        $categorias = \App\Categoria::where(['status_log'=> 1, 'type' => 'produto' ])->get();

        return view('View/empresa', compact('Post', 'categorias'));

    }

}
