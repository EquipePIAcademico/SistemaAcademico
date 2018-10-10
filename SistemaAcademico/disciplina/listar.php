<!DOCTYPE html>
<html>
    <head>
        <title>Disciplinas Cadastradas</title>
        <meta charset="utf-8">
        <!--  <link href="../css/estilo.css" rel="stylesheet">
          <link href="../css/form.css" rel="stylesheet">-->
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
      background-color: ;
    color: #2E2E2E;
    border: 2px solid #A4A4A4;
    cursor: pointer;
    border-radius: 5px;
    padding: 10px;
    font-size: 15px;
    margin-top: 10px;
    margin-left: 18px;
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

             td{
                 text-align:center;
             }
        </style>
    </head>
    <body>
        <div id="interface">
            <?php
            //session_start();

            include '../cabecalho.php';

            include '../bd/conectar.php';
            ?>

            <form method="post" action="pesquisa.php?a=buscar" class="form-pesquisa">
                Pesquisar disciplinas: <input type="search" placeholder="Por nome" name="pesquisaDisciplina" >
                <input class="btn" type="submit" value="Buscar">
            </form>

            <?php
            ini_set("display_errors", true);

            $sql = "select disciplina.id, disciplina.nome as disc_nome, disciplina.descricao, disciplina.carga_horaria, curso.nome as curso_nome, tipo.nome as tipo_nome "
                    . "from disciplina join curso on curso.id=disciplina.curso_id join tipo on tipo.id=curso.tipo_id order by curso_nome";

            $resultado = mysqli_query($conexao, $sql);
            ?>
            <form action="excluir_lote.php" method="post">
                <table id="customers">
                    <caption>Disciplinas Cadastradas</caption>
                    <tr>
                        <td>Selecionar</td><td >Curso da disciplina</td><td>Nome</td><td>Descrição</td><td>Carga horária</td><td>Excluir</td><td>Alterar</td>
                    </tr>
                    <?php
                    while ($linha = mysqli_fetch_array($resultado)) {
                        ?>
                        <tr>
                            <td><input type="checkbox" name="id[]" value="<?= $linha['id'] ?>"</td>

                            <td><?= $linha['tipo_nome'] ?> - <?= $linha['curso_nome'] ?></td>
                            <td><?= $linha['disc_nome'] ?></td>
                            <td><?= $linha['descricao'] ?></td>
                            <td><?= $linha['carga_horaria'] ?></td>

                            <td><a href="excluir.php?id=<?= $linha['id'] ?>">
                                    <img src="../img/excluir2.png" height="30" width="30"/></a></td>

                            <td><a href="form_alterar.php?id=<?= $linha['id'] ?>">
                                    <img src="../img/alterar2.png" height="30" width="30"/></a></td>
                        </tr>
                        <?php
                    }
                    ?>

                </table><br>
               <button class="btn-insira">Excluir</button>
            </form>

            <?php
            require_once '../rodape.php';
            ?>


        </div>
    </body>
</html>