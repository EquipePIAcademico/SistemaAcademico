<!DOCTYPE html>
<html>
    <head>
        <title>Alunos</title>
        <meta charset="utf-8">
       <!-- <link href="../css/estilo.css" rel="stylesheet">-->
              <style>
          #customers {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
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
    background-color:#F35548; /* Green */
    color: white;
    
}


td{
    text-align: center;
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
                $pesquisaAluno = trim($_POST['pesquisaAluno']);
                $sql = "select aluno.id, aluno.nome, aluno.email, aluno.dataN, aluno.nacionalidade, aluno.bairro, aluno.rua, aluno.complemento, aluno.cep, "
                    . "aluno.numero, renda.valor from aluno join renda on renda.id=aluno.renda_id where nome like '" . $pesquisaAluno . "%' order by nome";           
                $resultado = mysqli_query($conexao, $sql);
                $numRegistros = mysqli_num_rows($resultado);
                if ($numRegistros != 0) {                 
                    ?>
                    <form action="excluir_lote.php" method="post">

                        <table id="customers">
                            <caption>Alunos Cadastrados</caption>
                            <tr> <td class="cc">Selecionar</td><td class="cc">Nome</td><td class="cc">E-mail</td><td class="cc">Data de nascimento</td><td class="cc">Renda</td><td class="cc">Nacionalidade</td><td class="cc" colspan="5">Endereço</td><td class="ce">Excluir</td><td class="ca">Alterar</td>
                            </tr>
                            <?php
                            while ($linha = mysqli_fetch_array($resultado)) {
                                ?>
                                <td><input type="checkbox" name="id[]" value="<?= $linha['id'] ?>"</td>

                                <td><?= $linha['nome'] ?></td>
                                <td><?= $linha['email'] ?></td>
                                <td><?= $linha['dataN'] ?></td>
                                <td><?= $linha['valor'] ?></td>
                                <td><?= $linha['nacionalidade'] ?></td>
                                <td>Bairro: <?= $linha['bairro'] ?></td>
                                <td>Rua: <?= $linha['rua'] ?></td>
                                <td>Complemento: <?= $linha['complemento'] ?></td>
                                <td>CEP:<?= $linha['cep'] ?></td>
                                <td>Número: <?= $linha['numero'] ?></td>

                                <td><a href="excluir.php?id=<?= $linha['id'] ?>">
                                        <img src="../img/excluir2.png" height="30" width="30"/></a></td>

                                <td><a href="form_alterar.php?id=<?= $linha['id'] ?>">
                                        <img src="../img/alterar2.png" height="30" width="30"/></a></td>
                                </tr>
                                <?php
                            }
                            ?>
                        </table>                      
                     
                          <button class="btn-insira button">Excluir</button>
                       
                    </form>
                </div>
                <?php
            } else {
                 ?>
                    <h3> Nenhum aluno foi encontrado com o nome <?=$pesquisaAluno?> </h3>
    
                    <a href=listar.php> <button class="btn-continuar button">Voltar para gerenciamento</button></a>   
                    
            <?php
        }
            }
        require_once '../rodape.php';
       
    