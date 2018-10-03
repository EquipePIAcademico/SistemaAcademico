<?php

//session_start();
include '../bd/conectar.php';

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
       echo "<script>alert('Matricula realizada com sucesso! Sua matrícula é $matricula')</script> <br>";
       echo '<br><a href=form_inserir.php>Continuar matriculando</a>   <a href=listar_curso.php>Listar alunos matriculados</a>';
    } else {
    echo "<script>alert('Aluno já matriculado neste curso')</script>";
    echo " <a href=form_inserir.php>Insira novamente</a>";
}



