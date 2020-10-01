<?php 
/*<!-- /*tags uteis: Url Dir <?= base_url('assets/src/#')?> */
?>
<!doctype html>
<html lang="en">
  <head>
    <title><?= APP_NAME.'- Seja dono de uma lavateria home na sua cidade' ?></title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-MRQZMTQ');</script>
    <!-- End Google Tag Manager -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/f89b880302.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?= base_url('assets/src/css/animate.css')?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/custom.css')?>">
    <meta name="description" content='Uma Franquia de baixo custo com investimento garantido. Comece hoje mesmo!'/>
    <meta property="og:url" content="http://www.higienizacaodeestofados.com">
    <meta property="og:site_name" content="Lavateria">
    <meta property="og:image" content="./assets/src/imagens/quemsomos.jpg">
    <meta http-equiv="content-language" content="pt-br">
  </head>
  <body>
  <header class="menu fixed-top">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-xl-6 col-12  text-sm-center text-md-center text-left">
             <img id="logo" src="<?= base_url('assets/src/imagens/logo.png')?>" alt="Marca de franquias Lavateria">
            </div>
            <div class="col-lg-6 col-xl-6 col-12 d-none d-xl-block d-lg-block"  >
                <a href="#btn-franquia"   onclick="bounce_click()" class="btn btn-ligth-rosa btn-lg  pulse">
                <i class="fas fa-store"></i> Seja franqueado
                </a>
            </div>
        </div>
    </div>
  </header>  
  <aside class="sidebar_form  d-lg-block d-xl-block d-none ">
    <div class="content">
        <div class="container">
            <div class="row text-center">
                <div class="col-12 ">
                <h4 class="title_rosa_dark_4">Seja um franqueado de <b>SUCESSO</b>  </h4>
                    <img src="<?= base_url('assets/src/imagens/logo.png')?>" class="img-fluid" alt="Marca de franquias Lavateria">
                    <!-- End Form -->
                    <form action="<?= base_url('lead/cadastrar');?>"  method="post">
                        <div class="form-group">
                            <input type="text" name="nome" required  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nome Completo">
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <input type="text" name="telefone" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Telefone">
                        </div>
                        <div class="form-group">
                            <select class="form-control" required name="estado" id="estado"> </select>
                        </div>
                        <div class="form-group">
                            <select class="form-control"required  name="cidade" id="cidade">
                        </select>
                        </div>
                        <div class="form-group text-left">
                            <label for="Capital">Capital Disponível</label>
                            <select class="form-control" name="Investimento" required id="exampleFormControlSelect1">
                            <option>R$ 16.000,00à R$ 19.999,00</option>
                            <option>R$ 20.000,00 à R$ 29.999,00</option>
                            <option>R$ 30.000,00 à R$ 39.999,00</option>
                            <option>R$ 40.000,00 à R$ 49.999,00</option>
                            <option>Acima de R$ 50.000,00 </option>
                            </select>
                        </div>
                        <button type="submit" id="franquias" class="btn btn-success btn-block btn-lg p-3">Baixar Apresentação</button>
                        <?php if ($this->session->flashdata('error')) { ?>
                        <div class="btn btn-danger disable">
                         Atenção:  <?= $this->session->flashdata('error') ?>
                        </div>
                    <?php } ?>
                    </form>
                </div>

            </div>
        </div>
        </div>
    </div>
  </aside>
  <section class="main">
  <section id='home' >
    <div class="container text-lg-left text-xl-left text-center">
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-12 ">
                <h1 data-wow-delay="0.2s" class=" wow bounce" >
                É tempo de<br>
 oportunidades,<br>
