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
        </style>

    </head>
    <body>
        <div id="interface">


            <?php
            //session_start();
            include '../../cabecalho.php';
            include '../../bd/conectar.php';
           // ini_set("display_errors", true);
            
            ini_set('display_errors', 0);
            ini_set('display_startup_errors', 0);
            error_reporting(E_ALL);
            

            $curso_id = $_GET["curso"];

            //$turma_id = $_GET["turma_id"];
            //  $sql = "select nota.aluno_id, sum(nota)/count(nota) as media from nota where turma_id=$turma_id group by aluno_id order by aluno_id";
            $sql_curso = "select nome from curso where id=$curso_id";
            $resultado_curso = mysqli_query($conexao, $sql_curso);
            $linha_curso = mysqli_fetch_array($resultado_curso);
            $sql = mysqli_query($conexao, $sql_curso);


            $sql_disciplinas_do_curso_selecionado = "select distinct disciplina.nome, turma.id FROM curso join turma on curso.id=turma.curso_id join disciplina on turma.disciplina_id=disciplina.id where curso.id=$curso_id";

            $resultado = mysqli_query($conexao, $sql_disciplinas_do_curso_selecionado);


            $reprovados = 0;

            while (($linha = mysqli_fetch_array($resultado))) {
                $turma_id = $linha[id];
                $sql_turma = "select disciplina.nome from turma join disciplina on disciplina.id=turma.disciplina_id where turma.id=$turma_id";
                $resultado_turma = mysqli_query($conexao, $sql_turma);
                $linha_disciplina = mysqli_fetch_array($resultado_turma);
                $disciplina_id = $linha_disciplina['nome'];

                $sql = "select distinct aluno.id, aluno.nome, aluno_curso.matricula, sum(nota)/count(nota) as media "
                        . "from aluno join aluno_curso on aluno.id=aluno_curso.aluno_id join aluno_turma on "
                        . "aluno_turma.aluno_id=aluno_curso.aluno_id join nota on nota.aluno_id=aluno_turma.aluno_id where "
                        . "aluno_curso.curso_id=$curso_id AND aluno_turma.turma_id=$turma_id and nota.turma_id=$turma_id group by "
                        . "nota.aluno_id order by aluno.nome";



                $resultado_turmas = mysqli_query($conexao, $sql);

                while (($linha = mysqli_fetch_array($resultado_turmas))) {
                    $sql_qtdChamadas = "select disciplina.nome, count(frequencia.frequencia) as qtdChamadas from frequencia join "
                            . "turma on turma.id=frequencia.turma_id join disciplina on disciplina.id=turma.disciplina_id where "
                            . "frequencia.aluno_id=$linha[id] and disciplina.nome='$linha_disciplina[nome]'";


                    $resultado_qtdChamadas = mysqli_query($conexao, $sql_qtdChamadas);
                    $linha_qtdChamadas = mysqli_fetch_array($resultado_qtdChamadas);


                    $sql_qtdPresencas = "select disciplina.nome, count(frequencia.frequencia) as qtdPresencas from frequencia join "
                            . "turma on turma.id=frequencia.turma_id join disciplina on disciplina.id=turma.disciplina_id where "
                            . "(frequencia.aluno_id=$linha[id] and disciplina.nome='$linha_disciplina[nome]') and frequencia.frequencia='presenca'";
                    $resultado_qtdPresencas = mysqli_query($conexao, $sql_qtdPresencas);
                    $linha_qtdPresencas = mysqli_fetch_array($resultado_qtdPresencas);
                    $frequencia = ($linha_qtdPresencas['qtdPresencas'] / $linha_qtdChamadas['qtdChamadas']) * 100;
                    
                    if ($linha['media'] < 6 || $frequencia < 75) {
                        $reprovados = $reprovados + 1;
                    }
                }
            }


            // $sql = "select frequencia"
//$sql_todos_alunos_do_curso_selecionado = "select nota.aluno_id, sum(nota)/count(nota) as media from nota join turma on turma.id=nota.turma_id join curso on curso.id=turma.curso_id where curso.id = $curso_id group by aluno_id order by aluno_id";
            //$sql_turma = "select disciplina.nome from turma join disciplina on disciplina.id=turma.disciplina_id where turma.id=$turma_id";
//         $sql = "select distinct aluno.id, aluno.nome, aluno_curso.matricula from aluno join aluno_curso on aluno.id=aluno_curso.aluno_id join aluno_turma on aluno_turma.aluno_id=aluno_curso.aluno_id where aluno_curso.curso_id=$curso_id AND aluno_turma.turma_id=$turma_id";
            //   $resultado_nome_curso = mysqli_query($conexao, $sql_curso);
            //  $resultado_curso = mysqli_query($conexao, $sql_todos_alunos_do_curso_selecionado);
            //  $reprovados=0;
            //  $linha_nome_curso = mysqli_fetch_array($resultado_nome_curso);
            //$linha_curso = mysqli_fetch_array($resultado_curso);
            //  while (($linha_curso = mysqli_fetch_array($resultado_curso))){
            ////  if($linha_curso['media']<6){
            //     $reprovados = $reprovados+1;
            // }
            //  }
            ?>


            <table id="customers">
                <caption>Relatório de reprovação por curso</caption>
                <tr class="estilo">
                    <td>Curso</td><td>Número de reprovações</td>
                </tr>

                <tr>
                    <td><?= $linha_curso['nome'] ?></td>
                    <td><?= $reprovados ?></td>
                </tr>
                <?php
                ?>


            </table>

        </div>

        <?php
        require_once '../../rodape.php';
        ?>
