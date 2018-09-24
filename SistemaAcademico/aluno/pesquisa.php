<?php
$a = $_GET['a'];

if ($a == "buscar") {
    $pesquisaAluno = trim($_POST['pesquisaAluno']);
    $sql = mysqli_query($conexao, "select * from aluno where nome like '" . $pesquisaAluno . "%' order by nome");
    $numRegistros = mysqli_num_rows($sql);
    if ($numRegistros != 0) {
        while ($aluno = mysqli_fetch_object($sql)) {
            
        }
    }
}
?>

<form action="excluir_lote.php" method="post">

    <table id="tabelaspec">
        <caption>Alunos Cadastrados</caption>
        <tr> <td class="cc">Selecionar</td><td class="cc">Nome</td><td class="cc">E-mail</td><td class="cc">Data de nascimento</td><td class="cc">Renda</td><td class="cc">Nacionalidade</td><td class="cc" colspan="5">Endereço</td><td class="ce">Excluir</td><td class="ca">Alterar</td>
        </tr>
        <?php
        while ($linha = mysqli_fetch_array($resultado)) {
            ?>
            <td><input type="checkbox" name="id[]" value="<?= $linha['id'] ?>"</td>

            <td><?= $linha['nome'] ?></td>
            <td><?= $linha['email'] ?></td>
            <td><?= $linha['dataN'] ?></td>
            <td><?= $linha['valor'] ?></td>
            <td><?= $linha['nacionalidade'] ?></td>
            <td>Bairro: <?= $linha['bairro'] ?></td>
            <td>Rua: <?= $linha['rua'] ?></td>
            <td>Complemento: <?= $linha['complemento'] ?></td>
            <td>CEP:<?= $linha['cep'] ?></td>
            <td>Número: <?= $linha['numero'] ?></td>

            <td><a href="excluir.php?id=<?= $linha['id'] ?>">
                    <img src="../img/excluir2.png" height="30" width="30"/></a></td>

            <td><a href="form_alterar.php?id=<?= $linha['id'] ?>">
                    <img src="../img/alterar2.png" height="30" width="30"/></a></td>
            </tr>
            <?php
        }
        ?>

    </table>
    <input class="btn" type="submit" value="Excluir">

</form>