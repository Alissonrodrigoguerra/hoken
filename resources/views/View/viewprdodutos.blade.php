@extends('adminlte::page')


@section('css')  
<link rel="stylesheet" href="{{ url('public/css/custom.css')}}">
@stop()


@section('body')
@include('layouts.nav_menu')

<section id="header_produto" style="background: url('{{url('storage/app/'. $produtos->imagem_backgound.'')}}');  background-repeat: no-repeat; background-size: cover;  background-position: bottom; ">
  <div class="container">
    <div class="row pt-5 pb-5">
      <div class="col-lg-6 col-xl-6 col-12 text-center">
        <img src="{{url('storage/app/'.$produtos->imagem_destaque.'')}}" class="figure-img  rounded" alt="{{$produtos->name}}">
      </div>
      <div class="col-lg-6 col-xl-6 col-12 p-5 mt-5">
        <h1 class="title_divider"><b>{{$produtos->name}}</b> - <span style="font-size: 23px">{{$categoria->categoria_title}}</span></h1>
        <div class="row">
          <div class="col-lg-6 col-xl-6 col-12 p-2">
            <a name="" id="" class="btn btn-info btn-block " href="{{ $produtos->link }}" role="button"><i class="far fa-hand-point-right"></i> Comprar</a>
          </div>
          <div class="col-lg-6 col-xl-6 col-12 p-2">
            <a name="" id="" class="btn btn-outline-info btn-block " href="{{ route('produtoview.manual', $produtos->manual_id)}}" role="button"><i class="fas fa-book"></i></i> Manual</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section id="video_produto" >
    <div class="row justify-content-center" >
      @isset($produtos->Video_link)
      <div class="col-lg-6 col-xl-6 col-12 text-center" >
        <iframe class="p-5" style="width: 100%; max-width: 720px;" height="405px" src="https://www.youtube.com/embed/{{ $produtos->Video_link}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
      @endisset
      @isset($caracteristica_destaque[0]['destaque_imagem'])
      <div class="col-lg-6 col-xl-6 col-12 pt-5 pb-5 ">
        <div class="row justify-content-center mt-5 mb-5">
          <div class="col-md-12 text-center"> <h1 class="text-info"><b>Características</b></h1></div>
          @foreach ($caracteristica_destaque as $item)
          <div class="m-2 p-3 caracteristica" data-toggle="tooltip" data-placement="bottom" title="{{$item->name}}">
            <object type="image/svg+xml" class="icon" data="{{url('storage/app/'.$item->destaque_imagem.'')}}"></object>
          </div>
          @endforeach 
        </div>
      </div>
      @endisset
    </div>
</section>

@isset($processo)
<section id="processo_produto" >
  <div class="row" >
    <div class="col-lg-6 col-xl-6 col-12 text-center " >
      <div class="col-md-12 text-center"> </div>
      @foreach ($processo as $item)
      <h1 class="text-white"><b>{{$item->name}}</b></h1>
      <img src="{{url('storage/app/'. $item->imagem.'')}}" class="img-fluid" alt="{{$categoria->categoria_title}}">
      <p class="btn btn-outline-light disabled text-withe">{{$item->titulo}}</p>
      @endforeach
    </div>
    <div class="col-lg-6 col-xl-6 col-12 ">
      <div class="row justify-content-center ">
        @foreach ($processo as $item)
          <img src="{{url('storage/app/'.$item->imagem_destaque.'')}}" class="img-cover-full" alt="{{$categoria->categoria_title}}">
          @endforeach
      </div>
    </div>
  </div>
</section>
@endisset