Invista em você!
                </h1>
                <hr class="ribbon">
                <div class="row">
                     <div class="col-6">
                     <small>
                        <ul data-wow-delay="0.5s" class=" wow bounceInLeft text-left">
                            <li>SEM BUROCRACIA</li>
                            <li>BAIXO CUSTO OPERACIONAL (O PRINCIPAL INSUMO É VOCÊ)</li>
                            <li>GARANTIA DE RETORNO DE INVESTIMENTO <b>(CASHBACK GARANTIDO)</b></li>
                            <li>LUCRO LÍQUIDO ACIMA DE 100 %</li>
                        </ul>
                        
                    </small>
                     </div>
                     <div class="col-6">
                     <small>
                        <ul data-wow-delay="0.5s" class=" wow bounceInLeft text-left">
                            <li>FACIL OPERAÇÃO</li>
                            <li>DEPARTAMENRO DE MARKETING </li>
                            <li>SUPORTE E CONSULTORIA DO NEGÓCIO </li>
                            <li>TREINAMENTOS </li>
                        </ul>
                        
                    </small>
                     </div>              
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-12">
                    <video autoplay="" controls="" width="100%" height="auto">
                     <source src="<?= base_url('assets/src/imagens/videoapresentacao.mp4')?>" type="video/mp4">
                     <source src="<?= base_url('assets/src/imagens/videoapresentacao.ogg')?>" type="video/ogg">
                    </video>
            </div>
            <div data-wow-delay="0.10s" class="col-12 wow bounceInLeft ">
            <a  href="#btn-franquia"   onclick="bounce_click()" class="btn btn-blue btn-lg pulse mt-xl-0 mt-lg-0 mt-5"> <i class="fas fa-store"></i> Seja franqueado</a>
            </div>
        </div>
    </div>
  </section>
  <section id="quemsomos">
      <div class="container-fluid">
         <div class="row">
         <div class=" col-xl-6 col-lg-6 col-12">
             <div class="container text-lg-left text-xl-left text-md-center text-sm-center p-3 p-lg-3 p-xl-3">
                 <div class="row justify-content-center ">
                    <div class="col-xl-9 col-lg-9 col-12  text-xl-left text-lg-left text-md-center text-sm-center p-3 p-lg-3 p-xl-3">
                    <h2  data-wow-delay="0.5s" class="title_rosa_dark_4 wow bounce  title_rosa_dark_2 mt-3 mt-sm-5 mt-md"><b>QUEM SOMOS</b></h2>
              <p  data-wow-delay="0.10s" class="title_rosa_dark_4 wow bounceInLeft text-justify">A LAVATERIA nasceu através da visão empreendedora do seu fundador Leandro Silva, quando precisou utilizar os serviços de uma lavanderia.
