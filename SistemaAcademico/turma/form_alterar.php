<!DOCTYPE html>
<html>
    <head>
        <title>Alterar Cadastro</title>
        <meta charset="utf-8">
        <link href="../css/estilo.css" rel="stylesheet">
        <link href="../css/form.css" rel="stylesheet">
    </head>
    <body>
        <div id="interface">



            <?php
            include '../cabecalho.php';
            ?>  

            <?php
            $id = $_GET['id'];
            include '../bd/conectar.php';
            $sql = "select * from turma where id = $id";

            $resultado = mysqli_query($conexao, $sql);

            $linha = mysqli_fetch_array($resultado);
            ?>


            <h3 id="cadastro">Alterar Cadastro</h3>
            <form method="post" action="alterar.php">
                <input type="hidden" name="id" value="<?= $id ?>">

                <label>Número de vagas:</label> 
                <input type="number" required="" name="nVagas" value="<?= $linha['nVagas'] ?>"><br>

                <?php
                $sql_disciplina = "select disciplina.id, disciplina.nome as disc_nome, curso.nome as curso_nome from disciplina join curso on curso.id=disciplina.curso_id order by curso_nome";

                $retorno_disciplina = mysqli_query($conexao, $sql_disciplina);
                ?>

                <label>Disciplina da turma:</label> <select name="disciplina_id">

                    <?php
                    while ($linha_disciplina = mysqli_fetch_array($retorno_disciplina)) {

                        $selecionado = '';

                        if ($linha_disciplina['id'] == $linha['disciplina_id']) {
                            $selecionado = 'selected';
                        }
                        ?>

                        <option <?= $selecionado ?> value="<?= $linha_disciplina['id'] ?>"><?= $linha_disciplina['disc_nome'] ?> - <?= $linha_disciplina['curso_nome'] ?></option>

                        <?php
                    }
                    ?>

                </select> <br>

                <?php
                $sql_semestre = "select id, valor from semestre order by id";

                $retorno_semestre = mysqli_query($conexao, $sql_semestre);
                ?>

                <label>Semestre:</label> <select name="semestre_id">

                    <?php
                    while ($linha_semestre = mysqli_fetch_array($retorno_semestre)) {

                        $selecionado = '';

                        if ($linha_semestre['id'] == $linha['semestre_id']) {
                            $selecionado = 'selected';
                        }
                        ?>

                        <option <?= $selecionado ?> value="<?= $linha_semestre['id'] ?>"><?= $linha_semestre['valor'] ?></option>

                        <?php
                    }
                    ?>

                </select> <br>

                <?php
                $sql_professor = "select id, nome from usuario where perfil_acesso = 'professor(a)' order by nome";

                $retorno_professor = mysqli_query($conexao, $sql_professor);
                ?>

                <label>Professor:</label> <select name="professor_id">

                    <?php
                    while ($linha_professor = mysqli_fetch_array($retorno_professor)) {

                        $selecionado = '';

                        if ($linha_professor['id'] == $linha['professor_id']) {
                            $selecionado = 'selected';
                        }
                        ?>

                        <option <?= $selecionado ?> value="<?= $linha_professor['id'] ?>"><?= $linha_professor['nome'] ?></option>

                        <?php
                    }
                    ?>

                </select> <br>

                <input class="btn" type="submit" value="Alterar">
            </form>
        </div>
        <?php
        require_once '../rodape.php';
        ?>