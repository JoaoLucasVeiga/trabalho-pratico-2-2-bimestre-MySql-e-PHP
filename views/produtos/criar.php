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
 * Descritivo: Esse código exibe a view para adicionar um novo produto, contendo um 
 formulário completo com campos para nome, descrição, preço, imagem de capa e plataforma, 
 permitindo o upload de arquivos e o envio dos dados ao controlador pela ação salvar_produto.
 ******************************************************************************/

include_once __DIR__ . '/../templates/header.php'; ?>
<h2>Adicionar Novo Produto</h2>
<!-- IMPORTANTE: Adicionado enctype="multipart/form-data" para permitir o upload de arquivos -->
<form action="index.php?action=salvar_produto" method="POST" enctype="multipart/form-data">
    <label for="nome">Nome do Jogo:</label>
    <input type="text" id="nome" name="nome" required>
    
    <label for="descricao">Descrição:</label>
    <textarea id="descricao" name="descricao" rows="4"></textarea>
    
    <label for="preco">Preço (ex: 159.99):</label>
    <input type="number" step="0.01" id="preco" name="preco" required min="0">
    
    <label for="imagem">Imagem de Capa (JPG, PNG):</label>
    <!-- Alterado de type="text" para type="file" -->
    <input type="file" id="imagem" name="imagem" accept="image/png, image/jpeg">
    
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
