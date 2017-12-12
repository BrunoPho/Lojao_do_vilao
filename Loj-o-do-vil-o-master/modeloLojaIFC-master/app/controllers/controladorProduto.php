<?php

// O Controlador é a peça de código que sabe qual classe chamar, para onde redirecionar e etc.
// Use o método $_GET para obter informações vindas de outras páginas.

require_once "../models/Produto.php";
require_once "../models/CrudProdutos.php";

//quando um valor da URL for igual a cadastrar faça isso
if ( $_GET['acao'] == 'cadastrar'){

    //crie um objeto $crud
    $produto = new Produto($_POST['nome'],$_POST['preco'],$_POST['categoria'],$_POST['estoque']);

    $crud = new CrudProdutos();

    $crud->salvar($produto);

    //redirecione para a página de produtos
    header('location:../views/admin/produtos.php');
}

//quando um valor da URL for igual a editar faça isso
if ( $_GET['acao'] == 'editar'){

    $nome       = $_POST['nome'];
    $preco      = $_POST['preco'];
    $categoria  = $_POST['categoria'];
    $estoque    = $_POST['estoque'];
    $codigo     = $_POST['codigo'];
    
    //$produto = new Produto($_POST);
    $crud = new CrudProdutos();
    $crud->editar($codigo, $nome, $categoria, $preco, $estoque);


    //$crud = new CrudProdutos();
    //$crud->editar($id);
    //algoritmo para editar

    //redirecione para a página de produtos
    header('location:../views/admin/produtos.php');
}

//quando um valor da URL for igual a excluir faça isso
if ( $_GET['acao'] == 'excluir'){


    //algoritmo para excluir
    //redirecione para a página de produtos

    $crud = new CrudProdutos();
    $crud->excluirProduto($_GET['id']);

    header('location:../views/admin/produtos.php');
}

if ($_GET['action'] == 'comprar'){
    $crud = new CrudProdutos();
    $msg = $crud->comprar($_POST['codigo'], $_POST['estoque']);
    header("location: ../views/produto.php?codigo=$_POST[codigo]&msg=$msg");
}
