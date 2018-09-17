<!DOCTYPE html>
<html>
    <head>
        <title>Disciplinas Cadastradas</title>
        <meta charset="utf-8">
        <link href="../css/estilo.css" rel="stylesheet">
        <link href="../css/form.css" rel="stylesheet">
    </head>
    <body>
        <div id="interface">
        <?php
        //session_start();

            include '../cabecalho.php';

            include '../bd/conectar.php';

            ini_set("display_errors", true);

            $sql = "select disciplina.id, disciplina.nome as disc_nome, disciplina.descricao, disciplina.carga_horaria, curso.nome as curso_nome, tipo.nome as tipo_nome "
                    . "from disciplina join curso on curso.id=disciplina.curso_id join tipo on tipo.id=curso.tipo_id order by curso_nome";

            $resultado = mysqli_query($conexao, $sql);
            ?>
            <form action="excluir_lote.php" method="post">
                <table id="tabelaspec">
                     <caption>Disciplinas Cadastradas</caption>
                    <tr>
                        <td class="cc">Selecionar</td><td class="cc">Curso da disciplina</td><td class="cc">Nome</td><td class="cc">Descrição</td><td class="cc">Carga horária</td><td class="ce">Excluir</td><td class="ca">Alterar</td>
                    </tr>
                    <?php
                    while ($linha = mysqli_fetch_array($resultado)) {
                        ?>
                        <tr>
                            <td><input type="checkbox" name="id[]" value="<?= $linha['id'] ?>"</td>
                            
                            <td><?= $linha['tipo_nome'] ?> - <?= $linha['curso_nome'] ?></td>
                            <td><?= $linha['disc_nome'] ?></td>
                            <td><?= $linha['descricao'] ?></td>
                            <td><?= $linha['carga_horaria'] ?></td>

                            <td><a href="excluir.php?id=<?= $linha['id'] ?>">
                                    <img src="../img/excluir2.png" height="30" width="30"/></a></td>

                            <td><a href="form_alterar.php?id=<?= $linha['id'] ?>">
                                    <img src="../img/alterar2.png" height="30" width="30"/></a></td>
                        </tr>
                        <?php
                    }
                    ?>

                </table><br>
                <input class="btn" type="submit" value="Excluir">
            </form>

            <?php
            require_once '../rodape.php';
            ?>


        </div>
    </body>
</html>