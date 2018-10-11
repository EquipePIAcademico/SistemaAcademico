<?php
error_reporting(E_ALL ^ E_NOTICE);
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Alterar cadastro</title>
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
    display: flex;
    justify-content: center;
    
}
          
          .btn-continuar{
              position: absolute;
              left: 580px;
               
   
             
          }
          .btn-gerenciamento{
              position: absolute;
              left: 690px;
          }
      </style>

<?php

$id = $_POST['id'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$bairro = $_POST['bairro'];
$rua = $_POST['rua'];
$complemento = $_POST['complemento'];
$cep = $_POST['cep'];
$numero = $_POST['numero'];
$renda_id = $_POST['renda_id'];

include '../bd/conectar.php';
include '../cabecalho.php';

$sql_aluno = "update aluno set nome='$nome', email='$email', "
        . "bairro='$bairro', rua='$rua', complemento='$complemento', cep='$cep', numero='$numero', renda_id='$renda_id' where id = $id";

if (@mysqli_query($conexao, $sql_aluno)){
  ?>
      <h3> Alteração realizada com sucesso! </h3>
    
   <a href=listar.php> <button class="btn-continuar button">Voltar para gerenciamento</button></a>
   <?php
    
   
}else {
      ?>
      <h3>Não foi possível realizar a alteração</h3>
    
   <a href=listar.php> <button class="btn-continuar button">Voltar para gerenciamento</button></a>
   <?php
  
 
}
