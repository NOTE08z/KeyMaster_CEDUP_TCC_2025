<?php
include '../main/header.php';
if (!empty($_GET['id'])) {
  $id=$_GET['id'];
    $sql="SELECT * FROM lab WHERE id=:id LIMIT 1";
    $stmt=$conn->prepare($sql);
    $stmt->bindParam(':id',$id);
    $stmt->execute();
    $result=$stmt->fetch();
        
}
?>
<link rel="stylesheet" href="../main/input.css">
<main>
<div class="formulario">
<form action="editarLabSubmit.php" method="post">
    <label for="">ID </label>
    <input type="text" name="id" id="id" value="<?php echo $result['id'] ?> "  disabled  >
  <input type="text" name="num" id="num" value="<?php 
  echo $result['num']?>" >
   <input type="text" name="comp_f" id="comp_f" placeholder ="computadores funcionando" value="<?php 
  echo $result['computadores_funcionando']?>" >
   <input type="text" name="comp_t" id="comp_t" placeholder = "Quantidade total de computadores" value="<?php 
  echo $result['computadores_totais']?>" >

  <input type="hidden" name="id" id="id" value="<?php echo $result['id']?>">
    <input type="button" value="Enviar" id="button">
</form>
<a href="listaLab.php">Voltar à lista de laboratórios</a>
</div>
<script>
let comp_f = document.getElementById('comp_f');
let comp_t = document.getElementById('comp_t');
let button = document.getElementById('button');
button.addEventListener('click', function(){
if(comp_f.value > comp_t.value){
    alert("Número de computadores funcionando não pode ser maior que o número total de computadores.");
    comp_f.value = '';
    comp_t.value = '';
}
else{
    document.querySelector('form').submit();}
});
</script>