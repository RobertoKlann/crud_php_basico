<?php
    include_once("cabecalho.php");
    include_once("conecta.php");
    include_once("produto_data_base.php");

    $aCampos = ['nome_produto'];
    $aCampos = ['preco'];
    $aCampos = ['cat_nome'];
    $aCampos = ['id'];
    $aCampos = ['categoria_id'];

    $oResultado = alteraProduto($oConexao, $aCampos);
    if(!$oResultado) {
        echo "Produto não encontrado";
    }

?>