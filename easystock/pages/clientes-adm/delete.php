<?php 

if (!empty($_GET['id'])) {
    include_once ('../../connection/config.php');
    $id = $_GET['id'];

    $sqlSelect = "SELECT * FROM clientes WHERE id = $id";
    $result = $con->query($sqlSelect);

    if ($result->num_rows > 0) {
        $sqlDelete = "DELETE FROM clientes WHERE id =$id";
        $resultDelete = $con->query($sqlDelete);
    }
}
    header("Location: relatorio-clientes.php");
