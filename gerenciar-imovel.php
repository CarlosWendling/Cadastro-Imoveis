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

    <div class="container mt-4">
        <?php
            if (isset($_SESSION['msg-success'])):
        ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= $_SESSION['msg-success']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php
            unset($_SESSION['msg-success']);
            endif;
        ?>

        <?php
            if (isset($_SESSION['msg-fail'])):
        ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= $_SESSION['msg-fail']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php
            unset($_SESSION['msg-fail']);
            endif;
        ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="padding-top: 1.1rem;">
                        <h4>
                            <span class="align-middle">Imóveis </span>
                            <div class="dropdown" style="display: inline;">
                                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Selecione
                                </a>

                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="gerenciar-proprietario.php">Proprietários</a></li>
                                    <li><a class="dropdown-item" href="gerenciar-imovel.php">Imóveis</a></li>
                                </ul>
                            </div>
                            <a href="logout.php" class="btn btn-danger float-end">Sair</a>                 
                            <a href="adicionar-imovel.php" class="btn btn-primary float-end" style="margin-right: 1rem;">Adicionar Imóvel<a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Inscrição Municipal</th>
                                    <th>Contribuinte</th>
                                    <th>Bairro</th>
                                    <th>Logadouro</th>
                                    <th>Número</th>
                                    <th>Complemento</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                    $sql_code = 'SELECT * FROM imoveis';
                                    $imoveis = mysqli_query($mysqli, $sql_code);

                                    if (mysqli_num_rows($imoveis) > 0) {
                                        foreach($imoveis as $imovel) {       
                                ?>
                                <tr>
                                    <td><?=$imovel['inscricao_municipal']?></td>
                                    <td><?=$imovel['contribuinte']?></td>
                                    <td><?=$imovel['bairro']?></td>
                                    <td><?=$imovel['logadouro']?></td>
                                    <td><?=$imovel['numero']?></td>
                                    <td><?=$imovel['complemento']?></td>
                                    <td>
                                        <a href="imovel-view.php?inscricao_municipal=<?=$imovel['inscricao_municipal']?>" class="btn btn-secondary btn-sm">Visualizar</a>
                                        <a href="#" class="btn btn-success btn-sm">Editar</a>
                                        <form action="" method="post" class="d-inline">
                                            <button type="submit" name="" value="" class="btn btn-danger btn-sm">
                                                Excluir
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                <?php
                                 }
                                } else {
                                    echo '<h5>Nenhum Imóvel encontrado</5>';
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>