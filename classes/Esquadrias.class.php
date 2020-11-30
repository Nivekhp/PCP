<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Esquadrias
 *
 * @author Kevin
 */
class Esquadrias extends Conexao{
    private $codigo;
    private $linha;
    private $descricao;
    private $peso;
    private $largura;
    private $altura;
    private $id_projeto;
    
    public function getCodigo() {
        return $this->codigo;
    }

    public function getLinha() {
        return $this->linha;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function getPeso() {
        return $this->peso;
    }

    public function getLargura() {
        return $this->largura;
    }

    public function getAltura() {
        return $this->altura;
    }

    public function getId_projeto() {
        return $this->id_projeto;
    }

    public function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    public function setLinha($linha) {
        $this->linha = $linha;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    public function setPeso($peso) {
        $this->peso = $peso;
    }

    public  function setLargura($largura) {
        $this->largura = $largura;
    }

    public function setAltura($altura) {
        $this->altura = $altura;
    }

    public function setId_projeto($id_projeto) {
        $this->id_projeto = $id_projeto;
    }
    
    public function cadastrar($codigo,$linha,$descricao,$peso,$largura,$altura,$id_projeto){
        $pdo = parent::getDB();
	$cadastrar = $pdo->prepare("INSERT INTO esquadrias (codigo,linha,descricao,peso,largura,altura,id_projeto) VALUES (:codigo, :linha, :descricao, :peso, :largura, :altura, :id_projeto);");
        $cadastrar->bindParam(":codigo", $this->codigo, PDO::PARAM_STR);
        $cadastrar->bindParam(":linha", $this->linha, PDO::PARAM_STR);
        $cadastrar->bindParam(":descricao", $this->descricao, PDO::PARAM_STR);
        $cadastrar->bindParam(":peso", $this->peso, PDO::PARAM_STR);
        $cadastrar->bindParam(":largura", $this->largura, PDO::PARAM_STR);
        $cadastrar->bindParam(":altura", $this->altura, PDO::PARAM_STR);
        $cadastrar->bindParam(":id_projeto", $this->id_projeto, PDO::PARAM_STR);

            if($cadastrar->execute()){
                include 'classes/Log.class.php';
                $user = $_SESSION['usuarios'];
                $r = new Log();
                $r -> logMsg("$user cadastrou a Esquadria: $codigo,$descricao" );
                echo '<script> alert("Cadastro Efetuado com Sucesso"); </script>'; 
            }else{
                return 'erro';
            }
        //$cadastrar->execute();   
    }

    
    

}
