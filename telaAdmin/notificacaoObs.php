<?php
include "../main/header.php";
$nome = $_COOKIE['NomeAdministrador'];
$email = $_COOKIE['emailAdministrador'];
$sql = "SELECT COUNT(*) FROM observacao";
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
$sql = "SELECT *, IFNULL(id, 0) FROM observacao ORDER BY id DESC LIMIT $limit OFFSET $offset";
$sql = $conn -> prepare($sql);
$sql-> execute();
$labs = $sql -> fetchAll();

$sql ="SELECT * FROM observacao";
$stmt = $conn->prepare($sql);
$stmt->execute();
$observacoes = $stmt->fetchAll();
?>
</header>
<main>
<div class="page-container">
<div class="content-box">
<form action="professorUpdtSubmit.php">

<!-- ADICIONADO: wrapper com rolagem vertical -->
<div style="max-height: 450px; overflow-y: auto;">
<select id="select">
    <option id="agd" name="agd">Agendamentos</option>
    <option id="obs" name="obs" selected>Observações</option>
</select>
<input type="button" id="filtro" class="btn-filtrar" value="Filtrar">
<table border="2" style="margin:auto;">
<thead>
      <tr>
            <th>ID</th>
            <th>Título</th>	
            <th>Laboratório</th>
            <th>Mensagem</th>
            <th colspan = "2" style= "text-align: center">Ações</th>
        </tr>
</thead>

<?php foreach ($observacoes as $obs) {
    echo "<tr>";
    echo "<td>". $obs["id"] ."</td>";
    echo "<td>". $obs["titulo"] ."</td>";
    echo "<td>".$obs["fk_lab_id"]."</td>";
    echo "<td id = msg".$obs['id'].">". $obs["mensagem"]."</td>";

?>
    <td  style= "text-align: center"> <a href="excluirObs.php?id=<?php echo $obs['id']?> "
    onclick="return confirm('Realmente deseja apagar essa notificação?') " ><button type="button" class="btn btn-danger">Apagar</button></a>  </td>
    <td  style= "text-align: center"> <a href="openObs.php?id=<?php echo $obs['id']?> ">
    <button type="button">Ver Mais</button></a>  </td>
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

   <?php foreach($observacoes as $obs){?>

    const getMSG<?php echo $obs['id']?>  = document.getElementById("msg" + <?php echo $obs['id']?> );
    const msg<?php echo $obs['id']?>  = getMSG<?php echo $obs['id']?> .textContent;
    console.log(msg<?php echo $obs['id']?> );
    if(msg<?php echo $obs['id']?> .length > 20){
    getMSG<?php echo $obs['id']?> .textContent = msg<?php echo $obs['id']?> .substring(0,20) + "...";
    }


<?php }?>

</script>
</main>