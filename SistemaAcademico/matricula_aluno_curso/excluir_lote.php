<?php

ini_set("display_errors", true);

include '../bd/conectar.php';

$id = $_GET['id'];

foreach ($id as $value) {
    $sql = "delete from aluno_curso where id= $id";
    mysqli_query($conexao, $sql);
}

header('Location: listar_alunos.php');
