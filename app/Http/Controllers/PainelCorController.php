<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PainelCorController extends Controller
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

        $cor = \App\Cores::get();
        return view('painel/Cor.show', compact('cor'));
        

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $Categorias = \App\Categoria::where(['status_log' => 1, 'status_log' => 1] )->get();


        return view('./painel/Cor.create', compact('Categorias'));


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
        
        
        $Blog = new \App\Cor;
        $Blog->post_autor = Auth::user()->id; 
        $Blog->name = $request->input('name'); 
        $Blog->link = $request->input('link'); 
        $Blog->Video_link = $request->input('Video_link'); 
        $Blog->categoria_id = $request->input('categoria_id');  

        if($request->input('destaque') == 1){
            $Blog->destaque = $request->input('destaque'); 
        }else{
            $Blog->destaque = null; 
        }


        if(!empty($request->hasfile('imagem_backgound'))){
            $imagem =  $request->imagem_backgound->store('public/produto/');
            $Blog->imagem_backgound = $imagem;
 
         }
          // Upload Imagem
          if(!empty($request->hasfile('imagem_destaque'))){
            $imagem =  $request->imagem_destaque->store('public/produto/');
            $Blog->imagem_destaque = $imagem;
         }
         
         
        if($Blog->save()){

            $request->session()->flash('status', 'Postagem '. $Blog->post_title .' criada com sucesso!');
            

        }else{

            $request->session()->flash('status', 'Ops Erro!, tente novamente em breve');

        };

        return redirect()->route('produto.index');
        
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

        return view('./painel/Cor.create', compact('Categorias'));

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
        $produto = \App\Cor::find($id);
        $Categorias = \App\Categoria::where(['status_log' => 1, 'status_log' => 1] )->get();

        return view('./painel/Cor.edit', compact('produto', 'Categorias'));
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
        

        $Blog = \App\Cor::find($id);
        $Blog->post_autor = Auth::user()->id; 
        $Blog->name = $request->input('name'); 
        $Blog->link = $request->input('link'); 
        $Blog->Video_link = $request->input('Video_link'); 
        $Blog->categoria_id = $request->input('categoria_id');  

        if($request->input('destaque') == 1){
            $Blog->destaque = $request->input('destaque'); 
        }else{
            $Blog->destaque = null; 
        }


        if(!empty($request->hasfile('imagem_backgound'))){
            $imagem =  $request->imagem_backgound->store('public/produto/');
            $Blog->imagem_backgound = $imagem;
 
         }
          // Upload Imagem
          if(!empty($request->hasfile('imagem_destaque'))){
            $imagem =  $request->imagem_destaque->store('public/produto/');
            $Blog->imagem_destaque = $imagem;
         }
         
        if($Blog->save()){

            $request->session()->flash('status', 'Postagem '. $Blog->post_title .' atualizada com sucesso!');


        }else{

            $request->session()->flash('status', 'Ops Erro!, tente novamente em breve');

        };

        return redirect()->route('produto.index');
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
        $Cor = \App\Cor::findOrfail($id);
        
        if($Cor->delete()){

            $request->session()->flash('status', 'Postagem deletada com sucesso!');


        }else{

            $request->session()->flash('status', 'Ops Erro!, tente novamente em breve');

        };

        return redirect()->route('produto.index');

    }
}
