@extends('adminlte::page')

@inject('layoutHelper', \JeroenNoten\LaravelAdminLte\Helpers\LayoutHelper)

@section('css')  
<link rel="stylesheet" href="{{ url('public/css/custom.css')}}">
@stop()


@section('body')

@include('layouts.nav_menu')

<div class="container pt-5 pb-5">
  <div class="row">
    <div id="sidebar_left" class="col-xl-3 col-lg-3 col-12">
     <ul>
       <h1  class="title">Categorias</h1>
       <li></li>
       <li><a href="{{route('post.index')}}">Todos os Artigos</a></li>

       @isset($Categoria)
        @foreach ($Categoria as $categoria)
        <li>
          <a href="{{route('post.categoria', $categoria->id ) }}">{{$categoria->categoria_title }}</a>
        </li>
        @endforeach
       @endisset  
     </ul>
    </div>
    <div class="col-xl-9 col-lg-9 col-12">
      <div class="row">
        <div class="col-12">
        
            <img class="img-cover rounded" src="{{  asset('public/storage/'. str_after($Post_id->post_imagem, 'public/'))}}" alt="{{$Post_id->post_title }} - Hoken">
          
        </div>
        <div class="col-12">
        @php
        $ymd = DateTime::createFromFormat('Y-m-d', $Post_id->post_data)->format('d-m-yy');
        @endphp
        <p>Postado em {!! $ymd !!}<p>
        <h1 class="pt-5">{{ $Post_id->post_title }}</h1>
        </div>
      
        <div class="col-12">
        {!! $Post_id->post_content !!}
       </div>
      </div>
      <hr>
      @isset($Comentarios)

      <p><b>Deixe um comentário:</b></p>
      
      <ul style="list-style:none; padding-left: 0px;">
         @foreach ($Comentarios as $item)
         <li style="border: 1px #ccc solid;  margin-top:5px; ">
          <p style="padding:10px;">{{$item->comment}}</p>

          @php
            $ymd = DateTime::createFromFormat('Y-m-d', $item->data)->format('d-m-yy');
          @endphp
         
          </p>
            <p style="background:#eee; margin:0px ;padding:10px;">{{$item->name}} - {!! $ymd !!}</p>
          </li>
         @endforeach
       

         
        @endisset 
        

       
      </ul>
      <hr>

      
      {!! Form::open()->route('post.comentario')->method('post')->errorBag("registerErrorBag") !!}
      <div class="row justify-content-center">
      <p>Deixe o seu Comentário</p>
      {{ session('status') }}
      {!! Form::hidden('id', $Post_id->id ) !!}
      {!!Form::textarea(config('form.comentario.name'),'', config('form.comentario.placeholder'))->wrapperAttrs(['class' => 'col-12'])!!}
      {!!Form::text(config('form.email.name'), '', config('form.email.label'))->type('email')->wrapperAttrs(['class' => 'col-xl-6 col-lg-6 col-12'])!!}
      {!!Form::text(config('form.name.name'), '', config('form.name.label'))->wrapperAttrs(['class' => 'col-xl-6 col-lg-6 col-12'])!!}
      <div class="col-4 ">
        {!! Form::submit('Enviar')->info()->outline()->block()!!}
      </div>
      </div>

      {!! Form::close() !!}
    </div>
  </div>
</div>

                        
@include('layouts.footer')


@stop




@section('js')

<script>

    $('#btn-megameu').mouseover(function() { 

        $("#megamenu").fadeIn(1000, function(){
          $('.menu').addClass('fixed-top');
          $('#megamenu').addClass('d-lg-block');
          $('#megamenu').css('opacity', '0.95');
          $('#demo').slideUp(1000);

        });
     

    });
    

    $('#megamenu').mouseleave(function () { 
        
        $('#megamenu').fadeOut(1000, function(){

            $('#megamenu').removeClass('d-lg-block') ;
            $('.menu').removeClass('fixed-top');
            $('#demo').slideDown(1000);
        });
    });


    
    $('.pulse-button').click(function() { 
        
        $('#hadset_menu').fadeIn('show');
        $('#hadset_menu').removeClass('d-none');
        $('#hadset_menu').mouseleave(function(){
            $('#hadset_menu').addClass('d-none');
            
        });

        
    });

  

    $(window).scroll( function() {
    if($(window).scrollTop() !== 0) {
        $('#menu').addClass('fixed-top');
        return;
    }
    $('#menu').removeClass('fixed-top');
    });

   
    $('#menu_ope').click(function (e) { 
        e.preventDefault();

        $('#menu_sider').fadeIn();
        $('#menu_sider').css('display: block;');
        
    });

    
    $('#menu_close').click(function (e) { 
        e.preventDefault();

        $('#menu_sider').fadeOut();
        $('#menu_sider').css('display: none;');
        
    });

   $('.btn-search-moblie').focusin(function (e) { 
       e.preventDefault();

       $('#footer_ocult').addClass('d-none ');
       $('#menu-list-moblie').addClass('fixed-bottom');
       $('.nav-item').addClass('d-none ');
       $('.nav-item:last-of-type').addClass('d-block ');

       
   });

   
   $('.btn-search-moblie').focusout(function (e) { 
       e.preventDefault();

       $('#footer_ocult').removeClass('d-none ');
       $('#menu-list-moblie').removeClass('fixed-bottom');
       $('.nav-item').removeClass('d-none');
       $('.nav-item:last-of-type').removeClass('d-block');


   });


	
   $('.pulse-button').click(function() { 
        
        $('#hadset_menu').fadeIn('show');
        $('#hadset_menu').removeClass('d-none');
        $('#hadset_menu').mouseleave(function(){
            $('#hadset_menu').addClass('d-none');
            
        });

        
    });
  
   
</script>

@stop
