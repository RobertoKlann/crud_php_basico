<?php
    include_once("cabecalho.php");
    include_once("conecta.php");
    include_once("produto_data_base.php");
    
    $oConexao         = new BancoDados("localhost", "root", "", "loja");
    $oProdutoDataBase = new ProdutosDataBase($oConexao);
    
?>

<div class = "jumbotron">
    <div class = "container">
        <div class = "col-xs-12 col-sm-12">
            <form action = "produto_add.php" method = "POST">
                <div class="form-group">
                    <label for="id_cat">Código da Categoria</label>
                    <input type="number" class="form-control" name="id_cat" placeholder="Código da Categoria">
                </div>
                <div class="form-group">
                    <label for="descricao">Descrição</label>
                    <input type="pastextword" class="form-control" name="descricao" placeholder="Descrição do Produto">
                </div>
                <div class="form-group">
                    <label for="id_produto">Código do Produto</label>
                    <input type="number" class="form-control" name="id_produto" placeholder="Código do Produto">
                </div>
                <div class="form-group">
                    <label for="nome_produto">Nome do Produto</label>
                    <input type="text" class="form-control" name="nome_produto" placeholder="Nome do Produto">
                </div>
                <div class="form-group">
                    <label for="preco">Preço do Produto</label>
                    <input type="number" class="form-control" name="preco" placeholder="Preço do Produto">
                </div>
                <button type="submit" class="btn btn-default">Confirmar</button>
                <a class="btn btn-default" href = "produto_lista.php">Cancelar</a>
                <button class="btn btn-default" onClick = "limpaDadosTela(id_cat, descricao, id_produto, nome_produto, preco)">Limpar</button>   
            </form>
        </div>
    </div>
</div>
<?php
    include_once("footer.php");
?>