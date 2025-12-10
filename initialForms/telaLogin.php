<?php 
include "../initialConfig/initialHeader.php"; 
$professorLogin = $_POST['professorLogin'];
?>
</header>
<main>
    <div class="initial-container">
        <form class="form-initial" id="formLogin" action="loginSubmit.php" method="POST">
            
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" name="email" class="form-control" id="email" value="">
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

                <p style="color:red" id="senhaMinima">a senha deve ter no mínimo 8 caracteres</p>
                
            </div>
            <input type="hidden" name="professorLogin" id="professorLogin" value="<?php echo $professorLogin;?>">
            
            <br><br><br>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary" id="initialButton">Entrar</button>
                <a href="../initialConfig/convertePOST.php?professorLogin=<?php echo $professorLogin?>&header=telaCadastro" class="formLink">Não Tem Cadastro?</a>
            </div>
            
        </form>
    </div>
</main>
</div>
</main>
<?php
if(isset($_POST['erro'])){
echo "<script> alert('Login/Senha estão incorretos!');</script>";
}
?>
<script src="validaForm.js"></script>
<script>
   console.log(<?php echo $professorLogin;?>)
const form = document.getElementById("formLogin");
let email = document.getElementById("email");
const senha = document.getElementById("senha");
let p = document.getElementById("senhaMinima");
let checkBox1 = document.getElementById("senhaCheckBox");

checkBox1.addEventListener("click", function(){
checkBox(senha,checkBox1);
});
p.style.display = "none";
let button = document.getElementById("initialButton");
button.disabled = true;

senha.addEventListener("input",checkButton);
email.addEventListener("input",checkButton)
form.addEventListener("change", checkButton);

password(senha,8,p);


function checkButton(){
  console.log("funfou!");
if(senha.value.length >= 8 && email.value.length >= 3){
button.disabled = false;

}
else if (senha.value.length < 8 || email.value.length < 2){
button.disabled = true;
}
function buttonAlert(){
  alert("As senhas não coincidem. Por favor, verifique e tente novamente.");
  button.disabled = true;
}
}
</script>







