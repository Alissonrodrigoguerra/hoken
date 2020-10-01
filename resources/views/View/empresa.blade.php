@extends('adminlte::page')

@inject('layoutHelper', \JeroenNoten\LaravelAdminLte\Helpers\LayoutHelper)

@section('css')  
<link rel="stylesheet" href="{{ url('public/css/custom.css')}}">

@stop()


@section('body')

@include('layouts.nav_menu')

<div class="container-fluid">
  <div class="row">
    <div class="col-xl-6 col-lg-6 col-12">
      <img src="{{ asset('public/imagens/Fachada-Hoken.jpg') }}" class="img-cover-right" alt="Hoken Franching">
    </div>
      <div class="col-xl-6 col-lg-6 col-12">
        <div id="box-emprensa" class="col-12 text-lg-justify">
          <div class="box_background ">
            <h1 class="p-3">O Grupo <img  class="p-3 img-fluid" src="{{ asset('public/imagens/Hoken-International-Company1.png') }}" alt="Hoken Internacional"></h1>
  
          <p class="p-3">Há 23 anos a Hoken atua em todo o Brasil, Paraguai e Portugal, e se consolidou como um dos mais sólidas empresas do país.</p>
          <p class="p-3 text-justify">
            Ocupa a posição de destaque nas áreas de pesquisa e desenvolvimento de aparelhos e acessórios para tratamento de água, franchising, vendas diretas e treinamento. A Hoken possui a mais completa linha de aparelhos para tratamento de água desenvolvidos com alta tecnologia e sob rígido controle de qualidade. Mais saúde e qualidade de vida para você e toda sua família. 
            Os produtos Hoken são sinônimos de alta tecnologia e qualidade, proporcionando total segurança e comodidade para seus consumidores.  
            O comprometimento da Hoken com a qualidade de seus produtos e serviços resulta em conquistas históricas: a Hoken é a única empresa da América Latina a receber o Gold Seal, da Water Quality Association, certificação dada aos processadores com elementos filtrantes Carbomax®.
              
          <ul>
            <li>•	Fundada em 1997 na cidade de São José do Rio Preto, estado de São Paulo, está presente em dois continentes (América e Europa) e em quatro países;
            </li>
            <li>•	Líder no segmento de aparelhos para tratamento de água residencial;</li>
            <li>• Empresa 100% brasileira;</li>
            <li>•	Possui mais de 100 franquias;</li>
            </li>
            <li>•	Possui mais de 2 milhões de clientes;</li>
          </ul>

          <div class="col-lg-12">
           
            <div class="float-left p-3">
              <small>Acompanhe a <b>Hoken Água </b>nas Redes Sociais:</small>
                <a class="social-facebook ml-3 " href="https://www.facebook.com/hokenoficial" target="&quot;_blank&quot;"><i class="fab fa-facebook"></i></a>
                <a class="social-twitter ml-3 " href="https://twitter.com/hokenoficial" target="&quot;_blank&quot;"><i class="fab fa-twitter"></i></a>
                <a class="social-google-plus ml-3 " href="https://plus.google.com/+BlogHokenBrFranquia/videos" target="&quot;_blank&quot;"><i class="fab fa-google-plus-g"></i></a>
                <a class="social-linkedin ml-3 " href="https://www.linkedin.com/company/hoken-internacional-company" target="&quot;_blank&quot;"><i class="fab fa-linkedin"></i></a>
                {{-- <a class="social-youtube ml-3 " href="https://www.youtube.com/user/hokenoficial" target="&quot;_blank&quot;"><i class="fab fa-youtube"></i></a> --}}
                <a class="social-instagram ml-3 " href="https://www.instagram.com/hokenagua" target="&quot;_blank&quot;"><i class="fab fa-instagram"></i></a>
                {{-- <a class="social-pinterest ml-3 " href="https://www.pinterest.com/hokenoficial/" target="&quot;_blank&quot;"><i class="fab fa-pinterest"></i></a></div> --}}
        </div>
        {{-- https://www.instagram.com/hokenoficial --}}
         </p>
          </div>
        </div>
      </div>
    </div>
</div>
<section class="alert-info" >
  <div id="section-ribbon-unidades" class="container">
    <div class="row justify-content-center">
      <div class="col-8 m-5 text-center">
        <a name="" id="" class="btn btn-success pulse" href="{{ url('unidades') }}" role="button"><h5><i class="far fa-hand-point-right"></i> Clique aqui e encotnre a franquia mais próxima de você.</h5></a>
      </div>
    </div>
  </div>
</section>
<div class="container-fluid">
<div class="row justify-content-center pt-5 pb-5">
    {{-- <div class="col-xl-6 col-lg-6 col-12 "> --}}
      {{-- <div  class="col-12">
        
        

      </div>
    </div>
    <div class="col-xl-6 col-lg-6 col-12 pt-5 pb-5">
      <img src="{{ asset('public/imagens/Fabrica-3-880x495.jpg') }}" class="img-fluid" alt="Hoken Franching">
    </div> --}}
    <div class="col-xl-10 col-lg-10 col-12 pt-5 pb-5" >
      <img src="{{ asset('public/imagens/timeline-hoken.svg') }}" class="img-fluid" alt="Hoken Franching">

    </div>
  </div>
</div>



<div id="ribbon-blue-top" ></div>
<section id="call-to-action-franquia">
  <div class="container">
    <div class="row">
      <div class="col-xl-9 col-lg-9 col-12 p-2" >
        <h1><b>Seja um Franqueado Hoken</b></h1>
        <p>Uma franquia rentável, segura e com rápido retorno sobre o investimento.</p>
      </div>
      <div class="col-xl-3 col-lg-3 col-12 p-4 text-center" >
        <a name="" id="" class="btn  btn-lg btn-lg btn-block pulse" href="http://hoken.projetosprospecta.com.br/" role="button"><i class="far fa-hand-point-right"></i> Plano de Negócios</a>
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
