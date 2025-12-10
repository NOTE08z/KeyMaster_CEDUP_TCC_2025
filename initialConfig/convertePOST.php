<?php
include "../initialConfig/initialHeader.php"; 

$professor_login = isset($_GET['professorLogin']) ? $_GET['professorLogin'] : '';
$page = isset($_GET['header']) ? $_GET['header'] : '';
$erro = isset($_GET['erro']) ? $_GET['erro'] : '';
$header = $page;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body style="visibility: hidden;"> <main>
    <form action="../initialForms/<?php echo $header?>.php" method="POST" id="converteForm">
        <input type="hidden" name="professorLogin" value="<?php echo $professor_login?>">
        
        <?php if (!empty($erro)): ?>
            <input type="hidden" name="erro" value="<?php echo $erro?>">
        <?php endif; ?>
    </form>
    <script>
        document.getElementById('converteForm').submit();
    </script>
</main>
</body>
</html>