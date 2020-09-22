@extends('adminlte::page')

@inject('layoutHelper', \JeroenNoten\LaravelAdminLte\Helpers\LayoutHelper)

@section('css')  
<link rel="stylesheet" href="{{ url('public/css/custom.css')}}">
@stop()


@section('body')

@include('layouts.nav_menu')


{{-- {{dd($Banner)}} --}}

                        @isset($Banner)
                        <div id="demo" class="carousel slide" data-ride="carousel">
                            <ul class="carousel-indicators">
                            @php
                              $i = "";
                              $i++;
                            @endphp
                           @foreach ($Banner as $banner)
                            <li data-target="#demo" data-slide-to="{{$i++}}" class="active"></li>

                            @endforeach
                            </ul>
                            <div class="carousel-inner">
                              @foreach ($Banner as $banner)
                              <div class="carousel-item ">
                                {{-- <img class="slider_responive d-xl-none d-lg-none d-block " src=" {{url('storage/app/'. $banner->Banner_imagem_moblie)}}" alt="{{$banner->Banner_title}}" > --}}
                                <img class="slider_responive" src=" {{url('storage/app/'. $banner->Banner_imagem)}}" alt="{{$banner->Banner_title}}" >
                                <div class="carousel-caption" style="top:30%;">
                                  @isset($banner->Banner_title)
                                  <h1>{{$banner->Banner_title}}</h1>
                                  @endisset
                                  @isset($banner->Banner_subtitle)
                                  <h3>{{$banner->Banner_subtitle}}</h3>
                                  @endisset
                                  @isset($banner->Banner_link)
                                  <a href="{{$banner->Banner_link}}" class="btn btn-success btn-large">Saiba Mais</a>
                                  @endisset
                                </div>   
                              </div>
                              @endforeach
                            </div>
                            <a class="carousel-control-prev" href="#demo" data-slide="prev">
                              <span class="carousel-control-prev-icon"></span>
                            </a>
                            <a class="carousel-control-next" href="#demo" data-slide="next">
                              <span class="carousel-control-next-icon"></span>
                            </a>
                          </div>
                        @endisset
                        <section id="section_caracteristicas">
                          <div class="container">
                            <div class="row m-5 text-center">
                              <div class="col-12 p-5">
                                <h1>Conheça a Água Pura <span><b>Hoken</b></span></h1>
                                <p>Experimente a mais pura água distribuída de forma natural, gelada ou quente em uma máquina Purificadora inteligente.
                                  Sem resíduos, produtos químicos ou bactérias, apenas degustando água de forma consistente sempre que você quiser em sua casa ou local de trabalho.
                                  </p>
                              </div>
  
                              <div class="col-6 col-lg-3 col-xl-3 text-center">
                                <span style="font-size:60px;"><img class="img-fluid" style="max-width: 150px; " src="{{asset('public/imagens/icon-home-1.svg')}}" alt="Hoken"></span>
                                  <h3><b>Bom para você</b></h3>
                                  <p>Dupla filtragem, <b>carbomax®</b> purificada sem incrustações e rica em minerais saudáveis</p>
                              </div>
                              <div class="col-6 col-lg-3 col-xl-3">
                                <span style="font-size:60px;"><img class="img-fluid" style="max-width: 150px; " src="{{asset('public/imagens/icon-home-2.svg')}}" alt="Hoken"></span>
                                <h3><b>Economize tempo</b></h3>
                                <p>Instalação rápida, instantânea e ilimitada com serviço abrangente e simples</p>
                              </div>
                              <div class="col-6 col-lg-3 col-xl-3">
                                <span style="font-size:60px;"><img class="img-fluid" style="max-width: 150px; "  src="{{asset('public/imagens/icon-home-3.svg')}}" alt="Hoken"></span>
                                  <h3><b>Ótimo sabor</b></h3>
                                  <p>Puro refrigerado ou bem quente, sempre com excelente sabor nítido e limpo</p>
                              </div>
                              <div class="col-6 col-lg-3 col-xl-3">
                                <span style="font-size:60px;"><img class="img-fluid" style="max-width: 150px; " src="{{asset('public/imagens/icon-home-4.svg')}}" alt="Hoken"></span>
                                {{-- icon-home-1.svg --}}   
                                  <h3><b>Bom para o planeta</b> </h3>
                                  <p>Não há necessidade de garrafas plásticas, com baixo consumo de energia e repleto de recursos inteligentes. </p>
                              </div>
  
                            </div>
                          </div>
                        </section>
                        <div id="ribbon-blue-top" ></div>
                        <div id="section-ribbon-blue">
                        <div class="container">
                        <div class="row m-5 text-center">
                          <div class="col-12 white">
                            <h1>Confira abaixo 15 bons motivos para você garantir o seu:</h1>
                             <video width="100%"  autoplay muted>
                              <source src="{{asset('public/imagens/cpd_animation.mp4')}}" type="video/mp4">
                              <source src="{{asset('public/imagens/cpd_animation.ogg')}}" type="video/ogg">
                            </video>
                            </div>
                          <div class="col-12 white">
                            <h1>Produtos Hoken</h1>
                            <p>O Purificador de Água Hoken é um produto moderno e ideal para a utilização em residências, comércios e empresas, oferecendo água gelada e natural de alta qualidade. 
                              </p>
                              <b>Mais saúde e qualidade de vida para você e toda sua família.</b>
                          </div>
                  
                            <div class="col-12">
                              <div class="carrossel autoplay">
                                @foreach ($produtosDestaque as $item)
                                <div class="carrossel-item">
                                    <h3>
                                    <figure class="figure">
                                    <img src="{{url('/storage/app/'. $item->imagem_destaque.'')}}" class="figure-img img-fluid rounded" alt="{{$item->nome}}">
                                        <br>
                                        <figcaption class="figure-caption text-xs-right">
                                            <a name="" id="" class="btn btn-light btn-block " href="{{ route('produtoview.produto', $item->id)}}" role="button"><i class="far fa-hand-point-right"></i> Detalhes</a>
                                            <a name="" id="" class="btn btn-outline-light btn-block " href="{{ route('produtoview.manual', $item->manual_id)}}" role="button"><i class="fas fa-book"></i></i> Manual</a>
                                          </figcaption>
                                    </figure>
                                  </h3>
                                </div>
                                @endforeach
                            </div>
                            <p class="text-white">O Purificador de Água Hoken é um produto moderno e ideal para a utilização em residências, comércios e empresas, oferecendo água gelada e natural de alta qualidade..</p>
                          </div>
                          </div>
                          </div>
                        </div>
                        </div>
                        <section id="section_regioes">
                          <div class="container">
                            <div class="row m-5 text-center">
                              <div class="col-12 p-5">
                                <h1><b>A qualidade da água em diversas regiões do Brasil está preocupante.</b></h1>
                                <p>Em várias cidades e regiões do Brasil as notícias sobre a qualidade da água que você consome não são boas.</p>
                              </div>
                              <div class="row">
                                <div class="col-xl- col-lg-6 col-12">
                                  <img src="{{asset('public/imagens/mapadobrasil.svg')}}"  class="img-fluid" alt="Mapa polução da água no Brasil">
                                 </div>
                                <div class="col-xl- col-lg-6 col-12 pt-2 pb-2">
                                  <div class="row">
                                    <div class="col-6 text-left">
                                       <a href="https://clmais.com.br/casan-suspende-captacao-de-agua-em-afluente-do-rio-palmeira/">
                                        <h3><b>Casan suspende captação de água em afluente do Rio Palmeira</b></h3>   
                                        <p>A Companhia Catarinense de Águas e Saneamento (Casan) suspendeu a captação de água de um afluente do Rio Palmeira, no município de Palmeira, ...
                                        <span><u><b>clmais.com.br</b></u></span></p>
                                      </a> 
                                    </div>
                                    <div class="col-6 text-left">
                                      <a href="https://g1.globo.com/ap/amapa/natureza/amazonia/noticia/2020/08/07/estudo-identifica-presenca-de-9-metais-pesados-na-agua-da-foz-do-rio-amazonas-no-amapa.ghtml" >
                                       <h3><b>Estudo identifica presença de 9 metais pesados na água da foz do Rio Amazonas, no Amapá                                    </b></h3>   
                                       <p>Contaminação por elementos como alumínio, chumbo e cromo foi identificada também em plantas e sedimentos...
                                      <span><u><b>g1.globo.com</b></u></span></p>  
                                      </a> 
                                   </div>
                                   <div class="col-6 text-left">
                                    <a href="https://recordtv.r7.com/balanco-geral-rj/videos/vigilancia-sanitaria-realiza-fiscalizacao-em-depositos-de-agua-mineral-18022020" >
                                     <h3><b>Vigilância Sanitária realiza fiscalização em depósitos de água mineral </b></h3>   
                                     <p>De acordo com a coordenadora de alimentos Aline Borges, a pesquisa pode apontar qualquer tipo de contaminação...
                                     <span><br><u><b>recordtv.r7.com</b></u></span> </p> 
                                    </a> 
                                 </div>
                                 <div class="col-6 text-left">
                                  <a href="https://g1.globo.com/ap/amapa/natureza/amazonia/noticia/2020/08/07/estudo-identifica-presenca-de-9-metais-pesados-na-agua-da-foz-do-rio-amazonas-no-amapa.ghtml" >
                                   <h3><b>Estudo alerta sobre riscos de água contaminada por resíduos de saúde descartados</b></h3>   
                                   <p>Uma descoberta feita em estudo de doutorado indicou impacto ambiental e grave risco à saúde provocados por resíduos de medicamentos e efluentes de análises clínicas na água de Joinville (SC)...
                                   <span><br><u><b>g1.globo.com</b></u></span></p> 
                                  </a> 
                               </div>
                                    
                                  </div>
                                </div>
                              </div>
  
                            </div>
                          </div>
                        </section>
                          <section id="posts" class="blue_dark">
                            <div class="container p-5">
                              <div class="row">
                                <div class="col-12 text-center">
                                  <h1 style="color:#fff;">Depoimentos</h1>
                                  <span class="text-white">Confira o que dizem nossos clientes a respeito dos produtos Hoken
                                  </span>
                                  <div class="row mt-4">
                                    <div class="col-lg-6 col-xl-6 col-12 ">
                                      <div class="card p-4">
                                      <h6>“Adquiri um aparelho Hoken e estou muito satisfeita com os serviços prestados, isso sem falar da qualidade excelente da água. Temos que tomar muito cuidado, não só com o que comemos, mas também com a água que bebemos todos os dias. Não só com a água que bebemos, mas também com a água que fazemos tudo, com a água que cozinhamos, que tomamos banho e com a água que lavamos os nossos utensílios. Por isso, eu, sem dúvida nenhuma, indico a Hoken.”</h6>
                                      <span><b>Dra. Valéria Braile, Instituo Domingo Braile de Cardiologia</b>
                                      </span>
                                    </div>
                                    </div>
                                    <div class="col-lg-6 col-xl-6 col-12">
                                      <div class="card p-4">
                                      <h6>“Aqui na nossa empresa, Fabiano Hayasaki Arquitetura Interiores e Urbanismo, a nossa missão é levar qualidade de vida às pessoas, designer e a mais alta tecnologia em projeto. Por isso eu escolhi os produtos da Hoken, que aliam tecnologia, designer e qualidade. No restaurante Yokohama nós também utilizamos produtos da Hoken. Os alimentos são preparados com a água da Hoken, por isso leva mais saúde e mais qualidade ao alimento.”                                      </h6>
                                      <span><b>Fabiano Haysaki, Arquitetura Interiores e Urbanismo</b></span>
                                    </div>
                                    </div>
                                    <div class="col-lg-6 col-xl-6 col-12 ">
                                      <div class="card p-4">
                                      <h6>“Quem conhece o CCLI sabe da nossa preocupação com a qualidade e com a excelência em serviços. Quando montamos nosso projeto da casa nova não descuidamos de nenhum detalhe. Por isso tratamos tudo com muito cuidado, inclusive a qualidade da água. Analisamos as várias opções do mercado e escolhemos o produto de mais excelência e mais qualidade, alinhado com a nossa missão e nossa visão, ou seja, escolhemos o filtro da Hoken.”</h6>
                                      <span><b>Daniel F. Rodrigues, CCLI Consultoria Linguística</b></span>
                                      </div>
                                    </div>
                                    <div class="col-lg-6 col-xl-6 col-12 ">
                                      <div class="card p-4">
                                      <h6>“Nós optamos pelo produto Hoken pela confiabilidade da marca e pela qualidade do produto. Em um só produto nós temos água quente, água natural e a água gelada. A água quente traz a facilidade de você poder servir para os seus clientes um chá, um cappuccino; e a água gelada você pode fazer um suco. Nós acreditamos muito na qualidade, porque é uma água tratada, livre de metais pesados, é uma água leve e nós acreditamos no produto, por isso fizemos a opção.” </h6>
                                      <span><b>Iracel Zanini França, Tam Viagens</b></span>
                                      </div>
                                    </div>
                              
                                  </div>

                                </div>
                              </div>
                            </div>
                          </section>

                          <section id="franquia">
                            <div class="container-fluid">
                              <div class="row">
                                <div class="col-xl-7 col-lg-8 col-12">
                                  <img class="img-cover-right" src="{{asset('public/imagens/franchsing.jpg')}}" alt="hoken franchising" style="margin-left:-60px; ">
                                  </div>
                                  <div class="col-xl-5 col-lg-4 col-12 p-5">
                                  <h1><b>Hoken Store</b></h1>
                                  <p>A Hoken Franchising é um modelo inovador de unidade de negócios desenvolvido com o foco no varejo e vendas diretas personalizadas. Visto como algo promissor, o mercado da água é para muitos empreendedores fonte de vida, uma vez que a crise hídrica se tornou uma oportunidade para a venda de purificadores de água. Franquias como a Hoken, que há 23 anos atua com a venda de aparelhos para garantir a qualidade da água oferecida aos clientes, têm aproveitado esse momento para intensificar seus planos de expansão e atrair novos franqueados.
                                  </p>
                                  </div>
                              </div>
                            </div>
                          </section>
                          <section id="call-to-action-franquia">
                            <div class="container">
                              <div class="row">
                                <div class="col-xl-9 col-lg-9 col-12 p-2" >
                                  <h1><b>Seja um Franqueado Hoken</b></h1>
                                  <p>Uma franquia rentável, segura e com rápido retorno sobre o investimento.</p>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-12 p-4 text-center" >
                                  <a name="" id="" class="btn  btn-lg btn-block pulse" href="http://hoken.projetosprospecta.com.br/" role="button"><i class="far fa-hand-point-right"></i>Plano de Negócio</a>
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
	
  
$('.carousel-item:first-child').addClass('active');

   
</script>

@stop
