<?php

error_reporting(E_ALL ^ E_NOTICE);
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Tipo de curso</title>
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
      background-color: ;
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
      </style>
<?php

//session_start();
include '../bd/conectar.php';
include '../cabecalho.php';

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
           ?>
   <h3> Aluno matriculado com sucesso! </h3>
    
   <a href=form_inserir.php> <button class="btn-continuar button">Continuar cadastrando </button></a>   <a href=listar_turmas.php><button class="btn-gerenciamento button"> Ir para gerenciamento</button></a>
   <?php
   } else{
            echo "<script>alert('Aluno já matriculado nesta turma')</script>";
            echo "<a href=form_inserir.php>Inserir novamente</a>";
        }

?>






