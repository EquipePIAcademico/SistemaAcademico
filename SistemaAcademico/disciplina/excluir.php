<?php

ini_set("display_errors", true);

include '../bd/conectar.php';

$id = $_GET['id'];

$sql_valid = "select disciplina.nome from disciplina join turma on turma.disciplina_id=disciplina.id where disciplina.id=$id";

$retorno_valid = mysqli_query($conexao, $sql_valid);

$resultado_valid = mysqli_fetch_array($retorno_valid);

if ($resultado_valid == null) {
    $sql = "delete from disciplina where id= $id";

    mysqli_query($conexao, $sql);

    header('Location: listar.php');
} else {
    echo "Esta disciplina está associada à turma(s)! Primeiramente deve-se excluir a(s) turma(s)!" . "<br>";
    ?>
<a href=listar.php>Voltar para gerenciamento</a><a href=../turma/listar.php>Ir para gerenciamento de turmas</a>

    <?php
}

