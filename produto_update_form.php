<?php
    include_once("cabecalho.php");
    include_once("conecta.php");
    include_once("produto_data_base.php");
    
    $oConexao       = new BancoDados("localhost", "root", "", "loja");
    $oProdutosDataBase = new ProdutosDataBase($oConexao);

    $iId = $_POST["id"];
?>

<!-- Java Script  -->
<Script>
    function limpaDadosTela(id_cat, descricao, nome_produto, preco) {
        var id_categoria = document.getElementById("categoria_id"),
            descricao    = document.getElementById("cat_nome"),
            nome_produto = document.getElementById("nome_produto"),
            preco        = document.getElementById("preco");

        id_categoria.setValor('');
        descricao.setValor('');
        id_produto.setValor('');
        nome_produto.setValor('');
        preco.setValor('');
    }

    function verificaDesejaCancelar() {
        alert("Você realmente deseja cancelar o cadastro?");
    }

</script>

<div class = "jumbotron">
    <div class = "container">
        <div class = "col-xs-12 col-sm-12">
        <?php
            $aProdutos   = $oProdutosDataBase->selectProduto($iId);
            $aCategorias = $oProdutosDataBase->listaCategorias();
        ?>    
            <form action = "update_produto.php" method = "POST">
                <div class="form-group">
                    <input type="hidden" class="form-control" name="id"  id="produto_id" value="<?php echo $aProdutos[0]['id'] ?>">
                </div>
                <div class="form-group">
                    <label for="categoria_id">Código da Categoria</label>
                    <input type="text" class="form-control" name="categoria_id"  id="categoria_id" value="<?php echo $aProdutos[0]['categoria_id'] ?>">
                </div>
                <div class="form-group">
                    <select class="form-control" name ="cat_nome" id="exampleFormControlSelect2">
                        <option><?php echo $aCategorias[0]['cat_nome'] ?></option>
                        <option><?php echo $aCategorias[1]['cat_nome'] ?></option>
                        <option><?php echo $aCategorias[2]['cat_nome'] ?></option>
                        <option><?php echo $aCategorias[3]['cat_nome'] ?></option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="nome_produto">Nome do Produto</label>
                    <input type="text" class="form-control" name="nome_produto" id="nome_produto" value="<?php echo $aProdutos[0]['nome'] ?>">
                </div>
                <div class="form-group">
                    <label for="preco">Preço do Produto</label>
                    <input type="number" class="form-control" name="preco" id="preco" value="<?php echo $aProdutos[0]['preco'] ?>">
                </div>
                <button type="submit" class="btn btn-default">Confirmar</button>
                <button class="btn btn-default" onClick = "verificaDesejaCancelar()">Cancelar</button>
                <button class="btn btn-default" onClick = "limpaDadosTela(categoria_id, cat_nome, nome_produto, preco)">Limpar</button>   
            </form>
        </div>
    </div>
</div>
<?php
    include_once("footer.php");
?>