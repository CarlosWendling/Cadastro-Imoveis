<?php
include('conexao.php');
include('protect.php');

if (isset($_POST['adicionar_imovel'])) {
    $id_contribuinte = $mysqli->real_escape_string($_POST['id_contribuinte']);

    $sql_code = "SELECT * FROM proprietarios WHERE id = '$id_contribuinte' LIMIT 1";
    $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: ".$mysqli->error);
    
    $contribuinte = $sql_query->fetch_assoc();
    
    if ($contribuinte == null) {
        echo 'Contribuinte nulo'; exit;
    } else {
        $bairro = mysqli_real_escape_string($mysqli, trim($_POST['bairro']));
        $logadouro = mysqli_real_escape_string($mysqli, trim($_POST['logadouro']));
        $numero = mysqli_real_escape_string($mysqli, ($_POST['numero']));
        $complemento = mysqli_real_escape_string($mysqli, trim($_POST['complemento']));
    
        $sql_code = "INSERT INTO imoveis (logadouro, numero, bairro, complemento, contribuinte) VALUES ('$logadouro', '$numero', '$bairro', '$complemento', '$contribuinte[nome]')";
    
        mysqli_query($mysqli, $sql_code);
        
        header("Location: gerenciar-imovel.php");
    }
}
?>