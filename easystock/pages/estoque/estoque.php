<?php
require('../../connection/verifica.php');
include_once '../../connection/config.php';

$sql = "SELECT * FROM produtos WHERE id_clientes = '" . $_SESSION["id_usuario"] . "'";
$query_estoque = "SELECT COUNT(id_produto) AS qnt_estoque FROM produtos WHERE id_clientes = '" . $_SESSION["id_usuario"] . "'";
$result = $con->query($sql);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EasyStock - Estoque</title>
    <link rel="shortcut icon" href="../../src/img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="estoque.css">
</head>

<body>
    <header>
        <nav class="menu">
            <div class="logo">
                <img src="../../src/img/logo.png" alt="">
            </div>
            <ul class="nav-list">
                <li><a href="../sistema/sistema-cliente.php" id="btn-voltar">Voltar</a></li>
                <li><a href="../login/login.php" id="btn-sair">Sair do sistema</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section class="sistema">
            <div class="sistema-box">
                <div class="sistema-container">
                    <h2>Controle de Estoque</h2>
                    <div class="table-container">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Quantidade</th>
                                    <th scope="col">Preço</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr>";
                                    echo "<td>" . $row["nome"] . "</td>";
                                    echo "<td>" . $row["quantidade"] . "</td>";
                                    echo "<td>" . $row["preco"] . "</td>";
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="total-container">
                        <?php
                        $result_estoque = $con->query($query_estoque);
                        $row_estoque = mysqli_fetch_assoc($result_estoque);
                        ?>
                        <h3>Produtos no estoque: <?php echo $row_estoque["qnt_estoque"]; ?></h3>
                    </div>
                    <button><a class="btn_relatorio" href="relatorioEstoque.php" target="_blank">Baixar relatório do estoque</a></button>
                </div>
            </div>
        </section>
    </main>


    <footer id="footer">
        <p class="copyright"> Dario Junior & Gabriel Muniz &copy; 2022 </p>
    </footer>
</body>

</html>