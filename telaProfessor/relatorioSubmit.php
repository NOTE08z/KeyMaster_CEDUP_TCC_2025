<?php
include "../initialConfig/conecta.php";

$titulo = $_GET['titulo'];
$lab = $_GET['lab'];
$relatorio = $_GET["texto"];


$sql = "INSERT INTO observacao (titulo,fk_lab_id,mensagem) VALUES (:titulo,:lab,:texto)";
$sql = $conn->prepare($sql);
$sql->bindValue("titulo", $titulo);
$sql->bindValue("lab", $lab);
$sql->bindValue("texto", $relatorio);
$sql->execute();

echo "<script> alert('relatorio enviado com sucesso!');</script>";
header("location:telaInicial.php");
exit;