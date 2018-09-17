<!DOCTYPE html>
<html>
    <head>
        <title>Cadastrar Disciplina</title>
        <meta charset="utf-8">
        <link href="../css/estilo.css" rel="stylesheet">
        <link href="../css/form.css" rel="stylesheet">
    </head>
    <body>
        <div id="interface">

            <?php
            include '../cabecalho.php';
            ?>  

            <h3 id="cadastro">Cadastrar Disciplina</h3>
            <form method="post" action="inserir.php">
                
                <?php
                include '../bd/conectar.php';

                $sql = "select curso.id, curso.nome as curso_nome, tipo.nome as tipo_nome from curso join tipo on tipo.id=curso.tipo_id order by curso_nome";
                $retorno = mysqli_query($conexao, $sql);
                ?>

                <label>Curso:</label> <select name="curso_id">

                    <?php
                    while ($linha = mysqli_fetch_array($retorno)) {
                        ?>

                        <option value="<?= $linha['id'] ?>"><?= $linha['tipo_nome'] ?> - <?= $linha['curso_nome'] ?></option>

                        <?php
                    }
                    ?>

                </select> <br>
                
                <label>Nome da disciplina: </label>
                <input type="text" required="" name="nome"><br>
                <label>Descrição: </label>
                <input type="text" required="" name="descricao"><br>
                <label>Carga horária: </label>
                <input type="number" required="" name="carga_horaria"><br>
                <input class="btn" type="submit" value="Inserir">
            </form>


            <?php
            include '../rodape.php';
            ?>
        </div>
    </body>
</html>