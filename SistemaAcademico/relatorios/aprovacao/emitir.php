<!DOCTYPE html>
<html>
    <head>
        <title>Relatorio</title>
        <meta charset="utf-8">
        <!--<link href="../css/estilo.css" rel="stylesheet">-->
        <link href="../../css/form_buscar.css" rel="stylesheet">

        <style>
            #customers {
                font-family: arial;
                border-collapse: separate;
                width: 100%;
                margin-top: 80px;
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
                margin-left: 50px;
                margin-bottom: 20px;

            }
            caption{
                font-size: 20px;
                margin-top: 20px;
                margin-bottom: 20px;
            }


            td{
                text-align: center;
            }
            .voltar{
                background: white;
                cursor: pointer;
            }
             .btn-gerenciamento{
              position: absolute;
              left: 590px;
              background-color: #ccc;
          }
         .btn-gerenciamento:hover{
     background-color:blue; /* Green */
    color: white;
}
.button{
    color: #2E2E2E;
    border: 2px solid #A4A4A4;
    cursor: pointer;
    border-radius: 5px;
    padding: 10px;
    font-size: 15px;
    
}
.dados{
    text-align: left;
}
        </style>


    </style>
</head>
<body>
    <div id="interface">


        <?php
        //session_start();
        include '../../cabecalho.php';
        include '../../bd/conectar.php';
        ini_set("display_errors", true);

        $aluno_id = $_GET['aluno_id'];
        $curso_id = $_GET['curso_id'];
        $contReprovacao = 0;
        
        $sql_valid = "select aluno.nome, curso.nome from curso join disciplina on disciplina.curso_id=curso.id "
                . "join turma on turma.disciplina_id=disciplina.id join aluno_turma on aluno_turma.turma_id=turma.id "
                . "join aluno on aluno.id=aluno_turma.aluno_id where curso.id=$curso_id and aluno.id=$aluno_id";

        $retorno_valid = mysqli_query($conexao, $sql_valid);

        $resultado_valid = mysqli_fetch_array($retorno_valid);

        if ($resultado_valid == null) {
            ?><h3 id="cadastro">Erro! Aluno não está matriculado neste curso</h3>
            <a href=form.php class="btn-gerenciamento button">Tentar novamente</a>
            <?php
        } else {
            $sql = "select aluno.nome as nome_aluno, aluno_curso.matricula, curso.nome as nome_curso, curso.carga_horaria, "
                    . "curso.anoInicio, curso.semestreInicio, curso.anoTermino, curso.semestreTermino from aluno join aluno_curso "
                    . "on aluno_curso.aluno_id=aluno.id join curso on curso.id=aluno_curso.curso_id where aluno.id=$aluno_id and curso.id=$curso_id";

            $resultado = mysqli_query($conexao, $sql);

            $linha = mysqli_fetch_array($resultado);
            ?>

            <h3 class="dados">Dados do aluno</h3>
            <?php
            echo "Nome: " . $linha['nome_aluno'] . "<br>";
            echo "Matrícula: " . $linha['matricula'] . "<br>";
            ?>

            <h3 class="dados">Dados do curso</h3>
            <?php
            echo "Nome: " . $linha['nome_curso'] . "<br>";
            echo "Carga horária: " . $linha['carga_horaria'] . "h <br>";
            echo "Ano de início: " . $linha['anoInicio'] . "<br>";
            echo "Semestre de início: " . $linha['semestreInicio'] . "<br>";
            echo "Ano de término: " . $linha['anoTermino'] . "<br>";
            echo "Semestre de término: " . $linha['semestreTermino'] . "<br>";

            $sql = "select disciplina.nome, nota.nota from nota join turma on turma.id=nota.turma_id join "
                    . "disciplina on disciplina.id=turma.disciplina_id where nota.aluno_id=$aluno_id and turma.curso_id=$curso_id group by disciplina.nome";

            $resultado = mysqli_query($conexao, $sql);
            ?>

            <table id="customers">

                <tr class="estilo">
                    <td>Disciplinas cursadas</td><td>Notas</td><td>Frequência</td>
                </tr>
                <?php
                while ($linha = mysqli_fetch_array($resultado)) {
                    ?>
                    <tr>

                        <td><?= $linha['nome'] ?></td>

                        <?php
                        $sql_notas = "select disciplina.nome, sum(nota.nota) as somaNotas, count(nota.nota) as qtdNotas from nota join turma on "
                                . "turma.id=nota.turma_id join disciplina on disciplina.id=turma.disciplina_id where (nota.aluno_id=$aluno_id and turma.curso_id=$curso_id) and disciplina.nome='$linha[nome]'";
                        $resultado_notas = mysqli_query($conexao, $sql_notas);
                        $linha_notas = mysqli_fetch_array($resultado_notas);
                        $media = $linha_notas['somaNotas'] / $linha_notas['qtdNotas'];
                        ?>   
                        
                        <td><?= number_format(round($media,2),1) ?></td>

                        <?php
                        $sql_qtdChamadas = "select disciplina.nome, count(frequencia.frequencia) as qtdChamadas from frequencia join "
                                . "turma on turma.id=frequencia.turma_id join disciplina on disciplina.id=turma.disciplina_id where "
                                . "frequencia.aluno_id=$aluno_id and disciplina.nome='$linha[nome]'";
                        $resultado_qtdChamadas = mysqli_query($conexao, $sql_qtdChamadas);
                        $linha_qtdChamadas = mysqli_fetch_array($resultado_qtdChamadas);

                        $sql_qtdPresencas = "select disciplina.nome, count(frequencia.frequencia) as qtdPresencas from frequencia join "
                                . "turma on turma.id=frequencia.turma_id join disciplina on disciplina.id=turma.disciplina_id where "
                                . "(frequencia.aluno_id=$aluno_id and disciplina.nome='$linha[nome]') and frequencia.frequencia='presenca'";
                        $resultado_qtdPresencas = mysqli_query($conexao, $sql_qtdPresencas);
                        $linha_qtdPresencas = mysqli_fetch_array($resultado_qtdPresencas);
                        $frequencia = ($linha_qtdPresencas['qtdPresencas'] / $linha_qtdChamadas['qtdChamadas']) * 100;
                        ?>   
                        <td><?= number_format(round($frequencia,2),1) . ' %' ?></td>
                    </tr>
                    <?php
                    if ($media < 6 || $frequencia < 75) {
                        $contReprovacao = 1;                   
                    } 
                }
                ?>

            </table>
            <br>
            <?php    
            if ($contReprovacao == 1){
                echo "<b>Situação: </b> Reprovado";
            } else {
                echo "<b>Situação: </b> Aprovado";
            }
        }
        ?>

    </div>

    <?php
    require_once '../../rodape.php';
    ?>
