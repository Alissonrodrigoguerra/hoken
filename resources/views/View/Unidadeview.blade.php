@extends('adminlte::page')

@inject('layoutHelper', \JeroenNoten\LaravelAdminLte\Helpers\LayoutHelper)
 
@section('css')  
<link rel="stylesheet" href="{{ url('css/custom.css')}}">

@stop()


@section('body')
    
<div id="fullpage">
    <div id="menu" class="fixed-top">
        <div class="container">
            <div class="row justify-content-center m-4">
                <div class="col-lg-4 col-xl-3 col-12">
                    <img src="{{ asset('./imagens/logo-color.svg')}}" class="logomin1 img-fluid" alt="Mais Saude para sua família">
                    <img src="{{ asset('./imagens/logo-white.svg')}}" class="logomin2 img-fluid" alt="Mais Saude para sua família">

                </div>
                <div class="col-lg-8 col-xl-8 col-12  text-lg-right text-xl-right text-center">
                   <h2 class="id_franquia"> Franquia: 000 <a class="btn btn-success" href=""><i class="fab fa-whatsapp"></i> 17 9999 9999</a></h2>
                </div>
            </div>
        </div>
    </div>
    <section class="section fp-auto-height" id="Inicio" >
        <div class="container" style="padding: 100px 0px ;" >
            <div class="row  justify-content-left">
                <div class="col-xl-6 col-lg-6 col-12">
                <img src="{{ asset('./imagens/maissaudeparasuafamilia-hoken.png')}}" class="img-fluid" alt="Mais Saude para sua família">
                </div>
                <div class="col-xl-6 col-lg-6 col-12">
                    <img src="{{ asset('./imagens/linhaprodutoshoken.png')}}" class="img-fluid" alt="Mais Saude para sua família">
                </div>
                <div class="col-5  ">
                    <button class="btn btn-outline-light btn-block">Comprar</button>
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
                            <img src="{{ asset('./imagens/icons-6.svg')}}" class="img-fluid" alt="">
                            <p class="text-info"> <b>Lubrifica os músculos e articulações</b> </p>
                        </div>
                        <div class="col-lg-3 col-lx-3 col-6">

                            <img src="{{ asset('./imagens/icons-7.svg')}}" class="img-fluid" alt="">

                            <p class="text-info"> <b> Qualidade da pele</b></p>
                        </div>
                        <div class="col-lg-3 col-lx-3 col-6">
                            <img src="{{ asset('./imagens/icons-8.svg')}}" class="img-fluid" alt="">

                            <p class="text-info"> <b> Hidrata e mantem um bom funcionamento dos órgãos</b></p>
                        </div>
                        <div class="col-lg-3 col-lx-3 col-6">
                            <img src="{{ asset('./imagens/icons-9.svg')}}" class="img-fluid" alt="">

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
                <div class="col-lg-4 col-lx-4 col-6">
                    <img src="{{ asset('./imagens/icons-12.svg')}}" class="img-fluid" alt="">
                </div>
                <div class="col-lg-8 col-lx-8 col-6 text-center">
                    <h1 class="text-white"><b>100% SEM CHEIRO</b></h1>
                    <p class="text-white">Se a água que você ingere apresenta cheiro, é melhro ficar atento pois esse não é um bom sinal. A água pura não deve ter nem odor nem cor! A ingestão de uma água de qualidade. Isso porque entre diversos motivos, o excesso de color ocasiona alteração no cheiro da água. Além do problema do cloro, outros tipos de contaminação pondem estar presente.s</p>
                   
            </div>
            <div class="col-12">
            <div class="carrossel autoplay">
                <div class="carrossel-item">
                    <h3>
                    <figure class="figure">
                        <img src="{{asset('imagens/Sancai.png')}}" class="figure-img img-fluid rounded" alt="">
                        <br>
                        <figcaption class="figure-caption text-xs-right">
                        <a name="" id="" class="btn btn-outline-light btn-block " href="#" role="button"><i class="far fa-hand-point-right"></i> Detalhes</a>
                      </figcaption>
                    </figure>
                  </h3>
                </div>
                <div class="carrossel-item">
                    <h3>
                    <figure class="figure">
                        <img src="{{asset('imagens/Sancai.png')}}" class="figure-img img-fluid rounded" alt="">
                        <br>
                        <figcaption class="figure-caption text-xs-right">
                        <a name="" id="" class="btn btn-outline-light btn-block " href="#" role="button"><i class="far fa-hand-point-right"></i> Detalhes</a>
                      </figcaption>
                    </figure>
                  </h3>
                </div>
                <div class="carrossel-item">
                    <h3>
                    <figure class="figure">
                        <img src="{{asset('imagens/Sancai.png')}}" class="figure-img img-fluid rounded" alt="">
                        <br>
                        <figcaption class="figure-caption text-xs-right">
                        <a name="" id="" class="btn btn-outline-light btn-block " href="#" role="button"><i class="far fa-hand-point-right"></i> Detalhes</a>
                      </figcaption>
                    </figure>
                  </h3>
                </div>
                <div class="carrossel-item">
                    <h3>
                    <figure class="figure">
                        <img src="{{asset('imagens/Sancai.png')}}" class="figure-img img-fluid rounded" alt="">
                        <br>
                        <figcaption class="figure-caption text-xs-right">
                        <a name="" id="" class="btn btn-outline-light btn-block " href="#" role="button"><i class="far fa-hand-point-right"></i> Detalhes</a>
                      </figcaption>
                    </figure>
                  </h3>
                </div>
                <div class="carrossel-item">
                    <h3>
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
    </section>
    <section class="section " id="assistencia" >
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-xl-5 col-12 p-5">
                    <h1 class="text-info"><b>Garanta a manutenção 
                        constante com a equipe
                        técnica <b>Hoken</b>.</b></h1>
                        <button class="btn btn-block btn-outline-info">
                            Solicitar Visita
                        </button>
                </div>
                <div class="col-lg-3 col-xl-4 col-12">
                    <img src="{{ asset('./imagens/icons-11.png')}}" class="img-fluid" alt="">
                </div>
            </div>
        </div>
        <div id="mapid"></div>
       

    </section>
    <section class="section " id="Contato" >
        
        <a href="https://api.whatsapp.com/send?phone=5517991080582&text=Ol%C3%A1%20Gostaria%20de%20solicitar%20atendimento." class="btn pulse-button "><i class="fab fa-whatsapp" width="50px"></i></a>

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
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 bg_Navyblue_2  p-4">
                        <h2 class="footer_title pt-4 text-center">CONTATO</h2>
                        <div class="footer_content">
                            <p class=""><a href=""><i class="fas fa-street-view"></i> Rua Doutor José Jorge Cury, 270 - São José do Rio Preto - SP<hr class="hr_footer"></a></p>
                            <p class=""><a href=""><i class="fas fa-phone"></i> 0800 701 13 15<hr class="hr_footer"></a></p>
                            <p class=""><a href=""><i class="fas fa-envelope"></i> contato@hoken.com.br<hr class="hr_footer"></a></p>
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
                <ul class="nav flex-column">
                    <li class="nav-item">
                      <a class="nav-link desable" href="#">2ª Via de Boleto</a>
                    </li>
                 
                    <li class="nav-item">
                        <a class="nav-link" href="#">SAC</a>
                      </li>
                    
                  </ul>
                  <div class="traigulo"></div>
        
            </div>

    </section>
</div>

@stop

@section('js')

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

    var mymap = L.map('mapid').setView([-20.838330, -49.350817], 20);

	L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
		maxZoom: 18,
		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
			'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
			'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		id: 'mapbox/streets-v11',
		tileSize: 512,
		zoomOffset: -1
	}).addTo(mymap);

    L.marker([-20.838330, -49.350817]).addTo(mymap);
      
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

