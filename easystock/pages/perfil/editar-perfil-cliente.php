<?php
require '../../connection/verifica.php';

if (!empty($_GET['id'])) {
    include_once('../../connection/config.php');
    $id = $_GET['id'];

    $sqlSelect = "SELECT * FROM clientes WHERE id = $id";
    $result = $con->query($sqlSelect);

    if ($result->num_rows > 0) {
        while ($cliente_data = mysqli_fetch_assoc($result)) {
            $nome = $cliente_data['nome'];
            $nome_empresa = $cliente_data['nome_empresa'];
            $email = $cliente_data['email'];
            $senha = $cliente_data['senha'];
        }
    } else {
        header("Location: ../login/login.php");
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EasyStock - Editar Perfil</title>
    <link rel="shortcut icon" href="../../src/img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="editar-perfil-cliente.css">
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
            <form action="saveEdit.php" method="POST">
                <fieldset>
                    <legend><b>Fórmulário de Clientes</b></legend>
                    <br>
                    <div class="inputBox">
                        <input type="text" name="nome" id="nome" value="<?php echo $nome ?>" class="inputUser" required>
                        <label for="nome" class="labelInput">Nome</label>
                    </div>
                    <br><br>
                    <div class="inputBox">
                        <input type="text" name="empresa" id="empresa" value="<?php echo $nome_empresa ?>" class="inputUser" required>
                        <label for="empresa" class="labelInput">Nome da Empresa</label>
                    </div>
                    <br><br>
                    <div class="inputBox">
                        <input type="email" name="email" id="email" value="<?php echo $email ?>" class="inputUser" required>
                        <label for="email" class="labelInput">Email</label>
                    </div>
                    <br><br>
                    <div class="inputBox">
                        <input type="password" name="senha" id="senha" value="<?php echo $senha ?>" class="inputUser" required>
                        <label for="senha" class="labelInput">Senha</label>
                        <br><br>
                    </div>
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
        alert("Usuário atualizado com sucesso! Faça o login novamente para aplicar as alterações.");
    }
</script>

</html>