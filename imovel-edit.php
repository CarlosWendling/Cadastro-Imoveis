<?php
include('protect.php');
include('conexao.php');
?>

<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Imóveis</title>
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
                            Atualizar Imóvel
                            <a href="gerenciar-imovel.php" class="btn btn-danger float-end">Voltar</a>
                        </h4>
                    </div>
                    <div class="card-body">
                    <?php
                        if (isset($_GET['inscricao_municipal'])) {
                            $inscricao_municipal = mysqli_real_escape_string($mysqli, $_GET['inscricao_municipal']);
                            $sql_code = "SELECT * FROM imoveis WHERE inscricao_municipal = '$inscricao_municipal'";
                            $query = mysqli_query($mysqli, $sql_code);

                            $proprietarios = NULL;
                            

                            if (mysqli_num_rows($query) > 0) {
                                $imovel = mysqli_fetch_array($query);

                                $sql = "SELECT id, nome FROM proprietarios";
                                $sql_query = mysqli_query($mysqli, $sql);
                            }
                        ?>

                        <form action="acoes-imovel.php" method="post">
                        <input type="hidden" name="inscricao_municipal" value="<?=$imovel['inscricao_municipal']?>">
                            <div class="mb-3">
                                <label>Id do Contribuinte</label>
                                    <select name="id_contribuinte" class="form-control" required>
                                        <?php
                                            if (mysqli_num_rows($sql_query) > 0) {
                                                while($proprietarios = mysqli_fetch_assoc($sql_query)) {
                                                    if ($proprietarios['id'] == $imovel['contribuinte_id']) {
                                                        echo '<option selected value="'.$proprietarios['id'].'">'.$proprietarios['nome'].'</option>';
                                                    } else {
                                                        echo '<option value="'.$proprietarios['id'].'">'.$proprietarios['nome'].'</option>';
                                                    }
                                                }
                                            }
                                        ?>
                                    </select>
                            </div>
                            <div class="mb-3">
                                <label>Bairro</label>
                                <input type="text" name="bairro" value="<?=$imovel['bairro']?>" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label>Logadouro</label>
                                <input type="text" name="logadouro" value="<?=$imovel['logadouro']?>" class="form-control" placeholder="Avenida ou Rua" required>
                            </div>
                            <div class="mb-3">
                                <label>Número</label>
                                <input type="number" name="numero" value="<?=$imovel['numero']?>" class="form-control" min="1" required>
                            </div>
                            <div class="mb-3">
                                <label>Complemento</label>
                                <input type="text" name="complemento" value="<?=$imovel['complemento']?>" class="form-control" placeholder="Ex: Casa 18">
                            </div>
                            <button type="submit" name="update_imovel" class="btn btn-primary float-middle">Atualizar</button>
                        </form>
                        <?php
                        } else {
                            echo '<h5>Imóvel não encontrado</h5>';
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