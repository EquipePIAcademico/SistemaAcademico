<!DOCTYPE html>
<html>
    <head>
        <title>Tipos</title>
        <meta charset="utf-8">
        <!--<link href="../css/estilo.css" rel="stylesheet">-->
        <link href="../css/form_buscar.css" rel="stylesheet">

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
            // session_start ();
            include '../cabecalho.php';
            include '../bd/conectar.php';

            $pagina = (isset($_GET['pagina'])) ? $_GET['pagina'] : 1;
            $sql_tipo = "select * from tipo";
            $resultado_tipo = mysqli_query($conexao, $sql_tipo);
            $total = mysqli_num_rows($resultado_tipo);
            $registros = 10;
            $numPaginas = ceil($total / $registros);
            $inicio = ($registros * $pagina) - $registros;
            ?>

            <form method="post" action="pesquisa.php?a=buscar" class="form-pesquisa">
                <div class="form_pesquisa">   
<!--                Pesquisar alunos: <input required="" type="search" placeholder="Por nome" name="pesquisaAluno">-->
                    <input required="" type="text" placeholder="   Pesquisar tipo de curso..." name="pesquisaTipo" />
                    <button><?php include "../img/magnifying-glass.svg"; ?></button>
                </div>
            </form>

            <?php
            ini_set("display_errors", true);

            $sql = "select * from tipo order by nome limit $inicio,$registros";

            $resultado = mysqli_query($conexao, $sql);
            $total = mysqli_num_rows($resultado);
            ?>

            <form action="confirmacao_lote.php" method="post">    
                <table id="customers">
                    <caption>Tipos de Curso Cadastrados</caption>


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
                            <td><a href="confirmacao.php?id=<?= $linha['id'] ?>">
                                    <img src="../img/excluir2.png" height="30" width="30"/></a></td>

                            <td><a href="form_alterar.php?id=<?= $linha['id'] ?>">
                                    <img src="../img/alterar2.png" height="30" width="30"/></a></td>
                        </tr>
                        <?php
                    }
                    ?>

                </table>
                <button class="btn-insira">Excluir</button>
                <?php
                if ($pagina > 1) {
                    echo "<a class='paginacao' href='listar.php?pagina=" . ($pagina - 1) . "'>&laquo; anterior</a>";
                }

                for ($i = 1; $i < $numPaginas + 1; $i++) {
                    $ativo = ($i == $pagina) ? 'numativo' : '';
                    echo "<a class='paginacao' href='listar.php?pagina= $i '> " . $i . " </a>";
                }

                if ($pagina < $numPaginas) {
                    echo "<a class='paginacao' href='listar.php?pagina=" . ($pagina + 1) . "'>proximo &raquo;</a>";
                }
                ?>
            </form>

        </div>


        <?php
        require_once '../rodape.php';
        ?>

