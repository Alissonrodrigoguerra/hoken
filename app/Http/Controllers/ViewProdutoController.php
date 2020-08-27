<?php

namespace App\Http\Controllers;

use App\Produtos;
use Illuminate\Http\Request;


class ViewProdutoController extends Controller
{
    //

    public function list_categorias(Request $request, $id) {

        $produtos = \App\Produto::where(['categoria_id'=>$id, 'status_log'=> 1 ])->get();
        $categorias = \App\Categoria::where(['status_log'=> 1, 'type' => 'produto'])->get();

        return view('view/viewcategoriasprdodutos', compact('produtos', 'categorias'));

    }
    
}
