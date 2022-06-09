<?php

if (isset($_POST['submit'])) {
    include_once('../../connection/config.php');
    $nome = $_POST['nome'];
    $nome_empresa = $_POST['empresa'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $result = mysqli_query($con, "INSERT INTO clientes (nome, nome_empresa, email, senha, nivel) VALUES ('$nome', '$nome_empresa', '$email', '$senha', 'USER')");

    if ($result) {
        echo "<script>alert('Usuário cadastrado com sucesso!');top.location.href='../login/login.php';</script>";
    } else {
        echo "<script>alert('Erro ao cadastrar usuário!');top.location.href='../login/login.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EasyStock - Cadastro</title>
    <link rel="shortcut icon" href="../../src/img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="cadastro.css">
</head>

<body>
    <header>
        <nav class="menu">
            <div class="logo">
                <img src="../../src/img/logo.png" alt="">
            </div>
            <ul class="nav-list">
                <li><a href="../../index.html">Home</a></li>
                <li><a href="../login/login.php" id="btn-login">Login</a></li>
            </ul>
        </nav>
    </header>

    <div class="box-login">
        <div class="box">
            <form action="cadastro.php" method="POST" enctype="multipart/form-data">
                <fieldset>
                    <legend><b>Fórmulário de Clientes</b></legend>
                    <br>
                    <div class="inputBox">
                        <input type="text" name="nome" id="nome" class="inputUser" required>
                        <label for="nome" class="labelInput">Nome</label>
                    </div>
                    <br><br>
                    <div class="inputBox">
                        <input type="text" name="empresa" id="empresa" class="inputUser" required>
                        <label for="empresa" class="labelInput">Nome da Empresa</label>
                    </div>
                    <br><br>
                    <div class="inputBox">
                        <input type="email" name="email" id="email" class="inputUser" required>
                        <label for="email" class="labelInput">Email</label>
                    </div>
                    <br><br>
                    <div class="inputBox">
                        <input type="password" name="senha" id="senha" class="inputUser" required>
                        <label for="senha" class="labelInput">Senha</label>
                        <br><br>
                    </div>
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