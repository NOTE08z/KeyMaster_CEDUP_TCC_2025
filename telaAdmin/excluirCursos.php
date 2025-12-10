<?php
include '../initialConfig/conecta.php';
if (!empty ($_GET['id'])) {
    $id=$_GET['id'];
    $sql="DELETE FROM cursos WHERE id=:id";
    $stmt=$conn->prepare($sql);
    $stmt->bindParam(':id',$id);
    $stmt->execute();
    header('location:listaCursos.php');

}