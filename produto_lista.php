<?php
    include_once("cabecalho.php");
    include_once("conecta.php");
    include_once("produto_data_base.php");
    
    $oConexao         = new BancoDados("localhost", "root", "", "loja");
    $oProdutoDataBase = new ProdutosDataBase($oConexao);
?>

    <table class ="table table-striped table-bordered">
        <tr>
            <td>Código Produto</td>
            <td>Nome</td>
            <td>Preço</td>
            <td>Descrição</td>
            <td>Categoria</td>
            <td>Ações</td>
        </tr>

        <?php
            $oProdutos = $oProdutoDataBase->listaProdutos();
            foreach($oProdutos as $oProduto) :
        ?>

             <tr>
                <td><?=$oProduto["id"]?></td>
                <td><?=$oProduto["nome"]?></td>
                <td><?=$oProduto["preco"]?></td>
                <td><?=$oProduto["descricao"]?></td>
                <td><?=$oProduto["cat_nome"]?></td>

                <td>
                    <form class="btn-group" action ="produto_update_form.php" method ="POST">
                        <input type ="hidden" name ="id" value="<?php echo $oProduto["id"]?>">
                        <input class ="btn btn-primary" type ="submit" value ="Alterar"></input>
                    </form>
                    <form class="btn-group" action ="produto_delete.php" method ="POST">
                        <input type ="hidden" name ="id" value="<?php echo $oProduto["id"]?>">
                        <input class ="btn btn-primary" type ="submit" value ="Excluir"></input>
                    </form>
                </td>
            </tr>   

        <?php
            endforeach;
        ?>
    </table>
<?php
    include_once("footer.php");
?>