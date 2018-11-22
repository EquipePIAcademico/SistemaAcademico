<?php
error_reporting(E_ALL ^ E_NOTICE);
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Excluir curso</title>
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
              left: 460px;
              background-color: #ccc;
             
          }
          .btn-gerenciamento{
              background-color: #ccc;
              position: absolute;
              left: 690px;
          }
      </style>
<?php


ini_set("display_errors", true);

include '../bd/conectar.php';
include '../cabecalho.php';

$id = $_POST['id'];

foreach ($id as $value) {

    $sql_valid = "select curso.nome, tipo.nome from tipo join curso on curso.tipo_id=tipo.id where tipo.id=$value";

    $retorno_valid = mysqli_query($conexao, $sql_valid);

    $resultado_valid = mysqli_fetch_array($retorno_valid);

    if ($resultado_valid == null) {
        $sql = "delete from tipo where id= $value";

        mysqli_query($conexao, $sql);
        
        header('Location: listar.php');
     
    } 
}

if ($resultado_valid != null){
    ?><h3 id="cadastro">Tipo(s) associado(s) a cursos! Primeiramente deve-se excluir os cursos</h3>
    
    <a href=listar.php class="btn-continuar button">Voltar para gerenciamento</a><a href=../curso/listar.php class="btn-gerenciamento button">Ir para gerenciamento de cursos</a>
    <?php
}