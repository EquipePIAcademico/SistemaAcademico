<?php

ini_set("display_errors", true);

include '../bd/conectar.php';

$id = $_GET['id'];

$sql_pessoa = "delete from usuario where id= $id";

mysqli_query($conexao, $sql_pessoa);

header('Location: listar.php');