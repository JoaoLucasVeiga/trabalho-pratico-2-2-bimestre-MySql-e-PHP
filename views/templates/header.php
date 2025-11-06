<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LegendKeys - Admin</title>
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body>
    <header class="main-header">
        <h1><a href="index.php">LegendKeys - Admin</a></h1>
        <nav>
            <a href="index.php?action=listar_produtos">Gerenciar Produtos</a>
            <a href="index.php?action=listar_plataformas">Gerenciar Plataformas</a>
        </nav>
    </header>
    <main class="container">
        <?php
        // LÓGICA PARA EXIBIR A FLASH MESSAGE
        if (isset($_SESSION['mensagem'])): ?>
            <div class="alert alert-<?= $_SESSION['mensagem']['tipo'] ?>">
                <?= $_SESSION['mensagem']['texto'] ?>
            </div>
        <?php
            unset($_SESSION['mensagem']); // Limpa a mensagem para não aparecer de novo
        endif;
        ?>