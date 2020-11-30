<?php

class Login extends Conexao{

	private $login;
	private $senha;
        private $senha2;
        private $nome;
        private $nivel;
        private $result;
        
        function getNivel() {
            return $this->nivel;
        }
        function getResult() {
            return $this->result;
        }

        function setResult($result) {
            $this->result = $result;
        }

                function setNivel($nivel) {
            $this->nivel = $nivel;
        }
        
        public function setNome($nome) {
            $this->nome = $nome;
        }

        public function setLogin($login){
		$this->login = $login;
	}
	public function setSenha($senha){
		$this->senha = $senha;
	}
        public function setSenha2($senha2){
		$this->senha2 = $senha2;
	}
	public function getLogin(){
		return $this->login;
	}
	public function getSenha(){
		return $this->senha;
	}
      
        public function getSenha2(){
		return $this->senha2;
	}

        public function getNome() {
            return $this->nome;
        }
        
	public function logar(){
		$pdo = parent::getDB();
		$logar = $pdo->prepare("SELECT * FROM usuarios WHERE login = ? AND senha = ?");
		$logar->bindValue(1, $this->getLogin());
		$logar->bindValue(2, $this->getSenha());
		$logar->execute();
		if ($logar->rowCount() == 1):
			$dados = $logar->fetch(PDO::FETCH_OBJ);
			$_SESSION['usuarios'] = $dados->nome;
                        $_SESSION['nivel'] = $dados->nivel;
			$_SESSION['logado'] = true;
                        include 'classes/Log.class.php';
                        $user = $_SESSION['usuarios'];
                        $r = new Log();
                        $r -> logMsg("$user fez login." );
			return true;
		else:
			return false;
		endif;
	}

	public static function deslogar() {
		if(isset($_SESSION['logado'])):
                    include 'classes/Log.class.php';
                    $user = $_SESSION['usuarios'];
                    $r = new Log();
                    $r -> logMsg("$user saiu" );
			unset($_SESSION['logado']);
			session_destroy();
			header("Location: index.php");
		endif;
	}
        
        public function teste(){
            echo 'Funcionou';
      
        }
        
        public function cadastrar($nome,$login,$senha,$senha2,$nivel){
            
        try{ 
            if ($senha === $senha2){
        $pdo = parent::getDB(); 

	$cadastrar = $pdo->prepare("INSERT INTO usuarios (login,senha,nome,nivel) VALUES (:login, :senha, :nome, :nivel);");
        $cadastrar->bindParam(":login", $this->login, PDO::PARAM_STR);
        $cadastrar->bindParam(":senha", $this->senha, PDO::PARAM_STR);
        $cadastrar->bindParam(":nome", $this->nome, PDO::PARAM_STR);
        $cadastrar->bindParam(":nivel", $this->nivel, PDO::PARAM_STR);

            if($cadastrar->execute()){
                include 'classes/Log.class.php';
                $user = $_SESSION['usuarios'];
                $r = new Log();
                $r -> logMsg("$user cadastrou o Usuário: $login" );
                echo '<script> alert("Cadastro Efetuado com Sucesso"); </script>';
            }else{
                return 'erro';
            }
            
            }else{

                 echo '<script> alert("Senhas não conferem"); </script>';
            } 
        }catch (Exception $e) {
             echo '<script> alert("Nome ou Login já existentes"); </script>';
            }       
    }
    
        
}

?>
