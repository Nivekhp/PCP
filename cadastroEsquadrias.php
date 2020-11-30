<?php
	session_start();

	require_once "classes/Conexao.class.php";
	require_once "classes/Usuario.class.php";
        require_once "classes/Esquadrias.class.php";
        
        if (isset($_POST['ok'])):

		$codigo = filter_input(INPUT_POST, "codigo", FILTER_SANITIZE_MAGIC_QUOTES);
		$linha = filter_input(INPUT_POST, "linha", FILTER_SANITIZE_MAGIC_QUOTES);
                $descricao = filter_input(INPUT_POST, "descricao", FILTER_SANITIZE_MAGIC_QUOTES);
                $peso = filter_input(INPUT_POST, "peso", FILTER_SANITIZE_MAGIC_QUOTES);
                $largura = filter_input(INPUT_POST, "largura", FILTER_SANITIZE_MAGIC_QUOTES);
                $altura = filter_input(INPUT_POST, "altura", FILTER_SANITIZE_MAGIC_QUOTES);
                $id_projeto = filter_input(INPUT_POST,'combobox', FILTER_SANITIZE_MAGIC_QUOTES);

		$l = new Esquadrias();
		$l->setCodigo($codigo);
		$l->setLinha($linha);
                $l->setDescricao($descricao);
                $l->setPeso($peso);
                $l->setLargura($largura);
                $l->setAltura($altura);
                $l->setId_projeto($id_projeto);
                $l->cadastrar($codigo, $linha, $descricao, $peso, $largura, $altura,$id_projeto);

        endif;


	if(isset($_GET['logout'])):
		if($_GET['logout'] == 'confirmar'):
			Login::deslogar();
		endif;
	endif; 

	if(isset($_SESSION['logado'])):

?>
<html lang="pt-br">
<head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=Edge" />
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport" />


<title>:: Brinmetal - Cadastro de Projeto ::</title>

<!--//////////////// FAVICON ///////////////-->
<link rel="icon" href="imagem/favicon.png" type="image/x-icon" />

<!-- //////////////// Css //////////////////-->
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="css/main.css" />
<link rel="stylesheet" href="css/color_skins.css">
<link rel="stylesheet" href="css/bootstrap-select.css" />
</head>


<!--////////////////////////////////////////////////////////// CABEÇALHO ///////////////////////////////////////////////////////-->
<body class="theme-blue">
<nav class="navbar">
    <div class="col-12">
        
        <div class="navbar-header bg-white">
            <a href="javascript:void(0);" class="bars"></a>
            <a class="navbar-brand ">
            	 <img src="imagem/logo.png" width="110" height="30" alt="Brinmetal">
            </a>
        </div>
<!--///////////// BOTÃO PUSH ///////////////-->
        <ul class="nav navbar-nav navbar-left">
            <li><a href="javascript:void(0);" class="ls-toggle-btn" data-close="true"><i class="zmdi zmdi-menu"></i></a></li>
        </ul>

     <!--///////////// QUADRO DE NOTIFICAÇÕES ///////////////-->   
        <ul class="nav navbar-nav navbar-right">            
            <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button"><i class="zmdi zmdi-notifications"></i>
                <div class="notify"><span class="heartbit"></span><span class="point"></span></div>
                </a>

                <ul class="dropdown-menu slideDown">
                    <li class="header">	Notificação</li>
                    <li class="body">
                        <ul class="menu list-unstyled">
                             
                            <li> <a href="javascript:void(0);">
                                <div class="icon-circle l-slategray"> <i class="material-icons">comment</i> </div>
                                <div class="menu-info">
                                    <h4><b>Usuário1</b> fez uma observação</h4>
                                    <p> <i class="material-icons">access_time</i > há 4 horas </p>
                                </div>
                                </a> 
                            </li>

                            <li> <a href="javascript:void(0);">
                                <div class="icon-circle l-seagreen"> <i class="material-icons">cached</i> </div>
                                <div class="menu-info">
                                    <h4><b>Usuário2</b> alterou status da produção</h4>
                                    <p> <i class="material-icons">access_time</i>há 3 horas </p>
                                </div>
                                </a>
                            </li>

                            <li> <a href="javascript:void(0);">
                                <div class="icon-circle l-slategray"> <i class="material-icons">comment</i> </div>
                                <div class="menu-info">
                                    <h4><b>Usuário3</b> fez uma observação</h4>
                                    <p> <i class="material-icons">access_time</i > agora </p>
                                </div>
                                </a> 
                            </li>

                        </ul>
                    </li>
                    <li class="footer"> <a href="javascript:void(0);">Ver Todas Notificações</a> </li>  
                </ul>
            </li>

            <!--///////////// QUADRO DE OPÇÕES(seta superior esquerda) ///////////////--> 
            <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown"  aria-haspopup="true" aria-expanded="true" role="button"><i class="zmdi zmdi-caret-down"></i>
            	<ul class="dropdown-menu pull-right">
                    <li><a href="#"><i class="material-icons">person</i><?php echo $_SESSION['usuarios']; ?></a></li>
                    <li class="divider"></li>
                    <li><a href="#"><i class="material-icons"></i>Configuração</a></li>
                    <li class="divider"></li>
                    <li><a href="cadastroProjeto.php?logout=confirmar"><i class="material-icons">input</i>Sair</a></li>
                </ul>
            </Li>
        </ul>
    </div>
