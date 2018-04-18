<?php
    include_once("cabecalho.php");
    include_once("conecta.php");
    include_once("produto_data_base.php");
    
    $oConexao          = new BancoDados("localhost", "root", "", "loja");
    $oProdutosDataBase = new ProdutosDataBase($oConexao);
    $iId = $_POST["id"];

    $bExclusao = $oProdutosDataBase->removeProduto($iId);

    if($bExclusao) {
        ?>
        <script>
            alert('Produto excluido com sucesso!');
            window.location.href =  'produto_lista.php';

        </script>

        <?php
    } else {

        ?>
        <script>
            alert('Não foi possivel excluir o produto!');
            window.location.href =  'produto_lista.php';

        </script>
        <?php
    }
?>