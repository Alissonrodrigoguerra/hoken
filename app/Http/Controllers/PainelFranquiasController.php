<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class  PainelFranquiasController  extends Controller
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
      
        $franquias = \App\franquias::get();

        return view('painel/Duvidas.show', compact('franquias'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //

     

        return view('./painel/Duvidas.create');


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
        dd($request->input());
        $Manual = new \App\Franquias;
        $Manual->nome = $request->input('name');
        $Manual->descripiton = $request->input('post_content'); 
        $Manual->status_log = $request->input('status_log'); 
        $Manual->updated_at = $request->input('banner_data'); 
        


        if($Manual->save()){

            $request->session()->flash('status', 'Duvidas '. $Manual->name .' criado com sucesso!');

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
        $Duvidas = \App\Duvidas::find($id);
   
        return view('./painel/Duvidas.create', compact('Duvidas'));

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
        $Duvidas = \App\Duvidas::find($id);

        return view('./painel/Duvidas.edit', compact('Duvidas'));
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

        $Manual = \App\Duvidas::find($id);
        $Manual->nome = $request->input('name');
        $Manual->descripiton = $request->input('post_content'); 
        $Manual->status_log = $request->input('status_log'); 
        $Manual->updated_at = $request->input('banner_data'); 
        
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

        return redirect()->route('duvidas.index');
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
        $Duvidas = \App\Duvidas::findOrfail($id);
        
        if($Duvidas->delete()){

            $request->session()->flash('status', 'Duvida deletada com sucesso!');


        }else{

            $request->session()->flash('status', 'Ops Erro!, tente novamente em breve');

        };

        return redirect()->route('dvuidas.index');

    }
}
