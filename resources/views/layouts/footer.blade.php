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
                <h2 class="footer_title pt-4 pl-3 text-center">ARTIGOS RECENTES</h2>
                <div class="footer_content">
                    <ul class="list-default" style="list-style: none;">
                        @isset($Post)
                        @foreach ($Post as $post_item)
                        <li><a href="{{route('post.show', $post_item->id ) }}"><p>{{$post_item->post_title}} <br>
                        @php
                         $ymd = DateTime::createFromFormat('Y-m-d', $post_item->post_data)->format('d-m-yy');
                        @endphp
                        Postado em {!! $ymd !!}
                        </p></a></li>
                        <hr class="hr_footer"> 
                            
                        @endforeach
                    @endisset
                        
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
