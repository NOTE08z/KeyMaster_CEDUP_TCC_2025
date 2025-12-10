<?php
include '../initialConfig/conecta.php';
$id=$_POST['id'];
$nm_cursos=$_POST['nome'];
$sql="UPDATE cursos SET nome=:nm_cursos WHERE id=:id";
$stmt=$conn->prepare($sql);
$stmt->bindParam('id',$id);
$stmt->bindParam('nm_cursos',$nm_cursos);
$stmt->execute();
header('location:listaCursos.php');
?>