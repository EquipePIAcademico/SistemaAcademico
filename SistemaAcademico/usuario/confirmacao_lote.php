<!DOCTYPE html>
<html>
    <head>
        <title>Confirmar exclusão</title>
        <meta charset="utf-8">
<?php
ini_set("display_errors", true);

include '../bd/conectar.php';

include '../cabecalho.php';

include './autenticacao.php';


$id = $_POST['id'];
?>
<h3>Deseja realmente excluir?</h3>

<a href=listar.php><input type="submit" value="Cancelar" class="cancelar"></a>

<form action="excluir_lote.php" method="post">
    <?php
    foreach ($id as $value) {
        $sql = "select id, nome, email, date_format(dataN, '%d/%m/%Y') as dataNformatada, perfil_acesso, username "
                . "from usuario where username != '$_SESSION[username]' and usuario.id=$value";
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




