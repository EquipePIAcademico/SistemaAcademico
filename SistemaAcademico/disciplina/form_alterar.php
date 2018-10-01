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
            $sql = "select * from disciplina where id = $id";

            $resultado = mysqli_query($conexao, $sql);

            $linha = mysqli_fetch_array($resultado);
            ?>


            <h3 id="cadastro">Alterar Cadastro</h3>
            <form method="post" action="alterar.php">
                <input type="hidden" name="id" value="<?= $id ?>">

                <?php
                $sql_curso = "select curso.id, curso.nome as curso_nome, tipo.nome as tipo_nome from curso join tipo on tipo.id=curso.tipo_id order by curso_nome"; 

                $retorno_curso = mysqli_query($conexao, $sql_curso);
                ?>

                <label>Curso:</label> <select required="" name="curso_id">

                    <?php
                    while ($linha_curso = mysqli_fetch_array($retorno_curso)) {

                        $selecionado = '';

                        if ($linha_curso['id'] == $linha['curso_id']) {
                            $selecionado = 'selected';
                        }
                        ?>

                        <option <?= $selecionado ?> value="<?= $linha_curso['id'] ?>"><?= $linha_curso['tipo_nome'] ?> - <?= $linha_curso['curso_nome'] ?></option>

                        <?php
                    }
                    ?>

                </select> <br>
                
                <label>Nome da disciplina: </label>
                <input type="text" required="" name="nome" value="<?= $linha['nome'] ?>"><br>
                <label>Descrição:  </label>
                <input type="text" required="" name="descricao" value="<?= $linha['descricao'] ?>"><br>
                <label> Carga horária:  </label>
                <input type="number" required="" name="carga_horaria" value="<?= $linha['carga_horaria'] ?>"><br>

                <input class="btn" type="submit" value="Alterar">
            </form>

        </div>
        <?php
        require_once '../rodape.php';
        ?>