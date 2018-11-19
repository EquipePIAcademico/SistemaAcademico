<?php

error_reporting(E_ALL ^ E_NOTICE);
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Matricular Aluno em Turma</title>
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
              left: 500px;
             
          }
          .btn-gerenciamento{
              position: absolute;
              left: 590px;
          }
          body{
               font-family: sans-serif;
    font-size: 14px;
          }
      </style>
<?php

//session_start();
include '../bd/conectar.php';
include '../cabecalho.php';

ini_set("display_errors", true);

$dataAvaliacao = $_POST['dataAvaliacao'];
$descricao = $_POST['descricao'];
$aluno_id = $_POST['aluno_id'];
$turma_id = $_POST['turma_id'];
$nota = $_POST['nota'];

for ($i =0 ; $i < sizeof($aluno_id) ; $i++){
for ($i =0 ; $i < sizeof($turma_id) ; $i++){
for ($i =0 ; $i < sizeof($nota) ; $i++){
 
$inserir = "insert into nota values (default, '$dataAvaliacao', '$descricao', '$aluno_id[$i]', '$turma_id[$i]', '$nota[$i]')";

@mysqli_query($conexao, $inserir);
 }
 }
 }


?>

      <h3> Notas confirmadas! </h3>
    
      <a href=listar_curso.php><button class="btn-gerenciamento button notas"> Ir para gerenciamento</button></a>

</html>






