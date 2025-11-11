<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LegendKeys - Admin</title>
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body>
    <div class="background-wrapper">
        <!-- Partículas do fundo animado -->
        <div class="particle"></div><div class="particle"></div><div class="particle"></div>
        <div class="particle"></div><div class="particle"></div><div class="particle"></div>
        <div class="particle"></div><div class="particle"></div><div class="particle"></div>
        <div class="particle"></div><div class="particle"></div><div class="particle"></div>
    </div>

    <header class="main-header">
        <h1><a href="index.php">LegendKeys - Admin</a></h1>
        <nav>
            <a href="index.php?action=listar_produtos">Gerenciar Produtos</a>
            <a href="index.php?action=listar_plataformas">Gerenciar Plataformas</a>
        </nav>
    </header>
    <main class="container">
        <?php
        // A lógica de mensagens de feedback pode continuar, ela é útil
        if (isset($_SESSION['mensagem'])): ?>
            <div class="alert alert-<?= $_SESSION['mensagem']['tipo'] ?>">
                <?= $_SESSION['mensagem']['texto'] ?>
            </div>
        <?php
            // Precisamos iniciar a sessão para que as mensagens funcionem
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            unset($_SESSION['mensagem']);
        endif;
        ?>