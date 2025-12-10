<?php
include '../initialConfig/conecta.php';

$nm_cursos=$_GET['nome'];

$sql="INSERT INTO cursos (nome) VALUES (:nm_cursos)";
$stmt=$conn->prepare($sql);
$stmt->bindParam(':nm_cursos',$nm_cursos);
$stmt->execute();
header('location:listaCursos.php');
exit;
?>