<?php
include_once('../../connection/config.php');

if(isset($_POST['update'])){

    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $nome_empresa = $_POST['empresa'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sqlUpdate = "UPDATE clientes SET nome = '$nome', nome_empresa = '$nome_empresa', email = '$email', senha = '$senha' WHERE id = '$id'";
    $result = mysqli_query($con, $sqlUpdate);

}

header("Location: ../login/login.php");