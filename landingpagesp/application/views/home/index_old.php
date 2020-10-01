<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--end meta tags -->
    <link rel="shortcut icon" href="<?= base_url('./assets/src/');?>/assets/images/favicon.ico">
    <title>Lavateria by Clean For - A Franquia de limpeza de estofados</title>
    <!-- <link href="https://fonts.googleapis.com/css?family=Oswald&display=swap" rel="stylesheet"> -->
    <link href="https://fonts.googleapis.com/css?family=Dosis|Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


    <link rel="stylesheet" href="<?= base_url('./assets/src/');?>plugins/animate/animate.css">

        <link rel="stylesheet" href="<?= base_url('./assets/src/');?>css/bootstrap.css">
        <link rel="stylesheet" href="<?= base_url('./assets/src/');?>css/animate.css">
        <link rel="stylesheet" href="<?= base_url('./assets/src/');?>css/slick.css" type="text/css"/>
        <link rel="stylesheet" href="<?= base_url('./assets/src/');?>css/slick-theme.css" type="text/css"/>

        <link rel="stylesheet" href="<?= base_url('./assets/src/');?>css/all.min.css" type="text/css">
        <link rel="stylesheet" href="<?= base_url('./assets/src/');?>js/fancybox/Jquery.fancybox.css" type="text/css"  media="screen" />
        <link rel="stylesheet" href="<?= base_url('./assets/src/');?>fonts/stylesheet.css" type="text/css"/>
        <link rel="stylesheet" href="<?= base_url('./assets/src/');?>css/jquery.custom-select.css" type="text/css">
        <link rel="stylesheet" href="<?= base_url('./assets/src/');?>css/main.css" type="text/css">
        <link rel="stylesheet" href="<?= base_url('./assets/src/');?>/plugins/materialize/css/materialize.css">
        
</head>
<body>

        <input id="check-form" type="checkbox" class="hidden">
        <input id="check-popup-ligue" type="checkbox" class="hidden">
        <input id="check-popup-exit" type="checkbox" class="hidden">
        <input id="check-popup-after" type="checkbox" class="hidden">
        <div class="content">
            <main>
                <a href="index.php" title="Uma franquia de lavanderia para roupas domésticas" class="logo wow slideInDwon">
                    <img src="<?= base_url('./assets/src/');?>images/logo.png" alt="Uma franquia de lavanderia para roupas domésticas" title="Uma franquia de lavanderia para roupas domésticas">
                </a>
                <section id="banner" class="display-flex flex-start block-sm text-left parallax" style="padding-top:-30px">
                    <div class="col-md-6 pd60 up_title">
                        <h1 class="titulo-principal wow fadeInUp " data-wow-offset="0"><strong >O  JEITO FAST</strong><span>PARA LAVAR ROUPAS E FATURAR!</span></strong></h1>
                        <br class="hidden-xs">
                        <h2 class="fz20 branco wow fadeInUp sub-title" data-wow-delay=".3s" data-wow-offset="0"> <strong>Seja um franqueado de sucesso 
com ganhos expressivos.
<br>
Investimento total da franquia por apenas 39,9 Mil*</strong><br></h2>
<button id="open-modal" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" style="display:none;">Open Modal</button>

                        <div class="wow fadeInUp mt60" data-wow-delay=".6s" data-wow-offset="0">
                            <label for="check-form" class="botao-principal hidden-sm hidden-xs">Baixar Apresentação</label>
                        </div>
                    </div>
                    <div class="col-md-6 pd60 up_title">
                    <img src="<?= base_url('assets/src/images/leao_Lobo_Home.png');?> "class="img-responsive"  style="margin-top:-50px;" alt="Franqueado">
                    </div>

                    <div id="mobile-form" class="bg-branco z2 rel pd30 bdr box-shadow mt30 visible-sm visible-xs">
                        <div class="etapa-form">
                            <div class="hidden-xs">
                                <p>Preencha o Formulário e Baixar nossa apresentação</p>
                                <br>
                            </div>
