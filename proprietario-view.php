<?php
include('protect.php');
include('conexao.php');
?>

<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Proprietários</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="src/style.css">
  </head>
  <body>

    <nav class="navbar navbar-expand-lg bg-body-tertiary" style="box-shadow: 1px 1px 5px rgb(0, 0, 0, 0.3);">
        <div class="container-fluid d-flex p-2"  style="margin: 0 3rem;">
            <a class="navbar-brand" href="#"><img class="img-fluid" src="./src/img/logo-prefeitura.png"></a>

            <form class="d-flex" role="search" style="width: 40%" action="" method="POST">
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

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>
                            Visualizar Proprietário
                            <a href="gerenciar-proprietario.php" class="btn btn-danger float-end">Voltar</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <?php
                        if (isset($_GET['id'])) {
                            $proprietario_id = mysqli_real_escape_string($mysqli, $_GET['id']);
                            $sql_code = "SELECT * FROM proprietarios WHERE id = $proprietario_id";
                            $query = mysqli_query($mysqli, $sql_code);

                            if (mysqli_num_rows($query) > 0) {
                                $proprietario = mysqli_fetch_array($query);
                            }
                        ?>

                        <div class="mb-3">
                            <label>Nome</label>
                            <p class="form-control">
                                <?=$proprietario['nome']?>
                            </p>
                        </div>
                        <div class="mb-3">
                            <label>Data de Nascimento</label>
                            <p class="form-control">
                            <?=date('d/m/Y', strtotime($proprietario['data_nascimento']))?>
                            </p>
                        </div>
                        <div class="mb-3">
                            <label>CPF</label>
                            <p class="form-control">
                            <?=$proprietario['cpf']?>
                            </p>
                        </div>
                        <div class="mb-3">
                            <label>Sexo</label>
                            <p class="form-control">
                            <?=$proprietario['sexo']?>
                            </p>
                        </div>
                        <div class="mb-3">
                            <label>Telefone</label>
                            <p class="form-control">
                            <?=$proprietario['telefone']?>
                            </p>
                        </div>
                        <div class="mb-3">
                            <label>Email</label>
                            <p class="form-control">
                            <?=$proprietario['email']?>
                            </p>
                        </div>
                        <?php
                        } else {
                            echo '<h5>Proprietário não encontrado</h5>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
  </body>
</html>