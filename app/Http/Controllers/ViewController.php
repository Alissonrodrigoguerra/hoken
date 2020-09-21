<?php

namespace App\Http\Controllers;

use App\view;
use Illuminate\Http\Request;

class ViewController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       
        $PostDestaque = \App\Post::where(['destaque' => 1, 'status_log' => 1])->take(0)->get();
        $Post = \App\Post::where(['destaque' => null, 'status_log' => 1] )->take(3)->get();
        $Banner = \App\Banner::where(['status_log' => 1] )->take(5)->get();
        config(['adminlte.plugins.slick.active' => 'true']);
        $categorias = \App\Categoria::where(['status_log'=> 1, 'type' => 'produto' ])->get();
        $produtos = \App\Produto::where(['status_log'=> 1, 'destaque' => 1])->get();
        $produtosDestaque  = \App\Produto::where(['status_log'=> 1, 'destaque' => 1])->take(7)->get();
       

        return view('View/view', compact('Banner', 'PostDestaque',  'Post','categorias', 'produtosDestaque'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
}
