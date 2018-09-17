<?php

$id = $_POST['id'];
$nVagas = $_POST['nVagas'];
$disciplina_id = $_POST['disciplina_id'];
$semestre_id = $_POST['semestre_id'];
$professor_id = $_POST['professor_id'];

include '../bd/conectar.php';

$sql = "update turma set nVagas=$nVagas, disciplina_id=$disciplina_id, semestre_id=$semestre_id, professor_id=$professor_id where id = $id";

if (@mysqli_query($conexao, $sql)){
    echo 'Alteração realizada com sucesso! <br> <a href=listar.php>OK</a>';
}else {
    echo 'Erro! <br> <a href=form_alterar.php>OK</a>';
}
