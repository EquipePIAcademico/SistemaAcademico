<!DOCTYPE html>
<html>
    <head>
        <title>Cadastrar Turma</title>
        <meta charset="utf-8">
        <link href="../css/estilo.css" rel="stylesheet">
        <link href="../css/form.css" rel="stylesheet">
    </head>
    <body>
        <div id="interface">

            <?php
            include '../cabecalho.php';
            ?>  
            <h3 id="cadastro">Cadastrar Turma</h3>
            <form method="post" action="inserir.php">

                <label>Número de vagas: </label>
                <input type="number" required="" name="nVagas"><br>

                <?php
                include '../bd/conectar.php';

                $sql_disciplina = "select disciplina.id, disciplina.nome as disc_nome, curso.nome as curso_nome from disciplina join curso on curso.id=disciplina.curso_id order by disc_nome";
                $retorno_disciplina = mysqli_query($conexao, $sql_disciplina);
                ?>

                <label>Disciplina da turma: </label>
                <select name="disciplina_id">

                    <?php
                    while ($linha_disciplina = mysqli_fetch_array($retorno_disciplina)) {
                        ?>

                        <option value="<?= $linha_disciplina['id'] ?>"><?= $linha_disciplina['disc_nome'] ?> - <?= $linha_disciplina['curso_nome'] ?></option>

                        <?php
                    }
                    ?>

                </select> <br>

                <?php
                $sql_semestre = "select semestre.id, semestre.valor from semestre order by id";
                $retorno_semestre = mysqli_query($conexao, $sql_semestre);
                ?>

                <label>Semestre:</label> <select name="semestre_id">

                    <?php
                    while ($linha_semestre = mysqli_fetch_array($retorno_semestre)) {
                        ?>

                        <option value="<?= $linha_semestre['id'] ?>"><?= $linha_semestre['valor'] ?></option>

                        <?php
                    }
                    ?>

                </select> <br>

                <?php
                $sql_professor = "select usuario.id, usuario.nome, usuario.perfil_acesso from usuario order by nome";
                $retorno_professor = mysqli_query($conexao, $sql_professor);
                ?>

                <label>Professor:</label> <select name="professor_id">

                    <?php
                    while ($linha_professor = mysqli_fetch_array($retorno_professor)) {
                        if ($linha_professor['perfil_acesso'] == 'professor(a)') {
                            ?>

                            <option value="<?= $linha_professor['id'] ?>"><?= $linha_professor['nome'] ?></option>

                            <?php
                        }
                    }
                    ?>

                </select> <br>
                <input class="btn" type="submit" value="Inserir">
            </form>
        </div>
        <?php
        include '../rodape.php';
        ?>  