<?php
include "../initialConfig/conecta.php";

if (!isset($_GET['id'])) {
    echo "<script>alert('ID não informado!'); window.location.href='notificacao.php';</script>";
    exit;
}

$id = $_GET['id'];

// 1. Buscar dados da notificação
$sql = $conn->prepare("SELECT * FROM notifica_agd WHERE id = :id LIMIT 1");
$sql->bindValue(":id", $id);
$sql->execute();
$notif = $sql->fetch(PDO::FETCH_ASSOC);

if (!$notif) {
    echo "<script>alert('Notificação não encontrada!'); window.location.href='notificacao.php';</script>";
    exit;
}

// 2. Inserir na tabela lab_agd
$insert = $conn->prepare("
    INSERT INTO lab_agd (fk_id_professor, fk_id_lab, conteudo, agendamento, aula)
    VALUES (:professor, :lab, :conteudo, :agendamento, :aula)
");

$insert->bindValue(":professor",  $notif['fk_id_professor']);
$insert->bindValue(":lab",        $notif['fk_id_lab']);
$insert->bindValue(":conteudo",   $notif['conteudo']);
$insert->bindValue(":agendamento",$notif['agendamento']);
$insert->bindValue(":aula",       $notif['aula']);

$insert->execute();

// 3. Deletar a notificação
$delete = $conn->prepare("DELETE FROM notifica_agd WHERE id = :id");
$delete->bindValue(":id", $id);
$delete->execute();

// 4. Redirecionar
echo "<script>
        alert('Agendamento aceito com sucesso!');
        window.location.href='notificacao.php';
      </script>";
?>