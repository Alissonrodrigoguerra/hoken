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

Route::resource('painel/blog', 'PainelBlogController')->middleware('painel');
Route::resource('painel/categoria', 'PainelCategoriaController', ['except' => ['edit', 'create', 'show','update',]])->middleware('painel');
Route::resource('painel/banner', 'PainelBannerController')->middleware('painel');
Route::resource('view', 'ViewController', ['only' => ['index',]])->middleware('painel');
Route::resource('painel/usuario', 'PainelUsuarioController')->middleware('painel') ;
Route::get('post/', 'ViewPostController@index')->name('post.index');
Route::get('post/show/{post}', 'ViewPostController@show')->name('post.show');
Route::get('post/categoria/{post}', 'ViewPostController@categoria')->name('post.categoria');


Route::resource('produto', 'ViewProdutoController', ['only' => ['index',]]);
Route::resource('empresa', 'ViewEmpresaController', ['only' => ['index',]]);
Route::resource('suporte', 'ViewSuporteController', ['only' => ['index',]]);
Route::resource('manual', 'ViewManualController', ['only' => ['index',]]);
Route::resource('politicadequalidade', 'ViewPolicyController', ['only' => ['index',]]);
Route::resource('pesquisa', 'ViewPesquisaController', ['only' => ['index',]]);

// cls


