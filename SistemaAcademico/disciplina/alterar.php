 <head>
        <title>Alterar disciplina</title>
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
$carga_horaria = $_POST['carga_horaria'];
$curso_id = $_POST['curso_id'];

include '../bd/conectar.php';
include '../cabecalho.php';
$sql = "update disciplina set nome='$nome', descricao='$descricao', carga_horaria=$carga_horaria, curso_id=$curso_id where id = $id";

if (@mysqli_query($conexao, $sql)){
      ?>
   <h3> Alteração realizada com sucesso! </h3>
    
   <a href=listar.php> <button class="btn-continuar button">Voltar para gerenciamento</button></a> 
   
    <?php
     
}else {
    ?>
   <h3> Não foi possível realizar a alteração </h3>
    
   <a href=form_alterar.php> <button class="btn-continuar button">Insira novamente</button></a> 
   
    <?php
}
