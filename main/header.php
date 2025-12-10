<?php 
include "../initialConfig/conecta.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <!-- CSS -->

    <title>KeyMaster</title>
    <link rel="icon" type="image/png" href="../imagens/logo.png">
    <link rel="stylesheet" href="../main/menu.css">
    <link rel="stylesheet" href="../main/header.css">
    <link rel="stylesheet" href="../main/listas.css">
      <link rel="stylesheet" href="../main/input.css">
</head>
<body>
    <header>
    <nav>
        <div class = "logo-container">
        <img src="../imagens/header-icon.jpeg" alt="">
        <span class="keymaster-logo-text">KEYMASTER</span>
</div>
    <?php if (isset($_COOKIE["emailAdministrador"])) { ?>
    <a href="notificacaoAgd.php"><img src="../imagens/notificationButton.jpg" alt=""></a>
   <?php }?>
    <img src="../imagens/menuButtonClosed.jpg" class ="menu-button" id="menu-button">
        <img src="../imagens/menuButtonOpened.jpg" class ="open-menu" id="open-menu">
    <ul class="nav-list">
        <?php if (isset($_COOKIE["emailAdministrador"])) { ?> 
            <li><a href="telaInicial.php">tela Inicial</a></li>
            <li><a href="perfilAdm.php">Meu Perfil</a></li>
            <li><a href="listaProfessores.php">Professores</a></li>
            <li><a href="listaMaterias.php">Matérias</a></li>
            <li><a href="listaCursos.php">Cursos</a></li>
            <li><a href="listaLab.php">Laboratórios</a></li>
        <?php } 
        
        else if(isset($_COOKIE['emailProfessor'])){
        ?>
         <li><a href="telaInicial.php">tela Inicial</a></li>
         <li><a href="perfilProfessor.php">Meu Perfil</a></li>
        <li><a href="agendaLab.php">Agendar um   Laboratório</a></li>
        <li><a href="enviaRelatorio.php">Enviar Relatório</a></li>
       <?php
        } 
        ?>
        
    </ul>
    </nav>
</header>
<script src="../main/menu.js"></script>