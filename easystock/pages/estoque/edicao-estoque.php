<?php
require '../../connection/verifica.php';

if (!empty($_GET['id'])) {
    include_once('../../connection/config.php');
    $id_produto = $_GET['id'];

    $sqlSelect = "SELECT * FROM produtos WHERE id_produto = $id_produto";
    $result = $con->query($sqlSelect);

    if ($result->num_rows > 0) {
        while ($produtos_data = mysqli_fetch_assoc($result)) {
            $nome = $produtos_data['nome'];
            $quantidade = $produtos_data['quantidade'];
            $preco = $produtos_data['preco'];
        }
    } else {
        header("Location: ../estoque/estoque.php");
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EasyStock - Editar Produto</title>
    <link rel="shortcut icon" href="../../src/img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="edicao-estoque.css">
</head>

<body>
    <header>
        <nav class="menu">
            <div class="logo">
                <img src="../../src/img/logo.png" alt="">
            </div>
            <ul class="nav-list">
                <li><a href="estoque.php" id="btn-voltar">Voltar</a></li>
                <li><a href="../login/login.php" id="btn-sair">Sair</a></li>
            </ul>
        </nav>
    </header>

    <div class="box-login">
        <div class="box">
            <form action="saveEditEstoque.php" method="POST">
                <fieldset>
                    <legend><b>Editar Produto</b></legend>
                    <br>
                    <div class="inputBox">
                        <input type="text" name="nome" id="nome" value="<?php echo $nome ?>" class="inputUser" required>
                        <label for="nome" class="labelInput">Nome</label>
                    </div>
                    <br><br>
                    <div class="inputBox">
                        <input type="text" name="quantidade" id="quantidade" value="<?php echo $quantidade ?>" class="inputUser" required>
                        <label for="quantidade" class="labelInput">Quantidade</label>
                    </div>
                    <br><br>
                    <div class="inputBox">
                        <input type="text" name="preco" id="preco" value="<?php echo $preco ?>" class="inputUser" required>
                        <label for="preco" class="labelInput">Preço</label>
                    </div>
                    <br><br>
                    <input type="hidden" name="id" value="<?php echo $id ?>">
                    <input type="submit" name="update" id="update" value="Atualizar" onclick="mensagem()">
                </fieldset>
            </form>
        </div>
    </div>

    <footer id="footer">
        <p class="copyright"> Dario Junior & Gabriel Muniz &copy; 2022 </p>
    </footer>
</body>

<script>
    function mensagem() {
        alert("Produto atualizado com sucesso!");
    }
</script>

</html>