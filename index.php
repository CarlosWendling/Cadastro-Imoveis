<?php
include('conexao.php');

// Verifivando a existência do email e da senha
if (isset($_POST['email']) && isset($_POST['senha'])) {

    if (strlen($_POST['email']) == 0) {
        echo '<p class="alert alert-danger m-4 w-25 position-absolute top-0" style="top: 20%; left: 50%; transform: translate(-50%, 0); z-index: 5;">Preencha o campo de email.</p>';
    } else if (strlen($_POST['senha']) == 0) {
        echo '<p class="alert alert-danger m-4 w-25 position-absolute top-0" style="top: 20%; left: 50%; transform: translate(-50%, 0); z-index: 5;">Preencha com a sua senha.</p>';
    } else {
        // Limpar a string da variável
        $email = $mysqli->real_escape_string($_POST['email']);
        $senha = $mysqli->real_escape_string($_POST['senha']);

        $sql_code = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: ".$mysqli->error);

        $quantidade = $sql_query->num_rows;

        if ($quantidade == 1) {
            $usuario = $sql_query->fetch_assoc();

            if (!isset($_SESSION)) {
                session_start();
            }

            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];

            header("Location: menu.php");
        } else {
            echo '<p class="alert alert-danger m-4 w-25 position-absolute top-0" style="top: 20%; left: 49%; transform: translate(-50%, 0); z-index: 5;">Falha ao Logar. Email ou Senha incorretos.</p>';
        }
    }
}
?>

<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="src/style.css">
  </head>
  <body>

    <nav class="navbar navbar-expand-lg bg-body-tertiary" style="box-shadow: 1px 1px 5px rgb(0, 0, 0, 0.3);">
        <div class="container-fluid d-flex p-2"  style="margin: 0 3rem;">
            <a class="navbar-brand" href="#"><img class="img-fluid" src="./src/img/logo-prefeitura.png"></a>

            <form class="d-flex" role="search" style="width: 40%">
                <input class="form-control me-2" type="search" placeholder="O que você procura" aria-label="Search" style="height: 43px; font-size: 0.8rem;">
                <button class="btn btn-primary form-control" style="width: 4rem; color: #fff; font-size: 0.8rem;" type="submit">Buscar</button>
            </form>

            <section class="links">
                <a href="#" target="_blank"><img class="img-fluid" src="./src/img/logo-facebook.png" style="width: 30px;"></a>
                <a href="https://www.instagram.com/prefasaoleo/" target="_blank">
                    <img class="img-fluid" src="./src/img/logo-instagram.png" style="width: 25px; margin: 0 5px;"></a>
                <a href="#" target="_blank"><img class="img-fluid" src="./src/img/logo-youtube.png" style="width: 30px"></a>
            </section>
        </div>
    </nav>

    <main>
        <h1>Login</h1>
        
        <form class="user-form" method="post">
            <div class="mb-3">
                <label for="login-email" class="form-label">Email</label>
                <input type="email" class="form-control" id="login-email" name="email" require>
            </div>
            <div class="mb-3">
                <label for="login-pass" class="form-label">Senha</label>
                <input type="password" class="form-control" id="login-pass" name="senha" require>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary form-control" value="entrar" style="margin-top: 0.4rem;">Entrar</button>
            </div>
            <div class="mb-3">
                <p class="msg">Ainda não possui Cadastro? <a href="./cadastro-user.php">Clique aqui</a></p>
            </div>
        </form>
    </main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>