@extends('adminlte::page')


@section('css')  
<link rel="stylesheet" href="{{ url('css/custom.css')}}">
@stop()


@section('body')
@include('layouts.nav_menu')

<section id="header_produto" style="background: url('{{asset('storage/'. str_after($produtos->imagem_backgound, 'public/'))}}');  background-repeat: no-repeat; background-size: cover;">
  <div class="container">
    <div class="row pt-5 pb-5">
      <div class="col-lg-6 col-xl-6 col-12 text-center">
        <img src="{{asset('imagens/Sancai.png')}}" class="figure-img  rounded" alt="{{$produtos->name}}">
      </div>
      <div class="col-lg-6 col-xl-6 col-12 p-5 mt-5">
        <h1 class="title_divider"><b>{{$produtos->name}}</b> - <span style="font-size: 23px">{{$categoria->categoria_title}}</span></h1>
        <div class="row">
          <div class="col-lg-6 col-xl-6 col-12 p-2">
            <a name="" id="" class="btn btn-info btn-block " href="#" role="button"><i class="far fa-hand-point-right"></i> Comprar</a>
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
    <div class="row" style="margin:0px -15px -6px -15px">
      <div class="col-lg-6 col-xl-6 col-12 text-center" >
      <iframe width="100%" height="480" src="https://www.youtube.com/embed/{{ $produtos->Video_link}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>
      <div class="col-lg-6 col-xl-6 col-12 pt-5 pb-5 ">
        <h1 class="title_divider"><b>{{$produtos->name}}</b> - <span style="font-size: 23px">{{$categoria->categoria_title}}</span></h1>
        <div class="row">
          <div class="col-lg-6 col-xl-6 col-12 p-2">
            <a name="" id="" class="btn btn-info btn-block " href="#" role="button"><i class="far fa-hand-point-right"></i> Comprar</a>
          </div>
          <div class="col-lg-6 col-xl-6 col-12 p-2">
            <a name="" id="" class="btn btn-outline-info btn-block " href="{{ route('produtoview.manual', $produtos->manual_id)}}" role="button"><i class="fas fa-book"></i></i> Manual</a>
          </div>
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
