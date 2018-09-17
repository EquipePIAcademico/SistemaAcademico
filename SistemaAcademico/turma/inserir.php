<?php

session_start();
include '../bd/conectar.php';

ini_set("display_errors", true);

$sql_id = "select id from usuario where username = '$_SESSION[username]'";

$retorno_id = mysqli_query($conexao, $sql_id);

$usuario_id = mysqli_fetch_array($retorno_id);

$nVagas = $_POST['nVagas'];
$disciplina_id = $_POST['disciplina_id'];
$semestre_id = $_POST['semestre_id'];
$professor_id = $_POST['professor_id'];

$sql = "insert into turma (nVagas, disciplina_id, semestre_id, professor_id, usuario_id) values "
        . "($nVagas, $disciplina_id, $semestre_id, $professor_id, $usuario_id[0])";

if (@mysqli_query($conexao, $sql)){
    echo 'Cadastro realizado com sucesso! <br> <a href=form_inserir.php>Continuar cadastrando</a>   <a href=listar.php>Ir para gerenciamento</a>';
}else {
    echo 'Erro! <br> <a href=form_inserir.php>OK</a>';
}
?>




