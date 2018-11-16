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
        ini_set("display_errors", true);
        
        $curso_id = $_GET["curso"];
        echo $curso_id;?><br><?php
        $turma_id = $_GET["turma_id"];
        echo $turma_id;
//        $sql = "select nota.aluno_id, sum(nota)/count(nota) as media from nota where turma_id=$turma_id group by aluno_id order by aluno_id";
//        $sql_curso = "select nome from curso where id=$curso_id";
      $sql_turma = "select disciplina.nome from turma join disciplina on disciplina.id=turma.disciplina_id where turma.id=$turma_id";
//         
     //  $sql_nota = "select nota.aluno_id, sum(nota)/count(nota) as media from nota where turma_id=$turma_id group by aluno_id order by aluno_id";
         $sql = "select distinct aluno.id, aluno.nome, aluno_curso.matricula, sum(nota)/count(nota) as media from aluno join aluno_curso on aluno.id=aluno_curso.aluno_id join aluno_turma on aluno_turma.aluno_id=aluno_curso.aluno_id join nota on nota.aluno_id=aluno_turma.aluno_id where aluno_curso.curso_id=$curso_id AND aluno_turma.turma_id=$turma_id and nota.turma_id=$turma_id group by nota.aluno_id order by nota.aluno_id";
                
       // $resultado_curso = mysqli_query($conexao, $sql_curso);
        $resultado_turma = mysqli_query($conexao, $sql_turma);
           $resultado = mysqli_query($conexao, $sql);
    //    $resultado_nota = mysqli_query($conexao, $sql_nota);
        
        //$reprovados=0;
        //$linha_curso = mysqli_fetch_array($resultado_curso);
       $linha_turma = mysqli_fetch_array($resultado_turma);
//       $linha = mysqli_fetch_array($resultado);
       //$linha_nota = mysqli_fetch_array($resultado_nota);?>     
        
         <table id="customers">
             <caption>Diário de classe</caption>
                <tr class="estilo" >
                    <td colspan="4"><?= $linha_turma['nome'] ?></td>
                </tr>
                <tr class="estilo">
                    <td>Matrícula</td><td>Aluno</td><td>Nota</td><td>Frequência</td>
                </tr>
                 <?php
                 
            while ($linha = mysqli_fetch_array($resultado)) {
               
                ?>
                <tr>
                    <td><?= $linha['matricula'] ?></td>
                    <td><?= $linha['nome'] ?></td>
                    <td><?= number_format(round($linha['media'],2),1) ?></td>
              
       <?php }
       ?>
                </tr>
              
            </table>
    </div>

    <?php
    require_once '../../rodape.php';
    ?>
