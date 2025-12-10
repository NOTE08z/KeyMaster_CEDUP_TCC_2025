
<?php
include "../main/header.php";
$sql = "SELECT COUNT(*) FROM professor";
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
$sql = "SELECT *, IFNULL(id, 0) FROM professor ORDER BY id DESC LIMIT $limit OFFSET $offset";
$sql = $conn -> prepare($sql);
$sql-> execute();
$professores = $sql -> fetchAll();

if($professores == 0){
    echo "<h2> Nenhum professor cadastrado ainda. </h2>";
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

$sql = $conn -> prepare($sql);
$sql-> execute();
$result = $sql -> fetchAll();

?>

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
            <th>Nome</th>
            <th>Matéria</th>
            <th>Curso</th>
            <th colspan = "1">Ações</th>
        </tr>
</thead>
<tbody>
<?php
    foreach ($professores as $prof) {
    echo "<tr>";
    echo "<td>". $prof["id"] ."</td>";
    echo "<td>". $prof["nome"] ."</td>";
    echo "<td><select name='materia[".$prof["id"]."]'>";

    if (empty($prof["fk_materia_id"])) {
        echo "<option value='' selected>Selecione a matéria</option>";
    }

    foreach ($materias as $m) {
        $selected = ($prof["fk_materia_id"] == $m["materia_id"]) ? "selected" : "";
        echo "<option value='".$m["materia_id"]."' $selected>".$m["materia_nome"]."</option>";
    }

    echo "</select></td>";

    $curso = "Sem curso";
    foreach ($materias as $m) {
        if ($m["materia_id"] == $prof["fk_materia_id"]) {
            $curso = $m["curso_nome"];
            break;
        }
    }

    echo "<td>".$curso."</td>";
?>
    <td> <a href="excluirProfessores.php?id=<?php echo $prof['id'] ?> "
    onclick="return confirm('Confirma Exclusão?') " ><button type="button" class="btn btn-danger">Excluir</button></a>  </td>
    <?php
    echo "</tr>";
}
?>
</tbody>
</table>

<input type="submit" value="Salvar Alterações">
<div class="pagination">
    <p style="color:#fff; margin-bottom:10px;">
        <?php echo $pagina . " de " . $paginas . " páginas"; ?>
    </p>
    <!-- Primeira página -->
    <a href="?pagina=1"><<</a>

    <?php
    $primeiraPagina = max($pagina - $intervalo, 1);
    $ultimaPagina = min($paginas, $pagina + $intervalo);

    for ($i = $primeiraPagina; $i <= $ultimaPagina; $i++) {
        if ($i == $pagina) {
            echo "<strong style='color:#fff;'>[$i]</strong>";
        } else {
            echo "<a href='?pagina=$i'>$i</a>";
        }
    }
    ?>

    <!-- Última página -->
    <a href="?pagina=<?php echo $paginas; ?>">>></a>
</div>

</form> <!-- FECHA FORM -->
</div> <!-- FECHA SCROLL WRAPPER -->
</div> <!-- FECHA CONTENT BOX -->
</div> <!-- FECHA PAGE CONTAINER -->

</main>
</body>
</html>