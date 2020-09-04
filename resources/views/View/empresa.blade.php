@extends('adminlte::page')

@inject('layoutHelper', \JeroenNoten\LaravelAdminLte\Helpers\LayoutHelper)

@section('css')  
<link rel="stylesheet" href="css/custom.css">

@stop()


@section('body')

@include('layouts.nav_menu')

<div class="container-fluid">
  <div class="row">
    <div class="col-xl-6 col-lg-6 col-12">
      <img src="{{ asset('imagens/Fachada-Hoken.jpg') }}" class="img-cover" alt="Hoken Franching">
    </div>
      <div class="col-xl-6 col-lg-6 col-12">
        <div id="box-emprensa" class="col-12 text-justify">
          <div class="box_background ">
            <h1 class="p-3">O Grupo Hoken</h1>
  
          <p class="p-3">Formado por 3 empresas, Hoken International Company, Hai Franchising e Brasil Service e atuante em todo o Brasil,
             Paraguai, Portugual e Espanha, o Grupo Hoken se consolidou como um dos mais sólidos grupos econômicos do país. Ocupa a posição de 
             destaque nas áreas de pesquisa e desenvolvimento de aparelhos e acessórios para tratamento de água,
             franchising, vendas diretas e treinamento.</p>
  
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-ligth" data-toggle="modal" data-target="#Brasil-Service">
              <img src="{{ asset('imagens/Brasil-Service.png') }}" class="img-fluid" alt="">
          </button>
          <button type="button" class="btn btn-ligth" data-toggle="modal" data-target="#HAI-Franchising">
            <img src="{{ asset('imagens/HAI-Franchising.png') }}" class="img-fluid"  alt="">
          </button>
          </div>
        </div>
      </div>
    </div>
</div>
<div class="container">
  <div class="row pt-5 pb-5">
    <div class="col-xl-6 col-lg-6 col-12 ">
      <div  class="col-12">
        <img  class="p-3 img-fluid" src="{{ asset('imagens/Hoken-International-Company1.png') }}" alt="Hoken Internacional">
        <p class="p-3 text-justify">Primeira indústria de aparelhos para tratamento de água do Brasil a obter a certificação ISO 9001, é responsável pela produção e comercialização dos mais avançados produtos, com tecnologia de ponta exclusiva e patenteada.

          O comprometimento da Hoken com a qualidade de seus produtos e serviços resulta em conquistas históricas: a Hoken é a única empresa da América Latina a receber o Gold Seal, da Water Quality Association, certificação dada aos processadores com elementos filtrantes Carbomax®. Além disso, todos os processadores Hoken contam com a certificação Inmetro.
          
          <ul>
            <li>Fundado em 1997 na cidade de São José do Rio Preto, estado de São Paulo, está presente em dois continentes (América e Europa) e em quatro países.
            </li>
            <li>Líder no segmento de aparelhos para tratamento de água residencial;</li>
            <li>Empresa 100% brasileira;</li>
            <li>Possui mais de 150 franquias;</li>
            <li>Primeira indústria de aparelhos para tratamento de água residencial do Brasil a receber a certificação ISO 9001;
            </li>
            <li>Possui mais de 2 milhão de clientes;</li>
          </ul>
         </p>

      </div>
    </div>
    <div class="col-xl-6 col-lg-6 col-12 pt-5 pb-5">
      <img src="{{ asset('imagens/Fabrica-3-880x495.jpg') }}" class="img-fluid" alt="Hoken Franching">
    </div>
    <div class="col-xl-12 col-lg-12 col-12 pt-5 pb-5" >
      <img src="{{ asset('imagens/timeline-hoken.svg') }}" class="img-fluid" alt="Hoken Franching">

    </div>
  </div>
</div>




<!-- Modal -->
<div class="modal fade" id="Brasil-Service" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <img  class="p-3" src="{{ asset('imagens/Brasil-Service.png') }}" alt="Hoken Internacional">
        <p>
          Empresa responsável pela comunicação corporativa do Grupo Hoken, engloba Publicidade, Treinamento, Identidade Visual dos produtos, Assessoria de Imprensa, Comunicação Impressa, Áudio Visual e Estratégia das Marcas.
        </p>
        <p>
          É responsável pela coordenação de todo Sistema de Treinamento que oferece capacitação profissional e pessoal para a equipe de vendas.
        </p>
        <p>
        A Brasil Service também desenvolve os eventos do Grupo Hoken, além de organização e realização de cursos, seminários, campanhas de incentivo, viagens e convenções.
       </p>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="HAI-Franchising" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <img  class="p-3 " src="{{ asset('imagens/HAI-Franchising.png') }}" alt="Hoken Internacional">
        <p>
          Licenciadora da marca Hoken é responsável pelas licenças internacionais do grupo e pela venda de franquias.
        <p>
          Também proporcionam às mais de 150 franquias do Brasil, América Latina e Europa suporte e apoio para iniciar o negócio, além de modernos sistemas de controle que são utilizados para garantir o resultado dos parceiros franqueados.
        </p>
      </div>
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
        <a name="" id="" class="btn btn-outline-light btn-lg btn-lg btn-block " href="http://hoken.projetosprospecta.com.br/" role="button"><i class="far fa-hand-point-right"></i> Pano de Negócio</a>
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
