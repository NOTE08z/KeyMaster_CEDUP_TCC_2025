<?php 
include "../initialConfig/InitialHeader.php";
?>

</header>

<main> 
    <div class = "leftSide">
      <div class = "texto">
        <h2>Seja Bem Vindo(a)!</h2>
        <p>Para começar, quem está acessando?</p>
        <div class = "divButtons">
        <a href="../initialConfig/convertePOST.php?professorLogin=false&header=telaLogin"><button type="button" class="btn btn-warning btn-custom" id="admButton">Sou Administrador</button></a>
            <a href = "../initialConfig/convertePOST.php?professorLogin=true&header=telaLogin"> 
            <button type="button" class="btn btn-warning btn-custom" id="professorButton">Sou Professor
            </button></a>
</div>
</div>
        
    </div>
    <div class = "rightSide">
    <img src="../imagens/tela-acesso.png" alt="" class = "img-dourada">
    </div>
</main>
</body>