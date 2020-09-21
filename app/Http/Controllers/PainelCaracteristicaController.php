<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
class PainelCaracteristicaController extends Controller
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
        $Caracteristicas = \App\Caracteristica::where(['Produto_id' => $product->id])->get();
        
    
        return view('painel/Caracteristicas.show', compact('Caracteristicas','product'));
  
        

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //
        $product = \App\Produto::find($id);
        $Caracteristicas = \App\Caracteristica::where(['Produto_id' => $product->id])->get();
        
        
 
        return view('./painel/Caracteristicas.create', compact('product', 'Caracteristicas'));


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
        
        $Blog = new \App\Caracteristica;
        $Blog->name = $request->input('name'); 
        $Blog->valor = $request->input('Valor');
        $Blog->destaque = $request->input('destaque'); 
        $Blog->Produto_id = $request->input('Produto_id');
        $Blog->updated_at = $request->input('post_data');
        $Blog->status_log = $request->input('status_log');  
        $voltar = $Blog->Produto_id;
        // Upload Imagem
        if(!empty($request->hasfile('imagem_destaque'))){
        $imagem =  $request->imagem_destaque->store('public/caracteristica/');
        $Blog->destaque_imagem = $imagem;
        }
        
         
        if($Blog->save()){

            $request->session()->flash('status', 'Postagem '. $Blog->name .' criada com sucesso!');
            

        }else{

            $request->session()->flash('status', 'Ops Erro!, tente novamente em breve');

        };

        return redirect()->route('caracteristica.index',  $voltar);
        
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
      
        $Caracteristicas = \App\Caracteristica::find($id);
    
        return view('./painel/Caracteristicas.create', compact('Caracteristicas'));

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
        $caracteristica = \App\Caracteristica::find($id);
        $product = \App\Produto::find( $caracteristica->Produto_id);
      
        return view('./painel/Caracteristicas.edit', compact('caracteristica', 'product'));
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
        

        $Blog = \App\Caracteristica::find($id);
        $Blog->name = $request->input('name'); 
        $Blog->valor = $request->input('Valor');
        $Blog->destaque = $request->input('destaque'); 
        $Blog->Produto_id = $request->input('Produto_id');
        $Blog->updated_at = $request->input('post_data');
        $Blog->status_log = $request->input('status_log');  
        $voltar = $Blog->Produto_id;
        // Upload Imagem
        if(!empty($request->hasfile('imagem_destaque'))){
        $imagem =  $request->imagem_destaque->store('public/caracteristica/');
        $Blog->destaque_imagem = $imagem;
        }
        
        
         
        if($Blog->save()){

            $request->session()->flash('status', 'Caracteristicas '. $Blog->nome .' atualizada com sucesso!');


        }else{

            $request->session()->flash('status', 'Ops Erro!, tente novamente em breve');

        };

        return redirect()->route('caracteristica.index', $Blog->Produto_id);
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
        $recuperado = \App\Caracteristica::find($id);
        $name = $recuperado->name;
        $Produto_id = $recuperado->Produto_id;
   
        $Caracteristicas = \App\Caracteristica::findOrfail($id);
     

        
        if($Caracteristicas->delete()){

            $request->session()->flash('status', 'Caracteristicas '.$name.' deste produto deletada com sucesso!');


        }else{

            $request->session()->flash('status', 'Ops Erro!, tente novamente em breve');

        };

       
        return redirect()->route('caracteristica.index', $Produto_id);

    }
}
