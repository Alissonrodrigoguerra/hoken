<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class  PainelManualController  extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
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
      
        $Manual = \App\Manual::get();

        return view('painel/Manual.show', compact('Manual'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //

     
        $product = \App\Produto::get();

        return view('./painel/Manual.create', compact('product'));


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
        
        
        $Manual = new \App\Manual;
        $Manual->nome = $request->input('name');
        $Manual->Produto_id = $request->input('Produto_id'); 
        $Manual->status_log = $request->input('status_log'); 
        $Manual->updated_at = $request->input('banner_data'); 
        $Manual->save();
        $Manual = \App\Manual::latest()->first();
        $Produto_manual =  \App\Produto::find($request->input('Produto_id'));
        $Produto_manual->manual_id = $Manual->id;
        $Produto_manual->save();
        
        // Upload Imagem
        if(!empty($request->hasfile('arquivo'))){

        $pdf =  $request->arquivo->store('public/Manual/');
        $Manual->arquivo = $pdf;
 
        }


        if($Manual->save()){

            $request->session()->flash('status', 'Manual '. $Manual->nome .' criado com sucesso!');

        }else{

            $request->session()->flash('status', 'Ops Erro!, tente novamente em breve');

        };

        return redirect()->route('manual.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        //
 

        $Manual = \App\Manual::get();

        return view('./painel/Manual.create', compact('Manual'));

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
        $Manual = \App\Manual::find($id);
        $product = \App\Produto::get();

        return view('./painel/Manual.edit', compact('Manual','product'));
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

        $Manual = \App\Manual::find($id);
        $Manual->nome = $request->input('name');
        $Manual->Produto_id = $request->input('Produto_id'); 
        $Manual->status_log = $request->input('status_log'); 
        $Manual->updated_at = $request->input('banner_data'); 
        $Produto_manual =  \App\Produto::find($request->input('Produto_id'));
        $Produto_manual->manual_id = $Manual->id;
        $Produto_manual->save();
        
        // Upload Imagem
        if(!empty($request->hasfile('arquivo'))){

        $pdf =  $request->arquivo->store('public/Manual/');
        $Manual->arquivo = $pdf;
 
        }
        if($Manual->save()){

            $request->session()->flash('status', 'Manual '. $Manual->nome .' atualizado com sucesso!');


        }else{

            $request->session()->flash('status', 'Ops Erro!, tente novamente em breve');

        };

        return redirect()->route('manual.index');
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
        $Manual = \App\Manual::findOrfail($id);
        
        if($Manual->delete()){

            $request->session()->flash('status', 'Manual deletado com sucesso!');


        }else{

            $request->session()->flash('status', 'Ops Erro!, tente novamente em breve');

        };

        return redirect()->route('manual.index');

    }
}
