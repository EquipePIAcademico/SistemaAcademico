<?php

session_start();

ini_set("display_errors", true);

include '../bd/conectar.php';

$sql_id = "select id from usuario where username = '$_SESSION[username]'";

$retorno_id = mysqli_query($conexao, $sql_id);

$usuario_id = mysqli_fetch_array($retorno_id);

$nome = $_POST['nome'];
$descricao = $_POST['descricao'];

$sql = "insert into tipo (nome, descricao, usuario_id) values ('$nome', '$descricao', $usuario_id[0])";

if (@mysqli_query($conexao, $sql)) {
    echo 'Cadastro realizado com sucesso! <br> <a href=form_inserir.php>Continuar cadastrando</a>   <a href=listar.php>Ir para gerenciamento</a>';
} else {
    echo 'Erro! <br> <a href=form_inserir.php>OK</a>';
}
?>




