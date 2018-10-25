<!DOCTYPE html>
<html>
    <head>
        <title>Disciplinas</title>
        <meta charset="utf-8">
        <!--        <link href="../css/estilo.css" rel="stylesheet">-->
        <style>
            #customers {
                font-family: Arial;
                border-collapse: separate;
                width: 100%;
            }

            #customers td, #customers th {
                border: 1px solid #ddd;
                padding: 2.5px;
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
                $pesquisaSemestre = trim($_POST['pesquisaSemestre']);

                $sql = "select turma.id, turma.nVagas, disciplina.nome, semestre.valor, usuario.nome as professor_nome from "
                        . "usuario join turma on turma.professor_id=usuario.id join disciplina on disciplina.id=turma.disciplina_id join semestre "
                        . "on semestre.id=turma.semestre_id where (perfil_acesso='professor(a)' and disciplina.nome like '" . $pesquisaDisciplina . "%') and semestre.valor= $pesquisaSemestre";

                $resultado = mysqli_query($conexao, $sql);
                $numRegistros = mysqli_num_rows($resultado);
                if ($numRegistros != 0) {
                    ?>
                    <form action="excluir_lote.php" method="post">
                        <table id="customers">
                            <caption>Turmas Cadastradas</caption>
                            <tr>
                                <td align="center" valign="top">Selecionar</td><td align="center" valign="top">Número de vagas</td><td align="center" valign="top">Disciplina</td><td align="center" valign="top">Semestre</td><td align="center" valign="top">Professor(a)</td><td align="center" valign="top">Excluir</td><td align="center" valign="top">Alterar</td>
                            </tr>
                            <?php
                            while ($linha = mysqli_fetch_array($resultado)) {
                                ?>
                                <tr>
                                    <td align="center" valign="top"><input type="checkbox" name="id[]" value="<?= $linha['id'] ?>"</td>
                                    <td align="center" valign="top"><?= $linha['nVagas'] ?></td>
                                    <td align="center" valign="top"><a href="../disciplina/listar.php"><?= $linha['nome'] ?></a></td>
                                    <td align="center" valign="top"><?= $linha['valor'] ?></td>
                                    <td align="center" valign="top"><?= $linha['professor_nome'] ?></td>

                                    <td align="center" valign="top"><a href="excluir.php?id=<?= $linha['id'] ?>">
                                            <img src="../img/excluir2.png" height="30" width="30"/></a></td>

                                    <td align="center" valign="top"><a href="form_alterar.php?id=<?= $linha['id'] ?>">
                                            <img src="../img/alterar2.png" height="30" width="30"/></a></td>
                                </tr>
                                <?php
                            }
                            ?>
                        </table>
                       <button class="btn-insira">Excluir</button>
                        <?php
                         echo '<br> <a href=listar.php>Voltar para gerenciamento</a>   ';
                         ?>
                    </form>
                <input class="voltar" type="button" value="<<Voltar" onClick="JavaScript: window.history.back();">
                </div>
                <?php
            } else {
                echo "<script>alert('Nenhuma turma foi encontrada com a disciplina $pesquisaDisciplina e com o semestre $pesquisaSemestre')</script>";
            }
            ?>


            <?php
        }
        require_once '../rodape.php';
        ?>
    