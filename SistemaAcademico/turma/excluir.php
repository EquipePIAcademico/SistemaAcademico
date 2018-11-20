<?php

ini_set("display_errors", true);

include '../bd/conectar.php';

$id = $_GET['id'];

$sql = "delete from turma where id= $id";

mysqli_query($conexao, $sql);

$sql_aluno_turma = "delete from aluno_turma where aluno_turma.turma_id=$id";

mysqli_query($conexao, $sql_aluno_turma);

header('Location: listar.php');