<?php include_once __DIR__ . '/../templates/header.php'; ?>

<h2>Editar Produto</h2>

<!-- O enctype="multipart/form-data" é essencial para o upload de arquivos -->
<form action="index.php?action=atualizar_produto" method="POST" enctype="multipart/form-data">
    
    <input type="hidden" name="id" value="<?= htmlspecialchars($produto['id']) ?>">
    
    <!-- Este campo oculto guarda o caminho da imagem antiga. Se o usuário não enviar uma nova, nós usamos este valor para não perder a imagem. -->
    <input type="hidden" name="imagem_antiga" value="<?= htmlspecialchars($produto['url_imagem']) ?>">
    
    <div>
        <label for="nome">Nome do Jogo:</label>
        <input type="text" id="nome" name="nome" value="<?= htmlspecialchars($produto['nome']) ?>" required>
    </div>
    
    <div>
        <label for="descricao">Descrição:</label>
        <textarea id="descricao" name="descricao" rows="4"><?= htmlspecialchars($produto['descricao']) ?></textarea>
    </div>
    
    <div>
        <label for="preco">Preço (ex: 159.99):</label>
        <input type="number" step="0.01" id="preco" name="preco" value="<?= htmlspecialchars($produto['preco']) ?>" required min="0">
    </div>
    
    <div>
        <label>Imagem de Capa Atual:</label>
        <div class="current-image-preview">
            <img src="<?= htmlspecialchars($produto['url_imagem']) ?>" alt="Capa atual do produto" width="100">
        </div>
    </div>
    
    <div>
        <label for="imagem">Enviar Nova Imagem (deixe em branco para manter a atual):</label>
        <input type="file" id="imagem" name="imagem" accept="image/png, image/jpeg">
    </div>
    
    <div>
        <label for="plataforma_id">Plataforma:</label>
        <select id="plataforma_id" name="plataforma_id" required>
            <option value="">Selecione uma plataforma</option>
            <?php foreach ($plataformas as $plataforma): ?>
                <option value="<?= $plataforma['id'] ?>" <?= ($plataforma['id'] == $produto['plataforma_id']) ? 'selected' : '' ?>>
                    <?= htmlspecialchars($plataforma['nome']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    
    <button type="submit" class="btn">Atualizar Produto</button>
</form>

<?php include_once __DIR__ . '/../templates/footer.php'; ?>