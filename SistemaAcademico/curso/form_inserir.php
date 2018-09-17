<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Cadastrar Curso</title>
        <link href="../css/estilo.css" rel="stylesheet">
        <link href="../css/form.css" rel="stylesheet">
    </head>

    <body>
        <div id="interface">
            <?php
            include '../cabecalho.php';
            ?>  
            <h3 id="cadastro">Cadastrar Curso</h3>
            <form method="post" action="inserir.php">

                <?php
                include '../bd/conectar.php';

                $sql = "select tipo.id, tipo.nome from tipo order by nome";
                $retorno = mysqli_query($conexao, $sql);
                ?>

                <label>Tipo de curso:</label> <select name="tipo_id">

                    <?php
                    while ($linha = mysqli_fetch_array($retorno)) {
                        ?>

                        <option value="<?= $linha['id'] ?>"><?= $linha['nome'] ?></option>

                        <?php
                    }
                    ?>

                </select> <br>

                <label>Nome do curso: </label>
                <input type="text" required="" name="nome"><br>
                <label>Descrição: </label>
                <input type="text" required="" name="descricao"><br>
                <label>Carga horária: </label>
                <input type="number" required="" name="carga_horaria"><br>
                <label>Ano de início: </label>
                <input type="number" required="" name="anoInicio"><br>
                <label>Semestre de início:</label> <select name="semestreInicio">
                    <option value="01">01</option>
                    <option value="02">02</option>
                </select> <br>               
                <label>Ano de término: </label>
                <input type="number" required="" name="anoTermino"><br>
                <label>Semestre de término:</label> <select name="semestreTermino">
                    <option value="01">01</option>
                    <option value="02">02</option>
                </select> <br>
                
                <?php

                $sql = "select turno.id, turno.nome from turno order by id";
                $retorno = mysqli_query($conexao, $sql);
                ?>

                <label>Turno:</label> <select name="turno_id">

                    <?php
                    while ($linha = mysqli_fetch_array($retorno)) {
                        ?>

                        <option value="<?= $linha['id'] ?>"><?= $linha['nome'] ?></option>

                        <?php
                    }
                    ?>

                </select> <br>
                
                <input class="btn" type="submit" value="Inserir">
            </form>


            <?php
            include '../rodape.php';
            ?>
        </div>
    </body>
</html>