<?php
error_reporting(E_ALL ^ E_NOTICE);
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Disciplinas</title>
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

$nome = $_POST['nome'];
$descricao = $_POST['descricao'];
$carga_horaria = $_POST['carga_horaria'];
$curso_id = $_POST['curso_id'];

$sql = "insert into disciplina (nome, descricao, carga_horaria, usuario_id, curso_id) values "
        . "('$nome', '$descricao', $carga_horaria, $usuario_id[0], $curso_id)";

if (@mysqli_query($conexao, $sql)){
   ?>
      <h3> Disciplina cadastrada com sucesso! </h3>
    
   <a href=form_inserir.php> <button class="btn-continuar button">Continuar cadastrando </button></a>   <a href=listar.php><button class="btn-gerenciamento button"> Ir para gerenciamento</button></a>
   <?php
}else {
          ?>
    <h3>Não foi possível realizar o cadastro</h3>
    
    <a href=form_inserir.php> <button class="btn-continuar button">Insira novamente </button></a> <a href=listar.php><button class="btn-gerenciamento button"> Ir para gerenciamento</button></a>
   <?php
}
?>





