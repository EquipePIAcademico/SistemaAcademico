<!DOCTYPE html>
<html>
    <head>
        <title>Confirmar exclusão</title>
        <meta charset="utf-8">
<?php
ini_set("display_errors", true);

include '../bd/conectar.php';
include_once '../cabecalho.php';
$id = $_POST['id'];
?>
<h3>Deseja realmente excluir?</h3>
<a href=listar.php><input type="submit" value="Cancelar" class="cancelar"></a>

<form action="excluir_lote.php" method="post">
    <?php
    foreach ($id as $value) {
        $sql = "select curso.id, curso.nome as curso_nome, curso.descricao, curso.carga_horaria, curso.anoInicio, curso.semestreInicio, curso.anoTermino, curso.semestreTermino, "
                    . "tipo.nome as tipo_nome, turno.nome as turno_nome from tipo join curso on curso.tipo_id = tipo.id join turno on turno.id=curso.turno_id where curso.id= $value order by curso_nome";
        $resultado = mysqli_query($conexao, $sql);
        while ($linha = mysqli_fetch_array($resultado)) {
            ?>
            <input type="hidden" name="id[]" value="<?= $linha['id'] ?>">
            <?php
        }
    }
    ?>
    <input class="confirmar" type="submit" value="Confirmar" >      

</form>




