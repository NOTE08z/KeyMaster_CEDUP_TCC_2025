<?php
include "../initialConfig/header.php"; 
$professorLogin = $_GET['professorLogin'];
$confirmaFromCadastro = $_GET["loginConfirmado"];
$email = $_GET['email'];
$senha = $_GET['senha'];
$loginConfirmado = false;

if(isset($confirmaFromCadastro)){
$loginConfirmado = $confirmaFromCadastro;
}

if($professorLogin = true){
$sql = "SELECT COUNT(*) FROM professor
        WHERE email = :email
        AND senha = :senha";
$count = $conn -> prepare($sql);
$count -> bindParam(':email',$email);
$count -> bindParam(':senha',$senha);
$count -> execute();
$count -> fetch();
}
else if($professorLogin = false){
$sql = "SELECT COUNT(*) FROM administrador
        WHERE email = :email
        AND senha = :senha";
$count = $conn -> prepare($sql);
$count -> bindParam(':email',$email);
$count -> bindParam(':senha',$senha);
$count -> execute();
$count -> fetch();
}

else if (empty($nome || $email || $senha)){
   header("Location: ../main/telaCadastro.php?professorLogin=$professorLogin");
}
else{
header("Location: ../main/telaAcesso.php");
}

if($count = 1){

$loginConfirmado = true;

}
else{
    header("Location: ../main/telaLogin.php?professorLogin=<?php $professorLogin?>");
}
if($loginConfirmado = true){
    if($professorLogin = true){
    header("Location: ../telaProfessor/telaInicial.php");
    }
    else{
    header("Location: ../telaProfessor/telaInicial.php");
    }
}
else{
header("Location: ../main/telaLogin.php?professorLogin=$professorLogin");    
}
?>