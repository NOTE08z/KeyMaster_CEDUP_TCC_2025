<?php
include "../conexao.php";

if (!isset($_GET['id'])) {
    die("ID da notificação não informado.");
}

$notifica_id = $_GET['id'];

// 1 — Buscar dados da notificação
$sql = "SELECT fk_id_professor, fk_id_lab, conteudo, agendamento, aula 
        FROM notifica_agd 
        WHERE id = :id";

$stmt = $conn->prepare($sql);
$stmt->bindParam(':id', $notifica_id);
$stmt->execute();
$notifica = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$notifica) {
    die("Notificação não encontrada.");
}

// 2 — Inserir em lab_agd
$sql = "INSERT INTO lab_agd 
        (fk_id_professor, fk_id_lab, conteudo, agendamento, aula)
        VALUES (:prof, :lab, :conteudo, :agd, :aula)";

$stmt = $conn->prepare($sql);
$stmt->bindParam(':prof', $notifica['fk_id_professor']);
$stmt->bindParam(':lab', $notifica['fk_id_lab']);
$stmt->bindParam(':conteudo', $notifica['conteudo']);
$stmt->bindParam(':agd', $notifica['agendamento']);
$stmt->bindParam(':aula', $notifica['aula']);
$stmt->execute();

// 3 — Apagar da tabela notifica_agd
$sql = "DELETE FROM notifica_agd WHERE id = :id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':id', $notifica_id);
$stmt->execute();

// Redireciona de volta
header("Location: notificacao.php");
exit;
?>