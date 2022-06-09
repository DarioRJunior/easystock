<?php
require('../../connection/verifica.php');
include_once '../../connection/config.php';

$sql = "SELECT * FROM clientes ORDER BY id ASC";
$query_relatorio = "SELECT COUNT(id) AS qnt_clientes FROM clientes";
$result = $con->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EasyStock - Relatório de clientes</title>
    <link rel="shortcut icon" href="../../src/img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="relatorio-clientes.css">
</head>

<body>
    <header>
        <nav class="menu">
            <div class="logo">
                <img src="../../src/img/logo.png" alt="">
            </div>
            <ul class="nav-list">
                <li><a href="../sistema/sistema-adm.php" id="btn-voltar">Voltar</a></li>
                <li><a href="../login/login.php" id="btn-sair">Sair do sistema</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section class="sistema">
            <div class="sistema-box">
                <div class="sistema-container">
                    <h2>Relátorio de clientes</h2>
                    <div class="table-container">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Nome da Empresa</th>
                                    <th scope="col">E-mail</th>
                                    <th scope="col">nivel</th>
                                    <th scope="col">...</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr>";
                                    echo "<td>" . $row["id"] . "</td>";
                                    echo "<td>" . $row["nome"] . "</td>";
                                    echo "<td>" . $row["nome_empresa"] . "</td>";
                                    echo "<td>" . $row["email"] . "</td>";
                                    echo "<td>" . $row["nivel"] . "</td>";
                                    echo "<td class='btns'>
                                    <a class='btnEditar' href='edicao_clientes.php?id=$row[id]' title='Editar'>
                                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
                                    <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
                                </svg></a>
                                <a class='btnExcluir' href='delete.php?id=$row[id]' title='Excluir'>
                                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash-fill' viewBox='0 0 16 16'>
                                        <path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z'/>
                                    </svg>
                                </a>
                                </td>";
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
                        <h3>Total de clientes cadastrados: <?php echo $row_relatorio["qnt_clientes"]; ?></h3>
                    </div>
                    <button><a class="btn_relatorio" href="relatorioClientes.php" target="_blank">Baixar relatório</a></button>
                </div>
            </div>
        </section>
    </main>


    <footer id="footer">
        <p class="copyright"> Dario Junior & Gabriel Muniz &copy; 2022 </p>
    </footer>
</body>

</html>