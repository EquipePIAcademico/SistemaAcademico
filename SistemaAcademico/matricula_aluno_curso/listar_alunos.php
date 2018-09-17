<!DOCTYPE html>
<html>
    <head>
        <title>Cursos</title>
        <meta charset="utf-8">
        <link href="../css/estilo.css" rel="stylesheet">

    </head>
    <body>
        <div id="interface">
            <?php
            //session_start();
            include '../cabecalho.php';

            include '../bd/conectar.php';

            ini_set("display_errors", true);

            $sql = "select aluno.nome, aluno_curso.matricula FROM aluno_curso join aluno on aluno_curso.aluno_id=aluno.id join curso on aluno_curso.curso_id=curso.id";

            $retorno = mysqli_query($conexao, $sql);
            ?>

            <form action="listar_alunos.php" method="post">   

                <table id="tabelaspec">
                    <caption>Alunos matriculados</caption>
                   
                      <tr>
                        <td class="cc">Matricula</td><td class="cc">Aluno</td>
                    </tr>
                        <?php
                    while ($linha = mysqli_fetch_array($retorno)) {
                        ?>
                    <tr>
                       
                        <td><?= $linha['matricula'] ?></td>
                         <td><?= $linha['nome'] ?></td>
                </tr>
  <?php
                    }
                    ?>

                </select>
                  
            </form>       
                    
        <?php
        require_once '../rodape.php';
        ?>