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

            $sql_curso = "select distinct curso.id, curso.nome from curso join disciplina on curso.id=disciplina.curso_id join turma on turma.disciplina_id=disciplina.id join usuario on usuario.perfil_acesso = 'professor(a)' where turma.professor_id=$_SESSION[id]";

            $retorno = mysqli_query($conexao, $sql_curso);
            ?>
            <form action="listar_turmas_1.php" method="get"> 

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