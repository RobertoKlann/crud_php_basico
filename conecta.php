<?php
/**
 * Classe de Conexão de Banco de Dados
 * 
 * @author Roberto Klann
 * @since 18/04/2018
 */
class BancoDados {
    //Variavel Local de Conexao
    private $oConexao = null;
    
    public function __construct($oRost, $oUsuario, $oSenha, $oBase) {
        $this->setConexao($oRost, $oUsuario, $oSenha, $oBase);
    }
    
    public function getConexao() {
        $this->oConexao = (is_null($this->oConexao)) ? $this->setConexao("localhost", "root", "", "loja") : $this->oConexao;
        return $this->oConexao;
    }
    
    private function setConexao($oRost, $oUsuario, $oSenha, $oBase) {
       $this->oConexao = mysqli_connect($oRost, $oUsuario, $oSenha, $oBase);
    }
}