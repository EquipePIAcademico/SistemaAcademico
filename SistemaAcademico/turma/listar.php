<!DOCTYPE html>
<html>
    <head>
        <title>Turmas Cadastradas</title>
        <meta charset="utf-8">
        <link href="../css/estilo.css" rel="stylesheet">
    </head>
    <body>
        <div id="interface">


            <?php
            //session_start();

            include '../cabecalho.php';

            include '../bd/conectar.php';

            ini_set("display_errors", true);

            $sql = "select turma.id, turma.nVagas, disciplina.nome as disc_nome, semestre.valor as semestre_valor, usuario.nome as professor_nome from "
                    . "usuario join turma on turma.professor_id=usuario.id join disciplina on disciplina.id=turma.disciplina_id join semestre on semestre.id=turma.semestre_id where perfil_acesso='professor(a)'";

            $resultado = mysqli_query($conexao, $sql);
            ?> 
            <form action="excluir_lote.php" method="post">
                <table id="tabelaspec">
                    <caption>Turmas Cadastradas</caption>
                    <tr>
                        <td class="cc">Selecionar</td><td class="cc">Número de vagas</td><td class="cc">Disciplina</td><td class="cc">Semestre</td><td class="cc">Professor(a)</td><td class="ce">Excluir</td><td class="ca">Alterar</td>
                    </tr>
                    <?php
                    while ($linha = mysqli_fetch_array($resultado)) {
                        ?>
                        <tr>
                            <td><input type="checkbox" name="id[]" value="<?= $linha['id'] ?>"</td>
                            <td><?= $linha['nVagas'] ?></td>
                            <td><a href="../disciplina/listar.php"><?= $linha['disc_nome'] ?></a></td>
                            <td><?= $linha['semestre_valor'] ?></td>
                            <td><?= $linha['professor_nome'] ?></td>
                            
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
        </div>
        <?php
        require_once '../rodape.php';
        ?>