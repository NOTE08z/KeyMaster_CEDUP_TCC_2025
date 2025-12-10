<?php
include "../main/header.php";
$nome = $_COOKIE['NomeAdministrador'];
$email = $_COOKIE['emailAdministrador'];
$id = $_GET['id'];
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

$sql ="SELECT obs.*,lab.num AS lab_nome FROM observacao obs
      LEFT JOIN lab lab ON lab.id = obs.fk_lab_id WHERE obs.id =:id";
$stmt = $conn->prepare($sql);
$stmt -> bindParam('id',$id);
$stmt->execute();
$observacoes = $stmt->fetchAll();
?>
</header>
<main>
<?php foreach($observacoes as $obs){?>
<div class="page-container">
<div class="obs-container">
    <h1 class="obs-title">Título : <?php echo $obs["titulo"]?></h1>
<br>

<div class="content-box">
<form action="">
<form action="lab">Laboratório</form>
<input type="text" name="laboratório" value = "<?php echo $obs['lab_nome']?>" disabled>
<h3> <?php echo $obs['mensagem']?></h3>
<?php } ?>
</div>
<br>
</form>
<a href= "notificacaoObs.php"><button>Retornar às Notificações</button></a>