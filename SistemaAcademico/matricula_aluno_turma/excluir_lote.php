<?php

ini_set("display_errors", true);

include '../bd/conectar.php';

$id = $_GET['id'];

foreach ($id as $value) {
    $sql = "delete from aluno_turma where id=$id";
    echo $sql;
    mysqli_query($conexao, $sql);
}

//header('Location: listar_cursos.php');
