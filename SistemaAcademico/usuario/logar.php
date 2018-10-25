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
      
    color: #2E2E2E;
    border: 2px solid #A4A4A4;
    cursor: pointer;
    border-radius: 5px;
    padding: 10px;
    font-size: 15px;
    
}
          
          .btn-continuar{
              position: absolute;
              left: 650px;
             
          }
          .btn-gerenciamento{
              position: absolute;
              left: 690px;
          }
      </style>
    </head>
<?php

include './autenticacao.php';

ini_set("display_errors", true);

$perfil_acesso = $_POST['perfil_acesso'];
$username = $_POST['username'];
$password = $_POST['password'];

include '../bd/conectar.php';

$sql = "select * from usuario where (perfil_acesso = '$perfil_acesso' and username = '$username') and password = '$password'";

$retorno = mysqli_query($conexao, $sql);

$resultado = mysqli_fetch_array($retorno);

if ($resultado == null) {
   ?>
        <h3> Usuário não encontrado </h3>
    
        <a href=form_login.php> <button class="btn-continuar button">Logar</button></a>   
            
 <?php
} else {
    logar($resultado['perfil_acesso'], $resultado['username'], $resultado['id']);

    header('Location: ../index.php');
}
?>
</html>

