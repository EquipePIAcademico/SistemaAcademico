<?php

ini_set("display_errors", true);

include '../bd/conectar.php';
include '../cabecalho.php';

$id = $_POST['id'];

foreach ($id as $value) {

    $sql_valid = "select curso.nome, tipo.nome from tipo join curso on curso.tipo_id=tipo.id where tipo.id=$value";

    $retorno_valid = mysqli_query($conexao, $sql_valid);

    $resultado_valid = mysqli_fetch_array($retorno_valid);

    if ($resultado_valid == null) {
        $sql = "delete from tipo where id= $value";

        mysqli_query($conexao, $sql);
        
        header('Location: listar.php');
     
    } 
}

if ($resultado_valid != null){
    echo 'Tipo(s) associado(s) a cursos! Primeiramente deve-se excluir os cursos!';
    ?>
    <a href=listar.php>Voltar para gerenciamento</a><a href=../curso/listar.php>Ir para gerenciamento de cursos</a>

    <?php
}