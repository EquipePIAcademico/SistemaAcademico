<!DOCTYPE html>
<html>
    <head>
        <title>Alunos</title>
        <meta charset="utf-8">
        <!-- <link href="../css/estilo.css" rel="stylesheet">-->
        <link href="../css/form_buscar.css" rel="stylesheet">
        <style>
            #customers {
                font-family: arial;
                border-collapse: separate;
                border-spacing: 1px;
                width: 100%;
                margin-top: 80px;
                color:threeddarkshadow;
            }

            #customers td, #customers th {
                border: 1px solid #ddd;
                padding: 2.5px;
            }

            #customers tr:nth-child(even){background-color: #f2f2f2;}

            #customers tr.estilo{
                background-color: #ccc;
                color: black;
            }

            #customers tr:hover {background-color: #ddd;
                                 color:  black;
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



            .btn-excluir{
                font-family: arial;
                font-size: 14px;
                border-radius: 10px;
                padding: 10px;
                cursor: pointer;
                background-color:red;
                margin-top: 10px;

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
                margin-left: 5px;
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
            input{
                border-radius: 10px;

            }

            .voltar{
                background: white;
                cursor: pointer;
            }         
            td{
                text-align: center;

            }


        </style>
    </head>
    <body>
        <div id="interface">

            <?php
            //session_start();
            include_once '../cabecalho.php';
            include_once '../bd/conectar.php';

            $pagina = (isset($_GET['pagina'])) ? $_GET['pagina'] : 1;
            $sql_aluno = "select * from aluno";
            $resultado_aluno = mysqli_query($conexao, $sql_aluno);
            $total = mysqli_num_rows($resultado_aluno);
            $registros = 10;
            $numPaginas = ceil($total / $registros);
            $inicio = ($registros * $pagina) - $registros;
            ?>

            <form method="post" action="pesquisa.php?a=buscar" class="form-pesquisa">
                <div class="form_pesquisa">   
<!--                Pesquisar alunos: <input required="" type="search" placeholder="Por nome" name="pesquisaAluno">-->
                    <input required="" type="text" placeholder="   Pesquisar aluno..." name="pesquisaAluno" />
                    <button><img src="../img/search.png" height="25" width="30" style="cursor: pointer;"/></button>
                </div>
            </form>


            <?php
            $sql = "select aluno.id, aluno.nome, aluno.email, date_format(aluno.dataN, '%d/%m/%Y') as dataNformatada, aluno.nacionalidade, aluno.bairro, aluno.rua, aluno.complemento, aluno.cep, "
                    . "aluno.numero, renda.valor from aluno join renda on renda.id=aluno.renda_id order by nome limit $inicio,$registros";

            $resultado = mysqli_query($conexao, $sql);
            $total = mysqli_num_rows($resultado);
            ?>
            <form action="confirmacao_lote.php" method="post">

                <table id="customers">
                    <caption>Alunos Cadastrados</caption>
                    <tr class="estilo"> <td>Selecionar</td><td>Nome</td><td>E-mail</td><td>Data de nascimento</td><td>Renda</td><td>Nacionalidade</td><td colspan="5">Endereço</td><td>Excluir</td><td>Alterar</td>
                    </tr>
                    <?php
                    while ($linha = mysqli_fetch_array($resultado)) {
                        ?>
                        <td><input type="checkbox" name="id[]" value="<?= $linha['id'] ?>"</td>

                        <td><?= $linha['nome'] ?></td>
                        <td><?= $linha['email'] ?></td>
                        <td><?= $linha['dataNformatada'] ?></td>
                        <td><?= $linha['valor'] ?></td>
                        <td><?= $linha['nacionalidade'] ?></td>
                        <td>Bairro: <br><?= $linha['bairro'] ?></td>
                        <td>Rua: <br><?= $linha['rua'] ?></td>
                        <td>Complemento: <br> <?= $linha['complemento'] ?></td>
                        <td>CEP: <br><?= $linha['cep'] ?></td>
                        <td>Número: <br><?= $linha['numero'] ?></td>

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

            </form><br><br>

        </div>

        <?php
        require_once '../rodape.php';
        ?>
    
