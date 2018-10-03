<?php


$id = $_POST['aluno_id'];
//$id_alterar = $id_excluir;

//$aluno_id = $_POST['id'];
$curso_id = $_POST['curso_id'];
$ano = $_POST['ano'];
$semestre = $_POST['semestre'];


$matricula = $ano.$semestre.$curso_id.$id;



include '../bd/conectar.php';

//$sql_excluir = "delete from aluno_curso where aluno_id = $id_excluir";

$sql = "update aluno_curso set aluno_id = $id, curso_id = $curso_id, ano = $ano, semestre = $semestre, matricula = $matricula where aluno_id = $id";


if (@mysqli_query($conexao, $sql)){
    echo "<script>alert('Alteração realizada com sucesso!')</script>";
    echo " <a href=listar.php>Ir para gerenciamento</a>";
}else {
    echo "<script>alert('Não foi possível realizar a alteração!')</script>";
    echo "<a href=form_alterar.php>Insira novamente</a>";
}
