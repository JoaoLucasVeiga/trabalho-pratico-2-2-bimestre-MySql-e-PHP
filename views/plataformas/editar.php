<?php include_once __DIR__ . '/../templates/header.php'; ?>
<h2>Editar Produto</h2>
<form action="index.php?action=atualizar_produto" method="POST">
    <input type="hidden" name="id" value="<?= htmlspecialchars($produto['id']) ?>">
    <label for="nome">Nome do Jogo:</label>
    <input type="text" id="nome" name="nome" value="<?= htmlspecialchars($produto['nome']) ?>" required>
    <label for="descricao">Descrição:</label>
    <textarea id="descricao" name="descricao" rows="4"><?= htmlspecialchars($produto['descricao']) ?></textarea>
    <label for="preco">Preço (ex: 159.99):</label>
    <input type="number" step="0.01" id="preco" name="preco" value="<?= htmlspecialchars($produto['preco']) ?>" required>
    <label for="url_imagem">URL da Imagem de Capa:</label>
    <input type="text" id="url_imagem" name="url_imagem" value="<?= htmlspecialchars($produto['url_imagem']) ?>">
    <label for="plataforma_id">Plataforma:</label>
    <select id="plataforma_id" name="plataforma_id" required>
        <option value="">Selecione uma plataforma</option>
        <?php foreach ($plataformas as $plataforma): ?>
            <option value="<?= $plataforma['id'] ?>" <?= ($plataforma['id'] == $produto['plataforma_id']) ? 'selected' : '' ?>>
                <?= htmlspecialchars($plataforma['nome']) ?>
            </option>
        <?php endforeach; ?>
    </select>
    <button type="submit" class="btn">Atualizar Produto</button>
</form>
<?php include_once __DIR__ . '/../templates/footer.php'; ?>