<?php

ini_set("display_errors", true);

include '../bd/conectar.php';

$id = $_POST['id'];

foreach ($id as $value) {
    $sql = "delete from turma where id= $value";
    
    mysqli_query($conexao, $sql);
    
    $sql_aluno_turma = "delete from aluno_turma where aluno_turma.turma_id=$value";

    mysqli_query($conexao, $sql_aluno_turma);
}

header('Location: listar.php');
