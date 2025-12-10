<?php
include "../initialConfig/conecta.php";

$nome = $_GET["nome"];
$email = $_GET["email"];

$sql = "UPDATE professor SET nome = :nome WHERE email = :email";
$sql = $conn -> prepare($sql);
$sql -> bindParam('nome',$nome);
$sql -> bindParam('email',$email);
$sql -> execute();

header("location:perfilProfessor.php")
?>