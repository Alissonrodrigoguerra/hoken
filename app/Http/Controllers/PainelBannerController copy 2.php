<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PainelBannerController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('painel');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {       
        //
      
        $Banners = \App\Banner::get();
        return view('painel/Banner.show', compact('Banners'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //


        return view('./painel/Banner.create' );


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 
        

        $Banner = new \App\Banner;
        $Banner->Banner_autor = '1'; 
        $Banner->Banner_title = $request->input('banner_title');
        $Banner->Banner_subtitle = $request->input('banner_subtitle'); 
        $Banner->Banner_link = $request->input('banner_link'); 
        $Banner->Banner_data = $request->input('banner_data'); 
        $Banner->slider_id = $request->input('slider_id'); 
        $Banner->status_log = $request->input('status_log'); 

          // Upload Imagem
         if($request->file('banner_imagem') !== null){
            $imagem =  $request->banner_imagem->store('public/Banner/');
            $Banner->Banner_imagem = $imagem;
 
         }

         if($request->file('Banner_imagem_moblie') !== null){
            $imagem =  $request->Banner_imagem_moblie->store('public/Banner/');
            $Banner->Banner_imagem_moblie = $imagem;
 
         }

        if($Banner->save()){

            $request->session()->flash('status', 'Banner '. $Banner->Banner_title .' criado com sucesso!');
            

        }else{

            $request->session()->flash('status', 'Ops Erro!, tente novamente em breve');

        };

        return redirect()->route('banner.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        //
 

        $Banner = \App\Banner::get();

        return view('./painel/Banner.create', compact('Banner'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $banner = \App\Banner::find($id);

        return view('./painel/Banner.edit', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $Banner = \App\Banner::find($id);
        $Banner->Banner_autor = '1'; 
        $Banner->Banner_title = $request->input('banner_title');
        $Banner->Banner_subtitle = $request->input('banner_subtitle'); 
        $Banner->Banner_link = $request->input('banner_link'); 
        $Banner->Banner_data = $request->input('banner_data'); 
        $Banner->slider_id = $request->input('slider_id'); 
        $Banner->status_log = $request->input('status_log'); 
        // Upload Imagem
        if($request->file('banner_imagem') !== null){
            $imagem =  $request->banner_imagem->store('public/Banner/');
            $Banner->Banner_imagem = $imagem;
 
         }

         if($request->file('Banner_imagem_moblie') !== null){
            $imagem =  $request->Banner_imagem_moblie->store('public/Banner/');
            $Banner->Banner_imagem_moblie = $imagem;
 
         }
         
        if($Banner->save()){

            $request->session()->flash('status', 'Banner '. $Banner->Banner_title .' atualizado com sucesso!');


        }else{

            $request->session()->flash('status', 'Ops Erro!, tente novamente em breve');

        };

        return redirect()->route('banner.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        //
        $Banner = \App\Banner::findOrfail($id);
        
        if($Banner->delete()){

            $request->session()->flash('status', 'Banner deletado com sucesso!');


        }else{

            $request->session()->flash('status', 'Ops Erro!, tente novamente em breve');

        };

        return redirect()->route('banner.index');

    }
}
