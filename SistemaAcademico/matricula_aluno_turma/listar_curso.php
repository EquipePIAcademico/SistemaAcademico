<!DOCTYPE html>
<html>
    <head>
        <title>Turmas</title>
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
            
            //$aluno_curso_id = $_GET['aluno_curso_id'];

//            $sql = "select turma.id FROM turma";
//            
//            $retorno = mysqli_query($conexao, $sql);
//            
            
              
              $sql_disciplina = "select distinct curso.id, curso.nome from disciplina join curso on disciplina.curso_id=curso.id join turma on turma.disciplina_id=disciplina.id";
              
           
                //$sql_disciplina = "select aluno_turma.disciplina_id, disciplina.nome from aluno_turma join disciplina on aluno_turma.disciplina_id=disciplina.id where aluno_id=$aluno_curso_id";
               // $sql_disciplina = "select disciplina.id, disciplina.nome, turma.disciplina_id from disciplina join turma on turma.disciplina_id=disciplina.id";
            $retorno = mysqli_query($conexao, $sql_disciplina);
                ?>
            <form action="listar_turmas_1.php" method="get"> 

                
                <fieldset> 
                    <legend>Turma</legend>
                
                <label>Disciplina:</label><select name="curso_id" style="width: 220px;">
                    
                    <?php
                    while ($linha = mysqli_fetch_array($retorno)) {
                        ?>

                        <option value="<?= $linha['id'] ?>"><?= $linha['nome'] ?></option>
                         <?php
                    }
                    ?>

                </select>
                <br>
                
<!--                <?php
                    $sql_semestre = "select semestre.id, semestre.valor from semestre order by id";
                    $retorno_semestre = mysqli_query($conexao, $sql_semestre);
                    ?>

                    <label>Semestre:</label> <select name="semestre_id" style="width: 220px;">

                        <?php
                        while ($linha_semestre = mysqli_fetch_array($retorno_semestre)) {
                            ?>

                            <option value="<?= $linha_semestre['id'] ?>"><?= $linha_semestre['valor'] ?></option>

                            <?php
                        }
                        ?>

                    </select> <br>
                
                <br>
                </fieldset>
               -->
                    
                    <br><input class="btn" type="submit" value="Listar turmas">
            </form>      
            
                    
        <?php
        require_once '../rodape.php';
        ?>