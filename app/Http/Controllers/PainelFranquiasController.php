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

        return view('painel/Franquias.show', compact('franquias'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //

        $municipios = \App\Municipios::orderBy('nome', 'ASC')->get();
        $estados = \App\Estados::orderBy('nome', 'ASC')->get();
        

        return view('./painel/Franquias.create', compact('municipios', 'estados'));


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
        $Manual = new \App\Franquias;

        $request->validate([
            'nome' => 'required|max:255|min:3',
            'email' => 'required|email|max:255',
            'codigo' => 'required|max:255|min:3',
            'tipo' => 'required|max:255|min:3',
            'Bairro' => 'required|max:255|min:3',
            'Rua' => 'required|max:255|min:3',
            'Numero' => 'required|max:255|min:3',
            'CEP' => 'required|max:255|min:3',
            'Telefone' => 'required|max:255|min:3',
            'Whatsapp' => 'required|max:255|min:3',
        ]);  



        $Manual->nome = $request->input('nome');
        $Manual->codigo = $request->input('codigo');
        $Manual->tipo = $request->input('tipo');
        $Manual->Rua = $request->input('Rua');
        $Manual->Numero = $request->input('Numero');
        $Manual->Bairro = $request->input('Bairro');
        $Manual->longitude = $request->input('longitude');
        $Manual->latitude = $request->input('latitude');
        $Manual->cidade = $request->input('cidade');
        $Manual->estado = $request->input('estado');
        $Manual->CEP = $request->input('CEP');
        $Manual->Telefone = $request->input('Telefone');
        $Manual->email = $request->input('email');
        $Manual->referencia = $request->input('referencia'); 
        $Manual->Whatsapp = $request->input('Whatsapp'); 
        $Manual->status_log = $request->input('status_log'); 
        $Manual->updated_at = $request->input('banner_data'); 
        

        if($Manual->save()){

            $request->session()->flash('status', 'Franquia '. $Manual->codigo .' criado com sucesso!');

        }else{

            $request->session()->flash('status', 'Ops Erro!, tente novamente em breve');

        };

        return redirect()->route('franquias.index');
        
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
        $municipios = \App\Municipios::orderBy('nome', 'ASC')->get();
        $estados = \App\Estados::orderBy('nome', 'ASC')->get();

   
        return view('./painel/Franquias.create', compact('Duvidas', 'municipios','estados'));

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
        $Franquias = \App\Franquias::find($id);
        $municipios = \App\Municipios::orderBy('nome', 'ASC')->get();
        $estados = \App\Estados::orderBy('nome', 'ASC')->get();


        return view('./painel/Franquias.edit', compact('Franquias', 'municipios', 'estados'));
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

        $Manual = \App\Franquias::find($id);
        $request->validate([
            'nome' => 'required|max:255|min:3',
            'email' => 'required|email|max:255',
            'codigo' => 'required|max:255|min:3',
            'tipo' => 'required|max:255|min:3',
            'Bairro' => 'required|max:255|min:3',
            'Rua' => 'required|max:255|min:3',
            'Numero' => 'required|max:255|min:3',
            'CEP' => 'required|max:255|min:3',
            'Telefone' => 'required|max:255|min:3',
            'Whatsapp' => 'required|max:255|min:3',
        ]);  

        $Manual->nome = $request->input('nome');
        $Manual->codigo = $request->input('codigo');
        $Manual->tipo = $request->input('tipo');
        $Manual->Rua = $request->input('Rua');
        $Manual->Numero = $request->input('Numero');
        $Manual->Bairro = $request->input('Bairro');
        $Manual->cidade = $request->input('cidade');
        $Manual->longitude = $request->input('longitude');
        $Manual->latitude = $request->input('latitude');
        $Manual->estado = $request->input('estado');
        $Manual->CEP = $request->input('CEP');
        $Manual->Telefone = $request->input('Telefone');
        $Manual->email = $request->input('email');
        $Manual->referencia = $request->input('referencia'); 
        $Manual->Whatsapp = $request->input('Whatsapp'); 
        $Manual->status_log = $request->input('status_log'); 
        $Manual->updated_at = $request->input('banner_data'); 
        
        // Upload Imagem
        if(!empty($request->hasfile('arquivo'))){

        $pdf =  $request->arquivo->store('public/Manual/');
        $Manual->arquivo = $pdf;
 
        }
        if($Manual->save()){

            $request->session()->flash('status', 'Franquias '. $Manual->nome .' atualizado com sucesso!');


        }else{

            $request->session()->flash('status', 'Ops Erro!, tente novamente em breve');

        };

        return redirect()->route('franquias.index');
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
        $franquias = \App\Franquias::findOrfail($id);
        
        if($franquias->delete()){

            $request->session()->flash('status', 'Franquia deletada com sucesso!');


        }else{

            $request->session()->flash('status', 'Ops Erro!, tente novamente em breve');

        };

        return redirect()->route('franquias.index');

    }
}
