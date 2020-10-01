<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--end meta tags -->
    <link rel="shortcut icon" href="./assets/images/favicon.ico">
    <title>Lavateria by Clean For - A Franquia de limpeza de estofados</title>
    <!-- <link href="https://fonts.googleapis.com/css?family=Oswald&display=swap" rel="stylesheet"> -->
    <link href="https://fonts.googleapis.com/css?family=Dosis|Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


    <link rel="stylesheet" href="./plugins/animate/animate.css">

        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/animate.css">
        <link rel="stylesheet" href="css/slick.css" type="text/css"/>
        <link rel="stylesheet" href="css/all.min.css" type="text/css">
        <link rel="stylesheet" href="js/fancybox/jquery.fancybox.css?v=2.1.2" type="text/css"  media="screen" />
        <link rel="stylesheet" href="fonts/stylesheet.css" type="text/css"/>
        <link rel="stylesheet" href="css/jquery.custom-select.css" type="text/css">
        <link rel="stylesheet" href="css/main.css" type="text/css">
        <link rel="stylesheet" href="./plugins/materialize/css/materialize.css">
        
</head>
<body>
        <input id="check-form" type="checkbox" class="hidden">
        <input id="check-popup-ligue" type="checkbox" class="hidden">
        <input id="check-popup-exit" type="checkbox" class="hidden">
        <input id="check-popup-after" type="checkbox" class="hidden">
        <div class="content">
            <main>
                <a href="index.php" title="Uma franquia de lavanderia para roupas domésticas" class="logo wow slideInDwon">
                    <img src="images/logo.png" alt="Uma franquia de lavanderia para roupas domésticas" title="Uma franquia de lavanderia para roupas domésticas">
                </a>
                <section id="banner" class="display-flex flex-start block-sm text-left parallax" style="padding-top:-30px">
                    <div class="col-md-7 pd60">
                        <h1 class="titulo-principal wow fadeInUp " data-wow-offset="0"><strong >MUDE DE VIDA JÀ!<BR>
                        INVISTA EM VOCÊ. </strong><span> CONHEÇA NOSSA MICRO FRANQUIA E SEJA DONO DO SEU PRÓPRIO NEGÓCIO!! </span></strong></h1>
                        <br class="hidden-xs">
                        <h2 class="fz18 branco wow fadeInUp sub-title" data-wow-delay=".3s" data-wow-offset="0"><i class="glyphicon glyphicon-ok"></i> <strong>SEM BUROCRACIA,</strong><br><i class="glyphicon glyphicon-ok"></i> <strong>SEM COBRANÇA DE ROYALTS, </strong><br>
                        <i class="glyphicon glyphicon-ok"></i> <strong>BAIXOS CUSTO COM  TAXA DE FRANQUIA<br>  A PARTIR DE R$ 12.000,00</strong></h2>
                        <div class="wow fadeInUp mt60" data-wow-delay=".6s" data-wow-offset="0">
                            <label for="check-form" class="botao-principal hidden-sm hidden-xs">Baixar Apresentação</label>
                        </div>
                    </div>

                    <div id="mobile-form" class="bg-branco z2 rel pd30 bdr box-shadow mt30 visible-sm visible-xs">
                        <div class="etapa-form">
                            <div class="hidden-xs">
                                <p>Preencha o Formulário e Baixar nossa apresentação</p>
                                <br>
                            </div>
