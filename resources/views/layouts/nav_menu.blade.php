{{-- Start Desktop Menu --}}

<div id="menu" class="row  d-none d-lg-block menu">
<div class="row  d-none  d-lg-block  alert-secondary  ">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <a href="http://" class="btn btn-flat btn-secondary float-left"><i class="fas fa-medal"></i> Politica de Qualidade</a>
                <a href="http://" class="btn btn-flat btn-success float-right"><i class="fas fa-store"></i> Seja Franqueado</a>
                
            </div>
        </div>
    </div>
</div>
<div class="row d-none d-lg-block alert-info p-3">
    <div class="container">
        <div class="row">
            <div class="col-md-2" ><img src="{{ asset(config('adminlte.logo_view'))}}" alt="Hoken" width="150px" class=" m-2" ></div>
            <div class="col-md-6" >
                <ul class=" nav m-2">
                <li class="nav-item btn-White"><a class="nav-link btn btn-link " href="{{ route("view.index")}}">Home</a></li>
                    <li class="nav-item btn-White"><a class="nav-link btn btn-link " href="{{ route("empresa.index")}}">Hoken</a></li>
                    <li class="nav-item btn-White" ><a id="btn-megameu" class="nav-link btn btn-link " href="">Produtos <i class="fas fa-caret-down"></i></a></li>
                    <li class="nav-item btn-White"><a class="nav-link btn btn-link " href="">Artigos</a></li>

                </ul>
            </div>
            <div class="col-md-4">
                <form>
                    <div class="input-group m-2">
                        <input type="text" class="form-control btn-search">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-icon"><i class="fas fa-search"></i></button>
                        </div>
                      </div>                    

                </form>
            
            </div>
        </div>
    </div>
</div>
<div id="megamenu" class="row d-none bg_Navyblue">
    <div class="container">
       <div class="row bg_Navyblue">
        <div class="col-lg-12">
            <h4 class="text-center white m-2"> Produtos</h4>
        </div>
        <div class="col-lg-3 btn-megamenu text-center bg_Blue_2"> <a class="btn btn-white btn-link mt-4" href="http://"> <img src="{{ asset('imagens/icon_2.svg')}}" class="img-fluid" alt="icon-categoria-hoken" style=" height: 50px;"> Água Gelada e Quente</a></div>
        <div class="col-lg-3 btn-megamenu text-center bg_Blue_1"> <a class="btn btn-white btn-link mt-4" href="http://"> <img src="{{ asset('imagens/icon_3.svg')}}" class="img-fluid" alt="icon-categoria-hoken" style=" height: 50px;"> Água Gelada e Natural</a></div>
        <div class="col-lg-3 btn-megamenu text-center bg_Blue_1"> <a class="btn btn-white btn-link mt-4" href="http://"> <img src="{{ asset('imagens/icon_4.svg')}}" class="img-fluid" alt="icon-categoria-hoken" style=" height: 50px;"> Água Natural</a></div>
        <div class="col-lg-3 btn-megamenu text-center bg_Blue_2"> <a class="btn btn-white btn-link mt-4" href="http://"> <img src="{{ asset('imagens/icon_1.svg')}}" class="img-fluid" alt="icon-categoria-hoken" style=" height: 50px;"> Outros</a></div>
       </div>
    </div>
</div>
</div>

{{-- End Desktop Menu --}}
{{-- Start Mobile Menu --}}
<div class="row d-lg-none d-xl-none p-2 alert-info" >
    <div class="container-fluid ">
        <div class="row">
            <div class="col-8">
                <a href=""><img src="{{ asset(config('adminlte.logo_view'))}}" alt="Hoken" class=" m-1 img-fluid" ></a>
            </div>
            <div id="menu_moblie"  class="col-4 mt-2">
                <button id="menu_ope" class="btn float-right "><i class="fas fa-bars"></i></button>
            </div>
        </div>
    </div>
