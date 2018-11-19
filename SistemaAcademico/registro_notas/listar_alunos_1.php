<!DOCTYPE html>
<html>
    <head>
        <title>Cursos</title>
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
      position: absolute;
    left: 630px;
  
}
label.data{
   margin-top: 50px;
    position: absolute;
    right: 1180px;
    font-size: 18px;
    color: #343a40;
    
}
input.data{
    margin-top: 50px;
    position: absolute;
    right: 1030px;
    border-radius: 10px;
}
select.data{
    margin-top: 50px;
      position: absolute;
    right: 1095px;
    border-radius: 10px;
    text-align-last: center;
    padding: 2px;
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

            //$turma_id = $_GET['turma_id'];

            $curso_id = $_GET['curso'];

            $turma_id = $_GET['turma_id'];

            $sql_aluno = "select distinct aluno.id, aluno.nome, aluno_curso.matricula from aluno join aluno_curso on aluno.id=aluno_curso.aluno_id join aluno_turma on aluno_turma.aluno_id=aluno_curso.aluno_id where aluno_curso.curso_id=$curso_id AND aluno_turma.turma_id=$turma_id";

            $retorno = mysqli_query($conexao, $sql_aluno);
            ?>
            <form action="inserir_notas.php" method="post">
                 
                <label class="data">Data da avaliação: </label>
                <input type="date" required="" name="dataAvaliacao" class="data"><br>
                <br>
                <label class="data">Descrição: </label> <select class="data" name="descricao">
                    <option value="prova">Prova</option>
                    <option value="trabalho">Trabalho</option>
                </select> <br>
                
                <table id="customers">
                   
                    <h3 id="cadastro">Registrar notas</h3>
                    <br><br>
                    <tr class="estilo">
                        <td>Matricula</td><td>Nome do aluno</td><td>Nota</td>
                    </tr>
                    <?php
                    while ($linha = mysqli_fetch_array($retorno)) {
                        ?>
                        <tr>

                        <input type="hidden" name="aluno_id[]" value="<?= $linha['id'] ?>">
                        <input type="hidden" name="turma_id[]" value="<?= $turma_id ?>">

                        <td><?= $linha['matricula'] ?></td>
                        <td><?= $linha['nome'] ?></td>
                        <td>
                            <input class="nota" type="number" step="0.1" name="nota[]" min="0" max="10.0"> 
                            

                        </td>


                        </tr>
                        <?php
                    }
                    ?>

                </table><br>

                <button class="button">Inserir notas</button>
            </form>








