<?php
require '../../connection/verifica.php';

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EasyStock - Sistema</title>
    <link rel="shortcut icon" href="../../src/img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="sistema-cliente.css">
</head>

<body>
    <header>
        <nav class="menu">
            <div class="logo">
                <img src="../../src/img/logo.png" alt="">
            </div>
            <ul class="nav-list">
                <li><a href="../perfil/editar-perfil-cliente.php?id=<?php echo $_SESSION["id_usuario"];?>" id="btn-perfil">Ver Perfil</a></li>
                <li><a href="../login/login.php" id="btn-sair">Sair do sistema</a></li>
            </ul>
        </nav>
    </header>
    <div class="cliente">
        <p> Bem vindo, <?php echo $_SESSION["nome_usuario"]; ?></p>
    </div>
    <main>
        <section class="sistema">
            <div class="sistema-box">
                <div class="sistema-container">
                    <h2>Sistema <?php echo $_SESSION["nome_empresa"]; ?></h2>
                    <a href="../produtos/cadastro-produtos.php">Cadastrar Produto</a>
                    <a href="../vendas/cadastrar-vendas.php">Registrar Vendas</a>
                    <a href="../estoque/estoque.php">Ver Estoque</a>
                    <a href="../relatorio/relatorio.php">Ver relatório de vendas</a>
                    <a href="../faq/faq-cliente.php">F.A.Q</a>
                </div>
            </div>
        </section>
    </main>

    <footer id="footer">
        <p class="copyright"> Dario Junior & Gabriel Muniz &copy; 2022 </p>
    </footer>

</body>

</html>