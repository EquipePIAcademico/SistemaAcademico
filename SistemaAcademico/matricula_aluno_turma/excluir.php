<?php

ini_set("display_errors", true);

include '../bd/conectar.php';

$id = $_GET['id'];

$sql_turma = "delete from aluno_turma where aluno_id= $id";
mysqli_query($conexao, $sql_turma);
 
echo "<script>alert('Aluno removido com sucesso!')</script>";


//header('Location: listar.php');