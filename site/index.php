<?php
  if(!isset($_SESSION)) 
  { 
        session_start(); 
  } 
$msgErr = $_SESSION['msgErr'] ?? ' ';
require('conectar.php');
?>
<!Doctype html>
<html>
  <head>
    <meta charset="utf-8"/>
    <title>Meu terceiro site!</title>
    <meta name="viewport" content="widht=device-widht, initial-scale=1.0"/>
    <link rel ="stylesheet" href="../css/index.css"/>
  </script>
  </head>
  <body id="inicio">
    <div id="container">
    <header id ="cabecalho">
      <h1>PROJETO 2</h1>
    </header>
    <iframe style="display:none;" name="tabela" src="criar_banco_tabela.php"></iframe>
    <h2>Pesquisa anual de profissionais</h2>
    <div id="total">
    <div id="informacoes">
    <div id="form">
      <form method="POST" action="criar_banco_tabela.php" id="form" target="tabela"><!--action="text/plain"-->
        <p><label for="inome">Nome:</label><input type="text" id="inome" maxlength="40" placeholder="Nome" required="required" name = "nome"></p>
        <p><label for="iidade">Idade:</label> <input type="number" id = "iidade" min="14" max="70" step="1" placeholder="Idade" required="required" name = "idade"></p>
        <p><label for="iemail">Email:</label><input type="email" id="iemail" maxlength="50" placeholder="email" required="required" name= "email"></p>
        <p><label for="iprofissao">Profissão:</label><input type="text" id="iprofissao" maxlength="40" placeholder="Profissão" required="required" name="profissao"></p>
        <p><label for="iarea">Área do seu emprego atual:</label>
        <select name="narea" id="iarea">
            <option value="humanas">Humanas</option>
            <option value="exatas">Exatas</option>
            <option value="biologicas">Biológicas</option>
            <option value="nenhuma">Nenhuma área específica</option>
        </select></p>
        <p><input type="checkbox" name="nexperiente" id="iexperiente" checked />Já possui experiência nessa área?</p>
        <input type="submit" id="ienviar" name = "envio" value="Enviar" />
      </form>
    </div>
    <div id="img">
    </div>
    </div>
    <div id="informacoes2">
    <div id="dados">
      Nome: <br/>
      Email: <br/>
      Idade: <br />
      Profissão: <br />
      Experiência: <br />
    </div>
    <div id="animacao">
    </div>
    </div>
    </div>
    <div id="tabela">
    <h2>Últimos visitantes</h2>
    <?php
        try { 
            $sel = "SELECT * FROM $db.$tb ORDER BY id DESC LIMIT 5"; 
            foreach($conx->query($sel) as $linha_array) {
            echo "<hr /><p><b>NOME</b>: ". $linha_array['nome'] ."</p>";
            echo "<p><b>IDADE</b>: ". $linha_array['idade'] ."</p>";
            echo "<p><b>PROFISSAO</b>: ".$linha_array['profissao'] ."</p>";}
          echo"<hr />";}
        catch (PDOException $e) {
	        echo "Consulta falha...<br />" . $e->getMessage();	
        }
        $conx = null;     
    ?>
    </div>
    <script>
    </script>
  <footer id="footer">
    <address><p>&copy;PROJETO WEB</p></address>
  </footer>
  </div>
  </body>
<script src="../js/js.js"></script>
</html>
