<!DOCTYPE html>
<html>
    <head>
        <title>Alterar Cadastro</title>
        <meta charset="utf-8">
        <link href="../css/estilo.css" rel="stylesheet">
        <link href="../css/form.css" rel="stylesheet">
                <style>
    .button:hover {
    background-color:blue; /* Green */
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
                <label class="espacamento"> Nome:</label>
                <input type="text" required="" name="nome" class="espacamento" value="<?= $linha['nome'] ?>" /><br>
               <label>Descrição:</label>
                <input type="text" required="" name="descricao" value="<?= $linha['descricao'] ?>" /><br><br>
                
               <button class="button">Alterar</button>
            </form>

        </div>
        <?php
        require_once '../rodape.php';
        ?>
