<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PainelProcessoController extends Controller
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
        $processo = \App\Processo::where(['Produto_id' => $product->id])->get();
        
      
        return view('painel/Processo.show', compact('processo','product'));
  
        

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

        return view('./painel/Processo.create', compact('product'));


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
        
        $Blog = new \App\Processo;
        $Blog->name = $request->input('name'); 
        $Blog->titulo = $request->input('titulo'); 
        $Blog->Produto_id = $request->input('Produto_id');
        $Blog->status_log = $request->input('status_log');
        $Blog->updated_at = $request->input('post_data');
        $voltar = $Blog->Produto_id;
        //imagem_destaque
        if(!empty($request->hasfile('imagem_destaque'))){
            $imagem =  $request->imagem_destaque->store('public/processo/');
            $Blog->imagem_destaque = $imagem;
            }
            

        // Upload Imagem
        if(!empty($request->hasfile('imagem'))){
        $imagem =  $request->imagem->store('public/processo/');
        $Blog->imagem = $imagem;
        }
        
         
        if($Blog->save()){

            $request->session()->flash('status', 'Postagem '. $Blog->post_title .' criada com sucesso!');
            

        }else{

            $request->session()->flash('status', 'Ops Erro!, tente novamente em breve');

        };

        return redirect()->route('processo.index',  $voltar);
        
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

        return view('./painel/Processo.create', compact('Categorias'));

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
        $processo = \App\Processo::find($id);
        $product = \App\Produto::find($processo->Produto_id);
        return view('./painel/Processo.edit', compact('processo', 'product'));
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
        

        $Blog = \App\Cores::find($id);
        $Blog->nome = $request->input('name'); 
        $Blog->hexa = $request->input('hexa'); 
        $Blog->Produto_id = $request->input('Produto_id'); 
        $voltar = $Blog->Produto_id;
        // Upload Imagem
        if(!empty($request->hasfile('imagem_destaque'))){
        $imagem =  $request->imagem_destaque->store('public/processo/');
        $Blog->imagem = $imagem;
        }
        
         
        if($Blog->save()){

            $request->session()->flash('status', 'Cor '. $Blog->nome .' atualizada com sucesso!');


        }else{

            $request->session()->flash('status', 'Ops Erro!, tente novamente em breve');

        };

        return redirect()->route('cor.index', $Blog->Produto_id);
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
        $recuperado = \App\Processo::find($id);
        $name = $recuperado->name;
        $Produto_id = $recuperado->Produto_id;
        $processo = \App\Processo::findOrfail($id);
        

        
        if($processo->delete()){

            $request->session()->flash('status', 'Processo '.$name.' deste produto deletada com sucesso!');


        }else{

            $request->session()->flash('status', 'Ops Erro!, tente novamente em breve');

        };

        return redirect()->route('processo.index', $Produto_id);

    }
}
