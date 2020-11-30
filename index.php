<?php
	session_start();

	require_once "classes/Conexao.class.php";
	require_once "classes/Usuario.class.php";

	if (isset($_POST['ok'])):

		$login = filter_input(INPUT_POST, "login", FILTER_SANITIZE_MAGIC_QUOTES);
		$senha = filter_input(INPUT_POST, "senha", FILTER_SANITIZE_MAGIC_QUOTES);

		$l = new Login;
		$l->setLogin($login);
		$l->setSenha($senha);

		if($l->logar()):
			header("Location: dashboard.php");
		else:
			$erro = "Senha ou Usúario Incorreto";
		endif;
	endif;


	if(isset($_SESSION['logado'])):
		header("Location: dashboard.php");
	else:
?>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge" />
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport" />
 
    <title>::Brinmetal - Login:: </title>
    <link rel="icon" href="imagem/favicon.png" type="image/x-icon" />

<!--////////////////////////////////// Css ///////////////////////////-->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
</head>
	<body background="imagem/fundo2.jpg">
    <div class=" mt-5 pt-5 ml-5">
        <div class="navbar navbar-brand mt-5 pt-5" >
             <img src="imagem/logo.png "  width="460">      
        </div> 
    </div> 


<!--////////////////////// JS ///////////////////-->   
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

		<div id="login">
			<form action="" method="POST" class="formulario">
				<div class="login">Login</div>
				<input type="text" name="login">
				<div class="senha">Senha</div>
				<input type="password" name="senha">
				<input type="submit" name="ok" value="Logar">
			</form>
			<?php echo isset($erro) ? $erro : ''; ?>
		</div>		


<?php
	endif;
?>

	</body>
</html>
