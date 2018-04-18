<?php

/**
 * Classe responsavel por executar todas as funções de banco de dados
 * 
 * @author Roberto Klann
 * @since 18/04/2018
 */
class ProdutosDataBase {
    
    private $oDataBase;
    
    /**
     * Método Construtor da Classe
     * 
     * @param type $oConexao
     */
    public function __construct($oConexao) {
        $this->oDataBase = $oConexao;
    }
    
    public function listaProdutos() {
        $aProdutos = array();

        $sSql = "
                SELECT p.*,
                       c.cat_nome,
                       c.id   AS categoria_id
                  FROM produtos AS p
                  JOIN categorias AS c
                    ON c.id = p.categoria_id
            ";

        $oResultado = mysqli_query($this->oDataBase->getConexao(), $sSql);

        while($oLinhas = mysqli_fetch_array($oResultado)) {
              $aProdutos[] =  $oLinhas;
        }
        return $aProdutos;
    }

    /**
     * Método retorna o produto passado por parametro
     * 
     * @param type $iId
     * @return type
     */
    public function selectProduto($iId) {
        $aProdutos = array();

        $sSql = '
               SELECT p.*,
                      c.cat_nome,
                      c.id AS categoria_id
                 FROM produtos AS p
                 JOIN categorias AS c
                   ON c.id = p.categoria_id
                WHERE p.id = ' . $iId;

        $oResultado = mysqli_query($this->oDataBase->getConexao(), $sSql);

        while($oLinhas = mysqli_fetch_array($oResultado)) {
              $aProdutos[] =  $oLinhas;
        }
        return $aProdutos;
    }

    /**
     * Método utilizado para realizar o UPDATE no produto
     * 
     * @param type $aCamposAlterar
     * @return type
     */
    public function alteraProduto($aCamposAlterar) {

        
        $sSql = "
            UPDATE produtos
               SET nome = '" . $aCamposAlterar["nome_produto"] . "', categoria_id = " . $aCamposAlterar["categoria_id"] .', 
                          preco = ' . $aCamposAlterar["preco"] . " WHERE id = 1";
                          
        return mysqli_query($this->oDataBase->getConexao(), $sSql);
    }


    /**
     * Método utilizado para realizar o DELETE do produto
     * 
     * @param type $iId
     * @return type
     */
    public function removeProduto($iId) {
        $sSql = '
            DELETE 
              FROM produtos 
             WHERE id = ' . $iId;

        return mysqli_query($this->oDataBase->getConexao(), $sSql);
    }

    /**
     * Método utilizado para listar todas as categorias da base de dados
     * 
     * @return type
     */
    public function listaCategorias() {
        $aCategorias = array();
        
        $sSql = '
            SELECT c.cat_nome
              FROM produtos AS p
              JOIN categorias as c
                ON c.id = p.categoria_id';

        $oResultado = mysqli_query($this->oDataBase->getConexao(), $sSql);
        
        while($oLinhas = mysqli_fetch_array($oResultado)) {
            $aCategorias[] =  $oLinhas;
      }
      return $aCategorias;
    }

    /**
     * Método utilizado para realizar o INSERT de produtos
     * 
     * @param type $aCampos
     * @return type
     */
    public function addProduto($aCampos) {

        $sSql = "
            INSERT INTO produtos (id, nome, preco, descricao, categoria_id)
                 VALUES (" . $aCampos["id_produto"] . ", '" . $aCampos["nome_produto"] . "'," .  $aCampos["preco"] . ",'" . $aCampos["descricao"] . "'," . $aCampos["id_cat"] . ")
        ";

        return mysqli_query($this->oDataBase->getConexao(), $sSql);
    }
    
}