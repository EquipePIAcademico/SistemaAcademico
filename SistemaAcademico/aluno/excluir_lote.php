<?php

ini_set("display_errors", true);

include '../bd/conectar.php';

$id = $_POST['id'];

foreach ($id as $value) {
    $sql_aluno = "delete from aluno where id= $value";

    mysqli_query($conexao, $sql_aluno);

    $sql_aluno_curso = "delete from aluno_curso where aluno_curso.aluno_id=$value";

    mysqli_query($conexao, $sql_aluno_curso);

    $sql_aluno_turma = "delete from aluno_turma where aluno_turma.aluno_id=$value";

    mysqli_query($conexao, $sql_aluno_turma);
}

header('Location: listar.php');
