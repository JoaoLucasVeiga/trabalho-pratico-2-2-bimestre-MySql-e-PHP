<?php include_once __DIR__ . '/../templates/header.php'; ?>
<h2>Adicionar Novo Produto</h2>
<form action="index.php?action=salvar_produto" method="POST">
    <label for="nome">Nome do Jogo:</label>
    <input type="text" id="nome" name="nome" required>
    <label for="descricao">Descrição:</label>
    <textarea id="descricao" name="descricao" rows="4"></textarea>
    <label for="preco">Preço (ex: 159.99):</label>
    <input type="number" step="0.01" id="preco" name="preco" required>
    <label for="url_imagem">URL da Imagem de Capa:</label>
    <input type="text" id="url_imagem" name="url_imagem">
    <label for="plataforma_id">Plataforma:</label>
    <select id="plataforma_id" name="plataforma_id" required>
        <option value="">Selecione uma plataforma</option>
        <?php foreach ($plataformas as $plataforma): ?>
            <option value="<?= $plataforma['id'] ?>"><?= htmlspecialchars($plataforma['nome']) ?></option>
        <?php endforeach; ?>
    </select>
    <button type="submit" class="btn">Salvar Produto</button>
</form>
<?php include_once __DIR__ . '/../templates/footer.php'; ?>