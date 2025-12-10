<?php
include "../main/header.php";
$sql = "SELECT COUNT(*) FROM lab_agd";
$stmt = $conn -> prepare($sql);
$stmt -> execute();
$count = (int)$stmt -> fetchColumn();
if($count == null || $count == 0){
$count = 0;
}
$pagina=(isset($_GET['pagina']))?(int)$_GET['pagina']:1;
$limit=8;
$intervalo=4;
$offset=($pagina-1)*$limit;
$paginas=ceil($count/$limit);

// Consulta SQL para buscar os professores com paginação
$sql = "SELECT *, IFNULL(id, 0) FROM lab_agd ORDER BY id DESC LIMIT $limit OFFSET $offset";
$sql = $conn -> prepare($sql);
$sql-> execute();
$labs = $sql -> fetchAll();

$sql ="SELECT 
    agd.id AS id_aula,
    p.nome AS professor_nome,
    m.nome AS materia_nome,
    l.num AS numero_lab,
    agd.conteudo,
    agd.agendamento,
    agd.aula
FROM lab_agd agd
LEFT JOIN professor p ON p.id = agd.fk_id_professor
LEFT JOIN materias m ON m.id = p.fk_materia_id
LEFT JOIN lab l ON l.id = agd.fk_id_lab
ORDER BY agd.id DESC
";
$stmt = $conn->prepare($sql);
$stmt->execute();
$lab_agd = $stmt->fetchAll();

//fk_id_professor, fk_id_lab, conteudo, agendamento, aula
?>
</header>
<main>
<div class="page-container">
<div class="content-box">
<form action="professorUpdtSubmit.php">

<!-- ADICIONADO: wrapper com rolagem vertical -->
<div style="max-height: 450px; overflow-y: auto;">

<table border="2" style="margin:auto">

<thead>
      <tr>
            <th>ID</th>
            <th>Professor</th>
            <th>Matéria</th>
            <th>laboratorio</th>
            <th> Data </th>
            <th> Aula </th>
        </tr>
</thead>

<?php foreach ($lab_agd as $agd) {
    echo "<tr>";
    echo "<td>". $agd["id_aula"] ."</td>";
    echo "<td>". $agd["professor_nome"] ."</td>";
    
     if(!$agd['materia_nome']){
   $agd['materia_nome'] = "sem matéria";
}
    echo "<td>". $agd["materia_nome"] ."</td>";
      echo "<td> lab Nº". $agd["numero_lab"] ."</td>";
    echo "<td>". $agd["agendamento"] ."</td>";
    echo "<td>". $agd["aula"] ."</td>";
     echo "</tr>";
}
?>
<tbody> 

</main>