<!--                            Formulário Mobile-->
                            <form class="form row form-cadastro" action="<?= base_url('Leads')?> method="post">
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
                                    <label for="franqueado-capital  ">Disponível</label>
                                    <select class="form-control" name="capital" id="capital" required>
                                        <option>Selecione um Valor</option>
                                        <option value="R$ 12.000,00 a R$ 20.000,00">R$ 12.000,00 a R$ 20.000,00</option>
                                        <option value="R$ 21.000,00 a R$ 30.000,00">R$ 21.000,00 a R$ 30.000,00</option>
                                        <option value="R$ 31.000,00 a R$ 40.000,00">R$ 31.000,00 a R$ 40.000,00</option>
                                        <option value="R$ 41.000,00 a R$ 50.000,00">R$ 41.000,00 a R$ 50.000,00</option>

                                    </select>
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
                       <!-- Modal Trigger -->

                </div>

                <section id="quem-somos" class="bg-neutro">
                    <h2 class="titulo-principal bold wow fadeInUp"><strong style="color: #0c3157">Quem Somos</strong></h2>
                    <div class="row display-flex flex-reverse block-md">
                        <div class="col-lg-6 text-left text-center-md">
                            <div class="rel z1">
                                <div class="wow fadeInRight">
                                    <h4 class="bold uppercase"></h4>
                                    <p style="text-align: justify; text-justify: inter-word;">
                                   </b><br/><br/>A Lavateria nasceu através de uma oportunidade identificada pelo nosso fundador Leandro Silva que em determinada ocasião precisou utilizar os serviços de lavanderia e identificou a escassez e ineficiência do mercado com custos elevadíssimos.</p>
                                    <p style="text-align: justify; text-justify: inter-word;">Percebendo isso, mergulhou neste modelo de negócio fazendo assim nascer a Lavateria Franchising. 
</p><p style="text-align: justify; text-justify: inter-word;">Meados de 2016, foi inaugurado a primeira unidade própria da na cidade de São José do Rio Preto - SP. Servindo como modelo operacional para criação dos padrões da marca. </p>
<p style="text-align: justify; text-justify: inter-word;">A intenção sempre foi em franquear a ideia. Por isso, essa unidade operou por mais de 01 ano antes de ser comercializada. A partir do final de 2017 começou a comercialização da marca. Atualmente estamos em 05 Estados com mais de 50 unidades, oferecendo: Comodidade, serviços de qualidade e preços honestos, e gerando renda aos nosso franqueados</p>                                    
</div>
                            </div>
                        </div>
                        <div class="col-lg-6 z2 wow fadeInLeft">
                              


                                <div class="quem_somos">
                                <div><img src="<?= base_url('assets/src/images/img_quem_somos_equipe.jpg');?>  " alt="Equipe Lavateria Franchising" /></div>
                                <div><img src="<?= base_url('assets/src/images/img_quem_somos_encontro.jpg');?>  " alt="Encontro Lavateria Franchising" /></div>
                                <div><img src="<?= base_url('assets/src/images/img_quem_somos.jpg');?>  " alt="Lavateria Franchising"/></div>
                                </div>

                        </div>
                    </div>
                    <div class="wow fadeIn mt60">
                        <label for="check-form" class="botao-principal inverso hidden-sm hidden-xs mb0" title="Baixar nossa apresentação">Baixar Apresentação</label>
                        <a href="#mobile-form" class="botao-principal inverso hidden-md hidden-lg m0" title="Baixar nossa apresentação">Baixar Apresentação</a>
                    </div>
                </section>

                <section id="mercado" class="branco">
                    <h2 class="titulo-principal wow fadeInUp">AS VANTAGENS DO<strong style="color: #0c3157">MERCADO</strong></h2><br>
                     <div class="row">
                        <div class="col-md-6 text-left wow fadeInUp">
                            <p>A Lavateria Fast, nasceu para facilitar a vida dos brasileiros. Com as mudanças de cultura que estamos constantemente passando, a maior demanda da população é a de serviços que sejam, rápidos, práticos, disponíveis a qualquer hora e custo acessível. Vejam como exemplo o crescimento dos aplicativos de delivery.</p>
                            <p>Fora isso, o crescimento de pessoas “single” quase dobrou nos últimos 10 anos. Atualmente estamos na casa de 30mi de pessoas. Pensando nisso, criamos esse modelo simples, barato, sem funcionários podendo ficar disponível 24 horas por dia, 7 dias da semana, disponibilizando acessibilidade na hora do cliente.
