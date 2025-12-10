<?php
include '../main/header.php';
if (!empty($_GET['id'])) {
  $id=$_GET['id'];
    $sql="SELECT * FROM cursos WHERE id=:id LIMIT 1";
    $stmt=$conn->prepare($sql);
    $stmt->bindParam(':id',$id);
    $stmt->execute();
    $result=$stmt->fetch();
        
}
?>

<link rel="stylesheet" href="../main/input.css">
<main>
<div class="formulario">
<form action="editarCursosSubmit.php" method="post">
    <label for="">ID </label>
    <input type="text" name="id" id="id" value="<?php echo $result['id'] ?> "  disabled  >
  <input type="text" name="nome" id="nome" value="<?php 
  echo $result['nome']?> " >

  <input type="hidden" name="id" id="id" value="<?php echo $result['id']?>">
    <input type="submit" value="Enviar">
</form>
<a href="listaCursos.php">Voltar à lista de cursos</a>
</div>