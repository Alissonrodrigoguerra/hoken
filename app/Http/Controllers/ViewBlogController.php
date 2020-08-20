<?php

namespace App\Http\Controllers;

use App\view;

use Illuminate\Http\Request;


class ViewBlogController extends Controller
{
    //

   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $Posts = \App\Post::get();

        return view('view/blog', compact('Posts'));

    }

}
