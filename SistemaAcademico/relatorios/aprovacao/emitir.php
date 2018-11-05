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

        $sql = "select aluno.nome as nome_aluno, aluno_curso.matricula, curso.nome as nome_curso, curso.carga_horaria, "
                . "curso.anoInicio, curso.semestreInicio, curso.anoTermino, curso.semestreTermino from aluno join aluno_curso "
                . "on aluno_curso.aluno_id=aluno.id join curso on curso.id=aluno_curso.curso_id where aluno.id=$aluno_id and curso.id=$curso_id";

        $resultado = mysqli_query($conexao, $sql);
        
        $linha = mysqli_fetch_array($resultado);
        ?>

        <h3>Dados do aluno</h3>
        <?php
        echo "Nome: " . $linha['nome_aluno'] . "<br>";
        echo "Matrícula: " . $linha['matricula'] . "<br>";
        ?>
        
        <h3>Dados do curso</h3>
        <?php
        echo "Nome: " . $linha['nome_curso'] . "<br>";
        echo "Carga horária: " . $linha['carga_horaria'] . "h <br>";
        echo "Ano de início: " . $linha['anoInicio'] . "<br>";
        echo "Semestre de início: " . $linha['semestreInicio'] . "<br>";
        echo "Ano de término: " . $linha['anoTermino'] . "<br>";
        echo "Semestre de término: " . $linha['semestreTermino'] . "<br>";
        
//        Daqui para cima ta certo, para baixo tem q fazer ainda
        
        $sql = "select aluno.nome as nome_aluno, aluno_curso.matricula, curso.nome as nome_curso, curso.carga_horaria, "
                . "curso.anoInicio, curso.semestreInicio, curso.anoTermino, curso.semestreTermino from aluno join aluno_curso "
                . "on aluno_curso.aluno_id=aluno.id join curso on curso.id=aluno_curso.curso_id where aluno.id=$aluno_id and curso.id=$curso_id";

        $resultado = mysqli_query($conexao, $sql);
        ?>
        
        <table id="customers">

            <tr class="estilo">
                <td>Selecionar</td><td>Nome</td><td>Descrição</td><td>Excluir</td><td>Alterar</td>
            </tr>
            <?php
            while ($linha = mysqli_fetch_array($resultado)) {
                ?>
                <tr>
                    <td><input type="checkbox" name="id[]" value="<?= $linha['id'] ?>"</td>
                    <td><?= $linha['nome'] ?></td>
                    <td><?= $linha['descricao'] ?></td>
                    <td><a href="excluir.php?id=<?= $linha['id'] ?>">
                            <img src="../img/excluir2.png" height="30" width="30"/></a></td>

                    <td><a href="form_alterar.php?id=<?= $linha['id'] ?>">
                            <img src="../img/alterar2.png" height="30" width="30"/></a></td>
                </tr>
                <?php
            }
            ?>

        </table>
        <button class="btn-insira">Excluir</button>


    </div>

    <?php
    require_once '../../rodape.php';
    ?>
