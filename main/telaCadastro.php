<?php 
include "../config/header.php"; 

$professorLogin = $_GET['professorLogin'];
?>


<main>

  <div class="cadastro-container">

    <form class="form-cadastro" id="formCadastro" action = "cadastroSubmit.php">
      <div class="mb-3">
        <label for="nome" class="form-label">Nome</label>
        <input type="text" name="nome" class="form-control" id="nome">
      </div>

      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" class="form-control" id="email">
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

    <button type="submit" class="btn btn-primary" id="cadastrarButton">Me cadastre</button>
    
    <a href="telaLogin.php?professorLogin=<?php $professorLogin?>" class="formLink">Já tem cadastro?</a>
    
    <input type="hidden" name="professorLogin" id="professorLogin" value="<?php echo $professorLogin?>">
  </form>

</div>

</main>

<script>
let senha = document.getElementById("senha");
let confirmaSenha = document.getElementById("confirmaSenha");
let p = document.getElementById("senhaMinima");
let form = document.getElementById("formCadastro");
p.style.display = "none";
let button = document.getElementById("cadastrarButton");
button.disabled = true;
senha.value.length = 0;
console.log(senha.value.length);
senha.addEventListener("input", validaSenha);
confirmaSenha.addEventListener("input", validaSenha);

function validaSenha(){
senhaValue="";
if(senha.value.length < 1){
p.style.display = "none";
}
else if (senha.value.length <4){
p.style.display = "block";
}
else{
p.style.display = "none";
}
if(senha.value.length >= 4 && confirmaSenha.value.length >= 4){
button.disabled = false;
}
else{

button.disabled = true;

}
}





</script>
