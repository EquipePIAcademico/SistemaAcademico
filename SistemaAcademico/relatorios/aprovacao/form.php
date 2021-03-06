<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Emissao relatorio</title>
        <link href="../../css/estilo.css" rel="stylesheet">
        <link href="../../css/form.css" rel="stylesheet">
          <style>
    .button:hover {
    background-color:green; /* Green */
    color: white;
    
}
.button{
    color: #2E2E2E;
    border: 2px solid #A4A4A4;
    cursor: pointer;
    border-radius: 5px;
    padding: 10px;
    font-size: 15px;
    margin-bottom: 20px;
}
</style>

    </head>

    <body>
        <div id="interface">
            <?php
            include '../../cabecalho.php';
            ?>  
            <h3 id="cadastro">Emitir relatório de aprovação</h3>
            <form method="get" action="emitir.php">

                <?php
                include '../../bd/conectar.php';

                $sql_aluno = "select aluno.id, aluno.nome from aluno order by nome";
                
                
                $retorno = mysqli_query($conexao, $sql_aluno);
                ?>

                <label class="espacamento">Alunos:</label> <select name="aluno_id" class="espacamento" style="width: 220px; text-align-last: center;">

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
                <label>Cursos:</label> <select name="curso_id" style="width: 220px; text-align-last: center;">

                    <?php
                    while ($linha = mysqli_fetch_array($retorno)) {
                        ?>

                        <option value="<?= $linha['id'] ?>"><?= $linha['nome'] ?></option>

                        <?php
                    }
                
                    ?>
                        

                </select>
                <br><br>
                 <button class="button">Emitir relatório</button>
                
            </form>


            <?php
            include '../../rodape.php';
            ?>
        </div>
    </body>
</html>