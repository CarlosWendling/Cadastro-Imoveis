<?php
include('conexao.php');
include('protect.php');

if (isset($_POST['adicionar_proprietario'])) {
    $nome = mysqli_real_escape_string($mysqli, trim($_POST['nome']));
    $data_nascimento = mysqli_real_escape_string($mysqli, trim($_POST['data_nascimento']));
    $cpf = mysqli_real_escape_string($mysqli, $_POST['cpf']);
    $sexo = mysqli_real_escape_string($mysqli, trim($_POST['sexo']));
    $telefone = mysqli_real_escape_string($mysqli, $_POST['telefone']);
    $email = mysqli_real_escape_string($mysqli, trim($_POST['email']));

    $sql_code = "INSERT INTO proprietarios (nome, data_nascimento, cpf, sexo, telefone, email) VALUES ('$nome', '$data_nascimento', '$cpf', '$sexo', '$telefone', '$email')";
    
    mysqli_query($mysqli, $sql_code);
    
    if (mysqli_affected_rows($mysqli) > 0) {
        $_SESSION['msg-success'] = 'Proprietário cadastrado com sucesso';
        header("Location: gerenciar-proprietario.php");
    } else {
        $_SESSION['msg-fail'] = '[ERRO] Proprietário não foi cadastrado';
        header("Location: gerenciar-proprietario.php");
        exit;
    }
    
}

if (isset($_POST['update_proprietario'])) {
    $proprietario_id = mysqli_real_escape_string($mysqli, $_POST['proprietario_id']);

    $nome = mysqli_real_escape_string($mysqli, trim($_POST['nome']));
    $data_nascimento = mysqli_real_escape_string($mysqli, trim($_POST['data_nascimento']));
    $cpf = mysqli_real_escape_string($mysqli, $_POST['cpf']);
    $sexo = mysqli_real_escape_string($mysqli, trim($_POST['sexo']));
    $telefone = mysqli_real_escape_string($mysqli, $_POST['telefone']);
    $email = mysqli_real_escape_string($mysqli, trim($_POST['email']));

    $sql_code = "UPDATE proprietarios SET nome = '$nome', data_nascimento = '$data_nascimento', cpf = '$cpf', sexo = '$sexo', telefone = '$telefone', email = '$email'";

    $sql_code .= "WHERE id = '$proprietario_id'";
    
    mysqli_query($mysqli, $sql_code);
    
    header("Location: gerenciar-proprietario.php");
    
}

if (isset($_POST['delete_proprietario'])) {
    $proprietario_id = mysqli_real_escape_string($mysqli, $_POST['delete_proprietario']);
    
    $sql_code = "DELETE FROM proprietarios WHERE id = '$proprietario_id'";

    mysqli_query($mysqli, $sql_code);

    header("Location: gerenciar-proprietario.php");
}
?>