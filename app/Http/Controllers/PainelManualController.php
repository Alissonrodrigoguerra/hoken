<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PainelManualController extends Controller
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

        return view('./painel/Manual.create', 'product');


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
        $Manual->Manual_autor = '1'; 
        $Manual->Manual_title = $request->input('Manual_title');
        $Manual->Manual_subtitle = $request->input('Manual_subtitle'); 
        $Manual->Manual_link = $request->input('Manual_link'); 
        $Manual->Manual_data = $request->input('Manual_data'); 
        $Manual->slider_id = $request->input('slider_id'); 
        $Manual->status_log = $request->input('status_log'); 

          // Upload Imagem
          if(!empty($request->hasfile('Manual_imagem'))){
            $imagem =  $request->Manual_imagem->store('public/Manual/');
            $Manual->Manual_imagem = $imagem;
 
         }


        if($Manual->save()){

            $request->session()->flash('status', 'Manual '. $Manual->Manual_title .' criado com sucesso!');
            

        }else{

            $request->session()->flash('status', 'Ops Erro!, tente novamente em breve');

        };

        return redirect()->route('Manual.index');
        
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

        return view('./painel/Manual.edit', compact('Manual'));
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
        $Manual->Manual_autor = '1'; 
        $Manual->Manual_title = $request->input('Manual_title');
        $Manual->Manual_subtitle = $request->input('Manual_subtitle'); 
        $Manual->Manual_link = $request->input('Manual_link'); 
        $Manual->Manual_data = $request->input('Manual_data'); 
        $Manual->slider_id = $request->input('slider_id'); 
        $Manual->status_log = $request->input('status_log'); 
        // Upload Imagem
        if($request->file('Manual_imagem') !== null){
            $imagem =  $request->Manual_imagem->store('public/Manual/');
            $Manual->Manual_imagem = $imagem;
 
         }
        if($Manual->save()){

            $request->session()->flash('status', 'Manual '. $Manual->Manual_title .' atualizado com sucesso!');


        }else{

            $request->session()->flash('status', 'Ops Erro!, tente novamente em breve');

        };

        return redirect()->route('Manual.index');
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

        return redirect()->route('Manual.index');

    }
}
