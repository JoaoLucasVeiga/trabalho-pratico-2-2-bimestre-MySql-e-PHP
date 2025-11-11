<?php include_once __DIR__ . '/../templates/header.php'; ?>

<h2>Editar Plataforma</h2>

<form action="index.php?action=atualizar_plataforma" method="POST">
    <input type="hidden" name="id" value="<?= htmlspecialchars($plataforma['id']) ?>">
    
    <div>
        <label for="nome">Nome da Plataforma:</label>
        <input type="text" id="nome" name="nome" value="<?= htmlspecialchars($plataforma['nome']) ?>" required>
    </div>

    <button type="submit" class="btn">Atualizar Plataforma</button>
</form>

<?php include_once __DIR__ . '/../templates/footer.php'; ?>