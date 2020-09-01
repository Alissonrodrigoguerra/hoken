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
   
    }
  

    public function pesquisa (Request $request){
        
       $pesquisa =  $request->input("pesquisa");
       $estado =  $request->input("estado");
      
       if(!empty($pesquisa)){
       $municipio = \App\Municipios::where('nome', 'like',  '%'.$pesquisa.'%')->get();
       $latitude = $municipio[0]->latitude;
       $latitude_Max = $latitude - 1.0000 ;
       $latitude_Min = $latitude + 1.0000 ;
       $longitude = $municipio[0]->longitude;
       $longitude_Max = $longitude - 1.0000 ;
       $longitude_Min = $longitude + 1.0000 ;
       $municipios_latitude = \App\Municipios::where('latitude', '>=', $latitude_Max)->where('latitude', '<=',  $latitude_Min)->where('longitude', '>=',  $longitude_Max)->where('longitude', '<=',  $longitude_Min)->where('codigo_uf', $municipio[0]->codigo_uf)->orderBy('latitude', 'ASC','longitude', 'DESC')->get();
       $estado = \App\Estados::where('codigo_uf', '=', $municipios_latitude[0]->codigo_uf)->get();
       $unidade_pesquisa = array();
       $i = '';
       $i++;
       foreach ( $municipios_latitude as $key ) {
                $unidades = \App\Franquias::where('estado', $estado[0]->uf)->get();
                $unidade_pesquisa[$i++] = \App\Franquias::where('cidade',  $key->nome)->get();
       }
       
       exit;

        $i = '';
        $i++;
        $a = '';
        $a++;
        foreach ( $unidade_pesquisa as $key ) {
            // echo $key;
            if($key == '[]'){
                unset($key[$i++]);
            }else{
                $unidade_pesquisa[$a++] = $key; 
            };
        }

        preg_match("/\{(.*)\}/s", $unidade_pesquisa);
        return json_decode($unidade_pesquisa);
       } 
       

    }
    
}
