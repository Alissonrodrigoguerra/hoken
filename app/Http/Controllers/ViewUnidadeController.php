<?php

namespace App\Http\Controllers;

use App\Produtos;
use Illuminate\Http\Request;


class ViewUnidadeController extends Controller
{
    //

    public function listar(Request $request) {

        $categorias = \App\Categoria::where(['status_log'=> 1, 'type' => 'produto'])->get();
        $Post = \App\Post::where(['destaque' => null, 'status_log' => 1] )->take(3)->get();
        config(['adminlte.plugins.leaflet.active' => 'true']);
        $Estados = \App\Estados::get();
        $unidades = \App\franquias::where(['status_log'=> 1 ])->get();


        return view('view/UnidadesList', compact('unidades','Estados', 'categorias','Post'));

    }

    public function unidade(Request $request, $id){
        
        $produtos = \App\Produto::find($id);
        $categoria = \App\Categoria::find($produtos->categoria_id);
        $categorias = \App\Categoria::where(['status_log'=> 1, 'type' => 'produto', ])->get();
        $caracteristica_destaque = \App\Caracteristica::where(['status_log'=> 1, 'destaque' => '1'])->get();
        $caracteristica = \App\Caracteristica::where(['status_log'=> 1, 'destaque' => '0'])->get();
        $processo = \App\Processo::where(['status_log'=> 1, 'Produto_id' => $produtos->id])->get();
        $cores =  \App\Cores::where(['status_log'=> 1, 'Produto_id' => $produtos->id])->get();
        $Post = \App\Post::where(['destaque' => null, 'status_log' => 1] )->take(3)->get();

  
        return view('view/viewprdodutos', compact('produtos', 'categorias','categoria', 'caracteristica_destaque', 'caracteristica', 'processo', 'cores', 'Post'));

    }

    public function pesquisa (Request $request){
        
        
        $unidades = \App\franquias::where('nome', 'like',  '%'.$request->input('pesquisa').'%')->orwhere('cidade', 'like',  '%'.$request->input('pesquisa').'%')->orwhere('estado', 'like',  '%'.$request->input('pesquisa').'%')->get();
        return json_decode($unidades);


    }
    
}
