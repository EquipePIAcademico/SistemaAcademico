<!DOCTYPE html>
<html>
    <head>
        <title>Cadastrar Usuário</title>
        <meta charset="utf-8">
        <link href="../css/estilo.css" rel="stylesheet">
        <link href="../css/form.css" rel="stylesheet">
          <script>
function formatar(mascara, documento){
  var i = documento.value.length;
  var saida = mascara.substring(0,1);
  var texto = mascara.substring(i)
  
  if (texto.substring(0,1) != saida){
            documento.value += texto.substring(0,1);
  }
  
}
 
</script>
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
            <h3 id="cadastro">Cadastrar Usuário</h3>
            <form method="post" action="inserir.php">
                <label class="espacamento"> Nome: </label>
                <input type="text" required="" name="nome" class="espacamento"><br>
               <label> E-mail:  </label>
                <input type="email" required="" name="email"><br>
                <label>Data de nascimento:  </label>
                <input type="date" required="" name="dataN" style="width: 220px;"><br>
               <label> CPF:  </label>
                <input type="text" required="" name="cpf" maxlength="14" OnKeyPress="formatar('###.###.###-##', this)"><br>
                <label>Perfil de acesso:  </label>
                <select name="perfil_acesso">
                    <option value="secretario(a)">Secretário(a)</option>
                    <option value="professor(a)">Professor(a)</option>
                </select><br>
                <label>Username:  </label>
                <input type="text" required="" name="username"><br>
                <label>Password: </label>
                <input type="password" required="" name="password"><br><br>
                  <button class="button">Inserir</button>
            </form>

            <?php
            include '../rodape.php';
            ?>
        </div>
    </body>
</html>