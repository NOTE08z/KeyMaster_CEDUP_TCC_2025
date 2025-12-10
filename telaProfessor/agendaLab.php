<?php
include "../main/header.php";

// Seleciona todos os registros das aulas agendadas
$sql = $conn->prepare("SELECT * FROM lab_agd");
$sql->execute();
$lab_agd = $sql->fetchAll(PDO::FETCH_ASSOC);

// Seleciona todos os laboratórios
$sql = $conn->prepare("SELECT * FROM lab");
$sql->execute();
$lab = $sql->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agendamento</title>
</head>
<body>

<form method="GET" action="enviaNotificacao.php" id="formAgendamento">
<label for="date">Dia</label>
    <input type="date" id="date" name="date">
    <label for="aula">Aula</label>
    <select name="aula" id="aula">
        <?php
        for ($i = 0; $i < 15; $i++) {
            if ($i < 5) {
                $periodo = "manhã";
                $aula = $i + 1;
            } elseif ($i < 10) {
                $periodo = "tarde";
                $aula = $i - 4;
            } else {
                $periodo = "noite";
                $aula = $i - 9;
            }

            echo "<option value='$aula'>{$aula}ª aula da $periodo</option>";
        }
        ?>
    </select>
    <label for="aula_conteudo">Conteúdo</label>
    <input type="text" id="aula_conteudo" name="aula_conteudo" placeholder="Conteúdo da aula">
    <label for="lab">Laboratório</label>
    <select name="lab" id="lab">
        <?php
        foreach ($lab as $l) {
            echo "<option value='{$l['id']}'>Lab {$l['num']}</option>";
        }
        ?>
    </select>
    <br>
    <button id="button" type="button">Agendar</button>
</form>

<script>
// Dados vindos do PHP
const agendamentos = <?php echo json_encode($lab_agd); ?>;

const date = document.getElementById('date');
const aula = document.getElementById('aula');
const lab = document.getElementById('lab');
const aulaConteudo = document.getElementById('aula_conteudo');
const button = document.getElementById('button');
const form = document.getElementById('formAgendamento');

button.addEventListener('click', () => {

    // validação básica
    if (!date.value || !aula.value || !aulaConteudo.value) {
        alert("Preencha todos os campos");
        return;
    }

    const hoje = new Date().toISOString().split("T")[0];

    if (date.value < hoje) {
        alert("A data não pode ser anterior à data atual.");
        return;
    }

    // CORREÇÃO: validação de conflito
    const conflito = agendamentos.some(item =>
        item.agendamento === date.value &&
        item.aula == aula.value &&
        (
            item.lab == lab.value ||             // caso sua tabela tenha 'lab'
            item.id_lab == lab.value ||         // caso tenha 'id_lab'
            item.fk_id_lab == lab.value         // caso tenha 'fk_id_lab'
        )
    );

    if (conflito) {
        alert("⚠️ Já existe um agendamento para esse laboratório nessa aula!");
        return;
    }

    // se passar, envia o form
    alert("Agendado com sucesso!");
    form.submit();
});
</script>

</body>
</html>
