<?php

session_start();
include '../bd/conectar.php';

ini_set("display_errors", true);

$sql_id = "select id from usuario where username = '$_SESSION[username]'";

$retorno_id = mysqli_query($conexao, $sql_id);

$usuario_id = mysqli_fetch_array($retorno_id);

$nome = $_POST['nome'];
$descricao = $_POST['descricao'];
$carga_horaria = $_POST['carga_horaria'];
$anoInicio = $_POST['anoInicio'];
$semestreInicio = $_POST['semestreInicio'];
$anoTermino = $_POST['anoTermino'];
$semestreTermino = $_POST['semestreTermino'];
$tipo_id = $_POST['tipo_id'];
$turno_id = $_POST['turno_id'];

if ($anoInicio > $anoTermino) {
    echo 'Erro! Ano de início é maior que o de término <br> <a href=form_inserir.php>Insira novamente</a>';
} else if ($anoInicio == $anoTermino) {
    if ($semestreInicio > $semestreTermino) {
        echo 'Erro! Semestre de início é maior que o de término <br> <a href=form_inserir.php>Insira novamente</a>';
    } else {
        $sql = "insert into curso (nome, descricao, carga_horaria, anoInicio, semestreInicio, anoTermino, semestreTermino, usuario_id, tipo_id, turno_id) values "
                . "('$nome', '$descricao', $carga_horaria, $anoInicio, $semestreInicio, $anoTermino, $semestreTermino, $usuario_id[0], $tipo_id, $turno_id)";

        if (@mysqli_query($conexao, $sql)) {
            echo 'Cadastro realizado com sucesso! <br> <a href=form_inserir.php>Continuar cadastrando</a>   <a href=listar.php>Ir para gerenciamento</a>';
        } else {
            echo 'Erro! <br> <a href=form_inserir.php>OK</a>';
        }
    }
} else {
    $sql = "insert into curso (nome, descricao, carga_horaria, anoInicio, semestreInicio, anoTermino, semestreTermino, usuario_id, tipo_id, turno_id) values "
            . "('$nome', '$descricao', $carga_horaria, $anoInicio, $semestreInicio, $anoTermino, $semestreTermino, $usuario_id[0], $tipo_id, $turno_id)";

    if (@mysqli_query($conexao, $sql)) {
        echo 'Cadastro realizado com sucesso! <br> <a href=form_inserir.php>Continuar cadastrando</a>   <a href=listar.php>Ir para gerenciamento</a>';
    } else {
        echo 'Erro! <br> <a href=form_inserir.php>OK</a>';
    }
}
?>




