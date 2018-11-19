<?php

ini_set("display_errors", true);

include '../bd/conectar.php';

$id = $_POST['id'];
$cont = 0;

foreach ($id as $value) {

    $sql_valid = "select disciplina.nome from disciplina join turma on turma.disciplina_id=disciplina.id where disciplina.id=$value";

    $retorno_valid = mysqli_query($conexao, $sql_valid);

    $resultado_valid = mysqli_fetch_array($retorno_valid);

    if ($resultado_valid == null) {
        $sql = "delete from disciplina where id= $value";

        mysqli_query($conexao, $sql);
        
        header('Location: listar.php');
     
    } 
}

if ($resultado_valid != null){
    echo 'Disciplina(s) associada(s) à turmas! Primeiramente deve-se excluir as turmas!';
    ?>
    <a href=listar.php>Voltar para gerenciamento</a><a href=../turma/listar.php>Ir para gerenciamento de turmas</a>

    <?php
}