<section id="caracteristicas_produto" class="pt-5" >
  <div class=" container "  style="background: #fff;    border-radius: 50px 50px 0px 0px; ">
    {{-- box-shadow: 3px 3px 5px 6px rgb(28, 157, 231); --}}
    <div class="row ">
      <div class="col-lg-6 col-xl-6 col-12 mt-5 mb-5  pt-5 pb-5 text-center ">
        <img src="{{url('storage/app/'. $produtos->imagem_destaque.'')}}" width="250px" alt="{{$categoria->categoria_title}}">
      </div>
      <div class="col-lg-6 col-xl-6 col-12 pt-5 pb-5 ">
        <div class="row justify-content-left mt-5 mb-5">
         @if (isset($cores))
          <div class="col-md-12 text-left">
            <h2 class="text-info"><b>Veja as principais<br>
              Caracteristicas do<br>
              {{$produtos->name}}</b></h2>
          </div>
          @foreach ($cores as $item)
          <div class="m-2 p-3 cor"  data-toggle="tooltip" data-placement="top" title="{{$item->nome}}" style="background: {{$item->hexa}}">
          </div>
          @endforeach 
          <div class="col-12 p-2">
            <a name="" id="" class="btn btn-info btn-lg mt-3 pl-3 pr-3 " href="{{ $produtos->link }}" role="button"><i class="far fa-hand-point-right"></i> Comprar</a>
          </div>
          @else
          <div class="col-md-12 text-left"> 
            <h2 class="text-info"><b>Escolha a<br>
              cor que mais<br>
              combina com a <br>
              sua cozinha.</b>
            </h2>
          </div>
          <div class="col-12 p-2">
            <a name="" id="" class="btn btn-info btn-lg mt-3 pl-3 pr-3 " href="{{ $produtos->link }}" role="button"><i class="far fa-hand-point-right"></i> Comprar</a>
          </div>

         @endif
        </div>
      </div>
    </div>
    <div class="row justify-content-center">
      <div class="col-lg-8 col-xl-8  col-11">
        <h2 class="text-info"><b>Especificações</b></h2>
        <hr class="dot_divider">
        @foreach ($caracteristica as $item)
        <div class="row " >
        <div class="col-6 text-info text-left" style="border-right: 2px solid #00A99D;" ><h4><b>{{$item->name}}</b></h4></div>
        <div class="col-6 text-info text-right"><h4><b>{{$item->valor}}</b></h4></div>
        </div>
        <hr class="solid_divider">
        @endforeach 
                
      </div>
    </div>
  </div>
</section>

<section>
<div id="certificacoes" class="col-12 p-5">
  <h1 class="text-center"><b>Certificado & Filiações</b></h1>
  <hr class="dot_divider">
  <div class="carrossel autoplay">
    
    <div class="carrossel-item">
    <figure class="figure">
        <img src="{{asset('public/imagens/ABRAFIPA1.png')}}" class="figure-img img-fluid rounded" >
    </figure>
    </div>
    <div class="carrossel-item">
    <figure class="figure">
      <img src="{{asset('public/imagens/ABF1.png')}}" class="figure-img img-fluid rounded" >
    </figure>
    </div>
    <div class="carrossel-item">
    <figure class="figure">
      <img src="{{asset('public/imagens/GOLD-SEAL1.png')}}" class="figure-img img-fluid rounded" >
    </figure>
    </div>
    <div class="carrossel-item">
    <figure class="figure">
      <img src="{{asset('public/imagens/Water-Quality1.png')}}" class="figure-img img-fluid rounded" >
    </figure>
    </div>
    <div class="carrossel-item">
    <figure class="figure">
      <img src="{{asset('public/imagens/ABF1.png')}}" class="figure-img img-fluid rounded" >
    </figure>
    </div>
  </div>
</div>
</section>

              

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

 


$('[data-toggle="tooltip"]').tooltip();   


   
</script>

<script src="{{ url(config('adminlte.plugins.slick.files.2.location'))}}"></script>
<script src="{{ url(config('adminlte.plugins.slick.files.3.location'))}}"></script>
<script src="{{ url(config('adminlte.plugins.slick.files.4.location'))}}"></script>

<script>
$('.autoplay').slick({
  dots: true,
  infinite: true,
  speed: 300,
  slidesToShow: 4,
  slidesToScroll: 1,
  responsive: [
    {
      breakpoint: 768,
      settings: {
        arrows: true,
        centerPadding: '40px',
        slidesToShow: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        arrows: true,
        centerPadding: '40px',
        slidesToShow: 1
      }
    }
  ],
});
</script>

@stop
