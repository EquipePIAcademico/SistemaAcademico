<!DOCTYPE html>
<html>
    <head>
        <title>Usuários</title>
        <meta charset="utf-8">
        <link href="../css/estilo.css" rel="stylesheet">
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
    background-color:#FE2E2E; /* Green */
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
    margin-top: 15px;
    margin-left: 610px;
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

            $a = $_GET['a'];

            if ($a == "buscar") {
                $pesquisaUsuario = trim($_POST['pesquisaUsuario']);
                $sql = "select * from usuario where username != '$_SESSION[username]' and nome like '" . $pesquisaUsuario . "%' order by nome";
                $resultado = mysqli_query($conexao, $sql);
                $numRegistros = mysqli_num_rows($resultado);
                if ($numRegistros != 0) {
                    ?>
                    <form action="excluir_lote.php" method="post">
                        <table id="customers">
                            <caption>Usuários Cadastrados</caption>
                            <tr>
                                <td>Selecionar</td><td>Nome</td><td>E-mail</td><td>Data de nascimento</td><td>Perfil de acesso</td><td>Username</td><td>Excluir</td><td>Alterar</td>
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
                        <button class="btn-insira">Excluir</button>

                    </form>
                </div>
                <?php
            } else {
                 ?>
                    <h3> Nenhum usuário foi encontrado com o nome <?=$pesquisaUsuario?> </h3>
    
                    <a href=listar.php> <button class="btn-continuar button">Voltar para gerenciamento</button></a>   
            <?php
             
            }
            
        }
        require_once '../rodape.php';
        ?>
    