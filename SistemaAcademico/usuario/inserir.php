<?php
error_reporting(E_ALL ^ E_NOTICE);
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Cadastro Aluno</title>
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
.btn-insira:hover {
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
          .btn-insira{
              position: absolute;
              left: 620px;
             
          }
          
          .btn-gerenciamento{
              position: absolute;
              left: 690px;
          }
      </style>
    </head>
<?php

ini_set("display_errors", true);

$nome = $_POST['nome'];
$email = $_POST['email'];
$dataN = $_POST['dataN'];
$cpf = $_POST['cpf'];
$perfil_acesso = $_POST['perfil_acesso'];
$username = $_POST['username'];
$password = $_POST['password'];

include '../bd/conectar.php';
include '../cabecalho.php';

$sql = "insert into usuario (nome, email, dataN, cpf, perfil_acesso, username, password) values "
        . "('$nome', '$email', '$dataN', '$cpf', '$perfil_acesso', '$username', '$password')";

if (@mysqli_query($conexao, $sql)){
    ?>
        <h3> Cadastro realizado com sucesso! </h3>
    
        <a href=form_inserir.php> <button class="btn-continuar button">Continuar cadastrando</button></a>   <a href=listar.php><button class="btn-gerenciamento button"> Ir para gerenciamento</button></a>
        <?php
    
}else {
      ?>
    <h3>Usuário ou e-mail já cadastrados!</h3>
    
    <a href=form_inserir.php> <button class="btn-insira button">Insira novamente </button></a>
  <?php  
}
//header('Location: form_inserir.php');
?>



