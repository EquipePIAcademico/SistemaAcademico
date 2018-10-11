<!DOCTYPE html>
<html>
    <head>
        <title>Alterar Cadastro</title>
        <meta charset="utf-8">
        <link href="../css/estilo.css" rel="stylesheet">
        <link href="../css/form.css" rel="stylesheet">
          <style>
    .button:hover {
    background-color:blue; /* Green */
    color: white;
    
}
.button{
      
    color: #2E2E2E;
    border: 2px solid #A4A4A4;
    cursor: pointer;
    border-radius: 5px;
    padding: 10px;
    font-size: 15px;
    margin-bottom: 20px;
}
</style>
    </head>
    <body>
        <div id="interface">



            <?php
            include '../cabecalho.php';
            ?>  

            <?php
            $id = $_GET['id'];
            include '../bd/conectar.php';
            $sql = "select * from turma where id = $id";

            $resultado = mysqli_query($conexao, $sql);

            $linha = mysqli_fetch_array($resultado);
            ?>


            <h3 id="cadastro">Alterar Cadastro</h3>
            <form method="post" action="alterar.php">
                <input type="hidden" name="id" value="<?= $id ?>">

                <label class="espacamento">Número de vagas:</label> 
                <input type="number" required="" name="nVagas" class="espacamento" value="<?= $linha['nVagas'] ?>"><br>

                <?php
                $sql_disciplina = "select disciplina.id, disciplina.nome as disc_nome, curso.nome as curso_nome from disciplina join curso on curso.id=disciplina.curso_id order by curso_nome";

                $retorno_disciplina = mysqli_query($conexao, $sql_disciplina);
                ?>

                <label>Disciplina da turma:</label> <select name="disciplina_id" style="width: 220px;">

                    <?php
                    while ($linha_disciplina = mysqli_fetch_array($retorno_disciplina)) {

                        $selecionado = '';

                        if ($linha_disciplina['id'] == $linha['disciplina_id']) {
                            $selecionado = 'selected';
                        }
                        ?>

                        <option <?= $selecionado ?> value="<?= $linha_disciplina['id'] ?>"><?= $linha_disciplina['disc_nome'] ?> - <?= $linha_disciplina['curso_nome'] ?></option>

                        <?php
                    }
                    ?>

                </select> <br>

                <?php
                $sql_semestre = "select id, valor from semestre order by id";

                $retorno_semestre = mysqli_query($conexao, $sql_semestre);
                ?>

                <label>Semestre:</label> <select name="semestre_id" style="width: 220px;">

                    <?php
                    while ($linha_semestre = mysqli_fetch_array($retorno_semestre)) {

                        $selecionado = '';

                        if ($linha_semestre['id'] == $linha['semestre_id']) {
                            $selecionado = 'selected';
                        }
                        ?>

                        <option <?= $selecionado ?> value="<?= $linha_semestre['id'] ?>"><?= $linha_semestre['valor'] ?></option>

                        <?php
                    }
                    ?>

                </select> <br>

                <?php
                $sql_professor = "select id, nome from usuario where perfil_acesso = 'professor(a)' order by nome";

                $retorno_professor = mysqli_query($conexao, $sql_professor);
                ?>

                <label>Professor:</label> <select name="professor_id" style="width: 220px;">

                    <?php
                    while ($linha_professor = mysqli_fetch_array($retorno_professor)) {

                        $selecionado = '';

                        if ($linha_professor['id'] == $linha['professor_id']) {
                            $selecionado = 'selected';
                        }
                        ?>

                        <option <?= $selecionado ?> value="<?= $linha_professor['id'] ?>"><?= $linha_professor['nome'] ?></option>

                        <?php
                    }
                    ?>

                </select> <br>

                 <button class="button">Alterar</button>
            </form>
        </div>
        <?php
        require_once '../rodape.php';
        ?>