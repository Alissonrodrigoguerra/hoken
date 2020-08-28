@extends('adminlte::page')


@section('css')  
<link rel="stylesheet" href="{{ url('css/custom.css')}}">
<link rel="stylesheet" href="{{ url(config('adminlte.plugins.slick.files.0.location'))}}">
<link rel="stylesheet" href="{{ url(config('adminlte.plugins.slick.files.1.location'))}}">
@stop()


@section('body')
@include('layouts.nav_menu')
<div class="container mt-5 mb-5">
  <div class="row">
    <div class="col-12">
      <div class="row">
        <div class="col-6">
          <h2>Manual do Produto - {{$manual->nome}}</h2>

        </div>
        <div class="col-6 text-right">
          <a class="btn btn-outline-info" href="{{ route('produtoview.produto', $manual->Produto_id) }}"> <i class="fas fa-arrow-left"></i> Voltar</a>
        </div>
      </div>

    <hr class="dot_divider">
    <iframe width="100%" height="480px" src="{{asset('storage/'. str_after($manual->arquivo, 'public/'))}}" frameborder="0"></iframe>
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

 


$('[data-toggle="tooltip"]').tooltip();   


   
</script>

<script src="{{ url(config('adminlte.plugins.slick.files.2.location'))}}}}
)}}"></script>
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
