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
        @isset($Post_List)
        @foreach ($Post_List as $post)
        <div class="box col-xl-4 col-lg-4 col-12 text-center">
          <figure class="figure">
            <img class="img-fluid" src="{{asset('public/storage/'. str_after($post->post_imagem, 'public/'))}}" alt="{{$post->post_title }} - Hoken">
            <figcaption class="figure-caption text-xs-right">
              <h1 style="color: #fff; font-size:20px; padding: 10px 0px;">{{$post->post_title }}</h1>
              
              <a class="btn btn-lg btn-sm btn-outline-light" href="{{route('post.show', $post->id ) }}"><i class="far fa-hand-point-right"></i>Ver detalhes</a>
            </figcaption>
          </figure>
        </div>
        @endforeach
      @endisset
      @if (empty($Post_List[0]))
        <div class="btn btn-outline-secondary  disabled " role="alert">
          <strong> Ops, Nenhum artigo cadastrado até o momento, tente novamente mais tarde!</strong>
        </div>
      @endif
      </div>
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


// $('.autoplay').slick({
//   slidesToShow: 3,
//   slidesToScroll: 1,
//   autoplay: true,
//   autoplaySpeed: 2000,
// });
	
  
  
   
</script>

@stop
