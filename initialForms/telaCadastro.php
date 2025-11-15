<?php 
include "../initialConfig/InitialHeader.php"; 

$professorLogin = $_GET['professorLogin'];
?>



<main>

  <div class="initial-container">

    <form class="form-initial" id="formCadastro" action = "../initialForms/cadastroSubmit.php">
      <div class="mb-3">
        <label for="nome" class="form-label">Nome</label>
        <input type="text" name="nome" class="form-control" id="nome" value="">
      </div>

      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" class="form-control" id="email" value="">
      </div>

      <div class="mb-3">
        <label for="senha" class="form-label">Senha</label>
        <input type="password" name="senha" class="form-control" id="senha" value="">
        <p style = "color:red" id = "senhaMinima">a senha deve ter no mínimo 8 caracteres</p>
      </div>

      <div class="mb-3">
        <label for="confirmaSenha" class="form-label">Confirme sua senha</label>
        <input type="password" name="confirmaSenha" class="form-control" id="confirmaSenha" value="">
        <p style = "color:red" id = "confirmaSenhaMinima">a senha deve ter no mínimo 8 caracteres</p>


      </div>

    <button type="submit" class="btn btn-primary" id="initialButton">Cadastrar</button>
    
    <a href="telaLogin.php?professorLogin=<?php $professorLogin?>" class="formLink">Já tem cadastro?</a>
    
    <input type="hidden" name="professorLogin" id="professorLogin" value="<?php echo $professorLogin?>">
  </form>

</div>

</main>

<script>
let nome = document.getElementById("nome");
let email = document.getElementById("email");
let senha = document.getElementById("senha");
let confirmaSenha = document.getElementById("confirmaSenha");
let p = document.getElementById("senhaMinima");
let p2 = document.getElementById("confirmaSenhaMinima");

p.style.display = "none";
p2.style.display = "none";
let button = document.getElementById("initialButton");
button.disabled = true;
senha.value.length = 0;
console.log(senha.value.length);

nome.addEventListener("input", validaForm);
email.addEventListener("input", validaForm);
senha.addEventListener("input", validaForm);
confirmaSenha.addEventListener("input", validaForm);

function validaForm(){
console.log(senha.value);
console.log(confirmaSenha.value);

if(senha.value.length < 1){
p.style.display = "none";
}
else if(senha.value.length == 1){
p.style.display = "block";
}
else if (senha.value.length <=7){
p.style.display = "block";
}
else{
p.style.display = "none";
}
if(confirmaSenha.value.length < 1){
p2.style.display = "none";
}
else if(confirmaSenha.value.length == 1){
p2.style.display = "block";
}
else if (confirmaSenha.value.length <=7){
p2.style.display = "block";
}
else{
p2.style.display = "none";
}

if(senha.value.length >= 8 && confirmaSenha.value.length >= 8 && nome.value.length >= 3 && email.value.length >= 3){

  button.disabled = false;
  if(senha.value !== confirmaSenha.value){
    button.addEventListener("click",  buttonAlert);
    } 
}

else if (senha.value.length < 2 || confirmaSenha.value.length < 2 || nome.value.length < 2 || email.value.length < 2){
button.disabled = true;
}}

function buttonAlert(){
  alert("As senhas não coincidem. Por favor, verifique e tente novamente.");
  button.disabled = true;
}

</script>
