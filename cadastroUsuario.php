<?php
	session_start();
        
        $id =0;

	require_once "classes/Conexao.class.php";
	require_once "classes/Usuario.class.php";
        require_once "classes/Projeto.class.php";
        
        if (isset($_POST['ok'])):
            
		$nome = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_MAGIC_QUOTES);
		$login = filter_input(INPUT_POST, "login", FILTER_SANITIZE_MAGIC_QUOTES);
                $senha = filter_input(INPUT_POST, "senha", FILTER_SANITIZE_MAGIC_QUOTES);
                $senha2 = filter_input(INPUT_POST, "senha2", FILTER_SANITIZE_MAGIC_QUOTES);
                $nivel = filter_input(INPUT_POST, "nivel", FILTER_SANITIZE_MAGIC_QUOTES);
                

		$l = new Login();
                $l->setNome($nome);
		$l->setLogin($login);
		$l->setSenha($senha);
                $l->setSenha2($senha2);
                $l->setNivel($nivel);
                $l->cadastrar($nome,$login,$senha,$senha2,$nivel);
                
        endif;
        


	if(isset($_GET['logout'])):
		if($_GET['logout'] == 'confirmar'):
			Login::deslogar();
		endif;
	endif; 

	if(isset($_SESSION['logado']) and ($_SESSION['nivel']) < 2):

?>
<html lang="pt-br">
	<head>
		<meta charset="utf-8"/>
		<title>Cadastro de Usuário</title> 
		<meta name="description" content="">
		<link rel="stylesheet" type="text/css" href="css/main.css">
	</head>
	<body>

           <div id="cadastrar">
			<form action="" method="POST" class="formulario">
                                <div class="nome">Nome do usuário</div>
				<input type="text" name="nome" required>
				<div class="login">Login</div>
				<input type="text" name="login" required>
				<div class="senha">Senha</div>
				<input type="password" name="senha" required>
                                <div class="senha2">Confirme a Senha</div>
				<input type="password" name="senha2" required>
                                <div class="nivel">Nivel de Acesso</div>
                                <select name="nivel">
                                <option value= 0 >Administrador</option> 
                                <option value= 1 >Técnico</option>
                                <option value= 2>Produção</option> 
                                </select>      
                                <input type="submit" name="ok" value="Cadastrar"></br>            

			</form>
			<?php echo isset($erro) ? $erro : ''; ?>
		</div>	
           

	<nav></nav>
        

	Bem vindo <?php echo $_SESSION['usuarios']; ?><br />
        
        <a href="cadastroProjeto.php?logout=confirmar">Sair</a>
           
<?php
	else:
		echo "Voce nao tem permissao de acesso. <a href=\"index.php\">Clique aqui para voltar</a>";
	endif;
?>

	</body>
</html>
        


