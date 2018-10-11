<!DOCTYPE html>
<html>
    <head>
        <title>Perfil do Usuário</title>
        <meta charset="utf-8">
<!--        <link href="../css/estilo.css" rel="stylesheet">-->
<link href="../css/form_buscar.css" rel="stylesheet"/>
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

#customers tr:hover {background-color: #ddd; color: black}

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
    margin-left: 610px;
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

</style>

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

            <table id="customers">
                 <caption>Dados do Usuário</caption>
                 <tr class="estilo">
                    <td>Nome</td><td>E-mail</td><td>Data de nascimento</td><td>Perfil de acesso</td><td>Username</td><td>Alterar</td>
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
