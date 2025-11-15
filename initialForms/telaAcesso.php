<?php 
include "../initialConfig/InitialHeader.php";
?>

</header>

<main> 
    <div class = "leftSide">

      <div class = "texto">
        <h2>Seja Bem Vindo(a)!</h2>
        <p>Para começar, quem está acessando?</p>
      </div>
        <div class="divbuttons">

            <a href="telaLogin.php?professorLogin=false">  
                <button type="button" class="btn btn-warning btn-custom" id="admButton">Sou Administrador</button>
            </a>

            <a href = "telaLogin.php?professorLogin=true"> 
                <button type="button" class="btn btn-warning btn-custom" id="professorButton">Sou Professor </button>
            </a>

        </div>
    
    </div>
    <div class = "rightSide">
    <img src="../imagens/tela-acesso.png" alt="" class = "img-dourada">
    </div>
</main>
</body>