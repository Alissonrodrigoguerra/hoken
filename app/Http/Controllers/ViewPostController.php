<?php

namespace App\Http\Controllers;

use App\view;

use Illuminate\Http\Request;


class ViewPostController extends Controller
{
    //

   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Post = \App\Post::where(['status_log' => 1] )->get();
        $Categoria = \App\Categoria::get();

        return view('view.Bloglist', compact('Post', 'Categoria'));

    }



    public function show($id)
    {
        
        $Post_id = \App\Post::find($id);
        $Post = \App\Post::get();
        $Categoria = \App\Categoria::get();

        return view('view.Blog', compact('Post', 'Categoria'));

    }

}
