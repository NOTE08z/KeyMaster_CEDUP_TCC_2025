<?php 
include "../initialConfig/initialHeader.php"; 
$professorLogin = $_POST['professorLogin'];
?>

<main>
  <div class="initial-container">

    <form class="form-initial" id="formCadastro" action="cadastroSubmit.php" method="POST">

      <div class="mb-3">
        <label for="nome" class="form-label">Nome</label>
        <input type="text" name="nome" class="form-control" id="nome" value = "">
      </div>

      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" class="form-control" id="email" value = "">
      </div>

      <div class="mb-3">
        <label for="senha" class="form-label">Senha</label>
        
        <div class="d-flex align-items-center">
            <input type="password" name="senha" class="form-control" id="senha" value="">
            <div class="form-check ms-3">
                <input type="checkbox" class="form-check-input" id="senhaCheckBox">
                <label class="form-check-label" for="senhaCheckBox">Mostrar</label>
            </div>
        </div>
        
        <p style="color:red" id="senhaMinima">A senha deve ter no mínimo 8 caracteres</p>
      </div>

      <div class="mb-3">
        <label for="confirmaSenha" class="form-label">Confirme sua senha</label>
        
        <div class="d-flex align-items-center">
            <input type="password" name="confirmaSenha" class="form-control" id="confirmaSenha" value="">
            
            <div class="form-check ms-3">
                <input type="checkbox" class="form-check-input" id="confirmaSenhaCheckBox">
                <label class="form-check-label" for="confirmaSenhaCheckBox">Mostrar</label>
            </div>
        </div>
        
        <p style="color:red" id="confirmaSenhaMinima">A senha deve ter no mínimo 8 caracteres</p>
        
        </div>
 <br><br><br>
      <input type="hidden" name="professorLogin" value="<?php echo $professorLogin?>">
      <button type="submit" class="btn btn-primary" id="initialButton">Cadastrar</button>
      <a href="../initialConfig/convertePOST.php?professorLogin =<?php echo $professorLogin?>&header=telaLogin" class="formLink">Já tem cadastro?</a>
    </form>
   
  </div>
</main>
<?php
if(isset($_POST['erro'])){
echo "<script> alert('Login/Senha estão incorretos!');</script>";
}
?>
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

form.addEventListener("change", checkButtonLength);
nome.addEventListener("input", checkButtonLength);
email.addEventListener("input", checkButtonLength);
senha.addEventListener("input", checkButtonLength);
confirmaSenha.addEventListener("input", checkButtonLength);
password(senha,8,p);
password(confirmaSenha,8,p2);
button.addEventListener("click",checkButtonLength);

function emailValido(email) {
    const regex = /^[^\s@]+@[A-Za-z0-9]{3,}\.[A-Za-z0-9_-]+$/;
    return regex.test(email);
}

function checkButtonLength() {
  const emailValidoFlag = emailValido(email.value);

  if(
      senha.value.length >= 8 &&
      confirmaSenha.value.length >= 8 &&
      nome.value.length >= 3 &&
      emailValidoFlag
  ){
      button.disabled = false;
  } else {
      button.disabled = true;
  }
}

</script>
