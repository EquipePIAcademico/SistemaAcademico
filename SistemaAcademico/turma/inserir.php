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

session_start();
include '../bd/conectar.php';
include '../cabecalho.php';

ini_set("display_errors", true);

$sql_id = "select id from usuario where username = '$_SESSION[username]'";

$retorno_id = mysqli_query($conexao, $sql_id);

$usuario_id = mysqli_fetch_array($retorno_id);

$nVagas = $_POST['nVagas'];
$disciplina_id = $_POST['disciplina_id'];
$semestre_id = $_POST['semestre_id'];
$professor_id = $_POST['professor_id'];
$curso_id = $_POST['curso_id'];



$sql = "insert into turma (nVagas, disciplina_id, semestre_id, professor_id, usuario_id, curso_id) values "
        . "($nVagas, $disciplina_id, $semestre_id, $professor_id, $usuario_id[0], $curso_id)";

if (@mysqli_query($conexao, $sql)){
    ?>
   <h3> Turma cadastrada com sucesso! </h3>
    
   <a href=form_inserir.php> <button class="btn-continuar button">Continuar cadastrando </button></a>   <a href=listar.php><button class="btn-gerenciamento button"> Ir para gerenciamento</button></a>
<?php
    
  
}else {
     ?>
   <h3> Não foi possível realiar o cadastro </h3>
    
   <a href=form_inserir.php> <button class="btn-continuar button">Insira novamente</button></a>  
<?php
   
}
?>