</p>

                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12 wow fadeInUp">
                            <img src="<?= base_url('assets/src/images/grafico.png');?>" alt="grafico">
                        </div>
                        <div class="col-md-12 mt30 wow fadeInUp delay-1s">
                        <h2 class="fz20">AGORA VOCÊ SE IMAGINA DONO DE UMA LAVANDEIRA?</h2>
                        <label for="check-form" class="botao-principal hidden-sm hidden-xs mb0" title="Baixar nossa apresentação">Baixar Apresentação</label>
                        <a href="#mobile-form" class="botao-principal hidden-md hidden-lg m0" title="Baixar nossa apresentação">Baixar Apresentação</a>

                        </div>
                    </div>
                </section>

                <section id="franquias">
                  <div class="row p30">
                    <h2 class="titulo-principal wow fadeInUp">CONHEÇA O MODELO  <strong style="color: #0c3157"><img src="<?= base_url('./assets/src/');?>images/logo-blue.png" alt="" width="200px"></strong></h2>
                    <br>
                    <h2 class=" titulo-principal fz20">A Lavateria Fast oferece um modelo de negócios compacto, proporcionando aos nossos clientes um atendimento de
Qualidade, com baixo custo e com muita eficiência. </h2>

<h2 class="fz20">Oferecemos aos nossos franqueados,  um sistema moderno possibilitando um funcionamento 24h por dia, 7 dias da semana
sem a necessidade de <u>FUNCIONÁRIOS</u> no local. </h2>
                    <div class="col-md-8 col-md-offset-2">

                    <div class="modelo_franquia">
                    <div><img src="<?= base_url('assets/src/images/CARROSSEL1.jpeg');?>  " alt="js" /></div>
                    <div><img src="<?= base_url('assets/src/images/CARROSSEL2.jpeg');?>  " alt="java" /></div>
                    <div><img src="<?= base_url('assets/src/images/CARROSSEL3.jpeg');?>  " alt="python"/></div>
                    </div>
                    </div>
                 </section>
                   
                 <section id="perfil" class="blue lighten-4 container-fluid ">
                
              <h2 class="titulo-principal wow fadeInUp">PERFIL DO  <strong style="color: #0c3157">FRANQUEADO</strong></h2>
              <div class="col-md-10 col-md-offset-1">
              <div class="col-md-6" style="color:#0d47a1;">
              <ul class="collection transparent " style="border: 1px solid #0d47a1 ;">
                <li class="collection-item text-left transparent"  style="border: 1px solid #0d47a1 ;"><i class="small material-icons">check</i><b>Não é necessário ter experiência no ramo;</b></li>
                <li class="collection-item text-left transparent"  style="border: 1px solid #0d47a1 ;"><i class="small material-icons">check</i><b>Perfil administrador;</b></li>
                <li class="collection-item text-left transparent"  style="border: 1px solid #0d47a1 ;"><i class="small material-icons">check</i><b>Dedicação e amor à franquia;</b></li>
                <li class="collection-item text-left transparent" style="border: 1px solid #0d47a1 ;"><i class="small material-icons">check</i> <b>Comprometimento para operar e gerir a franquia;</b></li>
                <li class="collection-item text-left transparent" style="border: 1px solid #0d47a1 ;"><i class="small material-icons">check</i> <b>Perfil comercial para o trato com o público;</b></li>
                <li class="collection-item text-left transparent" style="border: 1px solid #0d47a1 ;"><i class="small material-icons">check</i> <b>Disponibilidade para atuar no negócio.</b></li>
                </ul>
              </div>
              <div class="col-md-6">
              
                <img src="<?= base_url('assets/src/images/leao Lobo.png');?> " class="img-responsive" style="margin-top:-50px;" alt="Franqueado">
                </div>
                </div>
              </section>

                <section id="retorno" class="branco container-fluid">
                <h2 class="titulo-principal wow fadeInUp">BAIXO CUSTO DE INVESTIMENTO FRANQUIA A PARTIR DE <b> R$ 39.900,00</b> <strong style="color: #0c3157">RETORNO FAST a partir do *6º MÊS</strong></h2>
                <div class="mt30 wow fadeInUp delay-1s">
                        <label for="check-form" class="botao-principal hidden-sm hidden-xs mb0" title="Baixar nossa apresentação">Baixar Apresentação</label>
                        <a href="#mobile-form" class="botao-principal hidden-md hidden-lg m0" title="Baixar nossa apresentação">Baixar Apresentação</a>
                    </div> 
              </section>
              <section id="diferenciais" class="container-fluid ">
                
              <h2 class="titulo-principal wow fadeInUp">BAIXO CUSTO DE INVESTIMENTO FRANQUIA A PARTIR DE <b> R$ 39.900,00</b> <strong style="color: #0c3157">RETORNO FAST a partir do *6º MÊS</strong></h2><br><br>
              <div class="col-md-8 col-md-offset-2">
              <div class="col-lg-4 col-md-6 col-sm-4 col-xs-12 pd30 wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                            <div class="item-diferencial">
                                <i class="fas fas fa-check square-icon "></i>
                                <h3 class="fz14" style="color:#c00000"><b>Renda Recorrente</b></h3>
                            </div>
                        </div>   
                        <div class="col-lg-4 col-md-6 col-sm-4 col-xs-12 pd30 wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                            <div class="item-diferencial">
                                <i class="fas fas fa-check square-icon"></i>
                                <h3 class="fz14" style="color:#c00000"><b>Gerador de economia</b></h3>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 col-sm-4 col-xs-12 pd30 wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                            <div class="item-diferencial">
                                <i class="fas fas fa-check square-icon"></i>
                                <h3  class="fz14" style="color:#c00000"><b>Na Contra-Mão da Crise</b></h3>
                            </div>
                        </div>
              <div class="col-md-6">
              <ul class="collection">
                <li class="collection-item text-left fz18"><i class="small material-icons">check</i>Sem Funcionários</li>
                <li class="collection-item text-left fz18"><i class="small material-icons">check</i>Gerador de economia</li>
                <li class="collection-item text-left fz18"><i class="small material-icons">check</i>Mercado na contramão da crise</li>
                <li class="collection-item text-left fz18"><i class="small material-icons">check</i>Baixo custo operacional</li>
                <li class="collection-item text-left fz18"><i class="small material-icons">check</i>Poucos funcionários</li>

                </ul>
              </div>
              <div class="col-md-6">
              <ul class="collection">
                <li class="collection-item text-left"><i class="small material-icons">check</i>Rápido retorno de investimento</li>
                <li class="collection-item text-left"><i class="small material-icons">check</i>Sem estoque</li>
                <li class="collection-item text-left"><i class="small material-icons">check</i>Insumos exclusivos</li>
                <li class="collection-item text-left"><i class="small material-icons">check</i>CRM e aplicativo próprio </li>
                </ul>
                </div>
                </div>
              </section>

              <section id="retorno" class="branco container-fluid">
                <h2 class="titulo-principal wow fadeInUp">Números da  <strong style="color: #0c3157">Franquiadora</strong></h2>
                <div class="col-md-12">
                <div class="col-md-4">
                    <div class="card  blue darken-4 fadeInUp ">
                        <div class="card-content wow ">
                        <span class="counter fz48">100.000</span><br>
                        <span class=" fz18">Roupas lavadas por mês.</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card  blue darken-4 fadeInUp">
                        <div class="card-content wow ">
                        <span class="counter fz48">2.700</span><br>
                        <span class=" fz18">Clientes satisfeitos.</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card  blue darken-4 fadeInUp">
                        <div class="card-content wow ">
                        <span class="counter1 fz48">52</span><br>
                        <span class=" fz18">Franquias em todo Brazil.</span>
                        </div>
                    </div>
                </div>
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
                        <div class="etapa-form" action="<?= base_url('Leads')?> method="post">
                            <h3 class="sub-titulo-principal menor fz22">Seja um franqueado de <b>SUCESSO</b><br><img src="<?= base_url('./assets/src/');?>images/logo-blue.png" alt="" width="200px"></h3>
                            <form class="form row form-cadastro up_form">
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
                                    <label for="franqueado-capital  ">Disponível</label>
                                    <select class="form-control" name="capital" id="capital" required>
                                        <option>Selecione um Valor</option>
                                        <option value="R$ 12.000,00 a R$ 20.000,00">R$ 12.000,00 a R$ 20.000,00</option>
                                        <option value="R$ 21.000,00 a R$ 30.000,00">R$ 21.000,00 a R$ 30.000,00</option>
                                        <option value="R$ 31.000,00 a R$ 40.000,00">R$ 31.000,00 a R$ 40.000,00</option>
                                        <option value="R$ 41.000,00 a R$ 50.000,00">R$ 41.000,00 a R$ 50.000,00</option>

                                    </select>
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
        <script src="<?= base_url('./assets/src/');?>plugins/materialize/js/materialize.js"></script>
        <script type="text/javascript" src="<?= base_url('./assets/src/');?>js/jquery-1.11.0.min.js"></script>
        <script type="text/javascript" src="<?= base_url('./assets/src/');?>js/jquery.easing.min.js"></script>
        <script type="text/javascript" src="<?= base_url('./assets/src/');?>js/bootstrap.js"></script>
        <script type="text/javascript" src="<?= base_url('./assets/src/');?>js/slick.min.js"></script>
        <script type="text/javascript" src="<?= base_url('./assets/src/');?>js/fancybox/jquery.fancybox.js"></script>
        <script type="text/javascript" src="<?= base_url('./assets/src/');?>js/fancybox/helpers/jquery.fancybox-media.js"></script>
        <script type="text/javascript" src="<?= base_url('./assets/src/');?>js/jquery.sticky.js"></script>
        <script type="text/javascript" src="<?= base_url('./assets/src/');?>js/jquery.sticky-kit.min.js"></script>
        <script type="text/javascript" src="<?= base_url('./assets/src/');?>js/fontsmoothie.min.js"></script>
        <script type="text/javascript" src="<?= base_url('./assets/src/');?>js/jquery.maskedinput.min.js"></script>
        <script type="text/javascript" src="<?= base_url('./assets/src/');?>js/jquery.youtubebackground.js"></script>
        <script type="text/javascript" src="<?= base_url('./assets/src/');?>js/wow.min.js"></script>
        <script type="text/javascript" src="<?= base_url('./assets/src/');?>js/jquery.custom-select.js"></script>
        <script type="text/javascript" src="<?= base_url('./assets/src/');?>js/estados-cidades.js"></script>
        <script type="text/javascript" src="<?= base_url('./assets/src/');?>js/jquery.parallax.js"></script>
        <script type="text/javascript" src="<?= base_url('./assets/src/');?>plugins/materialize/js/materialize.js"></script>
        <script type="text/javascript" src="<?= base_url('./assets/src/');?>/js/waypoints.min.js"></script>
        <script type="text/javascript" src="<?= base_url('./assets/src/');?>/js/jquery.counterup.min.js"></script>
  
       <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
 
    <div class="modal-body">
    <video width="100%" height="auto" autoplay controls>
    <source src="<?= base_url('assets/src/VIDEOLAVATEERIAFAST.mp4'); ?>" type="video/mp4">
    <source src="<?= base_url('assets/src/VIDEOLAVATEERIAFAST.ogg'); ?>" type="video/ogg">
    </video>
</div>
    <div class="modal-footer center text-center">
          <button type="button" class="btn btn-default green center" data-dismiss="modal">Quero conhecer</button>
        </div>
  </div>
  
</div>
                

        <script> var url = "<?= base_url('leads-cadastrar');?>";</script>
        <script type="text/javascript" src="<?= base_url('./assets/src/');?>js/main.js"></script>
        <script>
        $('.modelo_franquia').slick({
        dots: true,
        arrows: false,
        infinite: true,
        speed: 500,
        slidesToShow: 1,
        slidesToScroll: 1,
        });
       
        $('.quem_somos').slick({
        dots: true,
        arrows: false,
        infinite: true,
        speed: 500,
        slidesToShow: 1,
        slidesToScroll: 1,
        });
        </script>
        <script>
        $('#collapseOne').collapse({ toggle: false});
        $('#collapseTwo').collapse({ toggle: true});
        $('#collapseThree').collapse({ toggle: true});
        $('#collapseFor').collapse({ toggle: true});

        $(function () {

        $('#open-modal').trigger('click');
        });
        </script>
      </body>
</html>