<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PainelComentarioController  extends Controller
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

        $comentarios = \App\Comentario::get();
        return view('painel/Comentario.show', compact('comentarios'));


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

        $Comentario = \App\Post::get();
        $Categorias = \App\Categoria::get();

        return view('./painel/Comentario.create', compact('Categorias'));

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
        $Comentario = \App\Comentario::find($id);
        $Categorias = \App\Categoria::get();

        return view('./painel/Comentario.edit', compact('Comentario', 'Categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $de
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        

        $Comentario = \App\Comentario::find($id);
        $Comentario->Post_id = $request->input('id'); 
        $Comentario->name = $request->input('name'); 
        $Comentario->email = $request->input('email');
        $Comentario->data = $request->input('data');
        $Comentario->comment = $request->input('comment');
        $Comentario->status_log =  $request->input('status_log');
        $Comentario->data = $request->input('data'); 

        // Upload Imagem
        
        if($Comentario->save()){

            $request->session()->flash('status', 'Comentário aprovado com sucesso!');


        }else{

            $request->session()->flash('status', 'Ops Erro!, tente novamente em breve');

        };

        return redirect()->route('comentarios.index');
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
        $Comentario = \App\Comentario::findOrfail($id);
        
        if($Comentario->delete()){

            $request->session()->flash('status', 'Postagem deletada com sucesso!');


        }else{

            $request->session()->flash('status', 'Ops Erro!, tente novamente em breve');

        };

        return redirect()->route('comentarios.index');

    }
}