<!--                            Formulário Mobile-->
                            <form class="form row form-cadastro">
                                <div class="col-sm-12 form-item">
                                    <input type="hidden" name="origem" value="Landing">
                                    <input id="franqueado-nome" name="nome" type="text" placeholder="Ex: João Silva" required>
                                </div>
                                <div class="col-sm-12 form-item">
                                    <input id="franqueado-email" name="email" type="email" placeholder="Ex: joaosilva@gmail.com" required>
                                </div>
                                <div class="col-sm-12 form-item">
                                    <input id="franqueado-telefone" name="telefone" type="tel" placeholder="Ex: (17) 99191-9191" required>
                                </div>
                                <div class="col-sm-4 form-item">
                                    <label for="franqueado-telefone">Estado</label>
                                    <select class="form-control" name="uf" id="estado" required>
                                        <option>UF</option>
                                    </select>
                                </div>
                                <div class="col-sm-8 form-item">
                                    <label for="franqueado-telefone">Cidade</label>
                                    <select class="form-control" name="cidade" id="cidade" required>
                                        <option>Cidade</option>
                                    </select>
                                </div>
                                <div class="col-sm-12 form-item">
                                    <label for="franqueado-telefone">Capital Disponível</label>
                                    <input name="capital" type="text"  placeholder="Ex: 60.000,00" required>
                                </div>
                                <div class="col-sm-12 form-item pt0 text-center-sm">
                                    <div class="alert alert-success"></div>
                                    <div class="alert alert-danger"></div>
                                </div>
                                <div class="col-sm-12 form-item pt0 text-center-sm">
                                    <button class="botao-principal btn-block">Baixar Apresentação</button>
                                </div>
                            </form>
                        </div>
                        <div class="etapa-preenchido" style="display: none;">
                            <i class="fa fa-check-circle fz60 mb5 cor-positiva"></i>
                            <strong class="fonte-destaque fz24 display-block">Obrigado por se cadastrar!</strong>
                            <p>Em breve você receberá um e-mail com novas instruções para se tornar um representante Lavateria.</p>
                        </div>

                    </div>
                    <a href="#quem-somos" class="seta-banner hidden-sm hidden-xs fonte-destaque light lts2 fz12 uppercase text-nowrap text-center"><i class="fa fa-arrow-circle-o-down"></i></a>
                </section>

                <div class="topo-mobile z3 display-flex flex-space-between pd15 bg-primario branco hidden-lg hidden-md">
                    <h3 class="fonte-destaque fz18">Se interessou pela franquia Lavateria?</h3>
                    <a href="#mobile-form" class="botao-principal menor branco m0" title="Baixar apresentação">Baixar apresentação</a>
                </div>

                <section id="quem-somos" class="bg-neutro">
                    <h2 class="titulo-principal bold wow fadeInUp"><strong style="color: #0c3157">Quem Somos</strong></h2>
                    <div class="row display-flex flex-reverse block-md">
                        <div class="col-lg-6 text-left text-center-md">
                            <div class="rel z1">
                                <div class="wow fadeInRight">
                                    <h4 class="bold uppercase"></h4>
                                    <p style="text-align: justify; text-justify: inter-word;">A <b>LAVATERIA</b> nasceu através da visão empreendedora do seu fundador Leandro Silva, quando precisou utilizar os serviços de uma lavanderia.<br>
                                        Descobriu que o mercado é carente deste tipo de serviço e que a mão-de-obra é muito deficitária. Aprofundando um pouco mais sobre o segmento, descobriu também, que a demanda é maior que a oferta, pois o Brasil, passa por uma mudança de conceito na terceirização dos afazeres domésticos.<br>
                                        Com isso identificou uma grande oportunidade em facilitar o dia-a-dia das pessoas, gerando conforto, praticidade, comodidade e mais importante: <b>“RENDA RECORRENTE”</b> aos investidores deste segmento!!!</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 z2 wow fadeInLeft">
                            <img src="images/img_quem_somos.jpg" alt="Produtos de qualidade que irão te levar ao sucesso!" title="Produtos de qualidade que irão te levar ao sucesso!" class="img-centro">
                        </div>
                    </div>
                    <div class="wow fadeIn mt60">
                        <label for="check-form" class="botao-principal inverso hidden-sm hidden-xs mb0" title="Baixar nossa apresentação">Baixar Apresentação</label>
                        <a href="#mobile-form" class="botao-principal inverso hidden-md hidden-lg m0" title="Baixar nossa apresentação">Baixar Apresentação</a>
                    </div>
                </section>

                <!-- <section id="mercado" class="branco">
                    <h2 class="titulo-principal wow fadeInUp">AS VANTAGENS DO<strong style="color: #0c3157">MERCADO</strong></h2><br>
                     <div class="row">
                        <div class="col-md-8 col-md-offset-2 wow fadeInUp">
                            <p>O mercado de  limpeza vem crescendo e não é difícil entender o porquê. Segundo pequisa, 70 milhões de pessoas fazem parte do nosso grupo economicamente ativo no Brasil, ou seja, algo em torno de 3,5 milhões de pessoas que utilizam serviços de limpeza e higienização diariamente.<br>
                                Para atender esse pessoal, atualmente no Brasil, gira um faturamento de mais de 6,7 bilhões.<br>
                                Mas olha só que curioso, ainda segundo pequisa, está previsto um crescimento de 20% nos números de clientes que precisarão de lavanderias nos próximos 5 anos, ou seja, se fosse hoje não teríamos mão de obra suficiente para atender essa galera toda.</p>
                        </div>
                    </div>
                </section> -->

                <section id="franquias">
                  <div class="row p30">
                    <h2 class="titulo-principal wow fadeInUp">CONHEÇA O MÉTODO <strong style="color: #0c3157"><img src="images/logo-blue.png" alt="" width="200px"></strong></h2>
                    <br>
                    <div class="row">
                      <div class="col-lg-6"><img src="./images/home-servicos-back.jpg" alt="sofa-lavateria-cleanfor" class="img-responsive"></div>
                      <div class="col-lg-6">
                      <div class="panel panel-default">
                        <div class="panel-heading text-left  blue lighten-3 branco" role="tab" id="headingOne">
                            <h4 class="panel-title ">
                                <a role="button" class="fz20" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <i class="fas fas fa-check  "></i> Limpeza 
                                </a>
                            </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                            <div class="panel-body">
                            O serviço de limpeza de tapetes é especifico para cada tipo. Com técnicas apropriadas podemos fazer a limpeza em todos os tipos de tapetes e carpetes.                            </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading text-left blue lighten-3 branco" role="tab" id="headingTwo">
                                <h4 class="panel-title">
                                    <a class="collapsed fz20"  role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"><i class="fas fas fa-check "></i>Higienização</a>
                                </h4>
                                </div>
                                <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                <div class="panel-body"> A limpeza é feita em domicílio, promovendo a higienização e o controle microbiológico de ácaros e bactérias, além da retirada de manchas.
                                </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading text-left blue lighten-3 branco" role="tab" id="headingtree">
                                <h4 class="panel-title">
                                    <a class="collapsed fz20"  role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseTwo"><i class="fas fas fa-check "></i>Impermeabilização</a>
                                </h4>
                                </div>
                                <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingtree">
                                <div class="panel-body">A impermeabilização protege seus móveis estofados e cadeiras. Dificulta a penetração de líquidos e gorduras no tecido, elevando sua vida útil.

                                </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading text-left blue lighten-3 branco" role="tab" id="headingFor">
                                <h4 class="panel-title">
                                    <a class="collapsed fz20"  role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFor" aria-expanded="false" aria-controls="collapseTwo"><i class="fas fas fa-check "></i>Hidratação</a>
                                </h4>
                                </div>
                                <div id="collapseFor" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFor">
                                <div class="panel-body">A Limpeza com produto específico, sem risco de ressecamento, e já limpo é aplicado o hidratante para garantir a maciez e a elasticidade do couro, e efeito antiderrapante.


                                </div>
                                </div>
                            </div>

                        </div>
                       
                        </div>
                     
                      
                    </div> 
                    </div>
                      </section>
                    <section id="atuacao" class="branco">
                    <div class="row p30">
                      <h2 class="titulo-principal wow fadeInUp" style="color: #fff">ÁREA DE ATUAÇÃO<strong style="color: #fff">Franqueado</strong></h2>

                      
                      <div class="col s12 m12 l4 card card-atuacao light-blue darken-4">
                        <div class="card-content">
                        <i class="material-icons fz60">house</i>
                        <h3 class="branco"> Residências</h3>
                        <p>Limpeza de carpetes, tapetes, estofados, higienização de colchões, impermeabilização de tecidos, hidratação em couro.</p>
                        </div>
                      </div>

                      <div class="col s12 m12 l4 card card-atuacao light-blue darken-4">
                      <div class="card-content">
                        <i class="material-icons fz60">apartment</i>
                        <h3 class="branco">Empresas</h3>
                        <p>Higienização de tapetes, carpetes e interna automotiva, higienização e hidratação de sofá e impermeabilização de estofados.</p>
                        </div>
                      </div>

                      <div class="col s12 m12 l4 card  card-atuacao light-blue darken-4">
                        <div class="card-content">
                        <i class="material-icons fz60">directions_car</i>
                        <h3  class="branco"> Veículos</h3>
                        <p>Hidratação de bancos em couro, impermeabilização de bancos em tecido, higienização de teto automotivo.</p>
                      </div>
                      </div>
                      
                    </div>
                    </section>
                    <section id="franquias">

                    <div class="row p30">
                      <h4>TRABALHOS OFERECIDOS:</h4>
                        <ul class="carousel">
                          <li class="carousel-item"><img src="./images/servicos/carpete.png"><h5><b>Carpetes (m<sup>2)</b></sup></h5></li>
                          <li class="carousel-item"><img src="./images/servicos/tapete.png"><h5><b>Tapetes (m<sup>2)</b></sup></h5></li>
                          <li class="carousel-item"><img src="./images/servicos/assento.png"><h5><b>Veículos</b></h5></li>
                          <li class="carousel-item"><img src="./images/servicos/sofa.png"><h5><b>Estofados</b></h5></li>
                          <li class="carousel-item"><img src="./images/servicos/colchao.png"><h5><b>Colchões</b></h5></li>
                          <li class="carousel-item"><img src="./images/servicos/cadeira.png"><h5><b>Cadeiras</b></h5></li>
                        </ul>
                      
                        <p>*Documentos originais para comprovação dos serviços realizados.</p>

                    </div>                  
                </section>
                <section id="retorno" class="branco container-fluid">
                <h2 class="titulo-principal wow fadeInUp">BAIXO CUSTO DE INVESTIMENTO FRANQUIA A PARTIR DE <b> R$ 12.000,00</b> <strong style="color: #0c3157">RAPIDO RETORNO a partir do *6º MÊS</strong></h2>
                <div class="mt30 wow fadeInUp delay-1s">
                        <label for="check-form" class="botao-principal hidden-sm hidden-xs mb0" title="Baixar nossa apresentação">Baixar Apresentação</label>
                        <a href="#mobile-form" class="botao-principal hidden-md hidden-lg m0" title="Baixar nossa apresentação">Baixar Apresentação</a>
                    </div> 
              </section>


                <section id="perfil">
                    <h2 class="titulo-principal wow fadeInUp">PERFIL DOS NOSSOS<strong style="color: #0c3157">FRANQUEADOS</strong></h2>
                    <br>
                    <div class="row">
                    <div class="col-lg-7 wow fadeInUp ativo delay-2s" style="visibility: visible; animation-name: fadeInUp;">
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                      
                      <ul class="collection animated ">
                        <li class="collection-item fz18 text-left"><i class="fas fas fa-check square-icon "></i> Não é necessário ter experiência no ramo;  </li>
                        <li class="collection-item fz18 text-left"><i class="fas fas fa-check square-icon"></i>  Perfil administrador;  </li>
                        <li class="collection-item fz18 text-left"><i class="fas fas fa-check square-icon"></i>  Dedicação e amor à franquia;  </li>
                        <li class="collection-item fz18 text-left"><i class="fas fas fa-check square-icon"></i>  Compromentimento para operar e gerir a franquia;  </li>
                        <li class="collection-item fz18 text-left"><i class="fas fas fa-check square-icon"></i> Perfil comercial para o trato com o público; </li>
                        <li class="collection-item fz18 text-left"><i class="fas fas fa-check square-icon"></i> Disponibilidade para atuar no negócio. </li>

                      </ul>    
                      
                    </div>
                    </div>
                    <div class="col-lg-5  wow fadeInUp ativo delay-1s" style="visibility: visible; animation-name: fadeInUp;"><img src="./images/page-image-servicos.jpg" alt="Clear For"  style="padding-top:7px;"class="img-responsive"></div>
                    <div class="col-lg-12 ">
                    <div class="mt30 wow fadeInUp delay-3s">
                        <label for="check-form" class="botao-principal hidden-sm hidden-xs mb0" title="Baixar nossa apresentação">Baixar Apresentação</label>
                        <a href="#mobile-form" class="botao-principal hidden-md hidden-lg m0" title="Baixar nossa apresentação">Baixar Apresentação</a>
                    </div>
                    </div>
                    </div>
                </section>



                <section id="clientes"  class="branco">
                    <h2 class="titulo-principal wow bounceIn"><strong style="color: #fff">Clientes e parceiros</strong></h2>
                    <ul class="carousel">
                          <li class="carousel-item"><img src="./images/clientes/clientes-Banco-Bradesco_220_220.png"></li>
                          <li class="carousel-item"><img src="./images/clientes/clientes-Melissa_220_220.png"></li>
                          <li class="carousel-item"><img src="./images/clientes/clientes-Banco-Santander_220_220.png"></li>
                          <li class="carousel-item"><img src="./images/clientes/clientes-Shopping-Curitiba_220_220 (1).png"></li>
                          <li class="carousel-item"><img src="./images/clientes/clientes-Shopping-Patio-Batel_220_220.png"></li>
                        </ul>
                        <div class="mt30 wow fadeInUp delay-1s">
                        <label for="check-form" class="botao-principal hidden-sm hidden-xs mb0" title="Baixar nossa apresentação">Baixar Apresentação</label>
                        <a href="#mobile-form" class="botao-principal hidden-md hidden-lg m0" title="Baixar nossa apresentação">Baixar Apresentação</a>
                    </div>
                </section>

                <footer class="text-center fz14" style="color: #fff !important;">
                <div class="row">
                <div style="width: 40%; margin-left: 30%; margin-top: 30px;"> 
                <div class="col-4 col-lg-4 col-md-4 col-xs-12 col-sm-12">
                    <a href="https://www.facebook.com/lavanderialavateria/" target="_blank">
                        <div style="max-width: 25px; margin: auto;">    
                            <svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="facebook-f" class="svg-inline--fa fa-facebook-f fa-w-10" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path fill="white" d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z"></path></svg>
                        </div>
                    </a>
                </div>

                <div class="col-4 col-lg-4 col-md-4 col-xs-12 col-sm-12">
                    <a href="https://www.instagram.com/lavateriaoficial/" target="_blank">
                        <div style="max-width: 25px; margin: auto;">    
                            <svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="instagram" class="svg-inline--fa fa-instagram fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="white" d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"></path></svg>
                        </div>
                    </a>
                </div>

                <div class="col-4 col-lg-4 col-md-4 col-xs-12 col-sm-12">
                    <a href="https://www.youtube.com/channel/UCZYvD_VBPwCwx2Gx309xO8w" target="_blank">
                        <div style="max-width: 25px; margin: auto;">   
                            <svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="youtube" class="svg-inline--fa fa-youtube fa-w-18" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="white" d="M549.655 124.083c-6.281-23.65-24.787-42.276-48.284-48.597C458.781 64 288 64 288 64S117.22 64 74.629 75.486c-23.497 6.322-42.003 24.947-48.284 48.597-11.412 42.867-11.412 132.305-11.412 132.305s0 89.438 11.412 132.305c6.281 23.65 24.787 41.5 48.284 47.821C117.22 448 288 448 288 448s170.78 0 213.371-11.486c23.497-6.321 42.003-24.171 48.284-47.821 11.412-42.867 11.412-132.305 11.412-132.305s0-89.438-11.412-132.305zm-317.51 213.508V175.185l142.739 81.205-142.739 81.201z"></path></svg>
                  
                        </div>
                    </a>
                </div>
                </div>
                
                    </div>
