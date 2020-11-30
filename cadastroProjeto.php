<?php

	session_start();
        
        $id = 0;

	require_once "classes/Conexao.class.php";
	require_once "classes/Usuario.class.php";
        require_once "classes/Projeto.class.php";

        
        if (isset($_POST['ok'])):

		$nome = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_MAGIC_QUOTES);
		$empresa = filter_input(INPUT_POST, "empresa", FILTER_SANITIZE_MAGIC_QUOTES);

		$l = new Projeto();
		$l->setNome($nome);
		$l->setEmpresa($empresa);
                $l->cadastrar($nome,$empresa);

                
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
		<title>Cadastro de Projeto</title> 
		<meta name="description" content="">
		<link rel="stylesheet" type="text/css" href="css/main.css">
	</head>
	<body>
           
           <div id="cadastrar">
			<form action="" method="POST" class="formulario">
				<div class="nome">Nome</div>
                                <input type="text" name="nome" required>
				<div class="empresa">Empresa</div>
				<input type="text" name="empresa" required>
				<input type="submit" name="ok" value="Cadastrar">
                                
                                 
			</form>
			<?php echo isset($erro) ? $erro : ''; ?>
		</div>		

	<nav></nav>
        

	Bem vindo <?php echo $_SESSION['usuarios']; ?><br />
        
        <a href="cadastroProjeto.php?logout=confirmar">Sair</a>
        
<?php
//PEGA HORA ATUAL DO SERVIDOR
date_default_timezone_set('Etc/GMT');
$hoje = getdate();
?>
<script>
    var d = new Date(Date.UTC(<?php echo $hoje['year'].",".$hoje['mon'].",".$hoje['mday'].",".$hoje['hours'].",".$hoje['minutes'].",".$hoje['seconds']; ?>));
    setInterval(function() {
        d.setSeconds(d.getSeconds() + 1);
        //EXIBE O HORÁRIO COM 2 DIGITOS
        $('#hora_inicio').val((("0" + d.getHours()).slice(-2) +':' + ("0" + d.getMinutes()).slice(-2) + ':' +  ("0" + d.getSeconds()).slice(-2) ));
    }, 1000);
}?>
  <tr>
          <td>Hora Atual:</td>
          <td><input type = "text" style="font-family: Verdana, Geneva, sans-serif; height: 40px; font-size: 30px;" readonly="true" id="hora_inicio" name = "hora_inicio" size = 12></td>
      </tr>
<?php

	else:
		echo "Voce nao tem permissao de acesso. <a href=\"index.php\">Clique aqui para voltar</a>";
	endif;
?>

	</body>
</html>
        


