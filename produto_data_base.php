<?php

    function listaProdutos($oConexao) {
        $aProdutos = array();

        $sSql = "
                SELECT p.*,
                       c.nome as cat_nome
                  FROM produtos
            INNER JOIN categorias as 
                    ON c.categoria_id = p.categoria_id
            ";

        $oResultado = mysqli_query($oConexao, $sSql);

        while($oProduto = mysqli_fetch_assoc($oResultado)) {
            array_push($aProdutos, $oProduto);
        }

        return $aProdutos;
    }

?>