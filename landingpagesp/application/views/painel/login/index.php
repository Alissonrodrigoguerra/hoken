<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="msapplication-tap-highlight" content="no">
  <meta name="description" content="Materialize is a Material Design Admin Template,It's modern, responsive and based on Material Design by Google. ">
  <meta name="keywords" content="materialize, admin template, dashboard template, flat admin template, responsive admin template,">
  <title><?php echo APP_NAME; ?> | Entrar</title>

  <!-- Favicons-->
  <link rel="icon" href="<?= base_url('assets/painel/'); ?>images/favicon/favicon-32x32.png" sizes="32x32">
  <!-- Favicons-->
  <link rel="apple-touch-icon-precomposed" href="i<?= base_url('assets/painel/'); ?>mages/favicon/apple-touch-icon-152x152.png">
  <!-- For iPhone -->
  <meta name="msapplication-TileColor" content="#00bcd4">
  <meta name="msapplication-TileImage" content="<?= base_url('assets/painel/'); ?>images/favicon/mstile-144x144.png">
  <!-- For Windows Phone -->


  <!-- CORE CSS-->
  
  <link href="<?= base_url('assets/painel/'); ?>css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="<?= base_url('assets/painel/'); ?>css/style.css" type="text/css" rel="stylesheet" media="screen,projection">
    <!-- Custome CSS-->    
    <link href="<?= base_url('assets/painel/'); ?>css/custom-style.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="<?= base_url('assets/painel/'); ?>css/page-center.css" type="text/css" rel="stylesheet" media="screen,projection">

  <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
  <link href="<?= base_url('assets/painel/'); ?>css/prism.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="<?= base_url('assets/painel/'); ?>js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">
  
</head>

<body class="blue darken-4">
  <!-- Start Page Loading -->
  <div id="loader-wrapper">
      <div id="loader"></div>        
      <div class="loader-section  section-left"></div>
      <div class="loader-section section-right"></div>
  </div>
  <!-- End Page Loading -->



  <div id="login-page" class="row">
    <div class="col s12 z-depth-4 card-panel">
      <form class="login-form" action="<?= base_url('painel/login'); ?>" method="post">
        <div class="row">
          <div class="input-field col s12 center">
            <img src="<?= base_url('assets/painel/'); ?>images/login-logo.png" alt="" class="circle responsive-img valign profile-image-login">
            <p class="center login-form-text">Gerenciador de Leads</p>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-social-person-outline prefix"></i>
            <input id="username" name="username" type="text">
            <label for="username" class="center-align" require>E-mail ou Username</label>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-action-lock-outline prefix"></i>
            <input id="password" name="password" type="password" require>
            <label for="password">Senha</label>
          </div>
        </div>
       
        <div class="row">
          <div class="input-field col s12">
          <button type="submit" class="btn waves-effect waves-light  teal accent-3 col s12">Login</button>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12 m12 l12">
              <p class="margin center-align medium-small"><a href="<?= base_url('recuperar'); ?>">Lembrar minha senha </a></p>
          </div>          
        </div>
      </form>
    </div>
  </div>



  <!-- jQuery Library -->
  <script type="text/javascript" src="<?= base_url('assets/painel/'); ?>js/jquery-1.11.2.min.js"></script>
  <!--materialize js-->
  <script type="text/javascript" src="<?= base_url('assets/painel/'); ?>js/materialize.js"></script>
  <!--prism-->
  <script type="text/javascript" src="<?= base_url('assets/painel/'); ?>js/prism.js"></script>
  <!--scrollbar-->
  <script type="text/javascript" src="<?= base_url('assets/painel/'); ?>js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>

  <!--plugins.js - Some Specific JS codes for Plugin Settings-->
  <script type="text/javascript" src="<?= base_url('assets/painel/'); ?>js/plugins.js"></script>

</body>

</html>