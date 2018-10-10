<?php
error_reporting(E_ALL ^ E_NOTICE);
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Cadastro de curso</title>
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

include '../bd/conectar.php';
include '../cabecalho.php';

ini_set("display_errors", true);

$sql_id = "select id from usuario where username = '$_SESSION[username]'";

$retorno_id = mysqli_query($conexao, $sql_id);

$usuario_id = mysqli_fetch_array($retorno_id);

$nome = $_POST['nome'];
$descricao = $_POST['descricao'];
$carga_horaria = $_POST['carga_horaria'];
$anoInicio = $_POST['anoInicio'];
$semestreInicio = $_POST['semestreInicio'];
$anoTermino = $_POST['anoTermino'];
$semestreTermino = $_POST['semestreTermino'];
$tipo_id = $_POST['tipo_id'];
$turno_id = $_POST['turno_id'];

if ($anoInicio > $anoTermino) {
    //echo 'Erro! Ano de início é maior que o de término <br> <a href=form_inserir.php>Insira novamente</a>';
    ?>
    <h3> Erro! Ano de início é maior que o de término</h3>
    
    <a href=form_inserir.php> <button class="btn-continuar button">Insira novamente </button></a>
   <?php
   
    
} else if ($anoInicio == $anoTermino) {
    if ($semestreInicio > $semestreTermino) {
               ?>
    <h3> Erro! Semestre de início é maior que o de término</h3>
    
    <a href=form_inserir.php> <button class="btn-continuar button">Insira novamente </button></a>
   <?php
        
        
       
    }
    } else {
        $sql = "insert into curso (nome, descricao, carga_horaria, anoInicio, semestreInicio, anoTermino, semestreTermino, usuario_id, tipo_id, turno_id) values "
                . "('$nome', '$descricao', $carga_horaria, $anoInicio, $semestreInicio, $anoTermino, $semestreTermino, $usuario_id[0], $tipo_id, $turno_id)";

        if (@mysqli_query($conexao, $sql)) {
             ?>
   <h3> Curso cadastrado com sucesso! </h3>
    
   <a href=form_inserir.php> <button class="btn-continuar button">Continuar cadastrando </button></a>   <a href=listar.php><button class="btn-gerenciamento button"> Ir para gerenciamento</button></a>
   
  <?php
         
        } else {
           ?>
    <h3>Não foi possível realizar o cadastro</h3>
    
    <a href=form_inserir.php> <button class="btn-continuar button">Tentar novamente </button></a> <a href=listar.php><button class="btn-gerenciamento button"> Ir para gerenciamento</button></a>
   <?php 
}
        }