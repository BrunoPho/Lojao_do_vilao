<?php

## !!ADICIONE O CABECALHO E O RODAPE PARA A PAGINA
require_once "cabecalho.php";

require_once "../../models/CrudProdutos.php";
 
/*$codigo = $_GET['codigo'];*/
  $crud = new CrudProdutos();
  $produto = $crud->getProduto($_GET['id']);

?>

<h2>Editar Produto¨:</h2>
<form action="../../controllers/controladorProduto.php?acao=editar" method="post">

    <div class="form-group">
        <label for="produto">Produto:</label>
        <input value="<?= $produto->nome ?>" name="titulo" type="text" class="form-control" id="produto" aria-describedby="nome produto" placeholder="">
    </div>

    <div class="form-group">
        <label for="preco">Preço</label>
        <input value="<?= $produto->preco ?>" name="preco" type="number" step="0.01" class="form-control" id="preco" placeholder="">
    </div>

    <div class="form-group">
        <label for="estoque">estoque</label>
        <input value="<?= $produto->estoque ?>" name="estoque" type="number" class="form-control" id="estoque" placeholder="">
    </div>

    <div class="form-group">
        <label for="Categoria">Categoria</label>
        <select name="categoria" class="form-control" id="Categoria">

     <option <?php if($produto->categoria == "Armas      ") {echo "selected";} ?> > Armas      </option>
     <option <?php if($produto->categoria == "Roupas     ") {echo "selected";} ?> > Roupas     </option>  
     <option <?php if($produto->categoria == "Acessorios ") {echo "selected";} ?> > Acessarios </option>

        </select>
    </div>

    <input type="hidden" name="id" value="<?= $produto->codigo ?>">

    <button type="submit" class="btn btn-primary">Atualizar</button>

</form>

<?php

    require_once "rodape.php";

?>