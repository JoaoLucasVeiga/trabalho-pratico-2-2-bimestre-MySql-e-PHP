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
 * Descritivo: Model para a entidade Plataforma, responsável pelas operações CRUD.
 ******************************************************************************/

class Plataforma {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function listar() {
        $stmt = $this->pdo->query("SELECT * FROM plataformas ORDER BY nome");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function criar($nome) {
        $stmt = $this->pdo->prepare("INSERT INTO plataformas (nome) VALUES (?)");
        return $stmt->execute([$nome]);
    }

    public function buscarPorId($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM plataformas WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function atualizar($id, $nome) {
        $stmt = $this->pdo->prepare("UPDATE plataformas SET nome = ? WHERE id = ?");
        return $stmt->execute([$nome, $id]);
    }

    public function excluir($id) {
        $stmt = $this->pdo->prepare("DELETE FROM plataformas WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
?>