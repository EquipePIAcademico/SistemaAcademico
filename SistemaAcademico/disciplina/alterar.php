<?php

$id = $_POST['id'];
$nome = $_POST['nome'];
$descricao = $_POST['descricao'];
$carga_horaria = $_POST['carga_horaria'];
$curso_id = $_POST['curso_id'];

include '../bd/conectar.php';

$sql = "update disciplina set nome='$nome', descricao='$descricao', carga_horaria=$carga_horaria, curso_id=$curso_id where id = $id";

if (@mysqli_query($conexao, $sql)){
    echo 'Alteração realizada com sucesso! <br> <a href=listar.php>OK</a>';
}else {
    echo 'Erro! <br> <a href=form_alterar.php>OK</a>';
}
