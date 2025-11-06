<?php include_once __DIR__ . '/../templates/header.php'; ?>

<div class="page-header">
    <h2>Gerenciamento de Plataformas</h2>
    <a href="index.php?action=criar_plataforma" class="btn">Adicionar Nova Plataforma</a>
</div>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome da Plataforma</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($plataformas as $plataforma): ?>
        <tr>
            <td><?= htmlspecialchars($plataforma['id']) ?></td>
            <td><?= htmlspecialchars($plataforma['nome']) ?></td>
            <td>
                <a href="index.php?action=editar_plataforma&id=<?= $plataforma['id'] ?>" class="btn-editar">Editar</a>
                <a href="index.php?action=excluir_plataforma&id=<?= $plataforma['id'] ?>" onclick="return confirm('Atenção! Excluir uma plataforma também excluirá todos os produtos associados a ela. Deseja continuar?')" class="btn-excluir">Excluir</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php include_once __DIR__ . '/../templates/footer.php'; ?>