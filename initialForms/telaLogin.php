<?php 
include "../initialConfig/InitialHeader.php"; 
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
        <p style = "color:red" id = "senhaMinima">a senha deve ter no mínimo 8 caracteres</p>
  
      <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Mostrar senhas</label>
      </div>
      </div>

      <div class="mb-3">
    

    <button type="submit" class="btn btn-primary" id="initialButton">Entrar</button>
    
    <a href="telaCadastro.php?professorLogin=<?php echo $professorLogin;?>" class="formLink">Não Tem Cadastro?</a>
    <input type="hidden" name="professorLogin" id="professorLogin" value="<?php echo $professorLogin;?>">
  </form>

</div>
</main>
<script> src="validaForm.js"</script>
<script>

let email = document.getElementById("email");
let senha = document.getElementById("senha");
let p = document.getElementById("senhaMinima");

p.style.display = "none";
let button = document.getElementById("initialButton");
button.disabled = true;
senha.value.length = 0;
console.log(senha.value.length);

let checkbox = document.getElementById("exampleCheck1");
checkbox.addEventListener("click", function(){
checkBox()
});

senha.addEventListener("focus", function(){
validaSenha(senha, 8, p);
});
senha.addEventListener("input", function(){
validaSenha(senha, 8, p);
});

if(senha.value.length >= 8 && confirmaSenha.value.length >= 8 && nome.value.length >= 3 && email.value.length >= 3){
if(senha.value == confirmaSenha.value){
  button.removeEventListener("click",  buttonAlert);
  button.disabled = false;
}
  else if(senha.value != confirmaSenha.value){
    button.addEventListener("click",  buttonAlert);
    }
}

else if (senha.value.length < 2 || confirmaSenha.value.length < 2 || nome.value.length < 2 || email.value.length < 2){
button.disabled = true;
}

function buttonAlert(){
  alert("As senhas não coincidem. Por favor, verifique e tente novamente.");
  button.disabled = true;
}
</script>







