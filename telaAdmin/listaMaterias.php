<?php
include "../main/header.php";
$sql = "SELECT COUNT(*) FROM materias";
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
$sql = "SELECT *, IFNULL(id, 0) FROM materias ORDER BY id DESC LIMIT $limit OFFSET $offset";
$sql = $conn -> prepare($sql);
$sql-> execute();
$result = $sql -> fetchAll();

if($result == 0){
    echo "<h2> Nenhuma matéria foi cadastrada ainda. </h2>";
}

// consulta SQL para localizar as matérias e cursos
$sql = "SELECT 
        m.id AS materia_id,
        m.nome AS materia_nome,
        c.id AS curso_id,
        c.nome AS curso_nome
    FROM materias m
    LEFT JOIN cursos c ON m.fk_curso_id = c.id";
$stmt = $conn->prepare($sql);
$stmt->execute();
$materias = $stmt->fetchAll();

?>

<main>
<div class="page-container">
<div class="content-box">
<form action="materiaUpdtSubmit.php">
<div style="max-height: 450px; overflow-y: auto;">
<button><a href="addMat.php" style="color: #ffff">Adicionar Nova matéria</a></button>
<table border="2">
<thead>
      <tr>
            <th>ID</th>
            <th>Matéria</th>
            <th>Curso</th>
            <th colspan = 2>Ações</th>
        </tr>
</thead>
<tbody>

<?php
  foreach ($materias as $m) {
    echo "<tr>";
    echo "<td>". $m["materia_id"] ."</td>";
    echo "<td>". $m["materia_nome"] ."</td>";
    echo "<td>". $m["curso_nome"] ."</td>";
?>

  <td> <a href="editarMat.php?id=<?php echo $m['materia_id'] ?>"><button type="button" class="btn btn-primary">Editar</button></a></td>
    <td> <a href="excluirMat.php?id=<?php echo $m['materia_id'] ?> "
    onclick="return confirm('Confirma Exclusão?') " ><button type="button" class="btn btn-danger">Excluir</button></a>  </td>
    <?php
    echo "</tr>";
}
?>
</tbody>
</table>
<input type="submit" value="Salvar Alterações">
</form>

    <?php echo "<p style='color: #ffff'>".$pagina.  " de ". $paginas. " páginas"."</p>"   ?>
</p>
<p>
    <a href="?pagina=1 "> << </a>
    <?php
    $primeiraPagina=max($pagina-$intervalo,1);
    $ultimaPagina=min($paginas,$pagina+$intervalo);
    for ($i=$primeiraPagina; $i<=$ultimaPagina;$i++) {
        if ($i == $pagina) {
            echo "<strong  style='color: #ffff'>[$i]</strong>";
        } else {
       echo " <a  href='?pagina=$i'>$i</a> ";
        
    }
}
    ?>

    <a href="?pagina=  <?php echo $paginas ?> 1  "> >>   </a>

</p>
<a href="telainicial.php">Menu Principal</a>
</main>