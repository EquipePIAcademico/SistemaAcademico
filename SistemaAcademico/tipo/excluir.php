<?php

ini_set("display_errors", true);

include '../bd/conectar.php';

$id = $_GET['id'];

$sql_valid = "select curso.nome, tipo.nome from tipo join curso on curso.tipo_id=tipo.id where tipo.id=$id";

$retorno_valid = mysqli_query($conexao, $sql_valid);

$resultado_valid = mysqli_fetch_array($retorno_valid);

if ($resultado_valid == null) {
    $sql = "delete from tipo where id= $id";

    mysqli_query($conexao, $sql);

    header('Location: listar.php');
} else {
    echo "Este tipo está associado a curso(s)! Primeiramente deve-se excluir o(s) curso(s)!" . "<br>";
    ?>
<a href=listar.php>Voltar para gerenciamento</a><a href=../curso/listar.php>Ir para gerenciamento de cursos</a>

    <?php
}