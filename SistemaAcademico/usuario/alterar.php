<?php

$username = $_GET['username'];

$id = $_POST['id'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$dataN = $_POST['dataN'];
$cpf = $_POST['cpf'];
$password = $_POST['password'];

include '../bd/conectar.php';

$sql_pessoa = "update usuario set nome='$nome', email='$email', dataN='$dataN', cpf='$cpf', password='$password' where id = $id";

if (@mysqli_query($conexao, $sql_pessoa)) {
    if ($username == 'administrador') {
        echo "<script>alert('Alteração realizada com sucesso!')</script>";
        echo " <a href=listar_perfil.php>Ver perfil</a>";
    } else {
        echo "<script>alert('Alteração realizada com sucesso!')</script>";
        echo " <a href=listar.php>Ir para gerenciamento</a>";
    }
} else {
    echo "<script>alert('Usuário ou e-mail já cadastrados!')</script>";
    echo " <a href=form_alterar.php>OK</a>";
}

//header('Location: form_inserir.php');
