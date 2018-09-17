<?php

ini_set("display_errors", true);

include '../bd/conectar.php';

$id = $_POST['id'];

foreach ($id as $value) {
    $sql_aluno = "delete from aluno where id= $value";
    mysqli_query($conexao, $sql_aluno);
}

header('Location: listar.php');
