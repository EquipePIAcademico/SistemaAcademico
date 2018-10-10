<head>
        <title>Alterar tipo de curso</title>
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
              left: 580px;
             
          }
          .btn-gerenciamento{
              position: absolute;
              left: 690px;
          }
      </style>
    </head>

<?php

$id = $_POST['id'];
$nome = $_POST['nome'];
$descricao = $_POST['descricao'];

include '../bd/conectar.php';
include '../cabecalho.php';

$sql = "update tipo set nome='$nome', descricao='$descricao' where id = $id";

mysqli_query($conexao, $sql);

if (@mysqli_query($conexao, $sql)){
       ?>
   <h3> Alteração realizada com sucesso! </h3>
    
   <a href=listar.php> <button class="btn-continuar button">Voltar para gerenciamento</button></a> 
   
    <?php
     
}else {
    
    echo  "<script>alert('Não foi possível realizar a alteração!');</script>";
    echo " <a href=form_alterar.php>Insira novamente</a>";
    
}