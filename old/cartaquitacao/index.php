<?php
	session_start(); 
	// if(isset($_SESSION['logado'])){

	// 	header("Location: /");

	// }

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Yinka Enoch Adedokun">
	<link rel="stylesheet" href="resources/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" href="resources/css/styles.css">

	<title>Declaração anual de quitação de débitos</title>
</head>
<body>
	
	<div id="login-area" style='margin-top: 100px;'>
	<center>
	<h1 style='color: rgb(0, 146, 83);'>Declaração anual de quitação de débitos</h1>
	</center>
		<!-- Main Content -->	
		<div class="container-fluid">
			<div class="row main-content bg-success text-center">
				<div class="col-md-4 text-center company__info">
					<span class="company__logo"><h2><span class="fa fa-android"></span></h2></span>
					<center><img src="resources/images/logo.png" alt="logo-unimed" width="185" height="90"> </center>
				</div>
				<div class="col-md-8 col-xs-12 col-sm-12 login_form ">
					<div class="container-fluid-1">
							<br>
							<center><div class="row">
							<p style='color: rgb(0, 146, 83);'><b>Digite o CNPJ sem pontos ou caracteres especiais (somente números):</b></p>
							<br>
						</div>
						<div class="row">
						<!--  ESSE FORM EH DIRECIONADO PARA A FUNCAO QUE VALIDA O LOGIN, NO CASO IRAH VERIFICAR O CNPJ SE EH VALIDO OU NAO-->
						<form method="GET" action="funcs/validalogin.php">
							
									<div class="input_log" style='margin-left: 50px;'>
									
												<input type="text" class="form__input" onkeyup=validarcnpj(this) name="cnpj" maxlength="14" autocomplete="on" id="cnpj"    required>	
									
										
										
										<div class="row">
											<input type="submit" value="Download" class="btn" />		
										</div>
									</div>
								</center>
							</form>
						</div>
						<div class="row">
							<p></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<!-- Footer -->
<script src="resources/js/index.js"></script>
</body>
</html>