<!DOCTYPE html>
<html>
    <head>
        <title>Disciplinas</title>
        <meta charset="utf-8">
        <!--        <link href="../css/estilo.css" rel="stylesheet">-->
        <style>
            #customers {
                font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
                border-collapse: collapse;
                width: 100%;
            }

            #customers td, #customers th {
                border: 1px solid #ddd;
                padding: 8px;
            }

            #customers tr:nth-child(even){background-color: #f2f2f2;}

            #customers tr:hover {background-color: #ddd;}

            #customers th {
                padding-top: 12px;
                padding-bottom: 12px;
                text-align: left;
                background-color: #4CAF50;
                color: white;
            }
            .btn{
                font-family: arial;
                font-size: 14px;
                border: none;
                padding: 10px;
                cursor: pointer;
                background-color:green;
                margin-top: 10px;
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
                    <form action="excluir_lote.php" method="post">
                        <table id="customers">
                            <caption>Disciplinas Cadastradas</caption>
                            <tr>
                                <td align="center" valign="top">Selecionar</td><td align="center" valign="top">Curso da disciplina</td><td align="center" valign="top">Nome</td><td align="center" valign="top">Descrição</td><td align="center" valign="top">Carga horária</td><td align="center" valign="top">Excluir</td><td align="center" valign="top">Alterar</td>
                            </tr>
                            <?php
                            while ($linha = mysqli_fetch_array($resultado)) {
                                ?>
                                <tr>
                                    <td align="center" valign="top"><input type="checkbox" name="id[]" value="<?= $linha['id'] ?>"</td>

                                    <td align="center" valign="top"><?= $linha['tipo_nome'] ?> - <?= $linha['curso_nome'] ?></td>
                                    <td align="center" valign="top"><?= $linha['nome'] ?></td>
                                    <td align="center" valign="top"><?= $linha['descricao'] ?></td>
                                    <td align="center" valign="top"><?= $linha['carga_horaria'] ?></td>

                                    <td align="center" valign="top"><a href="excluir.php?id=<?= $linha['id'] ?>">
                                            <img src="../img/excluir2.png" height="30" width="30"/></a></td>

                                    <td align="center" valign="top"><a href="form_alterar.php?id=<?= $linha['id'] ?>">
                                            <img src="../img/alterar2.png" height="30" width="30"/></a></td>
                                </tr>
                                <?php
                            }
                            ?>
                        </table>
                        <input class = "btn" type = "submit" value = "Excluir">

                    </form>
                </div>
                <?php
            } else {
                echo "<script>alert('Nenhuma disciplina foi encontrada com o nome $pesquisaDisciplina')</script>";
            }
            ?>


            <?php
        }
        require_once '../rodape.php';
        ?>
    