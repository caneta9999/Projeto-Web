<!--
<?php
   include ("preparar_conexao.php");
try {
    $conx = new PDO("mysql:host=$host", $user, $pass);   
    $conx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    $criadb = "CREATE DATABASE $db";
    $conx->exec($criadb);
    echo "Database ok! <br>";     
}
catch(PDOException $e) {
    echo $criadb . "Falha na criação do DB:<br />" . $e->getMessage();
}  
try {	
      $criatb = "CREATE TABLE $db.$tb (
        `id`           INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
        `nome`      VARCHAR(50) NOT NULL,
        `email`      VARCHAR(50) NOT NULL,
        `idade` INT(6) NOT NULL,
	`profissao` VARCHAR(50) NOT NULL)";
      $conx->exec($criatb);
      echo "Tabela ok!<br>"; 
} 
catch(PDOException $e) {
      echo $criatb ."Falha Tabela:<br>". $e->getMessage(); 
}  
    require('conectar.php');
    $envio = filter_input(INPUT_POST,'envio',FILTER_SANITIZE_STRING);
    //$_SESSION['msgErr'] = 'oi'; 
    //echo $_SESSION['msgErr']; 
    if ($envio) {   
       $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
       $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
       $idade = filter_input(INPUT_POST,'idade',FILTER_SANITIZE_NUMBER_INT);
       $profissao = filter_input(INPUT_POST,'profissao',FILTER_SANITIZE_STRING);
    try {
            $ins = $conx->prepare("INSERT INTO $db.$tb (nome, email, idade, profissao) 
            VALUES (:nome, :email, :idade, :profissao)");
            $ins->bindParam(':nome', $nome);  
            $ins->bindParam(':email', $email);
            $ins->bindParam(':idade',$idade);
            $ins->bindParam(':profissao',$profissao); 
            $ins->execute(); 
            //header("Location: inserir.html");
    }
       catch(PDOException $e) {
           $msgErr = $ins . "Erro na inclusão:<br />" . $e->getMessage();
           $_SESSION['msgErr'] = $msgErr;            
            //header('Location: inserir.php');              
       }
    }
      //else {header('Location: inserir.php');
     // }
?>
