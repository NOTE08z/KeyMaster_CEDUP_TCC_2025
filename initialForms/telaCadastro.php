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
        <div>
        <input type="password" name="senha" class="form-control" id="senha" value="">
        <input type="checkbox" class="form-check-input" id="senhaCheckBox">
        </div>
      <p style = "color:red" id = "senhaMinima">a senha deve ter no mínimo 8 caracteres</p>
      </div>

    
      <div class="mb-3">
        <label for="confirmaSenha" class="form-label">Confirme sua senha</label>
        <input type="password" name="confirmaSenha" class="form-control" id="confirmaSenha" value="">
        <p style = "color:red" id = "confirmaSenhaMinima">a senha deve ter no mínimo 8 caracteres</p>

      <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="confirmaSenhaCheckBox">
      </div>
    </div>

    <button type="submit" class="btn btn-primary" id="initialButton">Cadastrar</button>
    
    <a href="telaLogin.php?professorLogin=<?php echo $professorLogin;?>" class="formLink">Já tem cadastro?</a>
    
    <input type="hidden" name="professorLogin" id="professorLogin" value="<?php echo $professorLogin?>">
  </form>

</div>

</main>
<script src="validaForm.js"></script>
<script>
  let form = document.getElementById("formCadastro");
let nome = document.getElementById("nome");
let email = document.getElementById("email");
const senha = document.getElementById("senha");
let confirmaSenha = document.getElementById("confirmaSenha");
let p = document.getElementById("senhaMinima");
let p2 = document.getElementById("confirmaSenhaMinima");
let checkBox1 = document.getElementById("senhaCheckBox");
checkBox1.addEventListener("click", function(){
checkBox(senha,checkBox1);
});
let checkBox2 = document.getElementById("confirmaSenhaCheckBox");
checkBox2.addEventListener("click",function(){
checkBox(confirmaSenha, checkBox2);
});

p.style.display = "none";
p2.style.display = "none";
let button = document.getElementById("initialButton");
button.disabled = true;
senha.value.length = 0;
console.log(senha.value.length);

form.addEventListener("change", checkButton)

senha.addEventListener("focus", function(){
validaSenha(senha, 8, p);
});
senha.addEventListener("input", function(){
validaSenha(senha, 8, p);
});

confirmaSenha.addEventListener("focus", function(){
validaSenha(confirmaSenha, 8, p2);
});
senha.addEventListener("input", function(){
validaSenha(confirmaSenha, 8, p2);
});

function checkButton(){
  console.log("está funfando");

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
}
</script>
