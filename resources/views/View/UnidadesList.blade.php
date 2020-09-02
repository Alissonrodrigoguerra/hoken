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
    <div id="sidebar_left" class="col-xl-3 col-lg-3 col-12 text-left">
     <ul>
       <h1  class="title">Franquias</h1>
      <li></li>
      <li>
      {!! Form::open('#') !!}
      {!! Form::text('pesquisa_unidade', 'Encontre a cidade mais próxima',)->placeholder('Digite sua cidade') !!} 
      
      </li>
      @isset($Estados)
      <li>
        {!! Form::select('estado', 'Pesquise por estado')->options($Estados->prepend('Escolha seu estado'), 'nome' ,'uf') !!}
      </li>
      @endisset  
      </ul>
    </div>
      
      {!! Form::close() !!}
      
    <div class="col-xl-9 col-lg-9 col-12 ">
      <div class="row ml-5">
        @isset($unidadesa)
        <div id="accordianId" role="tablist" aria-multiselectable="true">
        <div class="accordion" id="accordionExample">
        <div class="row">
        @foreach ($unidades as $item)
          <div class="card ">
            <div class="card-header" id="headingOne">
              <h2 class="mb-0">
              <button class="btn text-info btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne{{$item->id}}" aria-expanded="true" aria-controls="collapseOne"><i class="fas fa-street-view"></i>&nbsp;&nbsp;<b>{{$item->nome}}</b></button>
              </h2>
            </div>
        
            <div id="collapseOne{{$item->id}}" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
              <div class="card-body">
                <p style='text-align: left'>
                  <span if="endereco">{{$item->Rua}}, {{$item->Numero}}</span><br>
                  <span if="bairro">Bairro: {{$item->Bairro}}</span><br>
                  <span if="cidade">Cidade: {{$item->cidade}}</span><br>
                  <span if="cep">CEP: {{$item->CEP}}</span><br>
                  <span if="telefone">Telefone(s): {{$item->Telefone}}| <a href='https://api.whatsapp.com/send?phone={{$item->Whatsapp}}&text=Ol%C3%A1%20tudo%20bem%20gostaria%20de%20saber%20mais%20sobre%20os%20produtos%20Hoken.'><i class='fab fa-whatsapp'></i> 17 9.8118.2036</a></span><br>
                  <span if="email">E-mail:  <a href='mailto:{{$item->email}}?subject=Hoken 995'>{{$item->email}}><br></span><br>
                  <span if="unidade"><a href='{{ route('exibir.unidade', $item->id)}}' class='btn btn-block btn-info' >site</a></p>
              </div>
            </div>
          </div>
        </div>
        @endforeach
        </div>
      </div>
      @endisset
      <div id="msg">
       <div class="btn btn-outline-secondary  disabled " role="alert"><strong> Ops, Nenhuma unidade foi encotrada, tente novamente!</strong></div>
      </div>
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
   $('#msg').hide();
   $('#inp-pesquisa_unidade').mouseleave(function (e) { 
    e.preventDefault();
    var url = "{{ route('pesquisa.unidade')}}";
    var pesquisa = $('#inp-pesquisa_unidade').val();
    var token = $('input[name=_token]').val();  
    var pesquisa = {
      pesquisa : pesquisa,
      _token: token 
    }

    $.ajax({
      type: "post",
      url: url,
      data: pesquisa,
      success: function (data){
        if (data[0]) {
            //alert(data[1]);
            

        } else{
          $('#msg').show();
          setTimeout(function(){
            $('#msg').hide();
          },'2000');
        }

       }
    });
   
    });

  
  


var mymap = L.map('mapid').setView([-20.838330, -49.350817], 4);

	L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
		maxZoom: 18,
		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
			'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
			'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		id: 'mapbox/streets-v11',
		tileSize: 512,
		zoomOffset: -1
	}).addTo(mymap);

  
   
</script>

@isset($unidades)
@foreach ($unidades as $item)
<script>
    var longitude = {{$item->longitude}}
    var latitude = {{$item->latitude}}
  	L.marker([longitude, latitude]).addTo(mymap).bindPopup("<p style='text-align: left'><span if='endereco'>{{$item->Rua}}, {{$item->Numero}}</span><br><span if='bairro'>Bairro: {{$item->Bairro}}</span><br><span if='cidade'>Cidade: {{$item->cidade}}</span><br><span if='cep'>CEP: {{$item->CEP}}</span><br><span if='telefone'>Telefone(s): {{$item->Telefone}}| <a href='https://api.whatsapp.com/send?phone={{$item->Whatsapp}}&text=Ol%C3%A1%20tudo%20bem%20gostaria%20de%20saber%20mais%20sobre%20os%20produtos%20Hoken.'><i class='fab fa-whatsapp'></i> 17 9.8118.2036</a></span><br><span if='email'>E-mail:  <a href='mailto:{{$item->email}}?subject=Hoken 995'>{{$item->email}}><br></span><br><span if='unidade'><a href='{{ route('exibir.unidade', $item->id)}}' class='btn btn-block btn-info' >site</a></p>").closePopup();
</script>
@endforeach
@endisset
@stop

@if(empty($unidades[0]))
<script>

setTimeout(function () {
  document.location.href = '{{ route("lista.unidade")}}'; //will redirect to your blog page (an ex: blog.html)
    }, 1000); //will call the function after 2 secs.
</script>
@endif

