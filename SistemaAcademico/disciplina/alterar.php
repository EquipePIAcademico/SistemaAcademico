<?php

$id = $_POST['id'];
$nome = $_POST['nome'];
$descricao = $_POST['descricao'];
$carga_horaria = $_POST['carga_horaria'];
$curso_id = $_POST['curso_id'];

include '../bd/conectar.php';

$sql = "update disciplina set nome='$nome', descricao='$descricao', carga_horaria=$carga_horaria, curso_id=$curso_id where id = $id";

if (@mysqli_query($conexao, $sql)){
    echo "<script>alert('Alteração realizada com sucesso!')</script>";
    echo "<a href=listar.php>Voltar para gerenciamento</a>";
}else {
    echo "<script>alert('Não foi possível realizar a alteração!')</script>";
    echo " <a href=form_alterar.php>Insira novamente</a>";
}
