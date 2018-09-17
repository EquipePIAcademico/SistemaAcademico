<?php

ini_set("display_errors", true);

include '../bd/conectar.php';

$id = $_POST['id'];

foreach ($id as $value) {
    $sql_pessoa = "delete from usuario where id= $value";
    mysqli_query($conexao, $sql_pessoa);
}

header('Location: listar.php');
