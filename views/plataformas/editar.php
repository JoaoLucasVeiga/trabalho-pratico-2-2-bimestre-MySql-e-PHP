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
 * Descritivo: Esse código exibe a view para edição de uma plataforma existente, 
 mostrando um formulário preenchido com o nome atual da plataforma e permitindo que o 
 usuário atualize as informações, enviando-as para o controlador pela ação atualizar_plataforma.
 ******************************************************************************/
include_once __DIR__ . '/../templates/header.php'; ?>

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
