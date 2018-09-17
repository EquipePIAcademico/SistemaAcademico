<?php

ini_set("display_errors", true);

include '../bd/conectar.php';

$id = $_GET['id'];

$sql = "delete from tipo where id= $id";

mysqli_query($conexao, $sql);

header('Location: listar.php');