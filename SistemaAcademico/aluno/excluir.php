<?php

ini_set("display_errors", true);

include '../bd/conectar.php';

$id = $_GET['id'];

$sql_aluno = "delete from aluno where id= $id";

 
mysqli_query($conexao, $sql_aluno);

header('Location: listar.php');