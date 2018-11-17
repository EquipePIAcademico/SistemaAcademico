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
        $sql = "select disciplina.id, disciplina.nome as disc_nome, disciplina.descricao, disciplina.carga_horaria, curso.nome as curso_nome, tipo.nome as tipo_nome "
                    . "from disciplina join curso on curso.id=disciplina.curso_id join tipo on tipo.id=curso.tipo_id where disciplina.id=$value order by curso_nome";
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




