<?php
session_start();

// Verifica se o usuário NÃO está logado
if (!isset($_SESSION['matricula'])) {
    header("Location: ../index.php"); // Redireciona para a página de login se não estiver logado
    exit();
}

// Adicionado bloco para logout
if (isset($_GET['logout'])) {
    session_destroy(); // Destrói a sessão
    header("Location: ../index.php"); // Redireciona para a página de login após o logout
    exit();
}
?>