<?php
    include_once("cabecalho.php");
    include_once("conecta.php");
    include_once("produto_data_base.php");
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
            $oProdutos = listaProdutos($oConexao);
            foreach($oProdutos as $oProduto) :
        ?>

             <tr>
                <td><?=$oProduto["id"]?></td>
                <td><?=$oProduto["nome"]?></td>
                <td><?=$oProduto["preco"]?></td>
                <td><?=$oProduto["descricao"]?></td>
                <td><?=$oProduto["cat_nome"]?></td>

                <td>
                    <a class ="btn btn-primary" href ="produto_update_form.php?id=".$oProduto["id"]>Alterar</a>
                </td>
            </tr>   

        <?php
            endforeach;
        ?>
    </table>
<?php
    include_once("footer.php");
?>