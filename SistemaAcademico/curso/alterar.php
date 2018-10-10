<?php
error_reporting(E_ALL ^ E_NOTICE);
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Alterar cadastro</title>
        <meta charset="utf-8">
       <link href="../css/estilo.css" rel="stylesheet">
       <link href="../css/form.css" rel="stylesheet">
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
$descricao = $_POST['descricao'];
$carga_horaria = $_POST['carga_horaria'];
$anoInicio = $_POST['anoInicio'];
$semestreInicio = $_POST['semestreInicio'];
$anoTermino = $_POST['anoTermino'];
$semestreTermino = $_POST['semestreTermino'];
$turno_id = $_POST['turno_id'];


include '../bd/conectar.php';
include '../cabecalho.php';

if ($anoInicio > $anoTermino) {
   ?>
      <h3> Erro! Ano de início é maior que o de término </h3>
    
   <a href=form_alterar.php?id=$id> <button class="btn-continuar button">Insira novamente</button></a>
    <?php
} else if ($anoInicio == $anoTermino) {
    if ($semestreInicio > $semestreTermino) {
       ?>
      <h3> Erro! Semestre de início é maior que o de término </h3>
    
   <a href=form_alterar.php?id=$id> <button class="btn-continuar button">Insira novamente</button></a>
       <?php
    }
      
    } else {
        $sql = "update curso set nome='$nome', descricao='$descricao', carga_horaria='$carga_horaria', anoInicio='$anoInicio', semestreInicio=$semestreInicio, "
                . "anoTermino='$anoTermino', semestreTermino=$semestreTermino, turno_id='$turno_id' where id = $id";

        if (@mysqli_query($conexao, $sql)) {
           ?>
      <h3> Alteração realizada com sucesso! </h3>
    
   <a href=listar.php> <button class="btn-continuar button">Voltar para gerenciamento</button></a>
   <?php
   
        } else {
    ?>
      <h3> Não foi possível realizar a alteração </h3>
    
   <a href=listar.php> <button class="btn-continuar button">Insira novamente</button></a>
   <?php
            }
    }
