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
    
    header("Location: gerenciar-proprietario.php");
    
}
?>