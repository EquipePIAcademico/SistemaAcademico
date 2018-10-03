<!DOCTYPE html>
<html>
    <head>
        <title>Turmas</title>
        <meta charset="utf-8">
        <link href="../css/estilo.css" rel="stylesheet">
          <link href="../css/form.css" rel="stylesheet">
    </head>
    <body>
        <div id="interface">
            <?php
            //session_start();
            include '../cabecalho.php';

            include '../bd/conectar.php';

            ini_set("display_errors", true);

            $sql = "select disciplina.id, disciplina.nome, turma.disciplina_id from disciplina join turma on turma.disciplina_id=disciplina.id";
            
            $retorno = mysqli_query($conexao, $sql);
            
            
            ?>

            <form action="listar_alunos.php" method="get">   

                  
                    <caption>Turmas Cadastradas</caption>
                    <br><br>
                    
                    Turma:<select name="turma_id">
                    <?php
                    while ($linha = mysqli_fetch_array($retorno)) {
                        ?>

                        <option value="<?= $linha['id'] ?>"><?= $linha['id'] ?></option>

                        <?php
                        
                    }
                    ?>

                </select>
                    
                    <br><input class="btn" type="submit" value="Listar alunos">
            </form>      
            
                    
        <?php
        require_once '../rodape.php';
        ?>