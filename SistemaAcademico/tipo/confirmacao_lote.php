<!DOCTYPE html>
<html>
    <head>
        <title>Confirmar exclusão</title>
        <meta charset="utf-8">
<?php
ini_set("display_errors", true);

include '../bd/conectar.php';

$id = $_POST['id'];

echo "Deseja realmente excluir?" . "<br>";
?>
<a href=listar.php>Cancelar</a>

<form action="excluir_lote.php" method="post">
    <?php
    foreach ($id as $value) {
        $sql = "select * from tipo where tipo.id=$value order by nome ";
        $resultado = mysqli_query($conexao, $sql);
        while ($linha = mysqli_fetch_array($resultado)) {
            ?>
            <input type="hidden" name="id[]" value="<?= $linha['id'] ?>">
            <?php
        }
    }
    ?>
    <input type="submit" value="Confirmar" >      

</form>




