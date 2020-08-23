<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PainelProdutoController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return voidproduto.show
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('painel');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //

        $produtos = \App\Produto::get();
        return view('painel/produto.show', compact('produtos'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $Categorias = \App\Categoria::get();

        
        return view('./painel/Blog.create', compact('Categorias'));


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 
        
        
        $Blog = new \App\Post;
        $Blog->post_autor = '1'; 
        $Blog->post_title = $request->input('post_titulo'); 
        $Blog->post_content = $request->input('post_content'); 
        $Blog->post_data = $request->input('post_data'); 
        $Blog->categoria_id = $request->input('categoria_id'); 
        if($request->input('destaque') == 1){
            $Blog->destaque = $request->input('destaque'); 
        }else{
            $Blog->destaque = null; 
        }
        $Blog->post_tag = $request->input('post_tag'); 
          // Upload Imagem
          if(!empty($request->hasfile('post_imagem'))){
            $imagem =  $request->post_imagem->store('public/blog/');
            $Blog->post_imagem = $imagem;
 
         }


        if($Blog->save()){

            $request->session()->flash('status', 'Postagem '. $Blog->post_title .' criada com sucesso!');
            

        }else{

            $request->session()->flash('status', 'Ops Erro!, tente novamente em breve');

        };

        return redirect()->route('blog.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

        $Blog = \App\Post::get();
        $Categorias = \App\Categoria::get();

        return view('./painel/Blog.create', compact('Categorias'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $Blog = \App\Post::find($id);
        $Categorias = \App\Categoria::get();

        return view('./painel/Blog.edit', compact('Blog', 'Categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        

        $Blog = \App\Post::find($id);
        $Blog->post_autor = '1'; 
        $Blog->post_title = $request->input('post_titulo'); 
        $Blog->post_content = $request->input('post_content');
        $Blog->post_data =  $request->input('post_data');
        $Blog->categoria_id = $request->input('categoria_id'); 
        $Blog->post_tag = $request->input('post_tag'); 
        if($request->input('destaque') == 1){
            $Blog->destaque = $request->input('destaque'); 
        }else{
            $Blog->destaque = null; 
        }
        $Blog->status_log = $request->input('status_log'); 
        // Upload Imagem
        if($request->file('post_imagem') !== null){
            $imagem =  $request->post_imagem->store('public/blog/');
            $Blog->post_imagem = $imagem;
 
         }
        if($Blog->save()){

            $request->session()->flash('status', 'Postagem '. $Blog->post_title .' atualizada com sucesso!');


        }else{

            $request->session()->flash('status', 'Ops Erro!, tente novamente em breve');

        };

        return redirect()->route('blog.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        //
        $Blog = \App\Post::findOrfail($id);
        
        if($Blog->delete()){

            $request->session()->flash('status', 'Postagem deletada com sucesso!');


        }else{

            $request->session()->flash('status', 'Ops Erro!, tente novamente em breve');

        };

        return redirect()->route('blog.index');

    }
}
