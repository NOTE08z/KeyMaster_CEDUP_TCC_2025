
<?php
include "../main/header.php";
?>
<link rel="stylesheet" href="../main/input.css">
<main>
<form action="addMatSubmit.php">
<input type="text" placeholder="Nome da Matéria" name = "nome"id="nome">
<select id = "curso_id" name="curso_id">
<?php
$sql="SELECT * FROM cursos";
$stmt=$conn->prepare($sql);
$stmt->execute();
$cursos=$stmt->fetchAll();
foreach($cursos as $c){
    echo "<option value='".$c['id']."'>".$c['nome']."</option>";
}
?>
</select>
<input type="submit" value="Adicionar Matéria">
</form>
</body>
</html>