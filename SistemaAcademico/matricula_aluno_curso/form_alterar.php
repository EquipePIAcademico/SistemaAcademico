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

                <label>Alunos:</label> <select name="aluno_id">

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
                <label>Cursos:</label> <select name="curso_id">

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
                <input class="btn" type="submit" value="Alterar">
                
            </form>


            <?php
            include '../rodape.php';
            ?>
        </div>
    </body>
</html>