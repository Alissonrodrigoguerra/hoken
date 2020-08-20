@extends('adminlte::page')

@inject('layoutHelper', \JeroenNoten\LaravelAdminLte\Helpers\LayoutHelper)

@section('css')  
<link rel="stylesheet" href="css/custom.css">

@stop()


@section('body')

@include('layouts.nav_menu')


{{-- {{dd($Banner)}} --}}


                        @isset($Banner)
                        <div id="demo" class="carousel slide" data-ride="carousel">
                            <ul class="carousel-indicators">
                           
                           @foreach ($Banner as $banner)

                              <li data-target="#demo" data-slide-to="0" class="active"></li>
                         
                            @endforeach
                            </ul>
                            <div class="carousel-inner">
                              @foreach ($Banner as $banner)
                              <div class="carousel-item active">
                                <img class="slider_responive" src=" {{asset('storage/'. str_after($banner->Banner_imagem, 'public/'))}}" alt="{{$banner->Banner_title}}" >
                                <div class="carousel-caption" style="top:30%;">
                                  <h1>{{$banner->Banner_title}}</h1>
                                  <h3>{{$banner->Banner_subtitle}}</h3>
                                  <a href="{{$banner->Banner_link}}" class="btn btn-success btn-large">Saiba Mais</a>
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


                        <div class="container">
                          <div class="row m-5 text-center">
                            <div class="col-12 p-5">
                              <h1>Conheça a Água Pura <span><b>Hoken</b></span></h1>
                              <p>A mais pura água distribuída fervendo ou resfriada em uma máquina inteligente.Sem incrustações, sem produtos químicos, sem bactérias, apenas degustando água de forma consistente sempre que você quiser em sua casa ou local de trabalho.</p>
                            </div>

                            <div class="col-6 col-lg-3 col-xl-3 text-center">
                              <span style="font-size:60px;"><i class="fas fa-glass-whiskey"></i></span>
                              {{-- <img src="" alt=""> --}}
                                <h2>Bom para você</h2>
                                <p>Dupla filtragem, carbomax purificada sem incrustações, rica em minerais saudáveis</p>
                            </div>
                            <div class="col-6 col-lg-3 col-xl-3">
                              <span style="font-size:60px;"><i class="far fa-clock"></i></span>
                              {{-- <img src="" alt=""> --}}                                
                              <h2>Economize tempo</h2>
                              <p>Instalação rápida, instantânea e ilimitada e serviço abrangente e simples </p>
                            </div>
                            <div class="col-6 col-lg-3 col-xl-3">
                              <span style="font-size:60px;"><i class="fas fa-tint"></i></span>
                              {{-- <img src="" alt=""> --}}   
                                <h2>Ótimo sabor</h2>
                                <p>Puro refrigerado ou bem quente, sempre com excelente sabor nítido e limpo</p>
                            </div>
                            <div class="col-6 col-lg-3 col-xl-3">
                              <span style="font-size:60px;"><i class="fas fa-globe-americas"></i></span>
                              {{-- <img src="" alt=""> --}}   
                                <h2>Bom para o planeta </h2>
                                <p>Não há necessidade de garrafas plásticas, com baixo consumo de energia e repleto de recursos inteligentes. </p>
                            </div>

                          </div>
                        </div>
                        <div id="ribbon-blue-top" ></div>
                        <div id="section-ribbon-blue">
                        <div class="container">
                          <div class="row m-5 text-center">
                            <div class="col-12">
                            <div class="carrossel autoplay">
                              <div>
                                <h3 class="carrossel-item">
                              <figure class="figure">
                                  <img src="{{asset('imagens/Sancai.png')}}" class="figure-img img-fluid rounded" alt="">
                                  <br>
                                  <figcaption class="figure-caption text-xs-right">
                                  <a name="" id="" class="btn btn-outline-light btn-block " href="#" role="button"><i class="far fa-hand-point-right"></i> Detalhes</a>

                                </figcaption>
                              </figure>
                            
                            </h3>
                            </div>
                              <div>
                                <h3 class="carrossel-item">
                              <figure class="figure">
                                  <img src="{{asset('imagens/Sancai.png')}}" class="figure-img img-fluid rounded" alt="">
                                  <br>
                                  <figcaption class="figure-caption text-xs-right">
                                  <a name="" id="" class="btn btn-outline-light btn-block " href="#" role="button"><i class="far fa-hand-point-right"></i> Detalhes</a>

                                </figcaption>
                              </figure>
                            
                            </h3>
                            </div>
                              <div>
                                <h3 class="carrossel-item">
                              <figure class="figure">
                                  <img src="{{asset('imagens/Sancai.png')}}" class="figure-img img-fluid rounded" alt="">
                                  <br>
                                  <figcaption class="figure-caption text-xs-right">
                                  <a name="" id="" class="btn btn-outline-light btn-block " href="#" role="button"><i class="far fa-hand-point-right"></i> Detalhes</a>

                                </figcaption>
                              </figure>
                            
                            </h3>
                            </div>
                              <div>
                                <h3 class="carrossel-item">
                              <figure class="figure">
                                  <img src="{{asset('imagens/Sancai.png')}}" class="figure-img img-fluid rounded" alt="">
                                  <br>
                                  <figcaption class="figure-caption text-xs-right">
                                  <a name="" id="" class="btn btn-outline-light btn-block " href="#" role="button"><i class="far fa-hand-point-right"></i> Detalhes</a>

                                </figcaption>
                              </figure>
                            
                            </h3>
                            </div>
                            <div>
                              <h3 class="carrossel-item">
                              <figure class="figure">
                                  <img src="{{asset('imagens/Sancai.png')}}" class="figure-img img-fluid rounded" alt="">
                                  <br>
                                  <figcaption class="figure-caption text-xs-right">
                                  <a name="" id="" class="btn btn-outline-light btn-block " href="#" role="button"><i class="far fa-hand-point-right"></i> Detalhes</a>

                                </figcaption>
                              </figure>
                            
                            </h3>
                            </div>
                            
                         
                            </div>
                          </div>
                          </div>
                        </div>
                        </div>
                        
                          <section class="blue_dark">
                            <div class="container p-5">
                              <div class="row">
                                <div class="col-12 text-center">
                                  <h1 style="color:#fff;">Saúde e Bem Estar</h1>
                                  <h4 style="color:#fff;">Você confia 100% na água que você e sua família consome?</h4>
                                  <br>
                                  @isset($PostDestaque)

                                    <div class="col-12">
                                      <figure class="figure">
                                      <img src=" {{asset('storage/'. str_after($PostDestaque->post_imagem, 'public/'))}}" class="figure-img img-fluid rounded" alt="{{ $PostDestaque->post_title}}">
                                        <figcaption class="figure-caption text-xs-right">{{ $PostDestaque->post_title}}</figcaption>
                                        <a name="" id="" class="btn btn-outline-light  " href="#" role="button"><i class="far fa-hand-point-right"></i> Detalhes</a>

                                      </figure>
                                    </div>

                                    @isset($Post)
                                      @foreach ($Post as $post_itens)
                                      <div class="col-lg-4 col-sm-12">
                                        <figure class="figure">
                                          <img src="{{asset('storage/'. str_after($post_itens->post_imagem, 'public/'))}}" class="figure-img img-fluid rounded" alt="{{ $post_itens->post_title}}">
                                          <figcaption class="figure-caption text-xs-right">{{ $post_itens->post_title}}
                                          <p>{{  substr($post_itens->post_content  ,0, 300) }}</p>
                                          <a name="" id="" class="btn btn-outline-light btn-block " href="#" role="button"><i class="far fa-hand-point-right"></i> Detalhes</a>
                                        </figcaption>
                                        </figure>
                                      </div>
                                      @endforeach
                                        
                                    @endisset
                                  @endisset
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
