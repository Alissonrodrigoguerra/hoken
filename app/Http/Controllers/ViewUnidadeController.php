<?php

namespace App\Http\Controllers;

use App\Produtos;
use Illuminate\Http\Request;


class ViewUnidadeController extends Controller
{
    //

    public function listar(Request $request) {

        $unidades = \App\franquias::where(['status_log'=> 1 ])->get();
        $categorias = \App\Categoria::where(['status_log'=> 1, 'type' => 'produto'])->get();
        $Post = \App\Post::where(['destaque' => null, 'status_log' => 1] )->take(3)->get();
        config(['adminlte.plugins.leaflet.active' => 'true']);

        return view('view/UnidadesList', compact('unidades', 'categorias','Post'));

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

    public function produto_manual (Request $request, $id){
    
        $Post = \App\Post::where(['destaque' => null, 'status_log' => 1] )->take(3)->get();
        $manual = \App\Manual::find($id);
        $categorias = \App\Categoria::where(['status_log'=> 1, 'type' => 'produto', ])->get();


        return view('view/viewmanual', compact('categorias','manual', 'Post'));

    }
    
}
