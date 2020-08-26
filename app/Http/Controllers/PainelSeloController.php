<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PainelSeloController extends Controller
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
    public function index(Request $request, $id)
    {
        //
        $product = \App\Produto::find($id);
        $selos = \App\Selos::where(['Produto_id' => $product->id])->get();
        
      
        return view('painel/Selo.show', compact('selos','product'));
  
        

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //
        $product= \App\Produto::find($id);

        return view('./painel/Selo.create', compact('product'));


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
        
        $Blog = new \App\Selos;
        $Blog->nome = $request->input('name'); 
        $Blog->tipo = $request->input('tipo'); 
        $Blog->Produto_id = $request->input('Produto_id');
        $Blog->status_log = $request->input('status_log');
        $Blog->updated_at = $request->input('data');  
        $voltar = $Blog->Produto_id;

        // Upload Imagem
        if(!empty($request->hasfile('imagem'))){
        $imagem =  $request->imagem->store('public/selo/');
        $Blog->imagem = $imagem;
        }
        
         
        if($Blog->save()){

            $request->session()->flash('status', 'Seleo '. $Blog->nome .' criado com sucesso!');
            

        }else{

            $request->session()->flash('status', 'Ops Erro!, tente novamente em breve');

        };

        return redirect()->route('selo.index',  $voltar);
        
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
        $selo = \App\Selos::find($id);
        $product = \App\Produto::find($selo->Produto_id);
        return view('./painel/Selo.edit', compact('selo', 'product'));
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
        

        $Blog = \App\Selos::find($id);
        $Blog->nome = $request->input('name'); 
        $Blog->tipo = $request->input('tipo'); 
        $Blog->Produto_id = $request->input('Produto_id');
        $Blog->status_log = $request->input('status_log');
        $Blog->updated_at = $request->input('data');  
        $voltar = $Blog->Produto_id;

        // Upload Imagem
        if(!empty($request->hasfile('imagem'))){
        $imagem =  $request->imagem->store('public/selo/');
        $Blog->imagem = $imagem;
        }
        
         
        if($Blog->save()){

            $request->session()->flash('status', 'Selo '. $Blog->nome .' atualizada com sucesso!');


        }else{

            $request->session()->flash('status', 'Ops Erro!, tente novamente em breve');

        };

        return redirect()->route('selo.index', $Blog->Produto_id);
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
        $recuperado = \App\Selos::find($id);
        $name = $recuperado->nome;
        $Cor = \App\Selos::findOrfail($id);
     

        if($Cor->delete()){

            $request->session()->flash('status', 'Selo '.$name.' deste produto deletada com sucesso!');


        }else{

            $request->session()->flash('status', 'Ops Erro!, tente novamente em breve');

        };

        return redirect()->route('produto.index'    );

    }
}
