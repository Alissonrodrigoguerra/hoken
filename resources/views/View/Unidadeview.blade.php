@extends('adminlte::page')

@inject('layoutHelper', \JeroenNoten\LaravelAdminLte\Helpers\LayoutHelper)
 
@section('css')  
<link rel="stylesheet" href="{{ url('public/css/custom.css')}}">

@stop()


@section('body')
    
<div id="fullpage">
    <div id="menu" class="fixed-top">
        <div class="container">
            <div class="row justify-content-center m-4">
                <div class="col-lg-4 col-xl-3 col-12">
                    <img src="{{ asset('./public/imagens/logo-white.svg')}}" class="logomin2 img-fluid" alt="Mais Saude para sua família">

                </div>
                <div class="col-lg-8 col-xl-8 col-12  text-lg-right text-xl-right text-center">
                   <h2 class="id_franquia"> Franquia: {{$unidades->codigo }} <a class="btn btn-success" id="telefone" href="https://api.whatsapp.com/send?phone={{$unidades->Whatsapp }}&text=Ol%C3%A1%20tudo%20bem%20gostaria%20de%20saber%20mais%20sobre%20os%20produtos%20Hoken."><i class="fab fa-whatsapp"></i> {{$unidades->Whatsapp }}</a></h2>
                </div>
            </div>
        </div>
    </div>
    <section class="section fp-auto-height" id="Inicio" >
        <div class="container" style="padding: 100px 0px ;" >
            <div class="row  justify-content-left">
                <div class="col-xl-6 col-lg-6 col-12">
                <img src="{{ asset('./public/imagens/maissaudeparasuafamilia-hoken.png')}}" class="img-fluid" alt="Mais Saude para sua família">
                </div>
                <div class="col-xl-6 col-lg-6 col-12">
                    <img src="{{ asset('./public/imagens/linhaprodutoshoken.png')}}" class="img-fluid" alt="Mais Saude para sua família">
                </div>
                <div class="col-5  ">
                    <a href="https://api.whatsapp.com/send?phone={{$unidades->Whatsapp }}&text=Ol%C3%A1%20tudo%20bem%20gostaria%20de%20saber%20mais%20sobre%20os%20produtos%20Hoken." class="btn btn-success btn-lg btn-block">QUERO SABER MAIS</a>
                </div>   
            </div>
         
                
           
        </div>
    </section>
    <section class="section" id="institucional">
        <div class="container">
            <div class="row" style="margin: 100px 0px">
                <div class="col-12 text-center">
                    <h1 class="text-info"><b>Benefício da Água Purificada</b></h1>
                    <p class="text-info">A água filtrada proporciona grandes benefícios para sua saúde: ela regula a temperatura corporal, combate acne, estrias e celulite, melhora o funcionamento dos rins, altura na prevenção do aparecimento de pedras nos rins, facilita a digestão, diminui o inchaço corporal, melhora a circulação  sanguínia e ainda ajuda emagrecer.</p>
                    <div class="row">
                        <div class="col-lg-3 col-lx-3 col-6">
                            <img src="{{ asset('./public/imagens/icons-07.svg')}}" class="img-fluid" alt="">
                            <p class="text-info"> <b>Lubrifica os músculos e articulações</b> </p>
                        </div>
                        <div class="col-lg-3 col-lx-3 col-6">

                            <img src="{{ asset('public/imagens/icons-08.svg')}}" class="img-fluid" alt="">

                            <p class="text-info"> <b> Qualidade da pele</b></p>
                        </div>
                        <div class="col-lg-3 col-lx-3 col-6">
                            <img src="{{ asset('public/imagens/icons-09.svg')}}" class="img-fluid" alt="">

                            <p class="text-info"> <b> Hidrata e mantem um bom funcionamento dos órgãos</b></p>
                        </div>
                        <div class="col-lg-3 col-lx-3 col-6">
                            <img src="{{ asset('public/imagens/icons-10.svg')}}" class="img-fluid" alt="">

                            <p class="text-info"> <b> Auxilia no emagracimento</b></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section" id="produtos" >
        <div class="container">
            <div class="row" style="margin: 100px 0px">
                <div class="col-lg-4 col-lx-4 col-12">
                    <img src="{{ asset('./public/imagens/icons-12.svg')}}" class="img-fluid" alt="">
                </div>
                <div class="col-lg-8 col-lx-8 col-12 text-center " style="margin: 100px 0px">
                    <h1 class="text-white"><b>100% SEM CHEIRO</b></h1>
                    <p class="text-white">Se a água que você ingere apresenta cheiro, é melhro ficar atento pois esse não é um bom sinal. A água pura não deve ter nem odor nem cor! A ingestão de uma água de qualidade. Isso porque entre diversos motivos, o excesso de color ocasiona alteração no cheiro da água. Além do problema do cloro, outros tipos de contaminação pondem estar presente.s</p>
                   
            </div>
            <div class="col-12">
            <div class="carrossel autoplay">
                @foreach ($produtos as $item)
                <div class="carrossel-item">
                    <h3>
                    <figure class="figure">
                        <img src="{{asset('public/storage/'. str_after($item->imagem_destaque, 'public/'))}}" class="figure-img img-fluid rounded" alt="">
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
                
        </div>
    </section>
    <section class="section " id="assistencia" style="background-image: url('../imagens/bckground_wather.jpg'); 
    " >
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-xl-5 col-12 p-5">
                    <h1 class="text-info"><b>Garanta a manutenção 
                        constante com a equipe
                        técnica <b>Hoken</b>.</b></h1>
                        <a href="https://api.whatsapp.com/send?phone={{$unidades->Whatsapp }}&text=Ol%C3%A1%20tudo%20bem%20gostaria%20de%20saber%20mais%20sobre%20os%20produtos%20Hoken." class="btn btn-block btn-success">
                            SOLICITAR VISITA
                        </a>
                </div>
                <div class="col-lg-3 col-xl-4 col-12">
                    <img src="{{ asset('./public/imagens/icons-11.png')}}" class="img-fluid" alt="">
                </div>
            </div>
        </div>
        <div id="mapid"></div>
       

    </section>
    <section class="section " id="Contato" >
        
        <a href="#" class="btn pulse-button "><i class="fab fa-whatsapp" width="50px"></i></a>

        <div class="row footer_read">
            <div class="container">
                <div class="row ">
                    <div class="col-lg-4 bg_Navyblue_2  p-4">
                        <h2 class="footer_title "><img src="{{ asset(config('adminlte.logo_view'))}}" alt="Hoken Logo"></h2>
                        <div class="footer_content  pt-4">
                            <p>A Hoken possui a mais completa linha de aparelhos para tratamento de água desenvolvidos com alta tecnologia e sob rígido controle de qualidade. Mais saúde e qualidade de vida para você e toda sua família.
                            </p>
                            <p>Os produtos Hoken são sinônimos de alta tecnologia e qualidade, proporcionando total segurança e comodidade para seus consumidores.
        
                            </p>
                            <p>Nossa missão é "Levar saúde e prosperidade a todas pessoas e nações."
        
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4  p-4">
                        <h2 class="footer_title pt-4 pl-3 text-center">Links Uteis</h2>
                        <div class="footer_content">
                            <ul class="list-default" style="list-style: none;">
                                <li><a href=""></a></li>
                                <hr class="hr_footer"> 
                                <li class="nav-item btn-White"><a class="nav-link btn btn-link " href="{{ route("empresa.index")}}">Hoken</a></li>
                               
                                <li class="nav-item btn-White"><a class="nav-link btn btn-link " href="{{ route("post.index")}}">Artigos</a></li>
                                <li class="nav-item btn-White"><a class="nav-link btn btn-link dropdown open "  id="triggerId" aria-haspopup="true" aria-expanded="false" data-toggle="dropdown"href="{{ route("post.index")}}">Suporte ao Franqueado <i class="fas fa-caret-down"></i></a>
                                        <div class="dropdown-menu" aria-labelledby="triggerId">
                                            <button class="dropdown-item" href="https://mirai.hoken.com.br/">Mirai</button>
                                            <button class="dropdown-item disabled" href="#">Hoken Shop </button>
                                        </div>
                                </li>
                                <li class="nav-item btn-White"><a class="nav-link btn btn-link " href="{{ route("lista.unidade")}}">Unidades</a></li>
            
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 bg_Navyblue_2  p-4">
                        <h2 class="footer_title pt-4 text-center">CONTATO</h2>
                        <div class="footer_content">
                            <p class=""><a href="https://www.google.com.br/maps/@ {{ $unidades->latitude }}, {{ $unidades->longitude }},15z"><i class="fas fa-street-view"></i> {{$unidades->Rua }}, {{$unidades->Numero }} - {{$unidades->cidade }} - {{$unidades->estado }}<hr class="hr_footer"></a></p>
                            <p class="{{ $unidades->Telefone }}"><a href=" tel:5555555555 " id="telefone"><i class="fas fa-phone"></i> {{ $unidades->Telefone }}<hr class="hr_footer"></a></p>
                            <p class=""><a href=""><i class="fas fa-envelope"></i> {{ $unidades->email }}<hr class="hr_footer"></a></p>
                        </div> 
                    </div>
                    </div>
                </div>
            </div>
        </div>   
        
        <div class="row footer ">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 p-3"><a class="float-left" href="">Copyright © 2020 - Hoken International Company
                    </a>
                </div>
                    <div class="col-lg-6">
                        <div class="float-right p-3">
                            <a class="social-facebook ml-3 " href="https://www.facebook.com/hokenoficial" target="&quot;_blank&quot;"><i class="fab fa-facebook"></i></a>
                            <a class="social-twitter ml-3 " href="https://twitter.com/hokenoficial" target="&quot;_blank&quot;"><i class="fab fa-twitter"></i></a>
                            <a class="social-google-plus ml-3 " href="https://plus.google.com/+BlogHokenBrFranquia/videos" target="&quot;_blank&quot;"><i class="fab fa-google-plus-g"></i></a>
                            <a class="social-linkedin ml-3 " href="https://www.linkedin.com/company/hoken-internacional-company" target="&quot;_blank&quot;"><i class="fab fa-linkedin"></i></a>
                            <a class="social-youtube ml-3 " href="https://www.youtube.com/user/hokenoficial" target="&quot;_blank&quot;"><i class="fab fa-youtube"></i></a>
                            <a class="social-instagram ml-3 " href="https://www.instagram.com/hokenoficial/" target="&quot;_blank&quot;"><i class="fab fa-instagram"></i></a>
                            <a class="social-pinterest ml-3 " href="https://www.pinterest.com/hokenoficial/" target="&quot;_blank&quot;"><i class="fab fa-pinterest"></i></a></div>
                    </div>
                </div>
            </div>
        </div>
        
        <div id="hadset_menu" class=" text-right d-none">
            <ul class="nav flex-column text-center">
                <p style="padding: 5px">Se você já é nosso cliente e precisa da sua segunda via do boleto clique aqui</p>
                <li class="nav-item ">
                  <a class="nav-link btn btn-outline-info " href="https://api.whatsapp.com/send?phone=5517991080582&text=Ol%C3%A1%20Gostaria%20de%20solicitar%20atendimento.">Fale conosco</a>
                </li>
             
              </ul>
              <div class="traigulo"></div>
        </div>
    

    </section>
