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
                <button><a href="../../src/manual/manual_do_sistema.pdf" download="Manual do Sistema" class="btn-manual">Fazer Download</a></button>
            </div>
        </div>
    </section>

    <section id="cadastro">
        <div class="cadastro-container">
            <h2>Posso criar mais funcionários?</h2>
            <div class="cadastro-conteudo">
                <p>No momento a EasyStock, trabalha apenas com 1 funcionário cadastrado por empresa.</p>
                <p>Em atualizações futuras pretendemos deixar cada empresa criar o cadastro dos seus funcionários.</p>
            </div>
        </div>

    </section>

    <section id="contato">
        <div class="contato-container">
            <h2>Entre em contato conosco</h2>
            <div class="contato-conteudo">
                <p>Para demais dúvidas e/ou informações entre em contato conosco por meio de nosso endereço de e-mail:</p>
               <p class="email"><a href="mailto:easystock@gmail.com">easystock@gmail.com</a></p>
            </div>
        </div>
    </section>

    <footer id="footer">
        <p class="copyright"> Dario Junior & Gabriel Muniz &copy; 2022 </p>
    </footer>
</body>

</html>