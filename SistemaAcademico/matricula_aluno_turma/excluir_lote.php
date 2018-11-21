<?php

ini_set("display_errors", true);

include '../bd/conectar.php';

$id = $_POST['id'];

foreach ($id as $value) {
    $sql = "delete from aluno_turma where aluno_turma.id=$value";
    mysqli_query($conexao, $sql);
}

header('Location: listar_curso.php');
