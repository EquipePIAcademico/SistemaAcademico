<!DOCTYPE html>
<html>
    <head>
        <title>Notas</title>
        <meta charset="utf-8">
        <!--        <link href="../css/estilo.css" rel="stylesheet">-->
        <style>
            #customers {
                font-family: Arial;
                border-collapse: separate;
                width: 100%;
                color:threeddarkshadow;
            }

            #customers td, #customers th {
                border: 1px solid #ddd;
                padding: 2.5px;
            }

            #customers tr:nth-child(even){background-color: #f2f2f2;}

            #customers tr:hover {background-color: #ddd; color: black}

            #customers tr.estilo{
                background-color: #ccc;
                color: black;

            }


            #customers th {
                padding-top: 12px;
                padding-bottom: 12px;
                text-align: left;
                background-color: #4CAF50;
                color: white;
            }

            body{
                background-color: #dddddd;
                color: rgba(0,0,0,1);
                font-family: arial;
                font-size: 14px;
            }
            div#interface{
                background-color: white;
                width: 1250px;
                margin: 0px auto 10px auto;
                box-shadow: 0px 0px 10px;
                padding: 0px 30px 50px 30px;
            }

            img {
                margin: 0 auto;
                text-align: center;
            }
            .btn-insira:hover {
                background-color:#F35548; /* Green */
                color: white;

            }
            button.btn-insira{

                color: #2E2E2E;
                border: 2px solid #A4A4A4;
                cursor: pointer;
                border-radius: 5px;
                padding: 10px;
                font-size: 15px;
                margin-top: 10px;
                margin-left: 80px;
                margin-bottom: 20px;

            }   

            caption{
                font-size: 20px;
                margin-top: 40px;
                margin-bottom: 20px;
            }
            form{
                background-color: white;
                margin-top: -20px;
                margin-left: 20px;
                margin-right: 20px;
            }

            td{
                text-align: center;
            }
            .voltar{
                background: white;
                cursor: pointer;
            }
        </style>
    </head>
    <body>
        <div id="interface">
            <?php
            //session_start();
            include '../cabecalho.php';

            include '../bd/conectar.php';

            ini_set("display_errors", true);

            $curso_id = $_GET['curso'];
            $turma_id = $_GET['turma_id'];

            $sql = "select aluno.id, aluno.nome, aluno_curso.matricula from aluno_curso join aluno on "
                    . "aluno.id=aluno_curso.aluno_id join nota on nota.aluno_id=aluno.id join turma on "
                    . "turma.id=nota.turma_id where aluno_curso.curso_id=$curso_id and turma.id=$turma_id group by aluno.nome";
            
            $retorno = mysqli_query($conexao, $sql);

            $qtdAlunos = mysqli_num_rows($retorno);
            
            $sql_colunas = "select count(nota.nota) as qtdNotas from nota where nota.turma_id=$turma_id";
            
            $retorno_colunas = mysqli_query($conexao, $sql_colunas);
            
            $linha_colunas = mysqli_fetch_array($retorno_colunas);
            
            $numColunas = $linha_colunas['qtdNotas'] / $qtdAlunos ;
            
            ?>
            <br>

            <table id="customers">
                <caption>Notas dos alunos</caption>
                <tr class="estilo">
                    <td>Matricula</td><td>Nome do aluno</td><td colspan="<?= $numColunas ?>">Notas</td>
                </tr>
                <?php
                while ($linha = mysqli_fetch_array($retorno)) {
                    ?>
                    <tr>
                        <td><?= $linha['matricula'] ?></td>
                        <td><?= $linha['nome'] ?></td>

                        <?php
                        $sql_notas = "select aluno.id, aluno.nome, aluno_curso.matricula, nota.nota from aluno join aluno_curso on "
                                . "aluno.id=aluno_curso.aluno_id join nota on nota.aluno_id = aluno_curso.aluno_id join turma on "
                                . "turma.id=nota.turma_id where (aluno_curso.curso_id=$curso_id and nota.turma_id=$turma_id) and aluno.nome='$linha[nome]'";
                        
                        $retorno_notas = mysqli_query($conexao, $sql_notas);

                        while ($linha_notas = mysqli_fetch_array($retorno_notas)) {
                            ?>
                            <td><?= $linha_notas['nota'] ?></td>
                            <?php
                        }
                        ?>
                    </tr>
                        <?php
                    }
                    ?>

            </table><br>











