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
    Route::resource('cor', 'PainelCorController')->middleware('painel') ;

});


Route::resource('view', 'ViewController', ['only' => ['index',]])->middleware('painel');
Route::get('post/', 'ViewPostController@index')->name('post.index');
Route::get('post/show/{post}', 'ViewPostController@show')->name('post.show');
Route::get('post/categoria/{post}', 'ViewPostController@categoria')->name('post.categoria');
Route::post('post/comentario', 'ViewPostController@comentario')->name('post.comentario');
Route::resource('empresa', 'ViewEmpresaController', ['only' => ['index',]]);
Route::resource('suporte', 'ViewSuporteController', ['only' => ['index',]]);
Route::resource('manual', 'ViewManualController', ['only' => ['index',]]);
Route::resource('politicadequalidade', 'ViewPolicyController', ['only' => ['index',]]);
Route::resource('pesquisa', 'ViewPesquisaController', ['only' => ['index',]]);

// cls


