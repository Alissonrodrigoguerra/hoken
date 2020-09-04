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

    public function unidade (Request $request, $id){
        $unidades = \App\franquias::find($id);
        
        $produtos = \App\Produto::where(['destaque'=> 1, 'status_log'=> 1 ])->take(5)->get();
        config(['adminlte.plugins.slick.active' => 'true']);

        return view('view/Unidadeview', compact('unidades', 'produtos'));

    }
  

    public function pesquisa (Request $request){
        
       $pesquisa =  $request->input("pesquisa");
       $estado =  $request->input("estado");
       if(!empty($pesquisa )){
       $municipio = \App\Municipios::where('nome', 'like',  $pesquisa)->get();
       $latitude = $municipio[0]->latitude;
       $latitude_Max = $latitude - 2.0000 ;
       $latitude_Min = $latitude + 2.0000 ;
       $longitude = $municipio[0]->longitude;
       $longitude_Max = $longitude - 2.0000 ;
       $longitude_Min = $longitude + 2.0000 ;
       $municipios_latitude = \App\Municipios::where('latitude', '>=', $latitude_Max)->where('latitude', '<=',  $latitude_Min)->where('longitude', '>=',  $longitude_Max)->where('longitude', '<=',  $longitude_Min)->where('codigo_uf', $municipio[0]->codigo_uf)->orderBy('latitude', 'ASC','longitude', 'DESC')->get();
       $unidade_pesquisa = array();
       $i = '';
       $i++;
       foreach ( $municipios_latitude as $key ) {
                $unidade_pesquisa[$i++] = \App\Franquias::where('cidade',  $key->nome)->get();
       }
        $i = ''; 
        $i++;
        foreach ( $unidade_pesquisa as $key ) {
            // echo $key;
            if($key == '[]'){
                unset($unidade_pesquisa[$i++]);
            }else{
                $unidade_pesquisa = $key; 
            };

        }
       return $unidade_pesquisa;
       }elseif(!empty($estado)){
   
       
        $unidade_pesquisa = \App\Franquias::where('estado',  $estado)->get();
        return $unidade_pesquisa;

       }
    }
    
}
