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
        </style>

    </head>
    <body>
        <div id="interface">


            <?php
            //session_start();
            include '../../cabecalho.php';
            include '../../bd/conectar.php';
            ini_set("display_errors", true);

            $curso_id = $_GET["curso_id"];
            $rendaIni_id = $_GET["rendaIni_id"];
            $rendaFim_id = $_GET["rendaFim_id"];
            $nReprovacoes = 0;
            
            if ($rendaIni_id > $rendaFim_id) {
                ?> <h3 id="cadastro">Faixa de renda inválida! A renda inicial é maior que a final</h3>
                
                <a href=form.php class="btn-gerenciamento button">Tentar novamente</a>
                <?php
            } else {
                $sql = "select renda.valor, aluno.id, aluno.nome as nome_aluno, curso.nome as nome_curso from renda join aluno on "
                        . "aluno.renda_id=renda.id join aluno_curso on aluno_curso.aluno_id=aluno.id join "
                        . "curso on curso.id=aluno_curso.curso_id where (renda.id>=$rendaIni_id and renda.id<=$rendaFim_id) and "
                        . "curso.id=$curso_id";               
                $resultado = mysqli_query($conexao, $sql);
                
                while ($linha = mysqli_fetch_array($resultado)) {  
                    $sql_disciplina = "select disciplina.nome, nota.nota from nota join turma on turma.id=nota.turma_id "
                        . "join disciplina on disciplina.id=turma.disciplina_id where nota.aluno_id=$linha[id] and "
                        . "turma.curso_id=$curso_id group by disciplina.nome";                            
                    $resultado_disciplina = mysqli_query($conexao, $sql_disciplina);

                    while ($linha_disciplina = mysqli_fetch_array($resultado_disciplina)) {                         
                        $sql_notas = "select disciplina.nome, sum(nota.nota) as somaNotas, count(nota.nota) as qtdNotas "
                            . "from nota join turma on turma.id=nota.turma_id join disciplina on disciplina.id=turma.disciplina_id "
                            . "where (nota.aluno_id=$linha[id] and turma.curso_id=$curso_id) and disciplina.nome='$linha_disciplina[nome]'";                                
                        $resultado_notas = mysqli_query($conexao, $sql_notas);
                        $linha_notas = mysqli_fetch_array($resultado_notas);
                        $media = $linha_notas['somaNotas'] / $linha_notas['qtdNotas'];

                        $sql_qtdChamadas = "select disciplina.nome, count(frequencia.frequencia) as qtdChamadas from frequencia join "
                            . "turma on turma.id=frequencia.turma_id join disciplina on disciplina.id=turma.disciplina_id where "
                            . "frequencia.aluno_id=$linha[id] and disciplina.nome='$linha_disciplina[nome]'";                          
                        $resultado_qtdChamadas = mysqli_query($conexao, $sql_qtdChamadas);
                        $linha_qtdChamadas = mysqli_fetch_array($resultado_qtdChamadas);

                        $sql_qtdPresencas = "select disciplina.nome, count(frequencia.frequencia) as qtdPresencas from "
                            . "frequencia join turma on turma.id=frequencia.turma_id join disciplina on "
                            . "disciplina.id=turma.disciplina_id where (frequencia.aluno_id=$linha[id] and disciplina.nome='$linha_disciplina[nome]') "
                            . "and frequencia.frequencia='presenca'";                
                        $resultado_qtdPresencas = mysqli_query($conexao, $sql_qtdPresencas);
                        $linha_qtdPresencas = mysqli_fetch_array($resultado_qtdPresencas);
                        $frequencia = ($linha_qtdPresencas['qtdPresencas'] / $linha_qtdChamadas['qtdChamadas']) * 100;
                                
                        if (($media < 6) || ($frequencia < 75)) {
                            $nReprovacoes += 1;
                        } 
                    }                          
                }
                    ?>
                <table id="customers">
                    <caption>Relatório de reprovações por faixa de renda</caption>
                    <tr class="estilo">
                        <td>Curso</td><td>Faixa de renda</td><td>Número de reprovações</td>
                    </tr>
                    <tr>
                        <?php
                            $sql_curso = "select curso.nome from curso where curso.id=$curso_id";
                            $resultado_curso = mysqli_query($conexao, $sql_curso);
                            $linha_curso= mysqli_fetch_array($resultado_curso);
                        ?>
                        <td><?= $linha_curso['nome'] ?></td>
                        
                        <?php
                            $sql_rendaIni = "select renda.valor from renda where renda.id=$rendaIni_id";
                            $resultado_rendaIni = mysqli_query($conexao, $sql_rendaIni);
                            $linha_rendaIni = mysqli_fetch_array($resultado_rendaIni);

                            $sql_rendaFim = "select renda.valor from renda where renda.id=$rendaFim_id";
                            $resultado_rendaFim = mysqli_query($conexao, $sql_rendaFim);
                            $linha_rendaFim = mysqli_fetch_array($resultado_rendaFim);
                        ?>
                        <td><?= $linha_rendaIni['valor'] . ' a ' . $linha_rendaFim['valor'] ?></td>
                        
                        <td><?= $nReprovacoes ?></td>
                    </tr>
                </table>
            <?php
            }
             ?>

        </div>

<?php
require_once '../../rodape.php';
?>
