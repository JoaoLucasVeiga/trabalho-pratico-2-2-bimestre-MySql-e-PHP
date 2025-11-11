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
 * Descritivo: Esse código exibe a view de listagem das plataformas, apresentando uma tabela com todas as plataformas cadastradas e botões para editar, excluir ou adicionar uma nova, além de alertar que a exclusão de uma plataforma também remove os produtos associados.
 ******************************************************************************/
include_once __DIR__ . '/../templates/header.php'; ?>

<div class="page-header">
    <h2>Gerenciamento de Plataformas</h2>
    <!-- CORREÇÃO AQUI: O link agora aponta para "criar_plataforma" -->
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
