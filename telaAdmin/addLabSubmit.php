<?php
include '../initialConfig/conecta.php';
$nm_lab=$_GET['num'];
$comp_funcionando=$_GET['comp_funcionando'];
$comp_total=$_GET['comp_total'];

$sql="INSERT INTO lab (num, computadores_funcionando, computadores_totais) VALUES (:nm_lab, :comp_funcionando, :comp_total)";
$stmt=$conn->prepare($sql);
$stmt->bindParam(':nm_lab',$nm_lab);
$stmt->bindParam(':comp_funcionando',$comp_funcionando);
$stmt->bindParam(':comp_total',$comp_total);
$stmt->execute();

header('location:listaLab.php');
exit;
?>