</div>

@stop

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

<script type="text/javascript">
 
    $('.logomin1').css('display','none'); 
    $('.logomin2').css('display','block');
    $('.id_franquia').css('color','#fff');
    $('a').click(function(){logiverter();});
    $(window).scroll(function(){logiverter();});
    $('#mapid').css('heigth','250px'); 

    function logiverter() { 
        var hash = $(location).attr('hash');
        if(hash == '#firstPage'){ 
            $('.logomin1').css('display','none'); 
            $('.logomin2').css('display','block');
            $('.id_franquia').css('color','#fff');

            } if(hash == '#secondPage'){ 
            $('.logomin1').css('display','block'); 
            $('.logomin2').css('display','none');
            $('.id_franquia').css('color','#979797');

            } if(hash == '#3rdPage'){ 
            $('.logomin1').css('display','block'); 
            $('.logomin2').css('display','none');
            $('.id_franquia').css('color','#fff');

            } if(hash == '#4rdPage'){ 
            $('.logomin1').css('display','block'); 
            $('.logomin2').css('display','none');
            $('.id_franquia').css('color','#fff');
        }
    }
    var latitude =  {{$unidades->latitude }};
    var longitude =  {{$unidades->longitude }};
    var mymap = L.map('mapid').setView([longitude, latitude], 10);

	L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
		maxZoom: 18,
		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
			'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
			'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		id: 'mapbox/streets-v11',
		tileSize: 512,
		zoomOffset: -1
	}).addTo(mymap);

    L.marker([longitude, latitude]).addTo(mymap);
      
</script>

<script>
     $('.pulse-button').click(function() { 
        
        $('#hadset_menu').fadeIn('show');
        $('#hadset_menu').removeClass('d-none');
        $('#hadset_menu').mouseleave(function(){
            $('#hadset_menu').addClass('d-none');
            
        });

        
    });

    $(function(){   
            var nav = $('#menu');
            var heigth = $('#menu');

            $(window).scroll(function () { 
                if ($(this).scrollTop() > 150) { 
                    nav.css("background-color","#00000040").fadein('show');  
                } else { 
                    
                    nav.css("background-color","#00000000");   
 
                } 
            });  
        });
        $("#telefone, #celular").mask("+00 00 0.0000.0000");
</script>



<script type="text/javascript">
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

