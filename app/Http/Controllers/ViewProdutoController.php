<?php

namespace App\Http\Controllers;

use App\Produtos;
use Illuminate\Http\Request;


class ViewProdutoController extends Controller
{
    //

    public function list_categorias(Request $request, $id) {

        $produtos = \App\Produto::where(['categoria_id'=>$id, 'status_log'=> 1 ])->get();
        $categoria = \App\Categoria::find($id);
        $categorias = \App\Categoria::where(['status_log'=> 1, 'type' => 'produto'])->get();
        $Post = \App\Post::where(['destaque' => null, 'status_log' => 1] )->take(3)->get();
        config(['adminlte.plugins.slick.active' => 'true']);
        return View('View/viewcategoriasprdodutos', compact('produtos', 'categorias', 'categoria', 'Post'));

    }

    public function produto_View(Request $request, $id){
        
        $produtos = \App\Produto::find($id);
        $categoria = \App\Categoria::find($produtos->categoria_id);
        
        $categorias = \App\Categoria::where(['status_log'=> 1, 'type' => 'produto', ])->get();
        $caracteristica_destaque = \App\Caracteristica::where(['status_log'=> 1, 'destaque' => '1', 'Produto_id' => $produtos->id])->get();
        $caracteristica = \App\Caracteristica::where(['status_log'=> 1, 'destaque' => '0', 'Produto_id' => $produtos->id])->get();
        $processo = \App\Processo::where(['status_log'=> 1, 'Produto_id' => $produtos->id])->get();
        $cores =  \App\Cores::where(['status_log'=> 1, 'Produto_id' => $produtos->id])->get();
        $Post = \App\Post::where(['destaque' => null, 'status_log' => 1] )->take(3)->get();
        config(['adminlte.plugins.slick.active' => 'true']);

  
        return View('View/viewprdodutos', compact('produtos', 'categorias','categoria', 'caracteristica_destaque', 'caracteristica', 'processo', 'cores', 'Post'));

    }

    public function produto_manual (Request $request, $id){
    
        $Post = \App\Post::where(['destaque' => null, 'status_log' => 1] )->take(3)->get();
        $manual = \App\Manual::find($id);
        $categorias = \App\Categoria::where(['status_log'=> 1, 'type' => 'produto', ])->get();


        return View('View/viewmanual', compact('categorias','manual', 'Post'));

    }
    
}
