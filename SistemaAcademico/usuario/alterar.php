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
.btn-gerenciamento:hover{
     background-color:green; /* Green */
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
              left: 580px;
             
          }
          .btn-gerenciamento{
              position: absolute;
              left: 650px;
          }
      </style>
    </head>

<?php

$username = $_GET['username'];

$id = $_POST['id'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$dataN = $_POST['dataN'];
$cpf = $_POST['cpf'];
$password = $_POST['password'];

include '../bd/conectar.php';
include '../cabecalho.php';

$sql_pessoa = "update usuario set nome='$nome', email='$email', dataN='$dataN', cpf='$cpf', password='$password' where id = $id";

if (@mysqli_query($conexao, $sql_pessoa)) {
    if ($username == 'administrador') {
          ?>
   <h3> Alteração realizada com sucesso! </h3>
    
   <a href=listar_perfil.php> <button class="btn-gerenciamento button">Ver perfil</button></a> 
<?php
        
    } else {
               ?>
   <h3> Alteração realizada com sucesso! </h3>
    
   <a href=listar.php> <button class="btn-continuar button">Voltar para gerenciamento</button></a> 
<?php
        
    }
} else {
    echo "<script>alert('Usuário ou e-mail já cadastrados!')</script>";
    echo " <a href=form_alterar.php>OK</a>";
}

