<!DOCTYPE html>
<html>
    <head>
        <title>Cadastrar Tipo de Curso</title>
        <meta charset="utf-8">
        <link href="../css/estilo.css" rel="stylesheet">
        <link href="../css/form.css" rel="stylesheet">
    </head>
    <body>
        <div id="interface">

            <?php
            include '../cabecalho.php';
            ?>  
            <h3 id="cadastro">Cadastrar Tipo de Curso</h3>
            <form method="post" action="inserir.php">
                Nome:
                <input type="text" required="" name="nome" id="cNome" /><br>
                Descrição:
                <input type="text" required="" name="descricao" id="cDescricao" /><br><br>
                <input class="btn" type="submit" value="Inserir">
            </form>

        </div>
        <?php
        require_once '../rodape.php';
        ?>