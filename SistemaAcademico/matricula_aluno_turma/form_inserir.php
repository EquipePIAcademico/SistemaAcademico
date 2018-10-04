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
            <form method="get" action="inserir.php">

                <?php
                include '../bd/conectar.php';
                
                

                $sql_aluno = "select distinct aluno_curso.aluno_id, aluno.nome from aluno_curso join aluno on aluno.id=aluno_curso.aluno_id order by nome";
                $retorno = mysqli_query($conexao, $sql_aluno);
                ?>

                <label>Aluno:</label> <select name="aluno_curso_id">

                    <?php
                    while ($linha = mysqli_fetch_array($retorno)) {
                        ?>

                        <option value="<?= $linha['aluno_id'] ?>"><?= $linha['nome'] ?></option>

                        <?php
                    }
                    ?>

                </select> <br>
                <?php
                $sql_disciplina = "select disciplina.id, disciplina.nome, turma.disciplina_id from disciplina join turma on turma.disciplina_id=disciplina.id";
                $retorno = mysqli_query($conexao, $sql_disciplina);
                ?>
                
                <fieldset> 
                    <legend>Turma</legend>
                
                <label>Disciplina:</label><select name="disciplina_id">
                    
                    <?php
                    while ($linha = mysqli_fetch_array($retorno)) {
                        ?>

                        <option value="<?= $linha['id'] ?>"><?= $linha['nome'] ?></option>
                         <?php
                    }
                    ?>

                </select>
                <br>
                
                  <label>Semestre:</label> <select name="semestre">
                    <option value="01">01</option>
                    <option value="02">02</option>
                </select>
                <br>
                </fieldset>
                <br>
                <label>Ano: </label>
                 
                <input type="text" required="" name="ano"><br>
                 <input class="btn" type="submit" value="Inserir">
            </form>


            <?php
            include '../rodape.php';
            ?>
        </div>
    </body>
</html>