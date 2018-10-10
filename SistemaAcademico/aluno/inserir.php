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

ini_set("display_errors", true);

include '../bd/conectar.php';
include '../cabecalho.php';

$sql_id = "select id from usuario where username = '$_SESSION[username]'";

$retorno_id = mysqli_query($conexao, $sql_id);

$usuario_id = mysqli_fetch_array($retorno_id);

$nome = $_POST['nome'];
$email = $_POST['email'];
$sexo = $_POST['sexo'];
$dataN = $_POST['dataN'];
$rg = $_POST['rg'];
$cpf = $_POST['cpf'];
$nacionalidade = $_POST['nacionalidade'];
$bairro = $_POST['bairro'];
$rua = $_POST['rua'];
$complemento = $_POST['complemento'];
$cep = $_POST['cep'];
$numero = $_POST['numero'];
$renda_id = $_POST['renda_id'];

$sql = "insert into aluno (nome, email, sexo, dataN, rg, cpf, nacionalidade, bairro, rua, complemento, cep, numero, usuario_id, renda_id) values "
        . "('$nome', '$email', '$sexo', '$dataN', '$rg', '$cpf', '$nacionalidade', '$bairro', '$rua', '$complemento', "
        . "'$cep', $numero, $usuario_id[0], $renda_id)";

if (@mysqli_query($conexao, $sql)) {
 ?>
   <h3> Aluno cadastrado com sucesso! </h3>
    
   <a href=form_inserir.php> <button class="btn-continuar button">Continuar cadastrando </button></a>   <a href=listar.php><button class="btn-gerenciamento button"> Ir para gerenciamento</button></a>
   
  <?php 
} else {
    ?>
    <h3>Não foi possível realizar o cadastro</h3>
    
    <a href=form_inserir.php> <button class="btn-continuar button">Insira novamente </button></a> <a href=listar.php><button class="btn-gerenciamento button"> Ir para gerenciamento</button></a>
   <?php 
}




