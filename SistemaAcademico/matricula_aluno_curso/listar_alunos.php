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
            
            $pegaid = $_GET['curso_id'];
            
         //  echo "O id é: $pegaid"; 
                    
            $sql = "select aluno_curso.aluno_id, aluno_curso.matricula, aluno_curso.curso_id, aluno.id, aluno.nome from aluno_curso "
                    . "join aluno on aluno_curso.aluno_id=aluno.id where aluno_curso.curso_id=$pegaid order by nome";
            
       $retorno = mysqli_query($conexao, $sql);
       
       ?>
        <form action="excluir_lote.php" method="post">
                <table id="tabelaspec">
                     <caption>Alunos Matriculados</caption>
                    <tr>
                        <td class="cc">Matricula</td><td class="cc">Nome do aluno</td><td class="cc">Excluir</td><td class="cc">Alterar</td>
                    </tr>
                    <?php
                    while ($linha = mysqli_fetch_array($retorno)) {
                        ?>
                        <tr>
                            <td><?= $linha['matricula'] ?></td>
                            <td><?= $linha['nome'] ?></td>
                            <td><a href="excluir.php?id=<?= $linha['id'] ?>">
                                    <img src="../img/excluir2.png" height="30" width="30"/></a></td>

                            <td><a href="form_alterar.php?id=<?= $linha['id'] ?>">
                                    <img src="../img/alterar2.png" height="30" width="30"/></a></td>
                        </tr>
                        <?php
                    }
                    ?>

                </table><br>
                <input class="btn" type="submit" value="Excluir">
            </form>

       
       
       
       
       
       
       
       
       
           