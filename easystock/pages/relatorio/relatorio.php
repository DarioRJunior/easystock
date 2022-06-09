<?php
require('../../connection/verifica.php');
include_once '../../connection/config.php';

$sql = "SELECT * FROM vendas WHERE id_clientes = '" . $_SESSION["id_usuario"] . "'";
$query_relatorio = "SELECT COUNT(id_venda) AS qnt_vendas, SUM(preco) AS total_vendas FROM vendas WHERE id_clientes = '" . $_SESSION["id_usuario"] . "'";
$result = $con->query($sql);

function invdata($dataVenda) 
{
    $parte = explode("-", $dataVenda);
    return ($parte[2] . "-" . $parte[1] . "-" . $parte[0]);
} 

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EasyStock - Relatório de vendas</title>
    <link rel="shortcut icon" href="../../src/img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="relatorio.css">
</head>

<body>
    <header>
        <nav class="menu">
            <div class="logo">
                <img src="../../src/img/logo.png" alt="">
            </div>
            <ul class="nav-list">
                <li><a href="../../index.html">Home</a></li>
                <li><a href="../sistema/sistema-cliente.php" id="btn-voltar">Voltar</a></li>
                <li><a href="../login/login.php" id="btn-sair">Sair</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section class="sistema">
            <div class="sistema-box">
                <div class="sistema-container">
                    <h2>Relátorio de Vendas</h2>
                    <div class="table-container">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Quantidade</th>
                                    <th scope="col">Preço</th>
                                    <th scope="col">Data</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr>";
                                    echo "<td>" . $row["nome"] . "</td>";
                                    echo "<td>" . $row["quantidade"] . "</td>";
                                    echo "<td>" . $row["preco"] . "</td>";
                                    echo "<td>" . invdata($row["dataVenda"]) . "</td>";
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="total-container">
                        <?php
                        $result_relatorio = $con->query($query_relatorio);
                        $row_relatorio = mysqli_fetch_assoc($result_relatorio);
                        ?>
                        <h3>Total de vendas: <?php echo $row_relatorio["qnt_vendas"]; ?></h3>
                        <h3>Total de vendas: R$ <?php echo $row_relatorio["total_vendas"]; ?></h3>
                    </div>
                    <button><a class="btn_relatorio" href="gerarPdf.php" target="_blank">Baixar relatório</a></button>
                </div>
            </div>
        </section>
    </main>


    <footer id="footer">
        <p class="copyright"> Dario Junior & Gabriel Muniz &copy; 2022 </p>
    </footer>
</body>

</html>