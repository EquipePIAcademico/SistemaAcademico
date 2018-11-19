<?php

ini_set("display_errors", true);

include '../bd/conectar.php';

$id = $_GET['id'];

$sql_valid = "select distinct usuario.nome from usuario join turma on turma.professor_id=usuario.id where "
        . "usuario.perfil_acesso='professor(a)' and turma.professor_id=$id";

$retorno_valid = mysqli_query($conexao, $sql_valid);

$resultado_valid = mysqli_fetch_array($retorno_valid);

if ($resultado_valid == null) {
    $sql = "delete from usuario where id= $id";

    mysqli_query($conexao, $sql);

    header('Location: listar.php');
} else {
    echo "Este(a) professor(a) está associado(a) à turma(s)! Primeiramente deve-se excluir a(s) turma(s)!" . "<br>";
    ?>
<a href=listar.php>Voltar para gerenciamento</a>
    <?php
}