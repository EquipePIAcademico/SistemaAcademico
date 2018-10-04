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

//            $sql = "select turma.id FROM turma";
//            
//            $retorno = mysqli_query($conexao, $sql);
//            
            
                $sql_disciplina = "select disciplina.id, disciplina.nome, turma.disciplina_id from disciplina join turma on turma.disciplina_id=disciplina.id";
                $retorno = mysqli_query($conexao, $sql_disciplina);
                ?>
            
            
            

            <form action="listar_alunos.php" method="get">   

                 
                
                <fieldset> 
                    <legend>Turma</legend>
                
                <label>Disciplina:</label><select name="disciplina_id">
                    
                    <?php
                    while ($linha = mysqli_fetch_array($retorno)) {
                        ?>

                        <option value="<?= $linha['id'] ?>"><?= $linha['nome'] ?></option>
                         <?php
                    }
                    ?>

                </select>
                <br>
                
                  <label>Semestre:</label> <select name="semestre">
                    <option value="01">01</option>
                    <option value="02">02</option>
                </select>
                <br>
                </fieldset>
               
                    
                    <br><input class="btn" type="submit" value="Listar alunos">
            </form>      
            
                    
        <?php
        require_once '../rodape.php';
        ?>