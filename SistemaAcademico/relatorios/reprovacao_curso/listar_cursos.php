<!DOCTYPE html>
<html>
    <head>
        <title>Cursos</title>
        <meta charset="utf-8">
        <link href="../../css/estilo.css" rel="stylesheet">
          <link href="../../css/form.css" rel="stylesheet">
    </head>
    <body>
        <div id="interface">
            <?php
            //session_start();
            include '../../cabecalho.php';

            include '../../bd/conectar.php';

            ini_set("display_errors", true);

            $sql = "select distinct curso.id, curso.nome FROM curso join turma on curso.id=turma.curso_id group by curso.id";
            
            $retorno = mysqli_query($conexao, $sql);
            
            ?>

            <form action="emitir.php" method="get">   

                  
                  <h3 id="cadastro">Emitir relatório de reprovação por curso</h3>
                   
                    
                    Curso:<select name="curso" class="espacamento" style="width: 220px; text-align-last: center;">
                    <?php
                    while ($linha = mysqli_fetch_array($retorno)) {
                        ?>
                        <option value="<?= $linha['id'] ?>"><?= $linha['nome'] ?></option>

                        <?php
                        
                    }
                    ?>

                </select>
                    
                    <br><input class="btn" type="submit" value="Emitir relatório">
            </form>      
            
                    
        <?php
        require_once '../../rodape.php';
        ?>