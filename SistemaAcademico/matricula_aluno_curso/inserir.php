<?php

//session_start();
include '../bd/conectar.php';

ini_set("display_errors", true);

//sql_id = "select id from usuario where username = '$_SESSION[username]'";

//$retorno_id = mysqli_query($conexao, $sql_id);

//$usuario_id = mysqli_fetch_array($retorno_id);

$aluno_id = $_POST['aluno_id'];
$curso_id = $_POST['curso_id'];
$ano = $_POST['ano'];
$semestre = $_POST['semestre'];

$matricula = $ano.$semestre.$curso_id.$aluno_id;

$sql = "insert into aluno_curso (aluno_id, curso_id, semestre, ano, matricula) values ($aluno_id, $curso_id, $semestre, $ano, $matricula)";

if (@mysqli_query($conexao, $sql)) {
          echo 'Matricula realizada com sucesso! <br>';
        } 

echo "Sua matrícula é ".$matricula;

?>



