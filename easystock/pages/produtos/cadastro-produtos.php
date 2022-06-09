<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EasyStock - Cadastro de vendas</title>
    <link rel="shortcut icon" href="../../src/img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="cadastro-produtos.css">
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

    <div class="box-login">
        <div class="box">
            <form action="cadastrar-vendas.php" method="POST" enctype="multipart/form-data">
                <fieldset>
                    <legend><b>Cadastar Produto</b></legend>
                    <br>
                    <div class="inputBox">
                        <input type="text" name="nome" id="nome" class="inputUser" required>
                        <label for="nome" class="labelInput">Nome do produto</label>
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