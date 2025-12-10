<?php
include "../initialConfig/conecta.php";
$nome = $_POST['nome'];
$email = $_POST['email'];
$getsenha = $_POST['senha'];
$senha = password_hash($getsenha, PASSWORD_ARGON2ID);

$professorLogin = $_POST['professorLogin'];
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
if($stmt){
$count = (int)$stmt -> fetchColumn();
}


if($count < 1){
    if ($professorLogin == "true"){
        $sql = "INSERT INTO professor (nome,email,senha) VALUES (:nome,:email,:senha)";
        $sql = $conn -> prepare($sql);
        $sql -> bindParam(':nome', $nome);
        $sql -> bindParam(':email', $email);
        $sql -> bindParam(':senha', $senha);
        $sql -> execute();
?>
       <?php }
    
    if ($professorLogin == "false"){
        $sql = "INSERT INTO administrador (nome,email,senha) VALUES (:nome,:email,:senha)";
        $sql = $conn -> prepare($sql);
        $sql -> bindParam(':nome', $nome);
        $sql -> bindParam(':email', $email);
        $sql -> bindParam(':senha', $senha);
        $sql -> execute();
        ?>
    <?php
        }

    }
else if($count  >= 1 || empty($nome || $email || $senha|| $stmt)){
  header("Location: ../initialConfig/convertePOST.php?professorLogin=$professorLogin&header=telaCadastro");
    exit;
}    
else{
header("Location: ../initialConfig/convertePOST.php?professorLogin=$professorLogin&header=telaCadastro&erro=true");
    exit;
}
?>
        <form class="form-initial" id="formLogin" action = "loginSubmit.php" method = "POST">
              <input type="text" name="nome" value="<?php echo $nome?>">
            <input type="text" name="email" value="<?php echo $email?>">
           <input type="text" name="professorLogin" value="<?php echo $professorLogin?>">
            <input type="text" name="loginConfirmado" value="true">
    </form>
<script>
let form = document.getElementById("formLogin");
form.submit();
</script>