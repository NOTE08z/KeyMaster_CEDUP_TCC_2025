<?php

    setcookie("nomeProfessor", '', time() - (86400 * 7), "/");
    setcookie("emailProfessor", '', time() - (86400 * 7), "/");
    setcookie("curso", '', time() - (86400 * 30), "/");

    setcookie("NomeAdministrador", '', time() - (86400 * 7), "/");
    setcookie("emailAdministrador", '', time() - (86400 * 7), "/");

header("location:../initialForms/telaAcesso.php")
?>