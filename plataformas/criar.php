<?php include_once __DIR__ . '/../templates/header.php'; ?>

<h2>Adicionar Nova Plataforma</h2>

<form action="index.php?action=salvar_plataforma" method="POST">
    <div>
        <label for="nome">Nome da Plataforma:</label>
        <input type="text" id="nome" name="nome" required>
    </div>
    
    <button type="submit" class="btn">Salvar Plataforma</button>
</form>

<?php include_once __DIR__ . '/../templates/footer.php'; ?>