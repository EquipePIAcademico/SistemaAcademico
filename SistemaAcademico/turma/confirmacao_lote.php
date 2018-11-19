<!DOCTYPE html>
<html>
    <head>
        <title>Confirmar exclusão</title>
        <meta charset="utf-8">

<?php
ini_set("display_errors", true);

include '../bd/conectar.php';
include '../cabecalho.php';

$id = $_POST['id'];
?>
<h3>Deseja realmente excluir?</h3>

<a href=listar.php><input type="submit" value="Cancelar" class="cancelar"></a>

<form action="excluir_lote.php" method="post">
    <?php
    foreach ($id as $value) {
        $sql = "select turma.id, turma.nVagas, disciplina.nome as disc_nome, semestre.valor as semestre_valor, usuario.nome as professor_nome from "
                    . "usuario join turma on turma.professor_id=usuario.id join disciplina on disciplina.id=turma.disciplina_id join semestre on "
                    . "semestre.id=turma.semestre_id where perfil_acesso='professor(a)' and turma.id=$value";
        $resultado = mysqli_query($conexao, $sql);
        while ($linha = mysqli_fetch_array($resultado)) {
            ?>
            <input type="hidden" name="id[]" value="<?= $linha['id'] ?>">
            <?php
        }
    }
    ?>
            <input type="submit" value="Confirmar" class="confirmar">      

</form>




