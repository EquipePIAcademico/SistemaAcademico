<?php

error_reporting(E_ALL ^ E_NOTICE);
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Matricula de aluno em curso</title>
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
           .btn-insira{
              position: absolute;
              left: 620px;
             
          }
          .btn-gerenciamento{
              position: absolute;
              left: 690px;
          }
      </style>
<?php

//session_start();
include '../bd/conectar.php';
include '../cabecalho.php';
ini_set("display_errors", true);

//sql_id = "select id from usuario where username = '$_SESSION[username]'";

//$retorno_id = mysqli_query($conexao, $sql_id);

//$usuario_id = mysqli_fetch_array($retorno_id);

$aluno_id = $_GET['aluno_id'];
$curso_id = $_GET['curso_id'];
$ano = $_GET['ano'];
$semestre = $_GET['semestre'];

    
$matricula = $ano.$semestre.$curso_id.$aluno_id;



//$buscar = mysqli_query("select * from aluno_curso join aluno on aluno_curso.aluno_id = '$aluno_id'");


//$sql = mysqli_query("select * from aluno_curso where aluno_id = $aluno_id");
//echo $aluno_id;
//echo $sql;

//$total = mysqli_num_rows($buscar);

//if($total == 1){
   // echo "Já existe";
//} else{
  //  echo "Não existe";
//}


$sql = "insert into aluno_curso (aluno_id, curso_id, semestre, ano, matricula) values ($aluno_id, $curso_id, $semestre, $ano, $matricula)";

if (@mysqli_query($conexao, $sql)) {
       ?>
      <h3> Aluno matriculado com sucesso! </h3><br><?php
   echo "<h3> Nº da matricula $matricula </h3>";
    ?>
   <a href=form_inserir.php> <button class="btn-continuar button">Continuar cadastrando </button></a>   <a href=listar_cursos.php><button class="btn-gerenciamento button"> Ir para gerenciamento</button></a>


<?php
      
    } else {
        
              ?>
      <h3> Aluno já matriculado neste curso </h3><br><?php
    ?>
   <a href=form_inserir.php> <button class="btn-continuar button btn-insira">Insira novamente </button></a>   
<?php
       
}



