<!DOCTYPE html>
<html>
    <head>
        <title>Cadastrar Turma</title>
        <meta charset="utf-8">
        <link href="../css/estilo.css" rel="stylesheet">
        <link href="../css/form.css" rel="stylesheet">
          <style>
    .button:hover {
    background-color:green; /* Green */
    color: white;
    
}
.button{
      background-color: ;
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
            <h3 id="cadastro">Cadastrar Turma</h3>
            <form method="post" action="inserir.php">

                <label class="espacamento">Número de vagas: </label>
                <input type="number" required="" name="nVagas" class="espacamento"><br>

                <?php
                include '../bd/conectar.php';

                $sql_disciplina = "select disciplina.id, disciplina.nome as disc_nome, curso.nome as curso_nome from disciplina join curso on curso.id=disciplina.curso_id order by disc_nome";
                $retorno_disciplina = mysqli_query($conexao, $sql_disciplina);
                ?>

                <label>Disciplina da turma: </label>
                <select name="disciplina_id" style="width: 220px;">

                    <?php
                    while ($linha_disciplina = mysqli_fetch_array($retorno_disciplina)) {
                        ?>

                        <option value="<?= $linha_disciplina['id'] ?>"><?= $linha_disciplina['disc_nome'] ?> - <?= $linha_disciplina['curso_nome'] ?></option>

                        <?php
                    }
                    ?>

                </select> <br>

                <?php
                $sql_semestre = "select semestre.id, semestre.valor from semestre order by id";
                $retorno_semestre = mysqli_query($conexao, $sql_semestre);
                ?>

                <label>Semestre:</label> <select name="semestre_id" style="width: 220px;">

                    <?php
                    while ($linha_semestre = mysqli_fetch_array($retorno_semestre)) {
                        ?>

                        <option value="<?= $linha_semestre['id'] ?>"><?= $linha_semestre['valor'] ?></option>

                        <?php
                    }
                    ?>

                </select> <br>

                <?php
                $sql_professor = "select usuario.id, usuario.nome, usuario.perfil_acesso from usuario order by nome";
                $retorno_professor = mysqli_query($conexao, $sql_professor);
                ?>

                <label>Professor:</label> <select name="professor_id" style="width: 220px;">

                    <?php
                    while ($linha_professor = mysqli_fetch_array($retorno_professor)) {
                        if ($linha_professor['perfil_acesso'] == 'professor(a)') {
                            ?>

                            <option value="<?= $linha_professor['id'] ?>"><?= $linha_professor['nome'] ?></option>

                            <?php
                        }
                    }
                    ?>

                </select> <br>
              <button class="button">Inserir</button>
            </form>
        </div>
        <?php
        include '../rodape.php';
        ?>  