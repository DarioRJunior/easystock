<?php
require '../../connection/verifica.php';
if ($_SESSION["UsuarioNivel"] != "ADM") echo "<script>alert('Você não é Administrador!');top.location.href='sistema-cliente.php';</script>";
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EasyStock - Administração</title>
    <link rel="shortcut icon" href="../../src/img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="sistema-adm.css">
</head>

<body>
    <header>
        <nav class="menu">
            <div class="logo">
                <img src="../../src/img/logo.png" alt="">
            </div>
            <ul class="nav-list">
                <li><a href="../login/login.php" id="btn-sair">Sair do sistema</a></li>
            </ul>
        </nav>
    </header>
    <div class="adm">
        <p> Bem vindo ADM: <?php echo $_SESSION["nome_usuario"]; ?> - <?php echo $_SESSION["nome_empresa"]; ?></p>
    </div>

    <main>
        <section class="sistema">
            <div class="sistema-box">
                <div class="sistema-container">
                    <h2>Sistema <?php echo $_SESSION["nome_empresa"]; ?></h2>
                    <a href="../cadastro/cadastrar-adm.php">Cadastrar Administrador</a>
                    <a href="../clientes-adm/relatorio-clientes.php">Ver clientes</a>
                </div>
            </div>
        </section>
    </main>

    <footer id="footer">
        <p class="copyright"> Dario Junior & Gabriel Muniz &copy; 2022 </p>
    </footer>

</body>

</html>