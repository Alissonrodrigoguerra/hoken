<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PainelCategoriaController extends Controller
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
    public function index()
    {
        //

        $Categoria =  \App\Categoria::get();

        return json_encode($Categoria);


    }

        //

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $Categoria = new \App\Categoria;
        $Categoria->categoria_autor = '1'; 
        $Categoria->categoria_title = $request->input('categoria_title'); 

        if($Categoria->save()){
           
            $result = 'Categoria cadastrada com sucesso!';

        }else{
            
            $result = 'Ops Erro!, tente novamente em breve';

        };

        return json_encode($result);
    }

 

 

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $categoria = \App\Categoria::findOrfail($id);
        
        if($categoria->delete()){

            $result = 'Categoria deletada com sucesso!';

        }else{
            
            $result = 'Ops Erro!, tente novamente em breve';

        };

        return json_encode($result);

    }
}
