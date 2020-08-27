<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// cls
Auth::routes();

Route::get('/home', function() {
    return view('home');
})->name('home')->middleware(['auth','painel']);

Route::group(['prefix' => 'painel'], function () {

    Route::resource('blog', 'PainelBlogController')->middleware('painel');
    Route::resource('categoria', 'PainelCategoriaController', ['except' => ['edit', 'create', 'show','update',]])->middleware('painel');
    Route::resource('banner', 'PainelBannerController')->middleware('painel');
    Route::resource('usuario', 'PainelUsuarioController')->middleware('painel') ;
    Route::resource('comentarios', 'PainelComentarioController', ['except' => ['create','store']])->middleware('painel') ;
    Route::resource('produto', 'PainelProdutoController')->middleware('painel') ;
    Route::resource('cor', 'PainelCorController', ['except' => ['index', 'create']])->middleware('painel') ;
    Route::get('cor/index/{cor}', 'PainelCorController@index')->name('cor.index');
    Route::get('cor/create/{cor}', 'PainelCorController@create')->name('cor.create');
    Route::resource('caracteristica', 'PainelCaracteristicaController', ['except' => ['index', 'create']])->middleware('painel') ;
    Route::get('caracteristica/index/{caracteristica}', 'PainelCaracteristicaController@index')->name('caracteristica.index');
    Route::get('caracteristica/create/{caracteristica}', 'PainelCaracteristicaController@create')->name('caracteristica.create');
    Route::resource('processo', 'PainelProcessoController', ['except' => ['index', 'create']])->middleware('painel') ;
    Route::get('processo/index/{processo}', 'PainelProcessoController@index')->name('processo.index');
    Route::get('processo/create/{processo}', 'PainelProcessoController@create')->name('processo.create');
    Route::resource('selo', 'PainelSeloController', ['except' => ['index', 'create']])->middleware('painel') ;
    Route::get('selo/index/{selo}', 'PainelSeloController@index')->name('selo.index');
    Route::get('selo/create/{selo}', 'PainelSeloController@create')->name('selo.create');
    Route::resource('manual', 'PainelManualController')->middleware('painel') ;
    Route::resource('duvidas', 'PainelDuvidasController')->middleware('painel') ;
    Route::resource('franquias', 'PainelFranquiasController')->middleware('painel') ;

});


Route::resource('view', 'ViewController', ['only' => ['index',]])->middleware('painel');
Route::get('post/', 'ViewPostController@index')->name('post.index');
Route::get('post/show/{post}', 'ViewPostController@show')->name('post.show');
Route::get('post/categoria/{post}', 'ViewPostController@categoria')->name('post.categoria');
Route::post('post/comentario', 'ViewPostController@comentario')->name('post.comentario');
Route::resource('empresa', 'ViewEmpresaController', ['only' => ['index',]]);
Route::resource('suporte', 'ViewSuporteController', ['only' => ['index',]]);
// Route::resource('manual', 'ViewManualController', ['only' => ['index',]]);
Route::resource('politicadequalidade', 'ViewPolicyController', ['only' => ['index',]]);
Route::resource('pesquisa', 'ViewPesquisaController', ['only' => ['index',]]);

// cls


