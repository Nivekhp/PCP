<?php
	session_start();

	require_once "classes/Conexao.class.php";
	require_once "classes/Usuario.class.php";

	if(isset($_GET['logout'])):
		if($_GET['logout'] == 'confirmar'):
			Login::deslogar();
		endif;
	endif; 
        
        if(isset($_GET['acesso'])):
		Login::teste();
		endif; 
                

	if(isset($_SESSION['logado'])):

?>
<html lang="pt-br">
	<head>
		<meta charset="utf-8"/>
		<title>Dashboard</title> 
		<meta name="description" content="">
		<link rel="stylesheet" type="text/css" href="css/main.css">
	</head>
	<body>

	<nav></nav>

	Bem vindo <?php echo $_SESSION['usuarios']; ?><br />

        <a href="relatorios.php">Relatórios</a><br />
        <a href="backup.php">Fazer Backup</a><br />
        <a href="cadastroProjeto.php">Cadastrar Projeto</a><br />
        <a href="cadastroEsquadrias.php">Cadastrar Esquadrias</a><br />
        <a href="cadastroUsuario.php">Cadastrar Usuários</a><br />
        <a href="dashboard.php?acesso">Teste Conexao</a><br />
	<a href="dashboard.php?logout=confirmar">Sair</a><br />
        
  
<?php
	else:
		echo "Voce nao tem permissao de acesso. <a href=\"index.php\">Clique aqui para voltar</a>";
	endif;
?>

	</body>
</html>
