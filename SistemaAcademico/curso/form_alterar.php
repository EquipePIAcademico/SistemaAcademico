<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Alterar Cadastro</title>
        <link href="../css/estilo.css" rel="stylesheet">
        <link href="../css/form.css" rel="stylesheet">
    </head>
    <body>
        <div id="interface">
            <?php
            include '../cabecalho.php';
            ?>  


            <?php
            $id = $_GET['id'];
            include '../bd/conectar.php';
            $sql_curso = "select * from curso where id = $id";

            $resultado_curso = mysqli_query($conexao, $sql_curso);

            $linha_curso = mysqli_fetch_array($resultado_curso);
            ?>


            <h3 id="cadastro">Alterar Cadastro</h3>
            <form method="post" action="alterar.php">
                <input type="hidden" name="id" value="<?= $id ?>">

                <?php
                $sql_tipo = "select id, nome from tipo order by nome";

                $retorno_tipo = mysqli_query($conexao, $sql_tipo);
                ?>

                <label>Tipo de curso:</label> <select disabled="" name="tipo_id">

                    <?php
                    while ($linha_tipo = mysqli_fetch_array($retorno_tipo)) {

                        $selecionado = '';

                        if ($linha_tipo['id'] == $linha_curso['tipo_id']) {
                            $selecionado = 'selected';
                        }
                        ?>

                        <option <?= $selecionado ?> value="<?= $linha_tipo['id'] ?>"><?= $linha_tipo['nome'] ?></option>

                        <?php
                    }
                    ?>

                </select> <br>

                <label>Nome do curso: </label>
                <input type="text" required="" name="nome" value="<?= $linha_curso['nome'] ?>"><br>
                <label>Descrição: </label>
                <input type="text" required="" name="descricao" value="<?= $linha_curso['descricao'] ?>"><br>
                <label>Carga horária: </label>
                <input type="number" required="" name="carga_horaria" value="<?= $linha_curso['carga_horaria'] ?>"><br>
                <label>Ano de início: </label>
                <input type="text" required="" name="anoInicio" value="<?= $linha_curso['anoInicio'] ?>"><br>
                
                
                <label>Semestre de início:</label> <select required="" name="semestreInicio">
                    <?php
                    if ($linha_curso['semestreInicio'] == "01"){
                    ?>
                    <option selected="" value="01">01</option>
                    <option value="02">02</option>
                    <?php
                    } else {
                    ?>   
                    <option value="01">01</option>
                    <option selected="" value="02">02</option>
                    <?php    
                    }
                    ?>
                </select> <br>               
                
                <label>Ano de término: </label>
                <input type="text" required="" name="anoTermino" value="<?= $linha_curso['anoTermino'] ?>"><br>
                
                <label>Semestre de término:</label> <select required="" name="semestreTermino">
                    <?php
                    if ($linha_curso['semestreTermino'] == "01"){
                    ?>
                    <option selected="" value="01">01</option>
                    <option value="02">02</option>
                    <?php
                    } else {
                    ?>   
                    <option value="01">01</option>
                    <option selected="" value="02">02</option>
                    <?php    
                    }
                    ?>
                </select> <br>   
                
                <?php
                $sql_turno = "select id, nome from turno order by id";

                $retorno_turno = mysqli_query($conexao, $sql_turno);
                ?>

                <label>Turno:</label> <select required="" name="turno_id">

                    <?php
                    while ($linha_turno = mysqli_fetch_array($retorno_turno)) {

                        $selecionado = '';

                        if ($linha_turno['id'] == $linha_curso['turno_id']) {
                            $selecionado = 'selected';
                        }
                        ?>

                        <option <?= $selecionado ?> value="<?= $linha_turno['id'] ?>"><?= $linha_turno['nome'] ?></option>

                        <?php
                    }
                    ?>

                </select> <br>

                <input class="btn" type="submit" value="Alterar">
            </form>

        </div>
        <?php
        require_once '../rodape.php';
        ?>