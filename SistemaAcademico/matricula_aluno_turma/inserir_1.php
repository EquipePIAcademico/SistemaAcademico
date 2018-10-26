<?php

error_reporting(E_ALL ^ E_NOTICE);
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Matricular Aluno em Turma</title>
        <meta charset="utf-8">
      <!-- <link href="../css/estilo.css" rel="stylesheet">-->
      <style>
          h3{
            display: flex;
            justify-content: center;
              
          }
         .btn-continuar:hover {
    background-color:green; /* Green */
    color: white;
    
}
.btn-gerenciamento:hover{
     background-color:blue; /* Green */
    color: white;
}
.button{
      
    color: #2E2E2E;
    border: 2px solid #A4A4A4;
    cursor: pointer;
    border-radius: 5px;
    padding: 10px;
    font-size: 15px;
    
}
          
          .btn-continuar{
              position: absolute;
              left: 500px;
             
          }
          .btn-gerenciamento{
              position: absolute;
              left: 690px;
          }
          body{
               font-family: sans-serif;
    font-size: 14px;
          }
      </style>
<?php

//session_start();
include '../bd/conectar.php';
include '../cabecalho.php';

ini_set("display_errors", true);

//sql_id = "select id from usuario where username = '$_SESSION[username]'";

//$retorno_id = mysqli_query($conexao, $sql_id);

//$usuario_id = mysqli_fetch_array($retorno_id);

$aluno_id = $_GET['aluno'];


//$disciplina_id = $_GET['disciplina_id'];

$curso_id = $_GET['curso'];

$semestre_id = $_GET['semestre_id'];

$turma_id = $_GET['turma_id'];

 

$sql = "select * from aluno_turma where (aluno_id = $aluno_id and turma_id = $turma_id) and semestre_id = $semestre_id";


//$sql = "select * from aluno_turma where (aluno_id = $aluno_id and disciplina_id = $disciplina_id) and semestre_id = $semestre_id";
//       
//
//
//
$retorno = mysqli_query($conexao, $sql);
//
$resultado = mysqli_fetch_array($retorno);

//    $sql = "insert into aluno_turma (aluno_id, disciplina_id, semestre_id) values ($aluno_curso_id, $disciplina_id, $semestre_id)";
///


if ($resultado == null) {
   
      $sql_insercao = "insert into aluno_turma (aluno_id, turma_id, semestre_id) values ($aluno_id, $turma_id, $semestre_id)";
      if (@mysqli_query($conexao, $sql_insercao)) {
   ?>
   
   <h3> Aluno matriculado com sucesso!  </h3>
    
   <a href=form_inserir.php> <button class="btn-continuar button">Continuar matriculando </button></a>   <a href=listar_curso.php><button class="btn-gerenciamento button"> Ir para gerenciamento</button></a>
<?php
      }   
    
} else {
    ?>
   <h3>Aluno já matriculado</h3>
   <a href=form_inserir_aluno_1.php> <button class="btn-continuar button">Tentar novamente </button></a> 
   <?php
}


?>
</html>






