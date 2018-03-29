<?php
    include_once("cabecalho.php");
    include_once("conecta.php");
?>

<!-- Java Script  -->
<Script>
    function limpaDadosTela(id_cat, descricao, id_produto, nome_produto, preco) {
        var id_categoria = document.getElementById("id_cat"),
            descricao    = document.getElementById("descricao"),
            id_produto   = document.getElementById("id_produto"),
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
            <form action = "" method = "POST">
                <div class="form-group">
                    <label for="id_cat">Código da Categoria</label>
                    <input type="text" class="form-control" id="id_cat" placeholder="Código da Categoria">
                </div>
                <div class="form-group">
                    <label for="descricao">Descrição</label>
                    <input type="pastextword" class="form-control" id="descricao" placeholder="Descrição do Produto">
                </div>
                <div class="form-group">
                    <label for="id_produto">Código do Produto</label>
                    <input type="text" class="form-control" id="id_produto" placeholder="Código do Produto">
                </div>
                <div class="form-group">
                    <label for="nome_produto">Nome do Produto</label>
                    <input type="text" class="form-control" id="nome_produto" placeholder="Nome do Produto">
                </div>
                <div class="form-group">
                    <label for="preco">Preço do Produto</label>
                    <input type="number" class="form-control" id="preco" placeholder="Preço do Produto">
                </div>
                <button type="submit" class="btn btn-default">Confirmar</button>
                <button class="btn btn-default" onClick = "verificaDesejaCancelar()">Cancelar</button>
                <button class="btn btn-default" onClick = "limpaDadosTela(id_cat, descricao, id_produto, nome_produto, preco)">Limpar</button>   
            </form>
        </div>
    </div>
</div>