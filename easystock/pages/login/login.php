<?php
include('../../connection/config.php');
session_start(); // Inicia a sessão

//Validar Login
if (@$_REQUEST['submit'] == "Entrar") {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $query = "SELECT * FROM clientes WHERE email = '$email' AND senha = '$senha' ";
    $result = mysqli_query($con, $query);
    while ($coluna = mysqli_fetch_array($result)) {
        $_SESSION["id_usuario"] = $coluna["id"];
        $_SESSION["nome_usuario"] = $coluna["nome"];
        $_SESSION["email_usuario"] = $coluna["email"];
        $_SESSION["nome_empresa"] = $coluna["nome_empresa"];
        $_SESSION["UsuarioNivel"] = $coluna["nivel"];

        // caso queira direcionar para páginas diferentes
        $niv = $coluna['nivel'];
        if ($niv == "USER") {
            header("Location: ../sistema/sistema-cliente.php");
            exit;
        }

        if ($niv == "ADM") {
            header("Location: ../sistema/sistema-adm.php");
            exit;
        }
        // ----------------------------------------------
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EasyStock - Login</title>
    <link rel="stylesheet" href="login.css">
</head>

<body>
    <header>
        <nav class="menu">
            <div class="logo">
                <img src="../../src/img/logo.png" alt="">
            </div>
            <ul class="nav-list">
                <li><a href="../../index.html">Home</a></li>
                <li><a href="../cadastro/cadastro.php" id="btn-cadastrar">Cadastrar</a></li>
            </ul>
        </nav>
    </header>

    <div class="box-login">
        <h1>Login</h1>
        <form action="login.php" method="POST">
            <input type="email" name="email" placeholder="email">
            <br><br>
            <input type="password" name="senha" placeholder="Senha">
            <br><br>
            <input class="inputsubmit" type="submit" name="submit" value="Entrar">
        </form>
    </div>

    <footer id="footer">
        <p class="copyright"> Dario Junior & Gabriel Muniz &copy; 2022 </p>
    </footer>
</body>

</html>