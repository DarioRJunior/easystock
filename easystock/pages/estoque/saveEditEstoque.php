<?php
include_once('../../connection/config.php');

if (isset($_POST['update'])) {

    $id_produto = $_POST['id_produto'];
    $nome = $_POST['nome'];
    $quantidade = $_POST['quantidade'];
    $preco = $_POST['preco'];

    $sqlUpdate = "UPDATE produtos SET nome = '$nome', quantidade = '$quantidade', preco = '$preco' WHERE id_produto = '$id_produto'";

    $result = $con->query($sqlUpdate);
}

header("Location: estoque.php");