<div class="row"> 
                    <h6 class="p30 display-block ">Lavateria &COPY; 2019 - <strong>CNPJ:</strong> 04.629.494/0001-29 - <strong>TELEFONE:</strong> (17) 3235-6339 <br> AV. ADOLFO LUTZ, 316 - SANTA CRUZ - SÃO JOSÉ DO RIO PRETO-SP</h6>
                </div></footer>
            </main>
            <aside class="side-form display-flex text-center hidden-xs hidden-sm">
                <label for="check-form" class="close"><i class="fa fa-times"></i></label>
                <div class="content">
                    <div>
                        <div class="etapa-form">
                            <h3 class="sub-titulo-principal menor fz22">Seja um franqueado de <b>SUCESSO</b><br><img src="images/logo-blue.png" alt="" width="200px"></h3>
                            <form class="form row form-cadastro">
                                <div class="col-sm-12 form-item">
                                    <input type="hidden" name="origem" value="Landing">
                                    <input id="franqueado-nome" name="nome" type="text" placeholder="Nome: João Silva" required>
                                </div>
                                <div class="col-sm-12 form-item">
                                    <input id="franqueado-email" name="email" type="email" placeholder="E-mail: joaosilva@gmail.com" required>
                                </div>
                                <div class="col-sm-12 form-item">
                                    <input id="franqueado-telefone" name="telefone" type="tel" placeholder="Telefone: (17) 99191-9191" required>
                                </div>
                                <div class="col-sm-4 form-item">
                                    <label for="franqueado-telefone">Estado</label>
                                    <select class="form-control" name="uf" id="estado2" required>
                                        <option>UF</option>
                                    </select>
                                </div>
                                <div class="col-sm-8 form-item">
                                    <label for="franqueado-telefone">Cidade</label>
                                    <select class="form-control" name="cidade" id="cidade2" required>
                                        <option>Cidade</option>
                                    </select>
                                </div>
                                <div class="col-sm-12 form-item">
                                    <input name="capital" type="text" required placeholder="Capital Disponível Ex: R$ 60.000,00" required>
                                </div>
                                <div class="col-sm-12 form-item pt0 text-center-sm">
                                    <div class="alert alert-success"></div>
                                    <div class="alert alert-danger"></div>
                                </div>
                                <div class="col-sm-12 form-item pt0 text-center-sm">
                                    <button class="botao-principal btn-block green darken-1">Baixar Apresentação</button>
                              
                                </div>

                            </form>
                        </div>
                        <div class="etapa-preenchido" style="display: none">
                            <i class="fa fa-spinner-third fa-spin fz60 mb5 cor-primaria"></i>
                            <strong class="fonte-destaque fz24 display-block">Aguarde!</strong><br>
                            <p>Em breve você receberá um e-mail com novas instruções para adquirir uma franquia da Lavateria.</p>
                        </div>

                    </div>
                </div>
            </aside>
        </div>
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src="./plugins/materialize/js/materialize.js"></script>
        <script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
        <script type="text/javascript" src="js/jquery.easing.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.js"></script>
        <script type="text/javascript" src="js/slick.min.js"></script>
        <script type="text/javascript" src="js/fancybox/jquery.fancybox.js?v=2.1.2"></script>
        <script type="text/javascript" src="js/fancybox/helpers/jquery.fancybox-media.js?v=1.0.5"></script>
        <script type="text/javascript" src="js/jquery.sticky.js"></script>
        <script type="text/javascript" src="js/jquery.sticky-kit.min.js"></script>
        <script type="text/javascript" src="js/fontsmoothie.min.js"></script>
        <script type="text/javascript" src="js/jquery.maskedinput.min.js"></script>
        <script type="text/javascript" src="js/jquery.youtubebackground.js"></script>
        <script type="text/javascript" src="js/wow.min.js"></script>
        <script type="text/javascript" src="js/jquery.custom-select.js"></script>
        <script type="text/javascript" src="js/estados-cidades.js"></script>
        <script type="text/javascript" src="js/jquery.parallax.js"></script>
        <script src="./plugins/materialize/js/materialize.js"></script>

        <script type="text/javascript" src="js/main.js"></script>
        <script> $(document).ready(function(){
          $('.carousel').carousel();
        });</script>
      </body>
</html>