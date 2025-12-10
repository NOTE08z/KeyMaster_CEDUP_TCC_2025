<?php
include "../main/header.php";
// Seleciona todos os registros das aulas agendadas
$sql = $conn->prepare("SELECT * FROM observacao");
$sql->execute();
$obs = $sql->fetchAll(PDO::FETCH_ASSOC);

// Seleciona todos os laboratórios
$sql = $conn->prepare("SELECT * FROM lab");
$sql->execute();
$lab = $sql->fetchAll(PDO::FETCH_ASSOC);
?>
<main>
<form method="GET" action="relatorioSubmit.php" id="formAgendamento">
    <label for="titulo">Título</label>
    <input type="text" name="titulo"id="titulo">
    <label for="lab">Laboratório</label>
    <select name="lab" id="lab">
        <?php
        foreach ($lab as $l) {
            echo "<option value='{$l['id']}'>Lab {$l['num']}</option>";
        }
        ?>
    </select>
    <label for="text">Observação</label>
    <input type="text" name= "texto"id="texto"style="width: 300px; height: 40px;">
    <input type ="button" id="button" value="Enviar">
</form>


<script>
let texto = document.getElementById("texto");
let titulo = document.getElementById("titulo");
let button = document.getElementById("button");
let form = document.getElementById("formAgendamento");

button.addEventListener('click', function(){
    if(!texto.value || !titulo.value){
        alert("Preencha todos os valores!");
    } else {
        form.submit();
    }
});
</script>


