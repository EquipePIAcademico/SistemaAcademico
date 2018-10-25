<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <meta charset="utf-8">
        <link href="../css/estilo.css" rel="stylesheet">
        <link href="../css/form.css" rel="stylesheet">
          <style> 
               p{
                    border-bottom: 2px #dddddd double;
                     height: 100px;
                     margin-top: 0px;
               }
               
               
        </style> 
    </head>
    <body>
        <div id="interface">
            <?php
            //include '../cabecalho.php';
         ?><br><br><?php
            echo '<p>Seja Bem-Vindo(a)</p>';
            ?>        
            <h3 id="cadastro">Acesso</h3>
            <form method="post" action="logar.php">
                <label> Perfil de acesso:</label> 
                <select name="perfil_acesso" style="width: 220px;">
                    <option value="secretario(a)">Secretário(a)</option>
                    <option value="professor(a)">Professor(a)</option>
                </select><br>

                <label>Username: </label>
                <input type="text" name="username"><br>
                <label> Password: </label>
                <input type="password" name="password"><br><br>
                <input class="btn" type="submit" value="Logar">
                <input class="btn" type="reset" value="Limpar">
            </form>

            <?php
            include '../rodape.php';
            ?>
        </div>
    </body>
</html>