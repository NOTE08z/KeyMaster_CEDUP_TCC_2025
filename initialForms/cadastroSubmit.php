<?php
include "../initialConfig/conecta.php";
$nome = $_GET['nome'];
echo "<br>".$nome;
$email = $_GET['email'];
$getsenha = $_GET['senha'];
$senha = password_hash($getsenha, PASSWORD_ARGON2ID);
echo $senha;
$professorLogin = $_GET['professorLogin'];

echo "<br>".$professorLogin;

if($professorLogin == "true"){
$sql = "SELECT COUNT(*) FROM professor
        WHERE nome = :nome
        AND email = :email";
$stmt = $conn -> prepare($sql);
$stmt -> bindParam(':nome', $nome);
$stmt -> bindParam(':email', $email);
$stmt -> execute();
}
else if($professorLogin == "false"){
$sql = "SELECT COUNT(*) FROM administrador
        WHERE nome = :nome
        AND email = :email";
$stmt = $conn -> prepare($sql);
$stmt -> bindParam(':nome', $nome);
$stmt -> bindParam(':email', $email);
$stmt -> execute();
}

$count = (int)$stmt -> fetchColumn();
echo "<br> ".$count;

if($count < 1){
    if ($professorLogin == "true"){
        $sql = "INSERT INTO professor (nome,email,senha) VALUES (:nome,:email,:senha)";
        $sql = $conn -> prepare($sql);
        $sql -> bindParam(':nome', $nome);
        $sql -> bindParam(':email', $email);
        $sql -> bindParam(':senha', $senha);
        $sql -> execute();

          header("Location: ../initialForms/loginSubmit.php?professorLogin=$professorLogin&loginConfirmado=true");
    exit;
        }
    
    if ($professorLogin == "false"){
        echo "<br>"."entrou aqui";
        $sql = "INSERT INTO administrador (nome,email,senha) VALUES (:nome,:email,:senha)";
        $sql = $conn -> prepare($sql);
        $sql -> bindParam(':nome', $nome);
        $sql -> bindParam(':email', $email);
        $sql -> bindParam(':senha', $senha);
        $sql -> execute();
         header("Location: ../initialForms/loginSubmit.php?professorLogin=$professorLogin&loginConfirmado=true");
    exit;
        }

    }
else if($count >= 1 || empty($nome || $email || $senha)){
     echo "<br>"." sss";
  header("Location: ../initialForms/telaCadastro.php?professorLogin=$professorLogin");
    exit;
}    
else{
        echo "<br>"." nnn";
header("Location: ../initialForms/telaCadastro.php?professorLogin=$professorLogin");
    exit;
}
?>