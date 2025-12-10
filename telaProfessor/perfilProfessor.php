<?php
include "../main/header.php";
$sql =  "SELECT id,nome,email FROM professor WHERE email = :email";
$sql = $conn -> prepare($sql);
$sql -> bindParam('email',$_COOKIE['emailProfessor']);
$sql -> execute();
$prof = $sql -> fetch();
?>

<link rel="stylesheet" href="../main/input.css">
<main>
<div class = "form-box">
<form action = "editarNomeProfessor.php"> 
<input type = "text" name = "nome" value = "<?php echo $prof['nome']?>">
<input type = "text" name = "email" value ="<?php echo $prof['email']?>" disabled>
<input type = "submit" value = "editar seu Nome">
<input type = "hidden" name = "email" value = "<?php echo $prof['email']?>">
</form>
<form action = "../main/LogOut.php" id = "logOut">
<input type = "button" id = "button" value ="Sair da conta">
<a href = "telaInicial.php" class="a"> Retornar ao Menu Principal</a>
</form>
</div>
</body>
<script>
let form = document.getElementById("logOut");
let button = document.getElementById("button");
button.addEventListener("click",function(){
let logOut = confirm("Realmente deseja Sair?");
if (logOut){

    form.submit();
    
}
})


</script>
</html>