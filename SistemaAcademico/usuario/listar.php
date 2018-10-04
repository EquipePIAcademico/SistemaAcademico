<!DOCTYPE html>
<html>
    <head>
        <title>Usuários Cadastrados</title>
        <meta charset="utf-8">
       <!-- <link href="../css/estilo.css" rel="stylesheet">-->
        <script>
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
    width: 1300px;
    margin: 0px auto 10px auto;
    box-shadow: 0px 0px 10px;
    padding: 0px 0px 50px 30px;
}
    </script>
        
    </head>
    <body>
        <div id="interface">

            <?php
            //session_start();
            include '../cabecalho.php';
            include '../bd/conectar.php';
            ?>

            <form method="post" action="pesquisa.php?a=buscar">
                Pesquisar usuários: <input type="search" placeholder="Por nome" name="pesquisaUsuario">
                <input class="btn" type="submit" value="Buscar">
            </form>

            <?php
            $sql_pessoa = "select * from usuario where username != '$_SESSION[username]'";

            $resultado = mysqli_query($conexao, $sql_pessoa);
            ?>

            <form action="excluir_lote.php" method="post">
                <table id="customers">
                    <caption>Usuários Cadastrados</caption>
                    <tr>
                        <td class="cc">Selecionar</td><td class="cc">Nome</td><td class="cc">E-mail</td><td class="cc">Data de nascimento</td><td class="cc">Perfil de acesso</td><td class="cc">Username</td><td class="ce">Excluir</td><td class="ca">Alterar</td>
                    </tr>
                    <?php
                    while ($linha = mysqli_fetch_array($resultado)) {
                        ?>
                        <tr>
                            <td><input type="checkbox" name="id[]" value="<?= $linha['id'] ?>"</td>

                            <td><?= $linha['nome'] ?></td>
                            <td><?= $linha['email'] ?></td>
                            <td><?= $linha['dataN'] ?></td>
                            <td><?= $linha['perfil_acesso'] ?></td>
                            <td><?= $linha['username'] ?></td>

                            <td><a href="excluir.php?id=<?= $linha['id'] ?>">
                                    <img src="../img/excluir2.png" height="30" width="30"/></a></td>

                            <td><a href="form_alterar.php?id=<?= $linha['id'] ?>">
                                    <img src="../img/alterar2.png" height="30" width="30"/></a></td>
                        </tr>
                        <?php
                    }
                    ?>

                </table>
                <input class="btn" type="submit" value="Excluir">

            </form>

            <?php
            require_once '../rodape.php';
            ?>
        </div>
    </body>
</html>