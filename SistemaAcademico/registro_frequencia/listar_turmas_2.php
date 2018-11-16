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

            $curso_id = $_GET['curso_id'];

            $sql_disciplina = "select distinct turma.id, disciplina.nome from disciplina join curso on disciplina.curso_id=curso.id join turma on turma.disciplina_id=disciplina.id join usuario on usuario.perfil_acesso = 'professor(a)' where turma.professor_id=$_SESSION[id] and disciplina.curso_id=$curso_id";

            $retorno = mysqli_query($conexao, $sql_disciplina);
            ?>
            <form action="listar_alunos_frequencia.php" method="get"> 

                <fieldset> 
                    <legend>Turma</legend>
                    <input type="hidden"  name="curso" value="<?= $curso_id ?>" />
                    <label>Disciplina:</label><select name="turma_id" style="width: 220px;">

                        <?php
                        while ($linha = mysqli_fetch_array($retorno)) {
                            ?>

                            <option value="<?= $linha['id'] ?>"><?= $linha['nome'] ?></option>
                            <?php
                        }
                        ?>

                    </select>
                    <br>

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

                    <br>
                </fieldset>
                
                <label>Data da chamada: </label>
                <input type="date" required="" name="dataChamada"><br>
                
                <br><input class="btn" type="submit" value="Listar notas">
            </form>      

        

            <?php
            require_once '../rodape.php';
            ?>