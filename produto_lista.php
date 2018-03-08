<?php
    include_once("cabecalho.php");
    include_once("conecta.php");
    include_once("produto_data_base.php");
?>

    <table class ="table table-striped table-bordered">
        <tr>
            <td>Nome</td>
            <td>Preço</td>
            <td>Descrição</td>
            <td>Categoria</td>
            <td>Ações</td>
        </tr>

        <?php
            $produtos = listaProduto($conexao);
            foreach($produtos as $produto) :
        ?>

             <tr>
                <td><?=$produto["nome"]?></td>
                <td><?=$produto["preco"]?></td>
                <td><?=$produto["descricao"]?></td>
                <td><?=$produto["cat_nome"]?></td>
                <td>
                    <a class ="btn btn-primary" href ="update_produto.php">Testezera</a>
                </td>
            </tr>   

        <?php
            endforeach;
        ?>
    </table>
<?php
    include_once("footer.php");
?>