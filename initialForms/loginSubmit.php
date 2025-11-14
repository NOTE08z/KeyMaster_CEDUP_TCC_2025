<?php
include "../initialConfig/header.php";
echo "<br>"."<br>"."<br>"."<br>"."<br>";
$professorLogin = $_GET['professorLogin'];
$email = $_GET['email'];
$senha = $_GET['senha'];
$loginConfirmado = false;

if(isset($_GET["loginConfirmado"])){
$loginConfirmado = $_GET["loginConfirmado"];
}

if($professorLogin == "true"){
$sql = "SELECT COUNT(*) FROM professor
        WHERE email = :email";
$count = $conn -> prepare($sql);
$count -> bindParam(':email',$email);

$count -> execute();
$count -> fetch();

$stmt = $conn->prepare("SELECT id, senha FROM professor WHERE email = :email");
$stmt->execute([':email' => $email]);
$usuario = $stmt->fetch();


}
else if($professorLogin == "false"){
$sql = "SELECT COUNT(*) FROM administrador
        WHERE email = :email";
$count = $conn -> prepare($sql);
$count -> bindParam(':email',$email);
$count -> execute();
$count -> fetch();



$stmt = $conn->prepare("SELECT id, senha FROM administrador WHERE email = :email");
$stmt->execute([':email' => $email]);
$usuario = $stmt->fetch();

}

else if (empty($nome || $email || $senha)){
header("Location: ../initialForms/telaCadastro.php?professorLogin=$professorLogin");
}
else{
header("Location: ../initialForms/telaAcesso.php");
}

if($count = 1 && password_verify($senha, $usuario['senha'])){
echo "login confirmado";
$loginConfirmado = true;

}

else{
    header("Location: ../main/telaLogin.php?professorLogin=<?php $professorLogin?>");
}
if($loginConfirmado == true){
    if($professorLogin == true){
    header("Location: ../main/cookies.php");
    }
    else{
    header("Location: ../main/cookies.php");
    }
}
else{
header("Location: ../initialForms/telaLogin.php?professorLogin=$professorLogin");    
}
?>