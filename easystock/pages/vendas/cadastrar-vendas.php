<?php
require('../../connection/verifica.php');
include_once('../../connection/config.php');

if (isset($_POST['submit'])) {
    include_once('../../connection/config.php');
    $id_clientes = $_SESSION['id_usuario'];
    $nome_produto = $_POST['nome_produto'];
    $preco = $_POST['preco'];
    $quantidade = $_POST['quantidade'];

    $sql = "INSERT INTO vendas (id_clientes, id_produto, preco, quantidade, dataVenda) VALUES ('$id_clientes','$nome_produto', '$preco', '$quantidade', NOW())";
    $result = mysqli_query($con, $sql);

    if ($result) {
        echo "<script>alert('Venda cadastrada com sucesso!');</script>";
        echo "<script>window.location.href = '../../pages/vendas/cadastrar-vendas.php';</script>";
    } else {
        echo "<script>alert('Erro ao cadastrar venda!');</script>";
        echo "<script>;</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EasyStock - Cadastro de vendas</title>
    <link rel="shortcut icon" href="../../src/img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="cadastrar-vendas.css">
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

    <div class="box-login">
        <div class="box">
            <form action="cadastrar-vendas.php" method="POST" enctype="multipart/form-data">
                <fieldset>
                    <legend><b>Cadastar venda</b></legend>
                    <br>
                    <div class="inputBox">
                        <label for="produto">Produto</label> <br>
                        <select name="select_produto" id="produto">
                            <option selected disable value="">Escolha...</option>
                            <?php
                            $result_produtos = "SELECT * FROM produtos WHERE id_clientes = '" . $_SESSION["id_usuario"] . "' ORDER BY nome";
                            $resultado_produtos = mysqli_query($con, $result_produtos);
                            while ($row_produtos = mysqli_fetch_assoc($resultado_produtos)) {
                                echo '<option value="' . $row_produtos['id'] . '">' . $row_produtos['nome'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <br><br>
                    <div class="inputBox">
                        <input type="text" name="preco" id="preco" class="inputUser" required>
                        <label for="preco" class="labelInput">Preço</label>
                    </div>
                    <br><br>
                    <div class="inputBox">
                        <input type="text" name="quantidade" id="quantidade" class="inputUser" required>
                        <label for="quantidade" class="labelInput">Quantidade</label>
                    </div>
                    <br><br>
                    <input type="submit" name="submit" id="submit" value="Cadastrar">
                </fieldset>
            </form>
        </div>
    </div>

    <footer id="footer">
        <p class="copyright"> Dario Junior & Gabriel Muniz &copy; 2022 </p>
    </footer>
</body>

</html>