</div>
<div id="menu_sider"class="fixed-top d-lg-none d-xl-none menu_bg">
<div class="row d-lg-none d-xl-none p-2 alert-info" >
    <div class="container-fluid ">
        <div class="row">
            <div class="col-8">
                <a href=""><img src="{{ asset(config('adminlte.logo_view'))}}" alt="Hoken" class=" m-1 img-fluid" ></a>
            </div>
            <div id="menu_moblie"  class="col-4 mt-0">
                <button id="menu_close" class="btn float-right "><i class="fas fa-times"></i></button>
            </div>
        </div>
    </div>
</div>
<div class="row bg_Navyblue megamenu_moblie">
    <div class="col-12"><h2 class="text-center white">Produtos</h2></div>
    <div class="col-3 text-center bg_Blue_2"> <a class="btn btn-white btn-link mt-4" href="{{ route("view.index")}}"> <img src="{{ asset('imagens/icon_2.svg')}}" class="img-fluid" alt="Água Gelada e Quente" style=" height: 50px;"></a></div>
    <div class="col-3 text-center bg_Blue_1"> <a class="btn btn-white btn-link mt-4" href="{{ route("view.index")}}"> <img src="{{ asset('imagens/icon_3.svg')}}" class="img-fluid" alt="Água Gelada e Natural" style=" height: 50px;"></a></div>
    <div class="col-3 text-center bg_Blue_2"> <a class="btn btn-white btn-link mt-4" href="{{ route("view.index")}}"> <img src="{{ asset('imagens/icon_4.svg')}}" class="img-fluid" alt="Água Natural" style=" height: 50px;"></a></div>
    <div class="col-3 text-center bg_Blue_1"> <a class="btn btn-white btn-link mt-4" href="{{ route("view.index")}}"> <img src="{{ asset('imagens/icon_1.svg')}}" class="img-fluid" alt="Outros" style=" height: 50px;"></a></div>
</div>
<div id="menu-list-moblie" class="row moblile-Menu">
    <ul class="nav flex-column col-12">
        <li class="nav-item">
          <a class="nav-link active" href="{{ route("view.index")}}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route("empresa.index")}}">Hoken</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route("blog.index")}}">Artigos</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route("politicadequalidade.index")}}">Politica de Qualidade</a>
        </li>
        <li class="nav-item ">
            <form class="">
                <div class="input-group m-2">
                    <input type="text" class="form-control btn-search-moblie">
                    <div class="input-group-append">
                    <button type="submit" class="btn btn-icon-moblie"><i class="fas fa-search"></i></button>
                    </div>
                  </div>                    

            </form>
        </li>
        

        <div id="footer_ocult" class="row  fixed-bottom">
            <ul class="nav flex-column">
                
            </ul>
            <a name="" id="" class="btn btn-block btn-success btn-lg" href="#" role="button">Seja Franquado</a>
            <div class="col-12 p-3 text-center" style="background: #000; " >
                <a class="social-facebook ml-3 " href="https://www.facebook.com/hokenoficial" target="&quot;_blank&quot;"><i class="fab fa-facebook"></i></a>
                <a class="social-twitter ml-3 " href="https://twitter.com/hokenoficial" target="&quot;_blank&quot;"><i class="fab fa-twitter"></i></a>
                <a class="social-google-plus ml-3 " href="https://plus.google.com/+BlogHokenBrFranquia/videos" target="&quot;_blank&quot;"><i class="fab fa-google-plus-g"></i></a>
                <a class="social-linkedin ml-3 " href="https://www.linkedin.com/company/hoken-internacional-company" target="&quot;_blank&quot;"><i class="fab fa-linkedin"></i></a>
                <a class="social-youtube ml-3 " href="https://www.youtube.com/user/hokenoficial" target="&quot;_blank&quot;"><i class="fab fa-youtube"></i></a>
                <a class="social-instagram ml-3 " href="https://www.instagram.com/hokenoficial/" target="&quot;_blank&quot;"><i class="fab fa-instagram"></i></a>
                <a class="social-pinterest ml-3 " href="https://www.pinterest.com/hokenoficial/" target="&quot;_blank&quot;"><i class="fab fa-pinterest"></i></a></div>
            </div>
        </div>
      </ul>
</div>




</div>


{{-- End Mobile Menu --}}
