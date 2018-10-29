<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Matricular Aluno em Turma</title>
        <link href="../css/estilo.css" rel="stylesheet">
        <link href="../css/form.css" rel="stylesheet">
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
            include '../cabecalho.php';
            
            
             $aluno_curso_id = $_GET['aluno_curso_id'];
            
            // $turma_id = $_GET['turma_id'];
            ?>  
            <h3 id="cadastro">Matricular aluno em turma</h3>
            <form method="get" action="inserir_1.php">

                <?php
                include '../bd/conectar.php';
                
               // $curso_id = $_GET[''];

                
                //$sql_disciplina = "select * from disciplina";
//   $sql_disciplina = "select disciplina.nome from aluno join aluno_curso on aluno.id=aluno_curso.aluno_id"
//                      . " join disciplina on disciplina.curso_id=curso.id";
//                
//                
//                $sql_disciplina = "select disciplina.nome from aluno join aluno_curso on aluno_curso.aluno_id=aluno.id "
//                        . "join aluno_turma on aluno_turma.aluno_id=aluno_curso.aluno_id where aluno_curso.aluno_id = $aluno_curso_id";                
//            $sql_disciplina = "select distinct disciplina.id, disciplina.nome, turma.disciplina_id from disciplina join turma on disciplina.id=turma.disciplina_id join
//                        curso on disciplina.curso_id=curso.id join aluno_curso on aluno_curso.curso_id=curso.id";
                
                 $sql_turma = "select turma.id, disciplina.nome from turma join disciplina on turma.disciplina_id=disciplina.id join aluno_curso 
                         on aluno_curso.curso_id=disciplina.curso_id where aluno_curso.aluno_id=$aluno_curso_id";
                
                 
                
                $retorno = mysqli_query($conexao, $sql_turma);
                ?>
                
                <input type="hidden"  name="aluno" value="<?=$aluno_curso_id?>" />
               
                <label>Disciplina:</label> 
                <select name="turma_id" style="width: 220px;">
                  
                      <?php
                    while ($linha = mysqli_fetch_array($retorno)) {
                        ?>

                        <option value="<?= $linha['id'] ?>"><?= $linha['nome'] ?></option>
                        

                        <?php
                    }
                    ?>
                </select><br>
               
               <?php 
//              $sql_disciplina = "SELECT disciplina.nome, "
//                      . "disciplina.id FROM DISCIPLINA JOIN "
//                      . "CURSO ON DISCIPLINA.curso_id=CURSO.id JOIN ALUNO_CURSO "
//                      . "ON ALUNO_CURSO.curso_id=CURSO.id JOIN ALUNO "
//                      . "ON ALUNO.id=ALUNO_CURSO.aluno_id "
//                      . "WHERE ALUNO_CURSO.aluno_id=$aluno_curso_id";
//              
//              $sql_disciplina = "select disciplina.nome, disciplina.id from disciplina join turma
//                      on disciplina.id=turma.disciplina_id JOIN "
//                   . "CURSO ON DISCIPLINA.curso_id=CURSO.id JOIN ALUNO_CURSO "
//                      . "ON ALUNO_CURSO.curso_id=CURSO.id JOIN ALUNO "
//                      . "ON ALUNO.id=ALUNO_CURSO.aluno_id "
//                      . "WHERE ALUNO_CURSO.aluno_id=$aluno_curso_id";
//              
//                
//                $retorno = mysqli_query($conexao, $sql_disciplina);
//                ?>

<!--                <fieldset> 
                    <legend>Turma</legend>
                  

                    
                     <input type="hidden"  name="aluno" value="<?=$aluno_curso_id?>" />
                    <label>Disciplina:</label><select name="disciplina_id" style="width: 220px;">

                        <?php
                        while ($linha = mysqli_fetch_array($retorno)) {
                            ?>

                            <option value="<?= $linha['id'] ?>"><?= $linha['nome'] ?></option>
                            <?php
                        }
                        ?>

                    </select>
                    <br>-->

                    <?php
                    $sql_semestre = "select semestre.id, semestre.valor from semestre order by id";
                    $retorno_semestre = mysqli_query($conexao, $sql_semestre);
                    ?>

                    <label>Semestre:</label> <select name="semestre_id" style="width: 80px;">

                        <?php
                        while ($linha_semestre = mysqli_fetch_array($retorno_semestre)) {
                            ?>

                            <option value="<?= $linha_semestre['id'] ?>"><?= $linha_semestre['valor'] ?></option>

                            <?php
                        }
                        ?>

                    </select> <br>

                 

                 <button class="button">Inserir</button>
            </form>


            <?php
            include '../rodape.php';
            ?>
        </div>
    </body>
</html>
