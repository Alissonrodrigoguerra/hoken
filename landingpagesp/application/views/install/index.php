<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Welcome</title>
	<!--Import Google Icon Font-->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
	<link rel="stylesheet" href="<?= base_url('plugins/materialize/css/materialize.css'); ?>">
	<link rel="stylesheet" href="<?= base_url('assets/css/style.css'); ?>">

</head>	
<body class="grey lego white">
	
	<div class="row " id="login">
	<div class="col s12  m8 offset-m3  l4 offset-l4  xl4 offset-xl4 ">
		<div class="card">
			<div class="card-content">
		<h4 class="center-align">Vamos iniciar,</h4> <h6 class="center-align"> informe seus dados de conexão com o banco de dados</h6>
			<div class="row">
			<form  id="contactform" class="col s12" action="<?= base_url('login');?>" method="post">
				<div class="row">
					<div class="input-field col s12">
					<input id="system_name" type="text" name="system_name" class="validate" require>
					<label for="system_name" >Nome da Aplicação</label>
					</div>	
				</div>
			
				<div class="row">
					<div class="input-field col s12">
					<input id="password" type="password" name="password" class="validate" require>
					<label for="system_name">Host do Banco de Dados</label>
					</div>	

				</div>
				<div class="row">
					<div class="input-field col s12">
					<input id="password" type="password" name="password" class="validate" require>
					<label for="db_user_name">Usuário do Banco de Dados</label>
					</div>	

				</div>
				<div class="row">
					<div class="input-field col s12">
					<input id="password" type="password" name="password" class="validate" require>
					<label for="db_user_pass">Password do Banco de Dados</label>
					</div>	

				</div>
				<div class="row">
				<div class="input-field col s12">
					<input id="db_name" type="password" name="db_name" class="validate" require>
					<label for="db_name">Nome do Baanco de Dados</label>
					</div>	

				</div>
				
			</div>
			<button class="btn waves-effect waves-light pulse  grey darken-3" type="submit">Conectar
				<i class="material-icons right">send</i>
			</button>
			
			<div id="resp"></div>
			</div>
			</div>
         </form>
		</div>
</div>
			
			
			<!-- Scritos JS -->
   <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
   <script src="<?= base_url('plugins/materialize/js/materialize.js'); ?>"></script>
   <script>	var url =  "<?= base_url('logon'); ?>";</script>
   <script src="<?= base_url('./assets/js/login.js'); ?>"></script>




</body>
</html>