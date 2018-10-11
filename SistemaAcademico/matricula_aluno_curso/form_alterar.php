<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Matricular Aluno em Curso</title>
        <link href="../css/estilo.css" rel="stylesheet">
        <link href="../css/form.css" rel="stylesheet">
                 <style>
    .button:hover {
    background-color:blue; /* Green */
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
            include '../cabecalho.php';
            ?>  
            
            
            <?php
            $id_aluno = $_GET['id'];
            include '../bd/conectar.php';
            $sql = "select * from aluno_curso where aluno_id = $id_aluno";
            
             $resultado = mysqli_query($conexao, $sql);
             
            $linha = mysqli_fetch_array($resultado);
            ?>
            
            <h3>Alterar matricula</h3>
            <form method="post" action="alterar.php?id=<?=$id_aluno?>">
                 <input type="hidden" name="id" value="<?= $id ?>">
                <?php
               
                $sql_aluno = "select aluno.id, aluno.nome from aluno order by nome";
                
                
                $retorno_aluno = mysqli_query($conexao, $sql_aluno);
                ?>

                 <label class="espacamento">Alunos:</label> <select name="aluno_id" class="espacamento" style="width: 250px;">

                    <?php
                    while ($linha_aluno = mysqli_fetch_array($retorno_aluno)) {
                       
                        
                        $selecionado = '';

                        if ($linha_aluno['id'] == $linha['aluno_id']) {
                            $selecionado = 'selected';
                        }
                        ?>
                        

                        <option <?= $selecionado ?> value="<?= $linha_aluno['id'] ?>"><?= $linha_aluno['nome'] ?></option>

                        <?php
                    }
                    ?>

                </select> <br>
                <?php
                $sql_curso = "select curso.id, curso.nome from curso order by nome";
                $retorno_curso = mysqli_query($conexao, $sql_curso);
                ?>
                <label>Cursos:</label> <select name="curso_id" style="width: 250px;">

                    <?php
                    while ($linha_curso = mysqli_fetch_array($retorno_curso)) {
                        $selecionado = '';

                        if ($linha_curso['id'] == $linha['curso_id']) {
                            $selecionado = 'selected';
                        }
                        
                            ?>
                        <option <?= $selecionado ?> value="<?= $linha_curso['id'] ?>"><?= $linha_curso['nome'] ?></option>

                        <?php
                    }
                
                    ?>
                        

                </select>
                <br>
               <label>Ano: </label>
               <input type="text" required="" name="ano" value="<?=$linha['ano'] ?>"><br>
                <label>Semestre: </label>
                <input type="text" required="" name="semestre" value="<?=$linha['semestre']?>"><br>
                <br>
                <button class="button">Alterar</button>
                
            </form>


            <?php
            include '../rodape.php';
            ?>
        </div>
    </body>
</html>