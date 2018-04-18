<?php
    include_once("cabecalho.php");
    include_once("conecta.php");
    include_once("produto_data_base.php");
    
    $oConexao          = new BancoDados("localhost", "root", "", "loja");
    $oProdutosDataBase = new ProdutosDataBase($oConexao);

    
    $aCampos = [
        "id" => $_POST["id"],
        "categoria_id" => $_POST["categoria_id"],
        "cat_nome" => $_POST["cat_nome"],
        "nome_produto" => $_POST["nome_produto"],
        "preco" => $_POST["preco"]
    ];

    $oResultado = $oProdutosDataBase->alteraProduto($aCampos);
    
    if(!$oResultado) {
        echo "Produto não encontrado";
    } else {

?>
        <script>
            alert("Produto alterado com sucesso!");
            window.location.href =  'produto_lista.php';
        </script>
<?php
        
    }

?>