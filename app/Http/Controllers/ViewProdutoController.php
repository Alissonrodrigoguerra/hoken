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
        config(['adminlte.plugins.slick.active' => 'true']);
        return view('view/viewcategoriasprdodutos', compact('produtos', 'categorias', 'categoria'));

    }

    public function produto_view(Request $request, $id){
        
        $produtos = \App\Produto::find($id);
        $categoria = \App\Categoria::find($produtos->categoria_id);

        $categorias = \App\Categoria::where(['status_log'=> 1, 'type' => 'produto'])->get();

      
        return view('view/viewprdodutos', compact('produtos', 'categorias','categoria'));

    }

    public function produto_manual (Request $request, $id){
        
        $manual = \App\Manual::find($id);
        $categorias = \App\Categoria::where(['status_log'=> 1, 'type' => 'produto'])->get();

        return 'Manual';
        // return view('view/viewcategoriasprdodutos', compact('produtos', 'categorias', 'categoria'));

    }
    
}
