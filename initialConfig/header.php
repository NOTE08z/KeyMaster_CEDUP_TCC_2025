<?php 
include "../initialConfig/conecta.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="../initialConfig/headerInicial.css">
    <link rel="stylesheet" href="../initialConfig/telaAcesso.css">
     <link rel="stylesheet" href="../initialConfig/initialForm.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <title>KeyMaster</title>
    <link rel="icon" type="image/png" href="../imagens/logo.png">
    <style>
  @media (max-width: 900px) {
  main { flex-direction: column; padding: 20px; }
  .leftSide, .rightSide { flex-basis: auto; padding: 20px; width:100%; }
  .divbuttons { width:100%; }
  .form-cadastro { width: 92%; }
  }
  </style>
</head>
<body> 
<header class ="topo">
<div class="logo-container">
<a href="telaAcesso.php" style = "text-decoration:none">
  <img src="../imagens/header-icon.jpeg" class="header-icon">
  <span class="keymaster-logo-text">KEYMASTER</span>
</a>
</div>
<?php if (isset($_GET['professorLogin'])) { 
  
  $professorLogin = $_GET['professorLogin'];
  
  ?>
  <div class="header-buttons">
   <a href="telaLogin.php?professorLogin=<?php echo $professorLogin?>"><button class="btn btn-custom2" id="logInButton" style = "text-decoration:none">ENTRAR</button></a>
  <a href="telaCadastro.php?professorLogin=<?php  echo $professorLogin?>"><button class="btn btn-custom1" id="signUpButton" style = "text-decoration:none">CADASTRAR-SE</button></a>
  </div>
<?php }?>
</header>
