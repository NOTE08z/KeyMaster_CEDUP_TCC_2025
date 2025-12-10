<?php
include '../initialConfig/conecta.php';
$id=$_POST['id'];
$num=$_POST['num'];
$comp_f=$_POST['comp_f'];
$comp_t=$_POST['comp_t'];
$sql="UPDATE lab SET num=:num, computadores_funcionando =:comp_f,computadores_totais = :comp_t WHERE id=:id";
$stmt=$conn->prepare($sql);
$stmt->bindParam('id',$id);
$stmt->bindParam('num',$num);
$stmt->bindParam('comp_f',$comp_f);
$stmt->bindParam('comp_t',$comp_t);
$stmt->execute();
header('location:listaLab.php');
?>