<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class PainelUsuarioController extends Controller
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

        $Usuarios = \App\User::get();
        return view('painel/Usuario.show', compact('Usuarios'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('./painel/usuario.create' );


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
        $Usuario = new \App\User;

        $request->validate([
            'name' => 'required|max:255|min:3',
            'email' => 'required|email|max:255',
            'password' => 'required|max:12|confirmed|min:3',
        ]);  


        $Usuario->name = $request->input('name');
        $Usuario->email = $request->input('email'); 
        $Usuario->password = Hash::make($request->input('password')); 
        $Usuario->idCargo = $request->input('cargo_id'); 
        $Usuario->status = $request->input('status'); 

         
        if($Usuario->save()){

            $request->session()->flash('status', 'Usuario '. $Usuario->Usuario_title .' criado com sucesso!');
            

        }else{

            $request->session()->flash('status', 'Ops Erro!, tente novamente em breve');

        };

        return redirect()->route('usuario.index');
        
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

        $Usuario = \App\Usuario::get();

        return view('./painel/Usuario.create', compact('Usuario'));

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
        $usuario = \App\User::find($id);

        return view('./painel/Usuario.edit', compact('usuario'));
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

        $Usuario = \App\User::find($id);

        $request->validate([
            'name' => 'required|max:255|min:3',
            'email' => 'required|email|max:255',
        ]);  
        if($request->input('password') !== Null){
            $Usuario->password = Hash::make($request->input('password')); 
            $request->validate(['password' => 'required|max:12|confirmed|min:3']);   
        }

        $Usuario->name = $request->input('name');
        $Usuario->email = $request->input('email');
        $Usuario->idCargo = $request->input('cargo_id'); 
        $Usuario->status = $request->input('status'); 
        
        if($Usuario->save()){

            $request->session()->flash('status', 'Usuario '. $Usuario->name .' atualizado com sucesso!');


        }else{

            $request->session()->flash('status', 'Ops Erro!, tente novamente em breve');

        };

        return redirect()->route('usuario.index');
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
        $Usuario = \App\User::findOrfail($id);
        
        if($Usuario->delete()){

            $request->session()->flash('status', 'Usuario deletado com sucesso!');


        }else{

            $request->session()->flash('status', 'Ops Erro!, tente novamente em breve');

        };

        return redirect()->route('uwsuario.index');

    }
}
