<?php

//session_start();
include '../bd/conectar.php';

ini_set("display_errors", true);

//sql_id = "select id from usuario where username = '$_SESSION[username]'";

//$retorno_id = mysqli_query($conexao, $sql_id);

//$usuario_id = mysqli_fetch_array($retorno_id);

$aluno_curso_id = $_POST['aluno_curso_id'];
$turma_id = $_POST['turma_id'];
//$ano = $_POST['ano'];
//$semestre = $_POST['semestre'];

$sql = "insert into aluno_turma (aluno_id, turma_id) values ($aluno_curso_id, $turma_id)";

if (@mysqli_query($conexao, $sql)) {
            echo 'Matricula realizada com sucesso! <br>';
        } 

?>



