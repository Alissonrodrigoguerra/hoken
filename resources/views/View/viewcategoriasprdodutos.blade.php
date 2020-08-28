@extends('adminlte::page')


@section('css')  
<link rel="stylesheet" href="{{ url('css/custom.css')}}">
@stop()


@section('body')

@include('layouts.nav_menu')
  <section class="banner_categoria">
      @isset($categoria->imagem_destaque)
        <img class="img-fluid" src="{{asset('storage/'. str_after($categoria->imagem_destaque, 'public/'))}}"  alt="{{ $categoria->categoria_title }}">
      @endisset 
  </section>
<div class="container">
 
  <div class="row ">
    @if(isset($produtos[0]))
    <div id="Produtos" class="col-12  p-5">
      <h1 class="text-center title_divider " ><b>Produtos</b></h1>
      <hr class="dot_divider" >
      <div class="row d-flex justify-content-left">
        @foreach ($produtos as $item)
        <div class="col-xl-4 col-lg-4 col-12">
          <figure class="figure">
            <img src="{{asset('imagens/Sancai.png')}}" class="figure-img img-fluid rounded" alt="">
            <br>
            <figcaption class="figure-caption text-xs-right">
            <a name="" id="" class="btn btn-info btn-block " href="{{ route('produtoview.produto', $item->id)}}" role="button"><i class="far fa-hand-point-right"></i> Detalhes</a>
            <a name="" id="" class="btn btn-outline-info btn-block " href="{{ route('produtoview.manual', $item->manual_id)}}" role="button"><i class="fas fa-book"></i></i> Manual</a>
          </figcaption>
        </figure>
        </div>
      @endforeach
      </div>
    </div>
    <div id="certificacoes" class="col-12 p-5">
      <h1 class="text-center"><b>Certificado & Filiações</b></h1>
      <hr class="dot_divider">
      <div class="carrossel autoplay">
        
        <div class="carrossel-item">
        <figure class="figure">
            <img src="{{asset('imagens/ABRAFIPA1.png')}}" class="figure-img img-fluid rounded" >
        </figure>
        </div>
        <div class="carrossel-item">
        <figure class="figure">
          <img src="{{asset('imagens/ABF1.png')}}" class="figure-img img-fluid rounded" >
        </figure>
        </div>
        <div class="carrossel-item">
        <figure class="figure">
          <img src="{{asset('imagens/GOLD-SEAL1.png')}}" class="figure-img img-fluid rounded" >
        </figure>
        </div>
        <div class="carrossel-item">
        <figure class="figure">
          <img src="{{asset('imagens/Water-Quality1.png')}}" class="figure-img img-fluid rounded" >
        </figure>
        </div>
        <div class="carrossel-item">
        <figure class="figure">
          <img src="{{asset('imagens/ABF1.png')}}" class="figure-img img-fluid rounded" >
        </figure>
        </div>
      </div>
    </div>
    @else
    <div id="Produtos" class="col-12  p-5">
    <div class="btn btn-outline-secondary  disabled " role="alert">
      <strong> Ops, Nenhum produto cadastrado nesta categoria   até o momento, tente novamente mais tarde!</strong>
    </div>
  </div>
   @endif
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
