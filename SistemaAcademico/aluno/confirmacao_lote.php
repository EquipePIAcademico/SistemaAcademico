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
        $sql = "select aluno.id, aluno.nome, aluno.email, date_format(aluno.dataN, '%d/%m/%Y') as dataNformatada, aluno.nacionalidade, aluno.bairro, aluno.rua, aluno.complemento, aluno.cep, "
                . "aluno.numero, renda.valor from aluno join renda on renda.id=aluno.renda_id where aluno.id= $value order by nome";
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




