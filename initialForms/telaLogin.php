<?php 
include "../initialConfig/header.php"; 
$professorLogin = $_GET['professorLogin'];
?>
</header>
<main>
  <div class="initial-container">
<form class="form-initial" id="formCadastro" action = "loginSubmit.php">
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="text" name="email" class="form-control" id="email">
      </div>

      <div class="mb-3">
        <label for="senha" class="form-label">Senha</label>
        <input type="password" name="senha" class="form-control" id="senha">
        <p style = "color:red" id = "senhaMinima">a senha deve ter no mínimo 3 caracteres</p>
  
      </div>

      <div class="mb-3">
    

    <button type="submit" class="btn btn-primary" id="initialButton">Entrar</button>
    
    <a href="telaCadastro.php?professorLogin=<?php $professorLogin?>" class="formLink">Não Tem Cadastro?</a>
    
    <input type="hidden" name="professorLogin" id="professorLogin" value="<?php echo $professorLogin?>">
  </form>

</div>
</main>

<script>

let email = document.getElementById("email");
let senha = document.getElementById("senha");
let p = document.getElementById("senhaMinima");

p.style.display = "none";
let button = document.getElementById("initialButton");
button.disabled = true;
senha.value.length = 0;
console.log(senha.value.length);

email.addEventListener("input", validaForm);
senha.addEventListener("input", validaForm);

function validaForm(){
  console.log("entrou!");
senhaValue="";
if(senha.value.length < 1){
p.style.display = "none";
}
else if (senha.value.length <3){
p.style.display = "block";
}
else{
p.style.display = "none";
}

if(senha.value.length >= 3 && email.value.length >= 3){
button.disabled = false;
}
else{
button.disabled = true;
}
}

</script>






</script>

