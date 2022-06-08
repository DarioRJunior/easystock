<?php
require '../../connection/verifica.php';

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EasyStock - F.A.Q</title>
    <link rel="shortcut icon" href="../../src/img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="faq-cliente.css">
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

    <h1 class="titulo">F.A.Q</h1>

    <section id="manual">
        <div class="manual-container">
            <h2>Manual do Sistema</h2>
            <div class="manual-conteudo">
                <p>Olá, <?php echo $_SESSION["nome_usuario"]; ?>, Está enfrentando alguma dificuldade para entender o funcionamento do EasyStock?</p>
                <p>Baixe nosso manual:</p>
                <button><a href="../../src/manual/manual_do_sistema.pdf" download="Manual do Sistema" class="">Fazer Download</a></button>
            </div>
        </div>

    </section>

    <footer id="footer">
        <p class="copyright"> Dario Junior & Gabriel Muniz &copy; 2022 </p>
    </footer>
</body>

</html>