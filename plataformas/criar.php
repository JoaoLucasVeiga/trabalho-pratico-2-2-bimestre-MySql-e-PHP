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
 * Descritivo: Para que o usuário insira o nome da plataforma e envie os dados ao controlador
 ******************************************************************************/

include_once __DIR__ . '/../templates/header.php'; ?>

<h2>Adicionar Nova Plataforma</h2>

<form action="index.php?action=salvar_plataforma" method="POST">
    <div>
        <label for="nome">Nome da Plataforma:</label>
        <input type="text" id="nome" name="nome" required>
    </div>
    
    <button type="submit" class="btn">Salvar Plataforma</button>
</form>

<?php include_once __DIR__ . '/../templates/footer.php'; ?>
