<?php

$id = $_POST['id'];
$nome = $_POST['nome'];
$descricao = $_POST['descricao'];

include '../bd/conectar.php';

$sql = "update tipo set nome='$nome', descricao='$descricao' where id = $id";

mysqli_query($conexao, $sql);

if (@mysqli_query($conexao, $sql)){
    echo 'Alteração realizada com sucesso! <br> <a href=listar.php>OK</a>';
}else {
    echo 'Erro! <br> <a href=form_alterar.php>OK</a>';
}