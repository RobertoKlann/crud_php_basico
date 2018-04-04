<?php

    function listaProdutos($oConexao) {
        $aProdutos = array();

        $sSql = "
                SELECT p.*,
                       c.cat_nome,
                       c.id   AS categoria_id
                  FROM produtos AS p
                  JOIN categorias AS c
                    ON c.id = p.categoria_id
            ";

        $oResultado = mysqli_query($oConexao, $sSql);

        while($oLinhas = mysqli_fetch_array($oResultado)) {
              $aProdutos[] =  $oLinhas;
        }
        return $aProdutos;
    }

    function selectProduto($oConexao, $iId) {
        $aProdutos = array();

        $sSql = '
               SELECT p.*,
                      c.cat_nome,
                      c.id AS categoria_id
                 FROM produtos AS p
                 JOIN categorias AS c
                   ON c.id = p.categoria_id
                WHERE p.id = ' . $iId;

        $oResultado = mysqli_query($oConexao, $sSql);

        while($oLinhas = mysqli_fetch_array($oResultado)) {
              $aProdutos[] =  $oLinhas;
        }
        return $aProdutos;
    }

    function alteraProduto($oConexao, $aCamposAlterar) {

        
        $sSql = "
            UPDATE produtos
               SET nome = '" . $aCamposAlterar["nome_produto"] . "', categoria_id = " . $aCamposAlterar["categoria_id"] .', 
                          preco = ' . $aCamposAlterar["preco"] . " WHERE id = 1";
                          
        return mysqli_query($oConexao, $sSql);
    }


    function removeProduto($oConexao, $iId) {
        $sSql = '
            DELETE 
              FROM produtos 
             WHERE id = ' . $iId;

        return mysqli_query($oConexao, $sSql);
    }

    function listaCategorias($oConexao) {
        $aCategorias = array();
        
        $sSql = '
            SELECT c.cat_nome
              FROM produtos AS p
              JOIN categorias as c
                ON c.id = p.categoria_id';

        $oResultado = mysqli_query($oConexao, $sSql);
        
        while($oLinhas = mysqli_fetch_array($oResultado)) {
            $aCategorias[] =  $oLinhas;
      }
      return $aCategorias;
    }

    function addProduto($oConexao, $aCampos) {

        $sSql = "
            INSERT INTO produtos (id, nome, preco, descricao, categoria_id)
                 VALUES (" . $aCampos["id_produto"] . ", '" . $aCampos["nome_produto"] . "'," .  $aCampos["preco"] . ",'" . $aCampos["descricao"] . "'," . $aCampos["id_cat"] . ")
        ";

        return mysqli_query($oConexao, $sSql);
    }

?>  