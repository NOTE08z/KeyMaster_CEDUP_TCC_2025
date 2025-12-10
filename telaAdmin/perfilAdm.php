<?php
include "../main/header.php";
$sql =  "SELECT id,nome,email FROM administrador WHERE email = :email";
$sql = $conn -> prepare($sql);
$sql -> bindParam('email',$_COOKIE['emailAdministrador']);
$sql -> execute();
$adm = $sql -> fetch();
?>

<link rel="stylesheet" href="../main/input.css">
<main>
<div class = "form-box">
<form action = "editarNomeAdm.php"> 
<input type = "text" name = "nome" value = "<?php echo $adm['nome']?>">
<input type = "text" name = "email" value ="<?php echo $adm['email']?>" disabled>
<input type = "submit" value = "editar seu Nome">
<input type = "hidden" name = "email" value = "<?php echo $adm['email']?>">
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