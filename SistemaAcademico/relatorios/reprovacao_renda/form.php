<!DOCTYPE html>
<html>
    <head>
        <title>Cursos Faixa de renda</title>
        <meta charset="utf-8">
        <link href="../../css/estilo.css" rel="stylesheet">
        <link href="../../css/form.css" rel="stylesheet">
    </head>
    <body>
        <div id="interface">
            <?php
            //session_start();
            include '../../cabecalho.php';

            include '../../bd/conectar.php';

            ini_set("display_errors", true);

            $sql_curso = "select distinct curso.id, curso.nome FROM curso join turma on curso.id=turma.curso_id";

            $retorno_curso = mysqli_query($conexao, $sql_curso);
            
            ?>

            <form action="emitir.php" method="get">   

    <h3 id="cadastro">Emitir relatório de reprovação por faixa de renda</h3>
              
               

                Curso:<select name="curso_id" class="espacamento" style="width: 220px; text-align-last: center;">
                    <?php
                    while ($linha_curso = mysqli_fetch_array($retorno_curso)) {
                        ?>

                        <option value="<?= $linha_curso['id'] ?>"><?= $linha_curso['nome'] ?></option>

                        <?php
                    }
                    ?>

                </select><br><br>

                <?php
                $sql_renda1 = "select renda.id, renda.valor from renda order by id";
            
                $retorno_renda1 = mysqli_query($conexao, $sql_renda1);
                ?>
                Entre:<select name="rendaIni_id" class="espacamento" style="width: 220px;">
                    <?php
                    while ($linha_renda1 = mysqli_fetch_array($retorno_renda1)) {
                        ?>

                        <option value="<?= $linha_renda1['id'] ?>"><?= $linha_renda1['valor'] ?></option>

                        <?php
                    }
                    ?>

                </select>
                
                <?php
                $sql_renda2 = "select renda.id, renda.valor from renda order by id";
            
                $retorno_renda2 = mysqli_query($conexao, $sql_renda2);
                ?>
                e :<select name="rendaFim_id" class="espacamento" style="width: 220px;">
                    <?php
                    while ($linha_renda2 = mysqli_fetch_array($retorno_renda2)) {
                        ?>

                        <option value="<?= $linha_renda2['id'] ?>"><?= $linha_renda2['valor'] ?></option>

                        <?php
                    }
                    ?>

                </select>
                
                <br><input class="btn" type="submit" value="Emitir relatório">
            </form>      


<?php
require_once '../../rodape.php';
?>