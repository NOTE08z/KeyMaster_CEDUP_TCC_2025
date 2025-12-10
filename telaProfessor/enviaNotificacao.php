<?php
include "../initialConfig/conecta.php";

$agendamento     = $_GET['date'];
$aula            = $_GET['aula'];
$aula_conteudo   = $_GET['aula_conteudo'];
$lab_id          = $_GET['lab'];

$sql = "SELECT * FROM lab WHERE id = :id";
$sql = $conn->prepare($sql);
$sql->bindValue(":id", $lab_id);
$sql->execute();
$lab = $sql->fetch();

$sql = "SELECT * FROM professor WHERE email = :email";
$sql = $conn->prepare($sql);
$sql->bindValue(":email", $_COOKIE['emailProfessor']);
$sql->execute();
$professor = $sql->fetch();
$sql = "INSERT INTO notifica_agd (fk_id_professor, fk_id_lab, conteudo, agendamento, aula) VALUES (:professor_id, :lab_id, :conteudo, :agendamento, :aula)";
$sql = $conn->prepare($sql);
$sql->bindValue(":professor_id", $professor['id']);
$sql->bindValue(":lab_id", $lab['id']);
$sql->bindValue(":conteudo", $aula_conteudo);
$sql->bindValue(":agendamento", $agendamento);
$sql->bindValue(":aula", $aula);

$sql->execute();
header("location:agendaLab.php");
?>
