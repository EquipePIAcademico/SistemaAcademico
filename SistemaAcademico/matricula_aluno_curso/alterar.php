<head>
        <title>Alterar matricula</title>
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


$id = $_POST['aluno_id'];
//$id_alterar = $id_excluir;

//$aluno_id = $_POST['id'];
$curso_id = $_POST['curso_id'];
$ano = $_POST['ano'];
$semestre = $_POST['semestre'];


$matricula = $ano.$semestre.$curso_id.$id;



include '../bd/conectar.php';
include '../cabecalho.php';

//$sql_excluir = "delete from aluno_curso where aluno_id = $id_excluir";

$sql = "update aluno_curso set aluno_id = $id, curso_id = $curso_id, ano = $ano, semestre = $semestre, matricula = $matricula where aluno_id = $id";


if (@mysqli_query($conexao, $sql)){
  ?>
   <h3> Alteração realizada com sucesso! </h3>
    
   <a href=listar_cursos.php> <button class="btn-continuar button">Voltar para gerenciamento</button></a> 
   
    <?php
     
}else {
    ?>
   <h3> Não foi possível realizar a alteração </h3>
    
   <a href=form_alterar.php> <button class="btn-continuar button">Insira novamente</button></a> 
   
    <?php
}
