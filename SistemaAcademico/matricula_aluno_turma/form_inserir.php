<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Matricular Aluno em Turma</title>
        <link href="../css/estilo.css" rel="stylesheet">
        <link href="../css/form.css" rel="stylesheet">
    </head>

    <body>
        <div id="interface">
            <?php
            include '../cabecalho.php';
            ?>  
            <h3 id="cadastro">Matricular aluno em turma</h3>
            <form method="post" action="inserir.php">

                <?php
                include '../bd/conectar.php';

                $sql_matricula = "select aluno.nome, aluno_curso.id from aluno join aluno_curso on aluno.id=aluno_curso.aluno_id order by nome";
                $retorno = mysqli_query($conexao, $sql_matricula);
                ?>

                <label>Aluno:</label> <select name="aluno_curso_id">

                    <?php
                    while ($linha = mysqli_fetch_array($retorno)) {
                        ?>

                        <option value="<?= $linha['id'] ?>"><?= $linha['nome'] ?></option>

                        <?php
                    }
                    ?>

                </select> <br>
                <?php
                $sql_turma = "select turma.id from turma";
                $retorno = mysqli_query($conexao, $sql_turma);
                ?>
                <label>Turma:</label> <select name="turma_id">

                    <?php
                    while ($linha = mysqli_fetch_array($retorno)) {
                        ?>

                        <option value="<?= $linha['id'] ?>"><?= $linha['id'] ?></option>

                        <?php
                    }
                    ?>

                </select>
                <br>
<!--               <label>Ano: </label>
                <input type="text" required="" name="ano"><br>
                <label>Semestre: </label>
                <input type="text" required="" name="semestre"><br>-->
                <br>
                <input class="btn" type="submit" value="Inserir">
            </form>


            <?php
            include '../rodape.php';
            ?>
        </div>
    </body>
</html>