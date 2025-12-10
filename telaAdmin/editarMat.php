<?php
include '../main/header.php';
if (!empty($_GET['id'])) {
    $id= $_GET['id'];
  $sql = "SELECT 
        m.id AS materia_id,
        m.nome AS materia_nome,
        c.id AS curso_id,
        c.nome AS curso_nome
    FROM materias m
    LEFT JOIN cursos c ON m.fk_curso_id = c.id
    WHERE m.id = :id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':id',$id);
$stmt->execute();
$materias = $stmt->fetch();

$sql = "SELECT * FROM cursos";
$stmt = $conn->prepare($sql);
$stmt->execute();
$cursos = $stmt->fetchAll();
}
?>
<link rel="stylesheet" href="../main/input.css">
<main>
<div class="formulario">
<form action="editarMatSubmit.php" method="post">
    <label for="">ID </label>
    <input type="text" name="id" id="id" value="<?php echo $materias['materia_id'] ?> "  disabled  >
  <input type="text" name="nome" id="nome" value="<?php 
  echo $materias['materia_nome']?>" >
<select name="curso_id" id="curso_id">
    <?php
    foreach ($cursos as $c) {
    $selected = ($materias["curso_id"] == $c["id"]) ? "selected" : "";
    echo "<option value='".$c["id"]."' $selected>".$c["nome"]."</option>";
    }
?>
</select>
  <input type="hidden" name="id" id="id" value="<?php echo $materias['materia_id']?>">
    <input type="submit" value="Enviar">
</form>
<a href="listaMaterias.php">Voltar à lista de matérias</a>
</div>