<!DOCTYPE html>
<html>
    <head>
        <title>Cadastrar Tipo de Curso</title>
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
            <h3 id="cadastro">Cadastrar Tipo de Curso</h3>
            <form method="post" action="inserir.php">
               <label class="espacamento">Nome:</label>
                <input type="text" required="" name="nome" id="cNome" class="espacamento" /><br>
              <label>  Descrição:</label>
                <input type="text" required="" name="descricao" id="cDescricao" /><br><br>
                   <button class="button">Inserir</button>
            </form>

        </div>
        <?php
        require_once '../rodape.php';
        ?>