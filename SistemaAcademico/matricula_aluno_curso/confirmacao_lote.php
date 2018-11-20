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
<a href=listar_cursos.php><input type="submit" value="Cancelar" class="cancelar"></a>

<form action="excluir_lote.php" method="get">
    <?php
    foreach ($id as $value) {
        $sql = "select id from aluno_curso where id=$value";
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




