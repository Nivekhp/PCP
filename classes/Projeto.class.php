<?php



class Projeto extends Conexao{
    //put your code here
    
    private $nome;
    private $empresa;

    
    public function getNome() {
        return $this->nome;
    }

    public function getEmpresa() {
        return $this->empresa;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setEmpresa($empresa) {
        $this->empresa = $empresa;
    }
    public function cadastrar($nome,$empresa){
        $pdo = parent::getDB();
	$cadastrar = $pdo->prepare("INSERT INTO projetos (nome, empresa) VALUES (:nome, :empresa);");
        $cadastrar->bindParam(":nome", $this->nome, PDO::PARAM_STR);
        $cadastrar->bindParam(":empresa", $this->empresa, PDO::PARAM_STR);

            if($cadastrar->execute()){
                include 'classes/Log.class.php';
                $user = $_SESSION['usuarios'];
                $r = new Log();
                $r -> logMsg("$user cadastrou o Projeto: $nome" );
                echo '<script> alert("Cadastro Efetuado com Sucesso"); </script>';
 
            }else{
                return 'erro';
            }
        //$cadastrar->execute();   
    }
    


}
