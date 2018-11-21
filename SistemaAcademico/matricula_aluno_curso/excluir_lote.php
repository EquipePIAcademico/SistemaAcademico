<?php

ini_set("display_errors", true);

include '../bd/conectar.php';

$id = $_POST['id'];

foreach ($id as $value) {
    $sql_curso = "delete from aluno_curso where aluno_curso.aluno_id=$value";
    
    mysqli_query($conexao, $sql_curso);
    
    $sql_turma = "delete from aluno_turma where aluno_turma.aluno_id=$value";
    
    mysqli_query($conexao, $sql_turma);
}

header('Location: listar_cursos.php');
