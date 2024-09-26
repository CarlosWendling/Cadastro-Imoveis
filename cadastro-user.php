<?php
include('conexao.php');

?>


<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro</title>
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
        <h1 style="margin-top: 4rem;">Cadastro</h1>
        
        <form class="user-form" method="post">

            <?php
                $error = 0;

                if (isset($_POST['nome'])) {
                    $nome = $_POST['nome'];
                    if (strlen($nome) < 6) {
                        $error += 1;
                        echo '<p class="alert alert-danger">O nome deve ter, no mínimo, 6 caracteres.</p>';
                    }
                }

                if (isset($_POST['email'])) {
                    $email = $_POST['email'];

                    $sql_code = "SELECT * FROM usuarios WHERE email = '$email'";
                    $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: ".$mysqli->error);

                    $quantidade = $sql_query->num_rows;

                    if ($quantidade == 0) {
                        
                    } else {
                        $error += 1;
                        echo '<p class="alert alert-danger">Email já cadastrado.</p>';
                    }
                }

                if (isset($_POST['senha'])) {
                    $senha = $_POST['senha'];
                    $confirmSenha = $_POST['confirm-senha'];

                    if (strlen($senha) < 7) {
                        $error += 1;
                        echo '<p class="alert alert-danger">Senha muito curta.</p>';
                    } else if (!preg_match('/[a-z]/', $senha)) {
                        $error += 1;
                        echo '<p class="alert alert-danger">Senha não contém letras minúsculas.</p>';
                    } else if (!preg_match('/[0-9]/', $senha)) {
                        $error += 1;
                        echo '<p class="alert alert-danger">Senha não contém números.</p>';
                    } else if ($senha != $confirmSenha) {
                        $error += 1;
                        echo '<p class="alert alert-danger">Senhas não coincidem.</p>';
                    }
                }

                if ($error == 0 && isset($_POST['cadastrar'])) {
                    session_start(); 

                    $nome = mysqli_real_escape_string($mysqli, trim($_POST['nome']));
                    $email = mysqli_real_escape_string($mysqli, trim($_POST['email']));
                    $senha = mysqli_real_escape_string($mysqli, trim($_POST['senha']));

                    $sql_code = "INSERT INTO usuarios (nome, email, senha) VALUES ('$nome', '$email', '$senha')";
                    
                    mysqli_query($mysqli, $sql_code);
                    echo '<div class="alert alert-success" role="alert" >Cadastrado com Sucesso!</div>';
                }
            ?>

            <div class="mb-3">
                <label for="cadastro-nome" class="form-label">Nome Completo</label>
                <input type="text" class="form-control" id="cadastro-nome" name="nome" require>
                <p class="fail-email" style="color: red; font-size: 0.6rem;"></p>
            </div>
            <div class="mb-3">
                <label for="cadastro-email" class="form-label">Email</label>
                <input type="email" class="form-control" id="cadastro-email" name="email" require>
            </div>
            <div class="mb-3">
                <label for="cadastro-pass" class="form-label">Senha</label>
                <input type="password" class="form-control" id="cadastro-pass" name="senha" require>
            </div>
            <div class="mb-3">
                <label for="confirm-pass" class="form-label">Confirme a Senha</label>
                <input type="password" class="form-control" id="confirm-pass" name="confirm-senha" require>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary form-control" name="cadastrar" style="margin-top: 0.4rem;">Entrar</button>
            </div>
            <div class="mb-3">
                <p class="msg">Já possui Cadastro? <a href="./index.php">Clique aqui</a></p>
            </div>
        </form>
    </main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>