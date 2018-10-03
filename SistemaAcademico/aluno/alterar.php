<?php

$id = $_POST['id'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$bairro = $_POST['bairro'];
$rua = $_POST['rua'];
$complemento = $_POST['complemento'];
$cep = $_POST['cep'];
$numero = $_POST['numero'];
$renda_id = $_POST['renda_id'];

include '../bd/conectar.php';

$sql_aluno = "update aluno set nome='$nome', email='$email', "
        . "bairro='$bairro', rua='$rua', complemento='$complemento', cep='$cep', numero='$numero', renda_id='$renda_id' where id = $id";

if (@mysqli_query($conexao, $sql_aluno)){
     echo  "<script>alert('Alteração realizada com sucesso!');</script>";
    echo '<a href=listar.php>Voltar para gerenciamento</a>';
}else {
 echo  "<script>alert('Não foi possível realizar a alteração!')</script>";
  echo '<a href=listar.php>Voltar para gerenciamento</a>';
}

