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
            
            $pegaid = $_GET['turma_id'];
            
         //  echo "O id é: $pegaid"; 
                    
            $sql = "select aluno_turma.aluno_id, aluno_turma.turma_id, aluno.id, aluno.nome from aluno_turma "
                    . "join aluno on aluno_turma.aluno_id=aluno.id where aluno_turma.turma_id=$pegaid order by nome";
            
       $retorno = mysqli_query($conexao, $sql);
       
       ?>
        <form action="excluir_lote.php" method="post">
                <table id="tabelaspec">
                     <caption>Alunos Matriculados</caption>
                    <tr>
                        <td class="cc">Nome do aluno</td>
                    </tr>
                    <?php
                    while ($linha = mysqli_fetch_array($retorno)) {
                        ?>
                        <tr>
                           
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

       
       
       
       
       
       
       
       
       
           