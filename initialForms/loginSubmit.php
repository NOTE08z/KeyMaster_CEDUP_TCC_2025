<?php
include "../initialConfig/conecta.php";
$professorLogin = $_POST['professorLogin'] ?? '';
$email = $_POST['email'] ?? '';
$senha = $_POST['senha'] ?? '';
echo "<br>".$senha;
echo "<br>".$email;
echo "<br>".$professorLogin;
$loginConfirmado = $_POST["loginConfirmado"] ?? 'false';
echo $loginConfirmado;


if($professorLogin == "true"){
$sql = "SELECT COUNT(*) FROM professor
        WHERE email = :email";
$sql = $conn -> prepare($sql);
$sql -> bindParam(':email',$email);
$sql -> execute();
$count = (int)$sql -> fetch();

$sql = "SELECT * FROM professor WHERE email = :email";
$stmt = $conn -> prepare($sql);
$stmt -> bindParam(':email',$email);
$stmt -> execute();
$usuario = $stmt->fetch();

if($count == 1 && password_verify($senha, $usuario['senha'] )|| $loginConfirmado == "true"){
$loginConfirmado = "true";
login($loginConfirmado,$email,$professorLogin);
}
else{
header("location: ../convertePOST.php?professorLogin=$professorLogin&header=loginSubmit&erro=true");
exit;       
}
}
else if($professorLogin == "false"){
$sql = "SELECT COUNT(*) FROM administrador
        WHERE email = :email";
$sql = $conn -> prepare($sql);
$sql -> bindParam(':email',$email);
$sql -> execute();
$count = (int)$sql -> fetch();

$sql = "SELECT * FROM administrador WHERE email = :email";
$stmt = $conn -> prepare($sql);
$stmt -> bindParam(':email',$email);
$stmt -> execute();
$usuario = $stmt->fetch();

if($count == 1 && password_verify($senha, $usuario['senha'])  || $loginConfirmado == "true"){
$loginConfirmado = "true";
login($loginConfirmado,$email,$professorLogin);
}
else{
header("location: ../initialConfig/convertePOST.php?professorLogin=$professorLogin&header=telaLogin&erro=1");
}
}
function login($loginConfirmado,$email,$professorLogin){
if($loginConfirmado == "true"){?>
        
        <form class="form-initial" id="formLogin" action = "../main/cookies.php" method = "POST">
        <input type="hidden" name="email" value="<?php echo $email?>">
        <input type="hidden" name="professorLogin" value="<?php echo $professorLogin?>">
    </form>
<script>
let form = document.getElementById("formLogin");
form.submit();
</script>
<?php
}
}
?>