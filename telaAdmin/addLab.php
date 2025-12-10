
<?php
include "../main/header.php";
?>
<link rel="stylesheet" href="../main/input.css">
    <main>
    <form action="addLabSubmit.php">
    <input type="text" placeholder="número do Laboratório" name= "num" id="num">
    <input type="text" placeholder="Número de computadores funcionando" name = "comp_funcionando" id="comp_funcionando">
    <input type="text" placeholder="Número total de computadores" name = "comp_total" id="comp_total">
    <input type="submit" value="Adicionar Laboratório">
    </form>
    <main>
<script>
let num = document.getElementById('num');
num.addEventListener('input', function(){
    num.value = num.value.replace(/\D/g, "");
});
let comp_funcionando = document.getElementById('comp_funcionando');
comp_funcionando.addEventListener('input', function(){
    comp_funcionando.value = comp_funcionando.value.replace(/\D/g, "");
});
let comp_total = document.getElementById('comp_total');
comp_total.addEventListener('input', function(){
    comp_total.value = comp_total.value.replace(/\D/g, "");
});

</script>
</html>