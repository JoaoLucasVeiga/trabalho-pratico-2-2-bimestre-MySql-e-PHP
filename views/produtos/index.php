<?php
/*******************************************************************************
 * Curso: Engenharia de Software
 * Disciplina: Linguagem e Técnicas de Programação
 * Professor: Flores
 * Turma: ESOFT-2B
 * Componentes:
 *     25291090-2 - João Lucas Veiga de Carvalho
 *     25164719-2 - Rafael Maia
 *     25033056-2 - Gabriel Michels Cubas
 *     25001118-2 - Emanuel Gomes de Almeida
 *     25361613-2 - Arthur Marinho Figueira
 *     25362639-2 - Roberti Mendes de moura
 * Descritivo: Esse código mostra a página principal de produtos. Ele lista todos os 
 jogos cadastrados, com imagem, nome, preço e plataforma. Também tem uma barra de 
 busca para filtrar os produtos e botões para editar ou excluir cada item. Quando não há 
 produtos cadastrados ou o termo pesquisado não é encontrado, aparece uma mensagem informando 
 isso. No final, há a paginação para navegar entre várias páginas de resultados.
 ******************************************************************************/

include_once __DIR__ . '/../templates/header.php'; ?>

<div class="page-header">
    <div>
        <h2>Gerenciamento de Produtos</h2>
        <p class="page-subtitle">Navegue, adicione e gerencie as chaves de jogos do seu catálogo.</p>
    </div>
    <a href="index.php?action=criar_produto" class="btn">Adicionar Novo Produto</a>
</div>

<!-- BARRA DE BUSCA -->
<div class="search-bar">
    <form action="index.php" method="GET">
        <input type="hidden" name="action" value="listar_produtos">
        <input type="text" name="busca" placeholder="Buscar por nome do jogo..." value="<?= htmlspecialchars($termoBusca) ?>">
        <button type="submit">Buscar</button>
    </form>
</div>

<?php if (empty($produtos)): ?>
    <?php if (!empty($termoBusca)): ?>
        <p class="empty-state">Produto indisponível. Nenhum jogo encontrado para "<?= htmlspecialchars($termoBusca) ?>".</p>
    <?php else: ?>
        <p class="empty-state">Nenhum produto cadastrado no momento.</p>
    <?php endif; ?>
<?php else: ?>
    <div class="product-grid">
        <?php foreach ($produtos as $produto): ?>
            <div class="product-card">
                <img src="<?= htmlspecialchars($produto['url_imagem']) ?>" alt="<?= htmlspecialchars($produto['nome']) ?>" class="product-cover">
                <div class="product-info">
                    <h4><?= htmlspecialchars($produto['nome']) ?></h4>
                    <p class="platform"><?= htmlspecialchars($produto['nome_plataforma']) ?></p>
                    <p class="price">R$ <?= number_format($produto['preco'], 2, ',', '.') ?></p>
                    <div class="actions">
                        <a href="index.php?action=editar_produto&id=<?= $produto['id'] ?>" class="btn-editar">Editar</a>
                        <a href="index.php?action=excluir_produto&id=<?= $produto['id'] ?>" onclick="return confirm('Tem certeza?')" class="btn-excluir">Excluir</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<!-- PAGINAÇÃO -->
<?php if ($totalPaginas > 1): ?>
<div class="pagination">
    <?php for ($i = 1; $i <= $totalPaginas; $i++): ?>
        <a href="index.php?action=listar_produtos&pagina=<?= $i ?>&busca=<?= urlencode($termoBusca) ?>" 
           class="<?= ($i == $paginaAtual) ? 'active' : '' ?>">
           <?= $i ?>
        </a>
    <?php endfor; ?>
</div>
<?php endif; ?>

<?php include_once __DIR__ . '/../templates/footer.php'; ?>
