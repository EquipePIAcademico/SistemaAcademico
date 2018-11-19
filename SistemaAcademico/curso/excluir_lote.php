<?php
ini_set("display_errors", true);

include '../bd/conectar.php';

$id = $_POST['id'];

foreach ($id as $value) {

    $sql_valid = "select curso.nome, disciplina.nome from curso join disciplina on disciplina.curso_id=curso.id where curso.id=$value";

    $retorno_valid = mysqli_query($conexao, $sql_valid);

    $resultado_valid = mysqli_fetch_array($retorno_valid);

    if ($resultado_valid == null) {
        $sql = "delete from curso where id= $value";

        mysqli_query($conexao, $sql);

        header('Location: listar.php');
    }

}
if ($resultado_valid != null){
    echo 'Curso(s) associado(s) à disciplinas! Primeiramente deve-se excluir as disciplinas!';
    ?>
    <a href=listar.php>Voltar para gerenciamento</a><a href=../disciplina/listar.php>Ir para gerenciamento de disciplinas</a>

    <?php
}
