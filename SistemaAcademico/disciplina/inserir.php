<?php

session_start();
include '../bd/conectar.php';

ini_set("display_errors", true);

$sql_id = "select id from usuario where username = '$_SESSION[username]'";

$retorno_id = mysqli_query($conexao, $sql_id);

$usuario_id = mysqli_fetch_array($retorno_id);

$nome = $_POST['nome'];
$descricao = $_POST['descricao'];
$carga_horaria = $_POST['carga_horaria'];
$curso_id = $_POST['curso_id'];

$sql = "insert into disciplina (nome, descricao, carga_horaria, usuario_id, curso_id) values "
        . "('$nome', '$descricao', $carga_horaria, $usuario_id[0], $curso_id)";

if (@mysqli_query($conexao, $sql)){
    echo 'Cadastro realizado com sucesso! <br> <a href=form_inserir.php>Continuar cadastrando</a>   <a href=listar.php>Ir para gerenciamento</a>';
}else {
    echo 'Erro! <br> <a href=form_inserir.php>OK</a>';
}
?>




