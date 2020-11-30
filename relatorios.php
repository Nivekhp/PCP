<?php
	session_start();

	require_once "classes/Conexao.class.php";
	require_once "classes/Usuario.class.php";

	if(isset($_GET['logout'])):
		if($_GET['logout'] == 'confirmar'):
			Login::deslogar();
		endif;
	endif; 

	if(isset($_SESSION['logado'])):

?>
<html lang="pt-br">
	<head>
		<meta charset="utf-8"/>
		<title>Relatórios</title> 
		<meta name="description" content="">
		<link rel="stylesheet" type="text/css" href="css/main.css">
	</head>
	<body>

	<nav></nav>

	Bem vindo <?php echo $_SESSION['usuarios']; ?><br />
	<a href="dashboard.php?logout=confirmar">Sair</a>
        <h0 style="cursor: pointer">
        <img src="img/print.png" target="_blank" onclick="javascript:window.print(); "> 
        </h0>
<?php
	else:
		echo "Voce nao tem permissao de acesso. <a href=\"index.php\">Clique aqui para voltar</a>";
	endif;
?>

	</body>
</html>
