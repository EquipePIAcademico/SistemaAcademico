<!DOCTYPE html>
<html>
    <head>
        <title>Cadastrar Usuário</title>
        <meta charset="utf-8">
        <link href="../css/estilo.css" rel="stylesheet">
        <link href="../css/form.css" rel="stylesheet">
    </head>
    <body>
        <div id="interface">

            <?php
            include '../cabecalho.php';
            ?>  
            <h3 id="cadastro">Cadastrar Usuário</h3>
            <form method="post" action="inserir.php">
                <label> Nome: </label>
                <input type="text" required="" name="nome"><br>
               <label> E-mail:  </label>
                <input type="email" required="" name="email"><br>
                <label>Data de nascimento:  </label>
                <input type="date" required="" name="dataN"><br>
               <label> CPF:  </label>
                <input type="text" required="" name="cpf"><br>
                <label>Perfil de acesso:  </label>
                <select name="perfil_acesso">
                    <option value="secretario(a)">Secretário(a)</option>
                    <option value="professor(a)">Professor(a)</option>
                </select><br>
                <label>Username:  </label>
                <input type="text" required="" name="username"><br>
                <label>Password: </label>
                <input type="password" required="" name="password"><br><br>
                <input class="btn" type="submit" value="Inserir">
            </form>

            <?php
            include '../rodape.php';
            ?>
        </div>
    </body>
</html>