<?php
include "../initialConfig/conecta.php";
$email = $_POST['email'];
echo "<br>".$email;
$professorLogin = $_POST ['professorLogin'];
echo "<br>".$professorLogin;

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
    setcookie("curso", $curso, time() + (86400 * 7), "/");
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
    echo "<br>".$email;
    setcookie("NomeAdministrador", $nome, time() + (86400 * 7), "/");
    setcookie("emailAdministrador", $email, time() + (86400 * 7), "/");
    header("Location: ../telaAdmin/telaInicial.php");
    exit;
}

?>