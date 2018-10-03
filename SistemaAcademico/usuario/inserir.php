<?php

ini_set("display_errors", true);

$nome = $_POST['nome'];
$email = $_POST['email'];
$dataN = $_POST['dataN'];
$cpf = $_POST['cpf'];
$perfil_acesso = $_POST['perfil_acesso'];
$username = $_POST['username'];
$password = $_POST['password'];

include '../bd/conectar.php';

$sql = "insert into usuario (nome, email, dataN, cpf, perfil_acesso, username, password) values "
        . "('$nome', '$email', '$dataN', '$cpf', '$perfil_acesso', '$username', '$password')";

if (@mysqli_query($conexao, $sql)){
    
    echo "<script>alert('Cadastro realizado com sucesso!')</script>"; 
    echo "<a href=form_inserir.php>Continuar cadastrando</a>     <a href=listar.php>Ir para gerenciamento</a>";
}else {
    echo "<script>alert('Usuário ou e-mail já cadastrados!')</script>";
    echo " <a href=form_inserir.php>Insira novamente</a>";
}
//header('Location: form_inserir.php');
?>



