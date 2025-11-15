<?php
include "../initialConfig/conecta.php";

$email = $_GET['email'];
$professorLogin = $_GET['professorLogin'];

if ($professorLogin == "true"){

    $sql = "SELECT * FROM professor
            WHERE email = :email"; 
    $result = $conn -> prepare($sql);
    $result -> bindParam(':email', $email);
    $result -> execute();
    
    foreach($result as $linha){
        $nome = $linha['nome'];
        $email = $linha['email'];
        if(isset($linha['curso'])){
        $curso = $linha['curso'];
        }
    }

    setcookie("nomeProfessor", $nome, time() + (86400 * 7), "/");
    setcookie("emailProfessor", $email, time() + (86400 * 7), "/");
    if(isset($curso)){
    setcookie("curso", $curso, time() + (86400 * 30), "/");
    }
    
    header("Location: ../telaProfessor/telaInicial.php");
    exit;
}

else if ($professorLogin == "false"){

    $sql = "SELECT * FROM administrador
            WHERE email = :email";
    $result = $conn -> prepare($sql);
    $result -> bindParam(':email', $email);
    $result -> execute();

    foreach($result as $linha){
        $nome = $linha['nome'];
        $email = $linha['email'];
    }
    setcookie("NomeAdministrador", $nome, time() + (86400 * 30), "/");
    setcookie("emailAdministrador", $email, time() + (86400 * 30), "/");
    header("Location: ../telaAdmin/telaInicial.php");
    exit;
}

function deleteCookies(){

unset($_COOKIE['nomeProfessor']);
unset($_COOKIE['emailProfessor']);
unset($_COOKIE['curso']);

unset($_COOKIE['NomeAdministrador']);
unset($_COOKIE['emailAdministrador']);
}


?>