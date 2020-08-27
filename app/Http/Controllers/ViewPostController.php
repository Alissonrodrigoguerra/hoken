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
        $categorias = \App\Categoria::where(['status_log'=> 1, 'type' => 'produto' ])->get();

        return view('view.Bloglist', compact('Post','Post_List', 'Categoria', 'categorias'));

    }

    public function categoria($id)
    {
        
        $Post_List = \App\Post::where('categoria_id', $id)->get();
        $Post = \App\Post::where(['status_log' => 1] )->get();
        $Categoria = \App\Categoria::get();
        $categorias = \App\Categoria::where(['status_log'=> 1, 'type' => 'produto' ])->get();

        return view('view.Bloglist', compact('Post', 'Post_List','Categoria', 'categorias'));

    }


    public function comentario(Request $request)
    {
        $id = $request->input('id');
        $Post_id = \App\Post::find($id);
        $Post_List = \App\Post::where('categoria_id', $id)->get();
        $Comentarios = \App\Comentario::where(['status_log' => 1, 'post_id' => $id] )->get();
        $Post = \App\Post::where(['status_log' => 1] )->get();
        $Categoria = \App\Categoria::get();
        $categorias = \App\Categoria::where(['status_log'=> 1, 'type' => 'produto' ])->get();


        $Comentario = new \App\Comentario;
        $Comentario->post_id = $request->input('id');
        $Comentario->comment = $request->input('comment'); 
        $Comentario->email = $request->input('email'); 
        $Comentario->name = $request->input('name'); 
        $Comentario->status_log = '0'; 


            if($Comentario->save()){
                
                $request->session()->flash('status', 'Comentário registrado com sucesso!');
                
    
            }else{
    
                $request->session()->flash('status', 'Ops Erro!, tente novamente em breve');
    
            };

     
            return redirect()->route('post.show', $Comentario->post_id);

        return view('view.Blog', compact('Post', 'Post_id','Categoria', 'Comentarios', 'categorias'));

    }

    public function show($id)
    {
        
        $Post_id = \App\Post::find($id);
        $Post_List = \App\Post::where(['status_log' => 1] )->get();
        $Post = \App\Post::where(['status_log' => 1] )->get();
        $Categoria = \App\Categoria::get();
        $Comentarios = \App\Comentario::where(['status_log' => 1, 'post_id' => $id] )->get();
        $categorias = \App\Categoria::where(['status_log'=> 1, 'type' => 'produto' ])->get();

        return view('view.Blog', compact('Post','Post_id', 'Categoria', 'Comentarios', 'categorias'));

    }

}
