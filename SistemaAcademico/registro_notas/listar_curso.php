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

//            session_start();

            include '../bd/conectar.php';

            ini_set("display_errors", true);

            //$aluno_curso_id = $_GET['aluno_curso_id'];
//            $sql = "select turma.id FROM turma";
//            
//            $retorno = mysqli_query($conexao, $sql);
//            


            $sql_curso = "select distinct curso.id, curso.nome from curso join disciplina on curso.id=disciplina.curso_id join turma on turma.disciplina_id=disciplina.id join usuario on usuario.perfil_acesso = 'professor(a)' where turma.professor_id=$_SESSION[id]";


            //$sql_disciplina = "select aluno_turma.disciplina_id, disciplina.nome from aluno_turma join disciplina on aluno_turma.disciplina_id=disciplina.id where aluno_id=$aluno_curso_id";
            // $sql_disciplina = "select disciplina.id, disciplina.nome, turma.disciplina_id from disciplina join turma on turma.disciplina_id=disciplina.id";
            $retorno = mysqli_query($conexao, $sql_curso);
            ?>
            <form action="listar_turmas_2.php" method="get"> 


                <fieldset> 
                    <legend>Turma</legend>

                    <label>Curso:</label><select name="curso_id" style="width: 220px;">

                        <?php
                        while ($linha = mysqli_fetch_array($retorno)) {
                            ?>

                            <option value="<?= $linha['id'] ?>"><?= $linha['nome'] ?></option>
                            <?php
                        }
                        ?>

                    </select>
                    <br>


                </fieldset>


                <br><input class="btn" type="submit" value="Listar turmas">
            </form>      


            <?php
            require_once '../rodape.php';
            ?>