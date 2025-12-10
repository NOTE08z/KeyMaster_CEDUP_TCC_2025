<?php
include "../main/header.php";
$nome = $_COOKIE['NomeAdministrador'];
$email = $_COOKIE['emailAdministrador'];

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
$sql = "SELECT *, IFNULL(id, 0) FROM notifica_agd ORDER BY id DESC LIMIT $limit OFFSET $offset";
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
FROM notifica_agd agd
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
<select id="select">
    <option id="agd" name="agd"selected>Agendamentos</option>
    <option id="obs" name="obs">Observações</option>
</select>
<input type="button" id="filtro" class="btn-filtrar" value="Filtrar">
<table border="2" style="margin:auto">
<thead>
      <tr>
            <th>ID</th>
            <th>Professor</th>
            <th>Matéria</th>
            <th>laboratorio</th>
            <th> Data </th>
            <th> Aula </th>
            <th colspan = "2"> Ações </th>
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


?>
<td> <a href="aceitar.php?id=<?php echo $agd['id_aula'] ?>"><button type="button" class="btn btn-primary"  onclick="return confirm('Realmente deseja Aceitae?') ">Aceitar</button></a></td>
    <td> <a href="recusar.php?id=<?php echo $agd['id_aula']?> "
    onclick="return confirm('Realmente deseja recusar?') " ><button type="button" class="btn btn-danger">Recusar</button></a>  </td>
    <?php echo "</tr>";
    }?>
<tbody> 
<script>
   let select = document.querySelector('select');
    select.addEventListener('change',options);
    select.addEventListener('click',options);
    function options(){
     option = select.selectedOptions[0];
    text = option.textContent;
    console.log(text);
    filtro.addEventListener('click',function(){
        if(text == "Agendamentos"){
            window.location.href="http://localhost/keymaster30_11/KeyMaster_CEDUP_TCC_2025/telaAdmin/notificacaoAgd.php";
        }
        else if(text == "Observações"){
         window.location.href="http://localhost/keymaster30_11/KeyMaster_CEDUP_TCC_2025/telaAdmin/notificacaoObs.php";

        }
    });
    }
</script>
</main>