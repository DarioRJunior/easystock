<?php
require('../../connection/verifica.php');
include_once '../../connection/config.php';

if (!empty($_GET['search'])) {
    $data = $_GET['search'];
    $sql = "SELECT * FROM produtos WHERE nome LIKE '%$data%' or quantidade LIKE '%$data%' or preco LIKE '%$data%' ORDER BY id_produto DESC";
} else {
    $sql = "SELECT * FROM produtos WHERE id_clientes = '" . $_SESSION["id_usuario"] . "'";
}
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
                <div class="box-search">
                    <input type="search" placeholder="Pesquisar" id="pesquisar">
                    <button onclick="searchData()" class="btn-search">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                        </svg>
                    </button>
                </div>
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
                                    echo "<td class='btns'>
                                <a class='btnExcluir' href='delete.php?id=$row[id_produto]' title='Excluir'>
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

<script>
    var search = document.getElementById('pesquisar');
    search.addEventListener("keydown", function(event) {
        if (event.key == "Enter") {
            searchData();
        }
    });

    function searchData() {
        window.location = 'estoque.php?search=' + search.value;
    }
</script>

</html>