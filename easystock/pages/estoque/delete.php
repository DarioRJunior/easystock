<?php 

if (!empty($_GET['id'])) {
    include_once ('../../connection/config.php');
    $id = $_GET['id'];

    $sqlSelect = "SELECT * FROM produtos WHERE id_produto = $id";
    $result = $con->query($sqlSelect);

    if ($result->num_rows > 0) {
        $sqlDelete = "DELETE FROM produtos WHERE id_produto =$id";
        $resultDelete = $con->query($sqlDelete);
    }
}
    header("Location: estoque.php");
