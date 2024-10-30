<?php
include('conexao.php');
include('protect.php');

if (isset($_POST['adicionar_imovel'])) {
    $id_contribuinte = $mysqli->real_escape_string($_POST['id_contribuinte']);
    
        $bairro = mysqli_real_escape_string($mysqli, trim($_POST['bairro']));
        $logadouro = mysqli_real_escape_string($mysqli, trim($_POST['logadouro']));
        $numero = mysqli_real_escape_string($mysqli, ($_POST['numero']));
        $complemento = mysqli_real_escape_string($mysqli, trim($_POST['complemento']));
    
        $sql_code = "INSERT INTO imoveis (logadouro, numero, bairro, complemento, contribuinte, contribuinte_id) VALUES ('$logadouro', '$numero', '$bairro', '$complemento', '', '$id_contribuinte')";
    
        mysqli_query($mysqli, $sql_code);
        
        if (mysqli_affected_rows($mysqli) > 0) {
            $_SESSION['msg-success'] = 'Imóvel cadastrado com sucesso';
            header("Location: gerenciar-imovel.php");
        } else {
            $_SESSION['msg-fail'] = '[ERRO] Imóvel não foi cadastrado';
            header("Location: gerenciar-imovel.php");
            exit;
        }
    
}

if (isset($_POST['update_imovel'])) {
    $id_contribuinte = $mysqli->real_escape_string($_POST['id_contribuinte']);
    $inscricao_municipal = $mysqli->real_escape_string($_POST['inscricao_municipal']);

        $bairro = mysqli_real_escape_string($mysqli, trim($_POST['bairro']));
        $logadouro = mysqli_real_escape_string($mysqli, trim($_POST['logadouro']));
        $numero = mysqli_real_escape_string($mysqli, ($_POST['numero']));
        $complemento = mysqli_real_escape_string($mysqli, trim($_POST['complemento']));
    
        $sql_code = "UPDATE imoveis SET logadouro = '$logadouro', numero = '$numero', bairro = '$bairro', complemento = '$complemento', contribuinte = '', contribuinte_id = '$id_contribuinte'";

        $sql_code .= "WHERE inscricao_municipal = '$inscricao_municipal'";
    
        mysqli_query($mysqli, $sql_code);
        
        if (mysqli_affected_rows($mysqli) > 0) {
            $_SESSION['msg-success'] = 'Imóvel atualizado com sucesso';
            header("Location: gerenciar-imovel.php");
        } else {
            $_SESSION['msg-fail'] = '[ERRO] Imóvel não foi atualizado';
            header("Location: gerenciar-imovel.php");
            exit;
        }
    
}

if (isset($_POST['delete_imovel'])) {
    $inscricao_municipal = $mysqli->real_escape_string($_POST['delete_imovel']);

    $sql_code = "DELETE FROM imoveis WHERE inscricao_municipal = '$inscricao_municipal'";

    mysqli_query($mysqli, $sql_code);

    if (mysqli_affected_rows($mysqli) > 0) {
        $_SESSION['msg-success'] = 'Imóvel removido com sucesso';
        header("Location: gerenciar-imovel.php");
    } else {
        $_SESSION['msg-fail'] = '[ERRO] Imóvel não foi removido';
        header("Location: gerenciar-imovel.php");
        exit;
    }
}
?>