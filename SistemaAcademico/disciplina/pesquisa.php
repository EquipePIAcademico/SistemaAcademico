<!DOCTYPE html>
<html>
    <head>
        <title>Disciplinas</title>
        <meta charset="utf-8">
        <!--        <link href="../css/estilo.css" rel="stylesheet">-->
        <style>
            #customers {
    font-family: arial;
    border-collapse: separate;
    border-spacing: 1px;
    width: 100%;
    margin-top: 80px;
    color:threeddarkshadow;
}

#customers tr.estilo{
    background-color: #ccc;
    color: black;
}
            #customers td, #customers th {
                border: 1px solid #ddd;
                padding: 2.5px;
            }

            #customers tr:nth-child(even){background-color: #f2f2f2;}

            #customers tr:hover {background-color: #ddd;
            color: black;}

            #customers th {
                padding-top: 12px;
                padding-bottom: 12px;
                text-align: left;
                background-color: #4CAF50;
                color: white;
            }
            .btn-excluir{
                font-family: arial;
                font-size: 14px;
                border-radius: 10px;
                padding: 10px;
                cursor: pointer;
                background-color:red;
                margin-top: 10px;

            }

            body{
                background-color: #dddddd;
                color: rgba(0,0,0,1);
                font-family: sans-serif;
                font-size: 14px;
            }
            div#interface{
                background-color: white;
                width: 1250px;
                margin: 0px auto 10px auto;
                box-shadow: 0px 0px 10px;
                padding: 0px 30px 50px 30px;
            }

            .form-pesquisa{
                position: absolute;
                left: 900px;
                margin-bottom: 100px;

            }
            .btn-insira:hover {
                background-color:#FE2E2E; /* Green */
                color: white;


            }
            button.btn-insira{
                color: #2E2E2E;
                border: 2px solid #A4A4A4;
                cursor: pointer;
                border-radius: 5px;
                padding: 10px;
                font-size: 15px;
                margin-top: 15px;
                margin-left: 25px;
                margin-bottom: 20px;
            }
            caption{
                font-size: 20px;
                margin-top: 20px;
                margin-bottom: 20px;
            }

            form{
                background-color: white;
                margin-top: -20px;
                margin-left: 20px;
                margin-right: 20px;
            }
            h3{
                display: flex;
                justify-content: center;

            }
            .btn-continuar:hover {
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

            }

            .btn-continuar{
                position: absolute;
                left: 590px;

            }

            .btn-insira:hover {
                background-color:#FE2E2E; /* Green */
                color: white;

            }
            button.btn-insira{
                 color: #2E2E2E;
    border: 2px solid #A4A4A4;
    cursor: pointer;
    border-radius: 5px;
    padding: 10px;
    padding-left: 15px;
    padding-right: 15px;
    font-size: 15px;
    margin-top: 10px;
    margin-left: 0px;
    margin-bottom: 20px;
    

            }
            td{
                text-align: center;
            }
.voltar{
    color: #2E2E2E;
    border: 2px solid #A4A4A4;
    cursor: pointer;
    border-radius: 5px;
    padding: 10px;
    font-size: 15px;
    margin-top: 10px;
    margin-left: 10px;
    margin-bottom: 20px;
             }
              .voltar:hover {
    background-color:blue; /* Green */
    color: white;
    
}


        </style>


    </head>
    <body>
        <div id="interface">

            <?php
            //session_start();
            include '../cabecalho.php';
            include '../bd/conectar.php';

            $a = $_GET['a'];

            if ($a == "buscar") {
                $pesquisaDisciplina = trim($_POST['pesquisaDisciplina']);

                $sql = "select disciplina.id, disciplina.nome, disciplina.descricao, disciplina.carga_horaria, curso.nome as curso_nome, tipo.nome as tipo_nome "
                        . "from disciplina join curso on curso.id=disciplina.curso_id join tipo on tipo.id=curso.tipo_id where disciplina.nome like '" . $pesquisaDisciplina . "%' order by nome";

                $resultado = mysqli_query($conexao, $sql);
                $numRegistros = mysqli_num_rows($resultado);
                if ($numRegistros != 0) {
                    ?>
            <form action="confirmacao_lote.php" method="post">
                        <table id="customers">
                            <caption>Disciplinas Cadastradas</caption>
                            <tr class="estilo">
                                <td>Selecionar</td><td>Curso da disciplina</td><td>Nome</td><td>Descrição</td><td>Carga horária</td><td>Excluir</td><td>Alterar</td>
                            </tr>
                            <?php
                            while ($linha = mysqli_fetch_array($resultado)) {
                                ?>
                                <tr>
                                    <td><input type="checkbox" name="id[]" value="<?= $linha['id'] ?>"</td>

                                    <td><?= $linha['tipo_nome'] ?> - <?= $linha['curso_nome'] ?></td>
                                    <td><?= $linha['nome'] ?></td>
                                    <td><?= $linha['descricao'] ?></td>
                                    <td><?= $linha['carga_horaria'] ?></td>

                                    <td><a href="confirmacao.php?id=<?= $linha['id'] ?>">
                                            <img src="../img/excluir2.png" height="30" width="30"/></a></td>

                                    <td><a href="form_alterar.php?id=<?= $linha['id'] ?>">
                                            <img src="../img/alterar2.png" height="30" width="30"/></a></td>
                                </tr>
                                <?php
                            }
                            ?>
                        </table>
                        <button class="btn-insira button">Excluir</button>
                        <?php
                        echo '<br> <a href=listar.php>Voltar para gerenciamento</a>   ';
                        ?>
                    </form>
                </div>
                <?php
            } else {
                ?>
                <h3> Nenhuma disciplina foi encontrada com o nome <?= $pesquisaDisciplina ?> </h3>

                <a href=listar.php> <button class="btn-continuar button">Voltar para gerenciamento</button></a>   
                <?php
            }
        }
        require_once '../rodape.php';
        ?>
    
    
