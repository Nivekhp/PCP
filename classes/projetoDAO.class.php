<?php

class projetoDAO {

    private $conexao;

    public function __construct() {
        $this->conexao = new Conexao1();
    }
    
     public function exibirTodosProjetosCadastrados() {
        $sql = "SELECT * FROM projetos ";
        $resultado = mysqli_query($this->conexao->getCon(), $sql);
        if (mysqli_num_rows($resultado) > 0) {
            return $resultado;
        } else {
            return false;
        }
    }
    

}

?>
