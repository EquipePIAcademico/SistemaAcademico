<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Cadastrar Curso</title>
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
    margin-bottom: 10px;
}
</style>
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

                <label>Tipo de curso:</label> <select name="tipo_id" class="espacamento" style="width: 220px; text-align-last: center;">

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
                <label>Carga horária: </label>
                <input type="number" required="" name="carga_horaria"><br>
                <label>Ano de início: </label>
                <input type="number" required="" name="anoInicio"><br>
                <label>Semestre de início:</label> <select name="semestreInicio">
                    <option value="01">1</option>
                    <option value="02">2</option>
                </select> <br>               
                <label>Ano de término: </label>
                <input type="number" required="" name="anoTermino"><br>
                <label>Semestre de término:</label> <select name="semestreTermino">
                    <option value="01">1</option>
                    <option value="02">2</option>
                </select> <br>
                
                <?php

                $sql = "select turno.id, turno.nome from turno order by id";
                $retorno = mysqli_query($conexao, $sql);
                ?>

                <label>Turno:</label> <select name="turno_id" style="width: 220px; text-align-last: center;">

                    <?php
                    while ($linha = mysqli_fetch_array($retorno)) {
                        ?>

                        <option value="<?= $linha['id'] ?>"><?= $linha['nome'] ?></option>

                        <?php
                    }
                    ?>

                </select><br>
                <label>  Descrição:</label>
                <textarea style="width: 215px; position: absolute; left: 580px; border-radius: 10px;" name="descricao">
              </textarea> 
                <br><br><br>
              
                
               <button class="button">Inserir</button>
            </form>


            <?php
            include '../rodape.php';
            ?>
        </div>
    </body>
</html>