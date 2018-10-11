
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Listar Alunos de Curso</title>
        <link href="../css/estilo.css" rel="stylesheet">
        <link href="../css/form.css" rel="stylesheet">
    </head>

    <body>
        <div id="interface">
            <?php
            include '../cabecalho.php';
            ?>  
            <h3 id="cadastro">Listar Alunos de Curso</h3>
            <form method="post" action="inserir.php">

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
               
                <input class="btn" type="submit" value="Listar Alunos">
            </form>


            <?php
            include '../rodape.php';
            ?>
        </div>
    </body>
</html>