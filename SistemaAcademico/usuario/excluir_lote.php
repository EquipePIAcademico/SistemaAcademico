<?php

ini_set("display_errors", true);

include '../bd/conectar.php';

$id = $_POST['id'];

foreach ($id as $value) {

    $sql_valid = "select distinct usuario.nome from usuario join turma on turma.professor_id=usuario.id where "
        . "usuario.perfil_acesso='professor(a)' and turma.professor_id=$value";

    $retorno_valid = mysqli_query($conexao, $sql_valid);

    $resultado_valid = mysqli_fetch_array($retorno_valid);

    if ($resultado_valid == null) {
        $sql = "delete from usuario where id= $value";

        mysqli_query($conexao, $sql);
        
        header('Location: listar.php');
     
    } 
}

if ($resultado_valid != null){
    echo 'Professor(es) associado(s) à turmas! Primeiramente deve-se excluir as turmas!';
    ?>
    <a href=listar.php>Voltar para gerenciamento</a>

    <?php
}
