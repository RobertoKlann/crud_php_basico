<?php

    function listaProdutos($oConexao) {
        $aProdutos = array();

        $sSql = "
                SELECT *
                  FROM produtos
                  JOIN categorias  
                    ON categoria_id = categoria_id
            ";

        $oResultado = mysqli_query($oConexao, $sSql);

        while($oLinhas = mysqli_fetch_array($oResultado)) {
              $aProdutos[] =  $oLinhas;
        }
        return $aProdutos;
    }

?>