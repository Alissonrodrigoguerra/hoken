<?php

namespace App\Http\Controllers;

use App\view;

use Illuminate\Http\Request;
use Illuminate\Support\Str;


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
        $Post_List = \App\Post::where(['status_log' => 1] )->get();
        $Post = \App\Post::where(['status_log' => 1] )->get();
        $Categoria = \App\Categoria::get();

        return view('view.Bloglist', compact('Post','Post_List', 'Categoria'));

    }

    public function categoria($id)
    {
        
        $Post_List = \App\Post::where('categoria_id', $id)->get();
        $Post = \App\Post::where(['status_log' => 1] )->get();
        $Categoria = \App\Categoria::get();

        return view('view.Bloglist', compact('Post', 'Post_List','Categoria'));

    }

    public function show($id)
    {
        
        $Post_id = \App\Post::find($id);
        $Post_List = \App\Post::where(['status_log' => 1] )->get();
        $Post = \App\Post::where(['status_log' => 1] )->get();
        $Categoria = \App\Categoria::get();

        return view('view.Blog', compact('Post','Post_id', 'Categoria'));

    }

}
