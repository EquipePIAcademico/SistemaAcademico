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
    
    echo '<p>Cadastro realizado com sucesso!</p>'; 
    echo '<br> <a href=form_inserir.php>Continuar cadastrando     </a>' . '<a href=listar.php>Ir para gerenciamento</a>';
}else {
    echo 'Usuário ou e-mail já cadastrados! <br> <a href=form_inserir.php>OK</a>';
}
//header('Location: form_inserir.php');
?>



