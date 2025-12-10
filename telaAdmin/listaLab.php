
<?php
include "../main/header.php";
$sql = "SELECT COUNT(*) FROM lab";
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

// Consulta SQL para buscar as matérias com paginação
$sql = "SELECT *, IFNULL(id, 0) FROM lab ORDER BY id DESC LIMIT $limit OFFSET $offset";
$sql = $conn -> prepare($sql);
$sql-> execute();
$result = $sql -> fetchAll();

if($result == 0){
    echo "<h2> Nenhum laboratório foi cadastrado ainda. </h2>";
}


?>

<main>
<div class="page-container">
<div class="content-box">
<form action="materiaUpdtSubmit.php">
<div style="max-height: 450px; overflow-y: auto;">
<table border="2">
<strong><button><a href="addLab.php" style='color: #ffff'>Adicionar Novo Laboratório</a></button></strong>
<thead>
      <tr>
            <th>ID</th>
            <th>laboratório</th>
            <th>Número de computadores funcionando</th>
            <th>Número total de computadores</th>
            <th colspan = "2">ações</th>
        </tr>
</thead>
<tbody>

<?php
  foreach ($result as $row) {
    echo "<tr>";
    echo "<td>". $row["id"] ."</td>";
    echo "<td>". $row["num"] ."</td>";
    echo "<td>". $row["computadores_funcionando"] ."</td>";
    echo "<td>". $row["computadores_totais"] ."</td>";
   ?>
    <td> <a href="editarLab.php?id=<?php echo $row['id'] ?>"><button type="button" class="btn btn-primary">Editar</button></a></td>
    <td> <a href="excluirLab.php?id=<?php echo $row['id'] ?> "
    onclick="return confirm('Confirma Exclusão?') " ><button type="button" class="btn btn-danger">Excluir</button></a>  </td>
    <?php echo "</tr>";
}

?>
</tbody>
</table>
<input type="submit" value="Salvar Alterações">
</form>

<?php echo "<p style='color: #ffff'>".$pagina.  " de ". $paginas. " páginas"."</p>"   ?>
</p>
<p>
    <a href="?pagina=1 " > << </a>
    <?php
    $primeiraPagina=max($pagina-$intervalo,1);
    $ultimaPagina=min($paginas,$pagina+$intervalo);
    for ($i=$primeiraPagina; $i<=$ultimaPagina;$i++) {
        if ($i == $pagina) {
            echo "<strong style='color: #ffff'>[$i]</strong>";
        } else {
       echo " <a href='?pagina=$i'>$i</a> ";
        
    }
}

    ?>

    <a href="?pagina=  <?php echo $paginas ?> 1  "> >>   </a>

</p>
<a href="telainicial.php">Menu Principal</a>
</main>
