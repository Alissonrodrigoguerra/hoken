@extends('adminlte::page')

@inject('layoutHelper', \JeroenNoten\LaravelAdminLte\Helpers\LayoutHelper)

@section('css')  
<link rel="stylesheet" href="{{ url('css/custom.css')}}">

@stop()


@section('body')

@include('layouts.nav_menu')


<div id="mapid"></div>
 <div class="container pt-5 pb-5">
  <div class="row">
    <div id="sidebar_left" class="col-xl-3 col-lg-3 col-12">
     <ul>
       <h1  class="title">Unidades</h1>
      <li></li>
      <li>
      {!! Form::open('#') !!}
      {!! Form::text('pesquisa_unidade',)->placeholder('Digite sua cidade') !!} 
      {!! Form::close() !!}
      </li>
      <li><a href="{{route('post.index')}}"></a></li>

       @isset($Categoria)
        @foreach ($Categoria as $categoria)
        <li>
          <a href="{{route('post.categoria', $categoria->id ) }}">{{$categoria->categoria_title }}</a>
        </li>
        @endforeach
       @endisset  
     </ul>
    </div>
    <div class="col-xl-9 col-lg-9 col-12">
      <div class="row">
        @isset($Post_List)
        @foreach ($Post_List as $post)
        <div class="box col-xl-4 col-lg-4 col-12 text-center">
          <figure class="figure">
            <img class="img-fluid" src="{{asset('storage/'. str_after($post->post_imagem, 'public/'))}}" alt="{{$post->post_title }} - Hoken">
            <figcaption class="figure-caption text-xs-right">
              <h1 style="color: #fff; font-size:20px; padding: 10px 0px;">{{$post->post_title }}</h1>
              
              <a class="btn btn-lg btn-sm btn-outline-light" href="{{route('post.show', $post->id ) }}"><i class="far fa-hand-point-right"></i>Ver detalhes</a>
            </figcaption>
          </figure>
        </div>
        @endforeach
      @endisset
      @if (empty($Post_List[0]))
        <div class="btn btn-outline-secondary  disabled " role="alert">
          <strong> Ops, Nenhum artigo cadastrado até o momento, tente novamente mais tarde!</strong>
        </div>
      @endif
      </div>
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


// $('.autoplay').slick({
//   slidesToShow: 3,
//   slidesToScroll: 1,
//   autoplay: true,
//   autoplaySpeed: 2000,
// });
var mymap = L.map('mapid').setView([-20.838330, -49.350817], 3);

	L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
		maxZoom: 18,
		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
			'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
			'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		id: 'mapbox/streets-v11',
		tileSize: 512,
		zoomOffset: -1
	}).addTo(mymap);

	L.marker([-20.838330, -49.350817]).addTo(mymap).bindPopup("<p style='text-align: left'>Endereço: Rua Cabral, 579<br>Bairro: Centro<br>Cidade: Marechal Cândido Rondon/PR<br>CEP: 85960-000<br>Telefone(s): (45) 3254-0780 | <a href='https://api.whatsapp.com/send?phone=5517981182036&text=Ol%C3%A1%20tudo%20bem%20gostaria%20de%20saber%20mais%20sobre%20os%20produtos%20Hoken.'><i class='fab fa-whatsapp'></i> 17 9.8118.2036</a><br>E-mail:  <a href='mailto:995@franquiahoken.com.br?subject=Hoken 995'>995@franquiahoken.com.br</a><br><br><a href='#unidade' class='btn btn-block btn-info' >site</a></p> ").closePopup();
	L.marker([-20.738430, -49.350817]).addTo(mymap).bindPopup("<p style='text-align: left'>Endereço: Rua Cabral, 579<br>Bairro: Centro<br>Cidade: Marechal Cândido Rondon/PR<br>CEP: 85960-000<br>Telefone(s): (45) 3254-0780 | <a href='https://api.whatsapp.com/send?phone=5517981182036&text=Ol%C3%A1%20tudo%20bem%20gostaria%20de%20saber%20mais%20sobre%20os%20produtos%20Hoken.'><i class='fab fa-whatsapp'></i> 17 9.8118.2036</a><br>E-mail:  <a href='mailto:995@franquiahoken.com.br?subject=Hoken 995'>995@franquiahoken.com.br</a><br><br><a href='#unidade' class='btn btn-block btn-info' >site</a></p> ").closePopup();
	L.marker([-20.638320, -49.350817]).addTo(mymap).bindPopup("<p style='text-align: left'>Endereço: Rua Cabral, 579<br>Bairro: Centro<br>Cidade: Marechal Cândido Rondon/PR<br>CEP: 85960-000<br>Telefone(s): (45) 3254-0780 | <a href='https://api.whatsapp.com/send?phone=5517981182036&text=Ol%C3%A1%20tudo%20bem%20gostaria%20de%20saber%20mais%20sobre%20os%20produtos%20Hoken.'><i class='fab fa-whatsapp'></i> 17 9.8118.2036</a><br>E-mail:  <a href='mailto:995@franquiahoken.com.br?subject=Hoken 995'>995@franquiahoken.com.br</a><br><br><a href='#unidade' class='btn btn-block btn-info' >site</a></p> ").closePopup();
	L.marker([-20.535330, -49.350817]).addTo(mymap).bindPopup("<p style='text-align: left'>Endereço: Rua Cabral, 579<br>Bairro: Centro<br>Cidade: Marechal Cândido Rondon/PR<br>CEP: 85960-000<br>Telefone(s): (45) 3254-0780 | <a href='https://api.whatsapp.com/send?phone=5517981182036&text=Ol%C3%A1%20tudo%20bem%20gostaria%20de%20saber%20mais%20sobre%20os%20produtos%20Hoken.'><i class='fab fa-whatsapp'></i> 17 9.8118.2036</a><br>E-mail:  <a href='mailto:995@franquiahoken.com.br?subject=Hoken 995'>995@franquiahoken.com.br</a><br><br><a href='#unidade' class='btn btn-block btn-info' >site</a></p> ").closePopup();

   
</script>

@stop
