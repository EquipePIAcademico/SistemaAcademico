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

$id = $_GET['id'];

$sql_valid = "select curso.nome, disciplina.nome from curso join disciplina on disciplina.curso_id=curso.id where curso.id=$id";

$retorno_valid = mysqli_query($conexao, $sql_valid);

$resultado_valid = mysqli_fetch_array($retorno_valid);

if ($resultado_valid == null) {
    $sql = "delete from curso where id= $id";

    mysqli_query($conexao, $sql);

    $sql_aluno_curso = "delete from aluno_curso where aluno_curso.curso_id=$id";

    mysqli_query($conexao, $sql_aluno_curso);
    
    header('Location: listar.php');
} else {
    ?><h3 id="cadastro">Este curso está associado à disciplinas! Primeiramente deve-se excluir as disciplinas</h3>
    
<a href=listar.php class="btn-continuar button" >Voltar para gerenciamento</a><a href=../disciplina/listar.php class="btn-gerenciamento button">Ir para gerenciamento de disciplinas</a>

    <?php
}


