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
        $PostDestaque = \App\Post::find('1');
        $Post = \App\Post::get();
        $Banner = \App\Banner::get();

        return view('view/view', compact('Banner', 'PostDestaque',  'Post'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
}
