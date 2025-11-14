<?php 
include "../initialConfig/header.php"; 

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
        <p style = "color:red" id = "senhaMinima">a senha deve ter no mínimo 3 caracteres</p>
      </div>

      <div class="mb-3">
        <label for="confirmaSenha" class="form-label">Confirme sua senha</label>
        <input type="password" name="confirmaSenha" class="form-control" id="confirmaSenha">

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

p.style.display = "none";
let button = document.getElementById("initialButton");
button.disabled = true;
senha.value.length = 0;
console.log(senha.value.length);

nome.addEventListener("input", validaForm);
email.addEventListener("input", validaForm);
senha.addEventListener("input", validaForm);
confirmaSenha.addEventListener("input", validaForm);

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

if(senha.value.length >= 3 && confirmaSenha.value.length >= 3 && nome.value.length >= 3 && email.value.length >= 3){
button.disabled = false;
}
else{
button.disabled = true;
}
}

</script>