Descobriu que o mercado é carente deste tipo de serviço e que a mão-de-obra é muito deficitária. Aprofundando um pouco mais sobre o segmento, descobriu também, que a demanda é maior que a oferta, pois o Brasil, passa por uma mudança de conceito na terceirização dos afazeres domésticos.
Com isso identificou uma grande oportunidade em facilitar o dia-a-dia das pessoas, gerando conforto, praticidade, comodidade e mais importante: “RENDA RECORRENTE” aos investidores deste segmento!</p>
<a  href="#btn-franquia"   onclick="bounce_click()" class="btn btn-success btn-lg pulse mt-3 mt-sm-5 mt-md-5"> <i class="fas fa-store"></i> Seja franqueado</a>

                    </div>

                 </div>
             </div>
          </div>
          <div class=" col-xl-6 col-lg-6 col-12 p-0">
             <img src="<?= base_url('assets/src/imagens/quemsomos.jpg')?>" class="img-cover" alt="Marca de franquias Lavateria">
          </div>
         </div>
      </div>
  </section>

  <section id="depoimentos">
      <div class="container-fluid">
         <div class="row">
         <div class=" col-12">
             <div class="container text-center p-3 p-lg-3 p-xl-3">
             <h1>Depoimentos</h1> 
                 <div class="row justify-content-center ">
                           
                    <div class="card col-xl-4 col-lg-4 col-12  text-xl-left text-lg-left text-md-center text-sm-center p-3 p-lg-3 p-xl-3">
                    <p>A Lavateria Home mudou a minha vida, tenho uma renda que sempre sonhei, comprei meu carro para auxiliar no trabalho e consigo realizar alguns simples sonhos que antes trabalhando registrado nunca conseguiria, tenho orgulho de fazer parte desse time, hoje dou até treinamento pra rede. Gratidão!</p>
                    <b>Jeferson</b>
                    <small>Primeiro franqueado da rede.</small>        
                    </div>
                    <div class="card col-xl-4 col-lg-4 col-12  text-xl-left text-lg-left text-md-center text-sm-center p-3 p-lg-3 p-xl-3">
                    <p>Foi uma decisão muito importante, recém formado e sem expectativas da minha profissão, fui ser um dedicado caixa de mercado, hoje tenho meu próprio negócio de sucesso. Continuo hoje me desenvolvendo dentro da marca. Com toda certeza o saldo é mais do que positivo.</p>
                    <b>Pedro Liveranski</b>
                    <small>Franqueado Pres.Prudente</small>        
                    </div>
                    <div class="card col-xl-4 col-lg-4 col-12  text-xl-left text-lg-left text-md-center text-sm-center p-3 p-lg-3 p-xl-3">
                    <p>Tenho 18 anos, acabei entrado nessa por conta do meu Pai que é um Franqueado Lavateria Store e Fast, acabamos nos especializando em higienização de carros e estamos muito felizes com o suporte e apoio da marca. Estamos nos preparando para crescer e expandir em nossa região. Certos que fizemos a melhor escolha.</p>
                    <b>Yuri</b>
                    <small>Franqueado Olímpia</small>        
                    </div>

                 </div>
             </div>
          </div>
         </div>
      </div>
  </section>
  <section id="mapa" >
      <div class="container-fluid mapa">
      <div class="row flag">
         <div class=" col-12  p-lg-1 p-xl-1">
        <img src="<?= base_url('assets/src/imagens/mapa.svg')?>" class="img-fluid" alt="Marca de franquias Lavateria">
        </div>
      </div>
      </div>
  </section>
  <section id="atuacao">
      <div class="container">
          <div class="row justify-content-center text-center">
              <div class="col-12 p-sm-1 p-md-1  p-lg-5 p-xl-5  ">
                <h1 class="title_rosa_dark_1"><b>Área de Atuação</b></h1>
              </div>
              <div class="col-xl-2 col-lg-2 col-12">
                    <img src="<?= base_url('assets/src/imagens/Casa.png')?>" class="img-fluid" alt="Marca de franquias Lavateria">
                    <h2 class="title_rosa_dark_4"><b>Residência</b></h2>                  
                </div>
                <div class="col-xl-1 col-lg-1 col-12"></div>
                <div class="col-xl-2 col-lg-2 col-12">
                    <img src="<?= base_url('assets/src/imagens/Empresa.png')?>" class="img-fluid" alt="Marca de franquias Lavateria">
                    <h2 class="title_rosa_dark_4"><b>Empresas</b></h2>                  
                </div>
                <div class="col-xl-1 col-lg-1 col-12"></div>
                <div class="col-xl-2 col-lg-2 col-12">
                    <img src="<?= base_url('assets/src/imagens/car.png')?>" class="img-fluid" alt="Marca de franquias Lavateria">
                    <h2 class="title_rosa_dark_4"><b>Veículos</b></h2>                  
                </div>
          </div>
      </div>
  </section>
  <section id="atuacao_ribbon">
      <div class="container ">
          <div class="row justify-content-lg-centerjustify-content-md-center justify-content-sm-center">
             <div class="col-12 text-center ">
                <h1 class="title_rosa_dark_1"><b>Serviços Oferecidos</b></h1>  
             </div>
             <div class="col-xl-3 col-lg-3 col-6  text-center">
                <img src="<?= base_url('assets/src/imagens/assento.png')?>" class="img-fluid" style="max-width:100px;" alt="Marca de franquias Lavateria">
                <h2 class="title_rosa_dark_2"><b>Veículos</b></h2>  
            </div>
            <div class="col-xl-3 col-lg-3 col-6 text-center" text-center>
                <img src="<?= base_url('assets/src/imagens/sofa.png')?>" class="img-fluid" style="max-width:100px;" alt="Marca de franquias Lavateria">
                <h2 class="title_rosa_dark_2"><b>Estofados</b></h2>  
            </div>
            <div class="col-xl-3 col-lg-3 col-6 text-center">
                <img src="<?= base_url('assets/src/imagens/tapete.png')?>" class="img-fluid" style="max-width:100px;" alt="Marca de franquias Lavateria">
                <h2 class="title_rosa_dark_2"2><b>Carpete</b></h2>  
            </div>
            <div class="col-xl-3 col-lg-3 col-6 text-center">
                <img src="<?= base_url('assets/src/imagens/colchao.png')?>" class="img-fluid" style="max-width:100px;" alt="Marca de franquias Lavateria">
                <h2 class="title_rosa_dark_2"><b>Colchões</b></h2>  
            </div>
          </div>
      </div>
  </section>
  <section id="atuacao_equipamento">
      <div class="contaienr-fluid">
          <div class="row">
              <div class="col-xl-6 col-lg-6 col-12">
                <div class="container">
                    <div class="row justify-content-center ">
                        <div class="col-10 p-lg-5 p-lg-5 pt-5 pb-5  p-sm-2  p-md-2 ">
                        <h2 class="title_rosa_dark_3 text-lg-left text-xl-left text-md-center text-sm-center"><b>Entregamos aos nossos franqueados todo material necessário para que possam dar início ao trabalho e gerar renda no primeiro dia após o treinamento.</b></h2>
                        <div class="col-12 text-lg-left text-xl-left text-md-center text-sm-center mt-5 ">
                        <a href="#btn-franquia"   onclick="bounce_click()" class="btn btn-success btn-lg pulse text-lg-left text-xl-left text-md-center text-sm-center"> <i class="fas fa-store"></i> Seja franqueado</a>
                        </div>
                        </div>
                    </div>
                </div> 
              </div>
              <div class="col-xl-6 col-lg-6 col-12  ">
                <img src="<?= base_url('assets/src/imagens/banner_home4.png')?>" class="img-cover" alt="Marca de franquias Lavateria">
              </div>
          </div>
  </section>
  <section id="modelo_negocio">
      <div class="container-fluid">
          <div class="row">
          <div class="col-xl-6 col-lg-6 col-12">
                <div class="container   text-xl-left  text-lg-left text-md-center text-sm-center">
                    <div class="row justify-content-center">
                        <div class="col-lg-9 col-xl-9 col-sm-12 col-md-12 mt-5">
                        <h2 class="title_rosa_dark_1 mt-5"><b>Perfil do Franqueado</b></h2>
                        <br>
                        <ul  class="title_rosa_dark_1 text-left">
                            <li>Disponibilidade para atuar no negócio.</li>
                            <li>Não é necessesário ter experiência no ramo;</li>
                            <li>Perfil administrador;</li>
                            <li>Dedicação e amor à franquia;</li>
                            <li>Compromentimento para operar e gerir a franquia;</li>
                            <li>Perfil comercial para o trato com o público;</li>
                        </ul>
                        <div class="col-12 mt-5 ">
                        <a  href="#btn-franquia"   onclick="bounce_click()" class="btn btn-success btn-lg pulse"> <i class="fas fa-store"></i> Seja franqueado</a>
                        </div>
                        </div>
                    </div>
                </div> 
              
            </div>
            <div class="col-xl-6 col-lg-6 col-12  ">
                <img src="<?= base_url('assets/src/imagens/Model 1.png')?>" class="img-cover" alt="Marca de franquias Lavateria">
              </div>
            </div>
      </div>
  </section>
  <section id="franquia">
      <div class="container-fluid">
          <div class="row p-0">
              <div class="col-lg-8 col-xl-8 col-12 p-5">
                   <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-12">
                        <div class="row">
                        <div class="col-12 pt-5 pb-5 mt-sm-3 mt-md-3">
                            <h1 class="title_rosa_dark_4"><b>MUDE DE VIDA, INVISTA EM VOCÊ! </b></h1>
                            <h2 class="title_rosa_dark_4">CONHEÇA O QUE A LAVATERIA HOME PREPAROU PRA VOCÊ.</h2>
                        </div>
                        <div class="col-lg-4 col-xl-4 col-12 mt-xl-2 mt-lg-2  mt-sm-5 mt-md-5">
                            <img src="<?= base_url('assets/src/imagens/icon-2.svg')?>" class="img-fluid" alt="Marca de franquias Lavateria"><br>
                            <h4 class="title_rosa_dark_4" ><b>Há quanto tempo você trabalha?</b></h4>
                            <p class="title_rosa_dark_4" >Se você parar de trabalhar hoje, quanto você receberá mensalmente desses anos trabalhados?</p>

                        </div>
                        <div class="col-lg-4 col-xl-4 col-12 mt-xl-2 mt-lg-2  mt-sm-5 mt-md-5">
                            <img src="<?= base_url('assets/src/imagens/icon-3.svg')?>" class="img-fluid" alt="Marca de franquias Lavateria"><br>
                            <h4 class="title_rosa_dark_4"><b>Qual a nossa proposta?)</b></h4>
                            <p class="title_rosa_dark_4">	Criamos juntos uma receita de renda recorrente de mais de R$ 7mil mensais para você pelo resto da vida. Quer saber como?</p>

                        </div>
                        <div class="col-lg-4 col-xl-4 col-12 mt-xl-2 mt-lg-2  mt-sm-5 mt-md-5">
                            <img src="<?= base_url('assets/src/imagens/icon-4.svg')?>"  class="img-fluid"alt="Marca de franquias Lavateria"><br>
                            <h4 class="title_rosa_dark_4"><b> Por que Investir?</b></h4>
                            <p class="title_rosa_dark_4">•	Em comparação aos demais investimentos de outros seguimentos de franquias que estão na casa de 50 mil a 100 mil reais, a nossa proposta da Lavateria é justa, o valor é menor e ainda VOLTA PARA O SEU BOLSO!</p>

                        </div>
                        </div>
                        <div class="col-12  text-center pt-5">
                            <a  href="#btn-franquia"   onclick="bounce_click()" class="btn btn-success btn-lg pulse"> <i class="fas fa-store"></i> Seja franqueado</a>
                        </div>
                        </div>
                    </div>
                   </div>
              </div>
              <div class="col-lg-4 col-xl-4 col-12 p-0">
                 <img src="<?= base_url('assets/src/imagens/Model 2.png')?>" class="img-cover-1" alt="Marca de franquias Lavateria">
              </div> 
          </div>
      </div>
  </section>
  <section id="processo">
      <div class="container-fluid">
          <div class="row">
          <div class="col-12">
                <div class="container   text-xl-left  text-lg-left text-md-center text-sm-center">
                    <div class="row justify-content-left">
                        <div class="col-lg-9 col-xl-9 col-sm-12 col-md-12 mt-5">
                        <h2 class="title_rosa_dark_1 mt-5"><b>PROCESSO PARA SE TORNAR FRANQUEADO LAVATERIA HOME.</b></h2>
                        <br>
                        <ul  class="title_rosa_dark_1 text-left">
                            <li>Contato inicial;</li>
                            <li>Reunião de apresentação;</li>
                            <li>Documentação (COF circular de oferta);</li>
                            <li>Análise do comitê e avaliação de perfil;</li>
                            <li>Treinamento;</li>
                            <li>Início da operação.</li>
                        </ul>
                        <div class="col-12 mt-5 ">
                        <a  href="#btn-franquia"   onclick="bounce_click()" class="btn btn-success btn-lg pulse"> <i class="fas fa-store"></i> Seja franqueado</a>
                        </div>
                        </div>
                    </div>
                </div> 
              
            </div>
            </div>
      </div>
  </section>
  <section id="contato" class="d-xl-none d-lg-none d-sm-block d-md-block">
      <div class="container">
          <div class="row justify-content-center">
              <div class="col-12 text-center p-1">
              <h4 class="title_rosa_dark_4">Seja um franqueado de <b>SUCESSO</b>  </h4>
              <img src="<?= base_url('assets/src/imagens/logo.png')?>" class="img-fluid" alt="Marca de franquias Lavateria">
                   
              <form  action="<?= base_url('lead/cadastrar');?>"  method="post">
              <div class="form-group">
                            <input type="text" required name="nome" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nome Completo">
                        </div>
                        <div class="form-group">
                            <input type="email" required name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <input type="text" required name="telefone" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Telefone">
                        </div>
                        <div class="form-group">
                            <select class="form-control" required name="estado" id="estado2"> </select>
                        </div>
                        <div class="form-group">
                            <select class="form-control" required name="cidade" id="cidade2">
                        </select>
                        </div>
                        <div class="form-group text-left">
                            <label for="Capital">Capital Disponível</label>
                            <select class="form-control" required name="Investimento" id="exampleFormControlSelect1">
                            <option>R$ 16.000,00 à R$ 19.999,00</option>
                            <option>R$ 20.000,00 à R$ 29.999,00</option>
                            <option>R$ 30.000,00 à R$ 39.999,00</option>
                            <option>R$ 40.000,00 à R$ 49.999,00</option>
                            <option>Acima de R$ 50.000,00 </option>
                            </select>
                        </div>
                        <button type="submit" id="btn-franquia" class="btn btn-success btn-block btn-lg p-3">Baixar Apresentação</button>
                        <?php if ($this->session->flashdata('error')) { ?>
                        <div class="btn btn-danger disable">
                         Atenção:  <?= $this->session->flashdata('error') ?>
                        </div>
                    <?php } ?>
                    </form>
              </div>
          </div>
      </div>
  </section>

  </section>

</div>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src=" <?= base_url('assets/src/js/')?>jquery.custom-select.js"></script>
    <script src=" <?= base_url('assets/src/js/')?>estados-cidades.js"></script>
    <script src=" <?= base_url('assets/src/js/')?>wow.min.js"></script>
    <script src=" <?= base_url('assets/src/js/')?>jquery.parallax.js"></script>

   
    <script>
    new dgCidadesEstados({
        cidade: document.getElementById('cidade2'),
        estado: document.getElementById('estado2'),
        estadoVal: 'Selecione um estado',
        cidadeVal: 'Selecione uma cidade'
    });
    
    new dgCidadesEstados({
        cidade: document.getElementById('cidade'),
        estado: document.getElementById('estado'),
        estadoVal: 'Selecione um estado',
        cidadeVal: 'Selecione uma cidade'
    });

    new WOW().init();


    function bounce_click(){
        $('.pulse').removeClass('pulse')
        $('.btn-success').removeClass('btn-block'); 
        $('.btn-success').addClass('pulse'); 

        
         
    }


    </script>

    <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MRQZMTQ"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
    </body>
</html>