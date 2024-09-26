<?php
    if (!isset($_SESSION)) {
        session_start();
    }

    if (!isset($_SESSION['id'])) {
        die("Você não pode acessar essa página. Faça o Login <p><a href=\"index.php\">Aqui</a></p>");
    }
?>