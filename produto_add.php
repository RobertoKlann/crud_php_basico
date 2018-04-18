<?php
    include_once("cabecalho.php");
    include_once("conecta.php");
    include_once("produto_data_base.php");
    
    $oConexao = new BancoDados("localhost", "root", "", "loja");
    $oProdutosDataBase = new ProdutosDataBase($oConexao);

    $aCampos = [
        "id_cat"       => $_POST["id_cat"],
        "descricao"    => $_POST["descricao"],
        "id_produto"   => $_POST["id_produto"],
        "nome_produto" => $_POST["nome_produto"],
        "preco"        => $_POST["preco"]
    ];

    $bInclusao = $oProdutosDataBase->addProduto($aCampos);

    if($bInclusao) {
        ?>
       <script>
            alert("Produto cadastrado com Sucesso!");
            window.location.href = 'produto_form.php';
        </script>

        <?php
    } else {
        ?>
        <script>
            alert("Produto não cadastrado!");
            window.location.href = 'produto_form.php';
        </script>

        <?php
    }

?>