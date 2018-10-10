<!DOCTYPE html>
<html>
    <head>
        <title>Alterar Aluno</title>
        <meta charset="utf-8">
        <link href="../css/estilo.css" rel="stylesheet">
        <link href="../css/form.css" rel="stylesheet">
    </head>
    <body>
        <div id="interface">
            <?php
            include '../cabecalho.php';
            $id = $_GET['id'];
            include '../bd/conectar.php';
            $sql_aluno = "select * from aluno where id = $id";

            $resultado_aluno = mysqli_query($conexao, $sql_aluno);

            $linha_aluno = mysqli_fetch_array($resultado_aluno);
            ?>


            <h3 id="cadastro">Alterar Cadastro</h3>
            <form method="post" action="alterar.php">
                <fieldset id="usuario"><legend>Identificação do Aluno</legend>
                    <input type="hidden" name="id" value="<?= $id ?>">
                    <label>Nome: </label>
                    <input type="text" required="" name="nome" value="<?= $linha_aluno['nome'] ?>"><br>
                    <label>E-mail: </label>
                    <input type="email" required="" name="email" value="<?= $linha_aluno['email'] ?>"><br>
                    <label>Sexo</label>
                    <input type="radio" disabled="" name="sexo" value="<?= $linha_aluno['id'] ?>"> <?= $linha_aluno['sexo'] ?><br>
                    <label>Data de nascimento: </label>
                    <input type="date" disabled="" name="dataN" value="<?= $linha_aluno['dataN'] ?>"><br>
                    <label> RG: </label>
                    <input type="text" disabled="" name="rg" value="<?= $linha_aluno['rg'] ?>"><br>
                    <label>CPF:</label> 
                    <input type="text" disabled="" name="cpf" value="<?= $linha_aluno['cpf'] ?>"><br>

                    <?php
                    $sql_renda = "select id, valor from renda order by id";

                    $retorno_renda = mysqli_query($conexao, $sql_renda);
                    ?>

                    <label>Renda familiar: </label> <select required="" name="renda_id">

                        <?php
                        while ($linha_renda = mysqli_fetch_array($retorno_renda)) {

                            $selecionado = '';

                            if ($linha_renda['id'] == $linha_aluno['renda_id']) {
                                $selecionado = 'selected';
                            }
                            ?>

                            <option <?= $selecionado ?> value="<?= $linha_renda['id'] ?>"><?= $linha_renda['valor'] ?></option>

                            <?php
                        }
                        ?>

                    </select> <br>

                    <label> Nacionalidade: </label>
                    <input type="text" disabled="" name="nacionalidade" value="<?= $linha_aluno['nacionalidade'] ?>"><br>
                </fieldset>
                <fieldset>
                    <legend>Endereço</legend>
                    <label>Bairro:</label>
                    <input type="text" required="" name="bairro" value="<?= $linha_aluno['bairro'] ?>"><br>
                    <label>Rua:</label>
                    <input type="text" required="" name="rua" value="<?= $linha_aluno['rua'] ?>"><br>
                    <label> Complemento:</label>
                    <input type="text" required="" name="complemento" value="<?= $linha_aluno['complemento'] ?>"><br>
                    <label> CEP:</label>
                    <input type="text" required="" name="cep" value="<?= $linha_aluno['cep'] ?>"><br>
                    <label>Número:</label>
                    <input type="number" required="" name="numero" value="<?= $linha_aluno['numero'] ?>"><br>
                </fieldset><br><br>

                <input class="btn" type="submit" value="Alterar">
            </form>


        </div>
        <?php
        require_once '../rodape.php';
        ?> 
