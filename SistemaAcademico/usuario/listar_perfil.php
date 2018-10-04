<!DOCTYPE html>
<html>
    <head>
        <title>Perfil do Usuário</title>
        <meta charset="utf-8">
        <link href="../css/estilo.css" rel="stylesheet">
    </head>
    <body>
        <div id="interface">


            <?php
            //session_start();
            include '../cabecalho.php';
            include '../bd/conectar.php';

            $sql_pessoa = "select id, nome, email, date_format(dataN, '%d/%m/%Y') as dataNformatada, perfil_acesso, username from usuario where username = '$_SESSION[username]'";

            $resultado = mysqli_query($conexao, $sql_pessoa);
            $linha = mysqli_fetch_array($resultado);
            ?>

            <table id="tabelaspec">
                 <caption>Dados do Usuário</caption>
                <tr>
                    <td class="cc">Nome</td><td class="cc">E-mail</td><td class="cc">Data de nascimento</td><td class="cc">Perfil de acesso</td><td class="cc">Username</td><td class="ca">Alterar</td>
                </tr>
                <tr> 
                    <td><?= $linha['nome'] ?></td>
                    <td><?= $linha['email'] ?></td>
                    <td><?= $linha['dataNformatada'] ?></td>
                    <td><?= $linha['perfil_acesso'] ?></td>
                    <td><?= $linha['username'] ?></td>
                    <td><a href="form_alterar.php?id=<?= $linha['id'] ?>">
                            <img src="../img/alterar2.png" height="30" width="30"/></a></td>
                </tr>

            </table>


            <?php
            require_once '../rodape.php';
            ?>

        </div>
    </body>        
</html>