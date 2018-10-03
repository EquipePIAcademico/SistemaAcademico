<?php

$id = $_POST['id'];
$nome = $_POST['nome'];
$descricao = $_POST['descricao'];
$carga_horaria = $_POST['carga_horaria'];
$anoInicio = $_POST['anoInicio'];
$semestreInicio = $_POST['semestreInicio'];
$anoTermino = $_POST['anoTermino'];
$semestreTermino = $_POST['semestreTermino'];
$turno_id = $_POST['turno_id'];


include '../bd/conectar.php';

if ($anoInicio > $anoTermino) {
//echo "Erro! Ano de início é maior que o de término <br> <a href=form_alterar.php?id=$id>Insira novamente</a>";
    echo  "<script>alert('Erro! Ano de início é maior que o de término')</script>";
    echo "<a href=form_alterar.php?id=$id>Insira novamente</a>";

} else if ($anoInicio == $anoTermino) {
    if ($semestreInicio > $semestreTermino) {
        echo "<script>alert('Erro! Semestre de início é maior que o de término')</script>"; 
        echo "<a href=form_alterar.php?id=$id>Insira novamente</a>";
    } else {
        $sql = "update curso set nome='$nome', descricao='$descricao', carga_horaria='$carga_horaria', anoInicio='$anoInicio', semestreInicio=$semestreInicio, "
                . "anoTermino='$anoTermino', semestreTermino=$semestreTermino, turno_id='$turno_id' where id = $id";

        if (@mysqli_query($conexao, $sql)) {
            echo  "<script>alert('Alteração realizada com sucesso!')</script>";
            echo "<a href=listar.php>Voltar para gerenciamento</a>";
        } else {
    
             echo  "<script>alert('Não foi possível realizar a alteração!')</script>";
             echo "<a href=form_alterar.php>Insira novamente</a>'";
             
            }
    }
} else {
    $sql = "update curso set nome='$nome', descricao='$descricao', carga_horaria='$carga_horaria', anoInicio='$anoInicio', semestreInicio=$semestreInicio, "
            . "anoTermino='$anoTermino', semestreTermino=$semestreTermino, turno_id='$turno_id' where id = $id";

    if (@mysqli_query($conexao, $sql)) {
        echo "<script>alert('Alteração realizada com sucesso!')</script>";
        echo "<a href=listar.php>Voltar para gerenciamento</a>";
        
    } else {
        echo "<script>alert('Não foi possível realizar a alteração!')</script>";
        echo "<a href=form_alterar.php>Insira novamente</a>";
    }
}
