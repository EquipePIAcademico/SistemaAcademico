<!DOCTYPE html>
<html>
    <head>
        <title>Cadastrar Disciplina</title>
        <meta charset="utf-8">
        <link href="../css/estilo.css" rel="stylesheet">
        <link href="../css/form.css" rel="stylesheet">
                <style>
    .button:hover {
    background-color:green; /* Green */
    color: white;
    
}
.button{
    color: #2E2E2E;
    border: 2px solid #A4A4A4;
    cursor: pointer;
    border-radius: 5px;
    padding: 10px;
    font-size: 15px;
    margin-bottom: 20px;
}
</style>


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

                <label class="espacamento">Curso:</label> <select name="curso_id" class="espacamento" style="width: 220px;">

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
               <button class="button">Inserir</button>
            </form>


            <?php
            include '../rodape.php';
            ?>
        </div>
    </body>
</html>