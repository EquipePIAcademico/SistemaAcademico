<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Matricular Aluno em Curso</title>
        <link href="../css/estilo.css" rel="stylesheet">
        <link href="../css/form.css" rel="stylesheet">
    </head>

    <body>
        <div id="interface">
            <?php
            include '../cabecalho.php';
            ?>  
            <h3 id="cadastro">Matricular aluno em curso</h3>
            <form method="get" action="inserir.php">

                <?php
                include '../bd/conectar.php';

                $sql_aluno = "select aluno.id, aluno.nome from aluno order by nome";
                
                
                $retorno = mysqli_query($conexao, $sql_aluno);
                ?>

                <label>Alunos:</label> <select name="aluno_id">

                    <?php
                    while ($linha = mysqli_fetch_array($retorno)) {
                        ?>

                        <option value="<?= $linha['id'] ?>"><?= $linha['nome'] ?></option>

                        <?php
                    }
                    ?>

                </select> <br>
                <?php
                $sql_curso = "select curso.id, curso.nome from curso order by nome";
                $retorno = mysqli_query($conexao, $sql_curso);
                ?>
                <label>Cursos:</label> <select name="curso_id">

                    <?php
                    while ($linha = mysqli_fetch_array($retorno)) {
                        ?>

                        <option value="<?= $linha['id'] ?>"><?= $linha['nome'] ?></option>

                        <?php
                    }
                
                    ?>
                        

                </select>
                <br>
               <label>Ano: </label>
                <input type="text" required="" name="ano"><br>
                <label>Semestre: </label>
                <input type="text" required="" name="semestre"><br>
                <br>
                <input class="btn" type="submit" value="Inserir">
                
            </form>


            <?php
            include '../rodape.php';
            ?>
        </div>
    </body>
</html>