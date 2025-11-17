<?php
include "../main/header.php";
$sql = "SELECT COUNT(*) FROM professores";
$stmt = $conn -> prepare($sql);
$count = (int)$stmt -> fetchColumn();
if($count == null || $count == 0){
$count = 0;
}

$limit = 8;
$offset = $count/$limit;
$paginas = ($count -1)*$offset;

$sql = "SELECT * FROM professores ORDER BY id DESC LIMIT $limit OFFSET $offset";
$result = $conn -> prepare($sql);
$result -> fetchAll();
?>

<main>

<table>





</table>



</main>