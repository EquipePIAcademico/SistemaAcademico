<?php

//session_start();
include '../bd/conectar.php';

ini_set("display_errors", true);

//sql_id = "select id from usuario where username = '$_SESSION[username]'";

//$retorno_id = mysqli_query($conexao, $sql_id);

//$usuario_id = mysqli_fetch_array($retorno_id);

$aluno_curso_id = $_GET['aluno_curso_id'];
$disciplina_id = $_GET['disciplina_id'];

//$ano = $_POST['ano'];
//$semestre = $_POST['semestre'];

$sql = "insert into aluno_turma (aluno_id, turma_id) values ($aluno_curso_id, $disciplina_id)";

if (@mysqli_query($conexao, $sql)) {
            echo "<script>alert('Matricula realizada com sucesso!')</script>";
            echo "<a href=form_inserir.php>Continuar matriculando</a>   <a href=listar_turmas.php>Listar turmas</a>";
        } else{
            echo "<script>alert('Aluno já matriculado nesta turma')</script>";
            echo "<a href=form_inserir.php>Inserir novamente</a>";
        }

?>



