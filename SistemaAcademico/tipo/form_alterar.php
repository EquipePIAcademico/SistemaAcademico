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
            $sql = "select id, nome, descricao from tipo where id = $id";

            $resultado = mysqli_query($conexao, $sql);

            $linha = mysqli_fetch_array($resultado);
            ?>


            <h3 id="cadastro">Alterar Cadastro</h3>
            <form method="post" action="alterar.php">
                <input type="hidden" name="id" value="<?= $id ?>">
                Nome:
                <input type="text" required="" name="nome" value="<?= $linha['nome'] ?>" /><br>
                Descrição:
                <input type="text" required="" name="descricao" value="<?= $linha['descricao'] ?>" /><br><br>
                <input class="btn" type="submit" value="Alterar">
            </form>

        </div>
        <?php
        require_once '../rodape.php';
        ?>
