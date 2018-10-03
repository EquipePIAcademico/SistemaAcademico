<?php

$id = $_POST['id'];
$nome = $_POST['nome'];
$descricao = $_POST['descricao'];

include '../bd/conectar.php';

$sql = "update tipo set nome='$nome', descricao='$descricao' where id = $id";

mysqli_query($conexao, $sql);

if (@mysqli_query($conexao, $sql)){
     echo  "<script>alert('Alteração realizada com sucesso!');</script>";
    echo '<a href=listar.php>Voltar para gerenciamento</a>';
}else {
    
    echo  "<script>alert('Não foi possível realizar a alteração!');</script>";
    echo " <a href=form_alterar.php>Insira novamente</a>";
    
}