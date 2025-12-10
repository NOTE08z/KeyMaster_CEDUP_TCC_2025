<?php
include "../initialConfig/conecta.php";
if (!empty($_GET['materia'])) {
    foreach ($_GET['materia'] as $profId => $materiaId) {

        if ($materiaId === "") {
            $materiaId = null;
        }

        $sql = "UPDATE professor SET fk_materia_id = :materia WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':materia', $materiaId);
        $stmt->bindParam(':id', $profId);
        $stmt->execute();
    }

    echo "<script>alert('Alterações salvas!');</script>";
    header("Location: listaProfessores.php");
}
?>