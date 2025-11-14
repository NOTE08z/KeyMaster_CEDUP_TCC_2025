<?php
include "../initialConfig/conecta.php";
$nome = $_GET['nome'];
$email = $_GET['email'];
$senha = $_GET['senha'];
$confirmaSenha = $_GET['confirmaSenha'];
$professorLogin = $_GET['professorLogin'];

if($professorLogin == true){
$sql = "SELECT COUNT(*) FROM professor
        WHERE nome = :nome
        AND email = :email";
$stmt = $conn -> prepare($sql);
$stmt -> bindParam(':nome', $nome);
$stmt -> bindParam(':email', $email);
$stmt -> execute();
}
else if($professorLogin == false){
$sql = "SELECT COUNT(*) FROM administrador
        WHERE nome = :nome
        AND email = :email";
$stmt = $conn -> prepare($sql);
$stmt -> bindParam(':nome', $nome);
$stmt -> bindParam(':email', $email);
$stmt -> execute();
}

$count = (int)$stmt -> fetchColumn();

if($senha == $confirmaSenha && $count < 1){
    if ($professorLogin == true){
        $sql = "INSERT INTO professor (nome,email,senha) VALUES (:nome,:email,:senha)";
        $sql = $conn -> prepare($sql);
        $sql -> bindParam(':nome', $nome);
        $sql -> bindParam(':email', $email);
        $sql -> bindParam(':senha', $senha);
        $sql -> execute();

           header("Location: ../main/loginSubmit.php?professorLogin=$professorLogin&loginConfirmado=true");
    exit;
        }
    
    if ($professorLogin == false){
        $sql = "INSERT INTO administrador (nome,email,senha) VALUES (:nome,:email,:senha)";
        $sql = $conn -> prepare($sql);
        $sql -> bindParam(':nome', $nome);
        $sql -> bindParam(':email', $email);
        $sql -> bindParam(':senha', $senha);
        $sql -> execute();
           header("Location: ../main/loginSubmit.php?professorLogin=$professorLogin&loginConfirmado=true");
    exit;
        }

    }
else if($senha != $confirmaSenha || $count >= 1 || empty($nome || $email || $senha)){
   header("Location: ../main/telaCadastro.php?professorLogin=$professorLogin");
    exit;
}    
else{
  header("Location: ../main/telaCadastro.php?professorLogin=$professorLogin");
    exit;
}
?>