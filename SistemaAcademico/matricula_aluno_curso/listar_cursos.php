<!DOCTYPE html>
<html>
    <head>
        <title>Cursos</title>
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

            $sql = "select curso.id, curso.nome FROM curso order by nome";
            
            $retorno = mysqli_query($conexao, $sql);
            
            ?>

            <form action="listar_alunos.php" method="get">   

                  
                    <caption>Cursos Cadastrados</caption>
                    <br><br>
                    
                    Curso:<select name="curso_id" class="espacamento" style="width: 220px;">
                    <?php
                    while ($linha = mysqli_fetch_array($retorno)) {
                        ?>

                        <option value="<?= $linha['id'] ?>"><?= $linha['nome'] ?></option>

                        <?php
                        
                    }
                    ?>

                </select>
                    
                    <br><input class="btn" type="submit" value="Listar alunos">
            </form>      
            
                    
        <?php
        require_once '../rodape.php';
        ?>