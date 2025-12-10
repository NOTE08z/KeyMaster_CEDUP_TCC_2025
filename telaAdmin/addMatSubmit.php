<?php

include '../initialConfig/conecta.php';
$materia = $_GET['nome'];
$curso_id = $_GET['curso_id'];

$sql="INSERT INTO materias (nome, fk_curso_id) VALUES (:materia, :curso_id)";
$stmt=$conn->prepare($sql);
$stmt->bindParam(':materia',$materia);
$stmt->bindParam(':curso_id',$curso_id);
$stmt->execute();
header('location:listaMaterias.php');
exit;
?>