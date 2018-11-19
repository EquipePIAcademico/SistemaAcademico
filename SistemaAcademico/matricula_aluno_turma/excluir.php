
<?php

ini_set("display_errors", true);

include '../bd/conectar.php';

$id = $_GET['id'];

$sql_turma = "delete from aluno_turma where aluno_id= $id";
mysqli_query($conexao, $sql_turma);
 


header('Location: listar_curso.php');