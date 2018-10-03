<?php

$id = $_POST['id'];
$nVagas = $_POST['nVagas'];
$disciplina_id = $_POST['disciplina_id'];
$semestre_id = $_POST['semestre_id'];
$professor_id = $_POST['professor_id'];

include '../bd/conectar.php';

$sql = "update turma set nVagas=$nVagas, disciplina_id=$disciplina_id, semestre_id=$semestre_id, professor_id=$professor_id where id = $id";

if (@mysqli_query($conexao, $sql)){
    echo "<script>alert('Alteração realizada com sucesso!')</script>";
    echo " <a href=listar.php>Voltar para gerenciamento</a>";
}else {
    echo "<script>alert('Não foi possível realizar a alteração')</script>";
    echo " <a href=form_alterar.php>Insira novamente</a>";
}