</nav>


<!--////////////////////////////////////////////////////////// MENU LATERAL ///////////////////////////////////////////////////////-->
<aside id="leftsidebar" class="sidebar"> 
    <div class="user-info">
        <div class="image"> <img src="imagem/avatar1.png" width="48" height="48" alt="User" /> </div>
    </div>

    
    <div class="menu">
        <ul class="list">
            <li class="header bg-light-blue"></li>
            
            
    <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-account"></i><span>Usuário</span></a>
                <ul class="ml-menu">
                    <li><a href="Cadastro de usuario.html">Cadastro de Usuário</a></li>
                    <li><a href="Permissões de usuario.html">Permissões de Usuário</a></li> 
                </ul>
            </li>
            
            
            <li> <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-assignment"></i><span>Projetos</span> </a>
                <ul class="ml-menu">
                    <li><a href="Cadastro de Projeto.html">Cadastro de Projeto</a> </li>
                    <li><a href="#">Link2</a> </li>
                    <li><a href="#">Link3</a> </li>
                    <li><a href="#">Link4</a> </li>
                    
                    
                </ul>
            </li>


            <li> <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-wrench "></i><span>Produção</span> </a>
                <ul class="ml-menu">                        
                    <li> <a href="#">Link1</a> </li>
                    <li> <a href="#">Link2</a> </li>
                    <li> <a href="#">Link3</a> </li>  
                </ul> 
            </li>

             <li> <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-settings"></i><span>Configuração</span> </a>
                <ul class="ml-menu">                        
                    <li> <a href="#">Link1</a> </li>
                    <li> <a href="#">Link2</a> </li>
                    <li> <a href="#">Link3</a> </li>
                </ul>   
            </li>

            <li> <a href="#"><i class="zmdi zmdi-notifications col-blue"></i><span>Link5</span> </a> </li>


			<li> <a href="#"><i class="zmdi zmdi-trending-up col-green"></i><span>Link6</span> </a> </li>

            </div>
	</aside>
<!--////////////////////////////////////////////////////////// CONTEÚDO ///////////////////////////////////////////////////////-->
<section class="content">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
            	<div class=" pl-5 ml-5">
                <div class="form-group">   
               <h2><i class="material-icons">assignment</i > Cadastro de Esquadrias</h2>
                <div id="cadastrar">
			<form action="" method="POST" class="formulario">     
            
                            <div class="codigo">Escolha o Projeto</div>
                            
        <?php
        include './classes/Combobox.php';
        include './classes/projetoDAO.class.php';

        $projetoDAO = new projetoDAO();

        $resultado = $projetoDAO->exibirTodosProjetosCadastrados();
        
        if ($resultado == false) {
            echo 'Você não possui usuários cadastrados no banco de dados!';
        } else {
            echo "<select name='combobox'>";

            for ($i = 0; $i < mysqli_num_rows($resultado); $i++) {
                $linha = mysqli_fetch_array($resultado);
                echo "<option value='".$linha['id']."'>".$linha['nome']."</option>";
              
            }
            echo "/<select>";
           
        }
        ?>
                                
                                <div class="codigo">Codigo</div>
				<input type="text" name="codigo" required>
				<div class="linha">Linha</div>
				<input type="text" name="linha" required>
                                <div class="descricao">Descricao</div>
				<input type="text" name="descricao" required>
                                <div class="peso">Peso</div>
				<input type="text" name="peso" required>
                                <div class="largura">Largura</div>
				<input type="text" name="largura" required>
                                <div class="altura">Altura</div>
				<input type="text" name="altura" required>
                                <div class="confirmar">
				<input type="submit" name="ok" value="Cadastrar">
                                </div>
			</form>
			<?php echo isset($erro) ? $erro : ''; ?>

		</div>		

	<nav></nav>
               </div>
               </div> 
            </div>
        </div>
    </div>


           </div>
        </div>
    </div>
</section>

<!-- //////////////////////////////// Js ///////////////////////////////////// --> 
<script src="js/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js --> 
<script src="js/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js --> 
<script src="js/mainscripts.bundle.js"></script><!-- Custom Js --> 
<script src="js/advanced-form-elements.js"></script> 
               
            
            
         
        

        Bem vindo <?php echo $_SESSION['usuarios']; ?><br />
        <a href="cadastroProjeto.php?logout=confirmar">Sair</a>
        <!--(Impressao) <img src="impressora.png" onclick="javascript:window.print();"> -->
<?php
	else:
		echo "Voce nao tem permissao de acesso. <a href=\"index.php\">Clique aqui para voltar</a>";
	endif;
?>

	</body>
</html>
        


