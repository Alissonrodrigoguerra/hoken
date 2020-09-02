@extends('adminlte::page')

@inject('layoutHelper', \JeroenNoten\LaravelAdminLte\Helpers\LayoutHelper)
 
@section('css')  
<link rel="stylesheet" href="{{ url('css/custom.css')}}">

@stop()


@section('body')

@include('layouts.nav_menu')


<div id="mapid"></div>


 <div id="sidebar_float" class="container pt-5 pb-5">
  <div class="row">
    <div id="sidebar_left" class="col-xl-3 col-lg-3 col-12 text-left">
     <ul>
       <h1  class="title">Franquias</h1>
      <li></li>
      <li>
      {!! Form::open()->id('formulario') !!}
      {!! Form::text('pesquisa_unidade', 'Encontre a cidade mais próxima',)->placeholder('Digite sua cidade') !!} 
      
      </li>
      @isset($Estados)
      <li>
        {!! Form::select('estado', 'Pesquise por estado')->options($Estados->prepend('Escolha seu estado'), 'nome' ,'uf') !!}
      </li>
      {!! Form::submit('submit', 'Pesquisar') !!}
      @endisset  
      </ul>
    </div>
      
      {!! Form::close() !!}
      
    <div class="col-xl-9 col-lg-9 col-12 ">
      <div class="row ml-5">
        @isset($unidadesa)
       
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
  
   $('#formulario').submit(function (e) { 
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
      success: function (data[0]){
        if (data[0]) {
            //alert(data[1]);
            unidade_marker_icon(data[0]);
            $.each( data, function( key, value ) {
              alert( key + ": " + value['nome'] );
            });
        } else{
          $('#msg').show();
          setTimeout(function(){
            $('#msg').hide();
          },'2000');
        }

       }
    });
   
    });

<<<<<<< HEAD
  
=======
    // $('select').change(function (e) { 
    // e.preventDefault();
    
    // var url = "{{ route('pesquisa.unidade')}}";
    // var estado = $('select[name="estado"]').val();
    // var token = $('input[name=_token]').val();  
    // var pesquisa = {
    //   estado : estado,
    //   _token: token 
    // }
    // $.ajax({
    //   type: "post",
    //   url: url,
    //   data: pesquisa,
    //   success: function (data){
    //     if (data[0]) {
    //         unidade_marker(data[0]);
    //         unidade_marker_icon(data[0]);
    //     } else{
    //       $('#msg').show();
    //       setTimeout(function(){
    //         $('#msg').hide();
    //       },'2000');
    //     }

    //    }
    // });
   
    // });
>>>>>>> 57c7ad8c57f68c1695a1d94d91f0587bd10df74b
  


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

  
  L.marker([1, 2]).addTo(mymap).bindPopup('');

  function unidade_marker_icon(data){
    $.each( data, function( key, value ) {
      L.marker([1, 2]).addTo(mymap).bindPopup('');
      var longitude = value["longitude"]
      var latitude = value["latitude"]

  	L.marker([longitude, latitude]).addTo(mymap).bindPopup("<p style='text-align: left'><span if='endereco'>"+value['Rua']+","+value['Numero']+"</span><br><span if='bairro'>Bairro: "+value['Bairro']+"</span><br><span if='cidade'>Cidade: "+value['cidade']+"</span><br><span if='cep'>CEP: "+value['CEP']+"</span><br><span if='telefone'>Telefone(s): "+value['Telefone']+" | <a href='https://api.whatsapp.com/send?phone="+value['Whatsapp']+"&text=Ol%C3%A1%20tudo%20bem%20gostaria%20de%20saber%20mais%20sobre%20os%20produtos%20Hoken.'><i class='fab fa-whatsapp'></i> "+value['Whatsapp']+"</a></span><br><span if='email'>E-mail:  <a href='mailto:"+value['email']+"?subject=Hoken 995'>"+value['email']+"><br></span><br><span if='unidade'><a href='{{ route('exibir.unidade', "+value['id']+")}}' class='btn btn-block btn-info' >site</a></p>").closePopup();

    });
  }

</script>

{{-- @isset($unidades)
@foreach ($unidades as $item ?? '')
<script>
    var longitude = 3
    var latitude = 3
  	L.marker([longitude, latitude]).addTo(mymap).bindPopup("<p style='text-align: left'><span if='endereco'>{{$item ?? ''->Rua}}, {{$item ?? ''->Numero}}</span><br><span if='bairro'>Bairro: {{$item ?? ''->Bairro}}</span><br><span if='cidade'>Cidade: {{$item ?? ''->cidade}}</span><br><span if='cep'>CEP: {{$item ?? ''->CEP}}</span><br><span if='telefone'>Telefone(s): {{$item ?? ''->Telefone}}| <a href='https://api.whatsapp.com/send?phone={{$item ?? ''->Whatsapp}}&text=Ol%C3%A1%20tudo%20bem%20gostaria%20de%20saber%20mais%20sobre%20os%20produtos%20Hoken.'><i class='fab fa-whatsapp'></i> 17 9.8118.2036</a></span><br><span if='email'>E-mail:  <a href='mailto:{{$item ?? ''->email}}?subject=Hoken 995'>{{$item ?? ''->email}}><br></span><br><span if='unidade'><a href='{{ route('exibir.unidade', $item ?? ''->id)}}' class='btn btn-block btn-info' >site</a></p>").closePopup();
</script>
@endforeach
@endisset --}}
@stop

@if(empty($unidades[0]))
<script>

setTimeout(function () {
  document.location.href = '{{ route("lista.unidade")}}'; //will redirect to your blog page (an ex: blog.html)
    }, 1000); //will call the function after 2 secs.
</script>
@endif

