<?php
include '../initialConfig/conecta.php';
$id=$_POST['id'];
$fk_curso_id=$_POST['curso_id'];
$nm_materias=$_POST['nome'];
$sql="UPDATE materias SET nome=:nm_materias,fk_curso_id = :fk_curso_id WHERE id=:id";
$stmt=$conn->prepare($sql);
$stmt->bindParam('id',$id);
$stmt->bindParam('nm_materias',$nm_materias);
$stmt->bindParam('fk_curso_id',$fk_curso_id);
$stmt->execute();
header('location:listaMaterias.php');
?>