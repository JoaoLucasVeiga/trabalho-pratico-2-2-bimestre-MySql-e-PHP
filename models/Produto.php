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
 * Descritivo: Responsável por realizar todas as operações no banco de dados relacionadas aos produtos: como listar, buscar, criar, atualizar e excluir, além de implementar busca com paginação e contagem total de registros.
 ******************************************************************************/

class Produto {
    private $pdo;
    public function __construct($pdo) { $this->pdo = $pdo; }

    // MÉTODO ANTIGO "listar()" FOI SUBSTITUÍDO POR ESTES DOIS
    public function listarPaginadoEBuscar($termoBusca = '', $limit = 10, $offset = 0) {
        $sql = "SELECT p.*, plat.nome AS nome_plataforma 
                FROM produtos p 
                JOIN plataformas plat ON p.plataforma_id = plat.id";
        $params = [];

        if (!empty($termoBusca)) {
            $sql .= " WHERE p.nome LIKE ?";
            $params[] = "%$termoBusca%";
        }

        $sql .= " ORDER BY p.nome LIMIT ? OFFSET ?";
        $params[] = $limit;
        $params[] = $offset;

        $stmt = $this->pdo->prepare($sql);
        // Precisamos informar ao PDO que os últimos 2 parâmetros são inteiros
        $stmt->bindValue(count($params) - 1, $limit, PDO::PARAM_INT);
        $stmt->bindValue(count($params), $offset, PDO::PARAM_INT);
        
        // Bind dos outros parâmetros
        $paramIndex = 1;
        foreach ($params as $param) {
            if ($paramIndex <= count($params) - 2) {
                $stmt->bindValue($paramIndex, $param);
            }
            $paramIndex++;
        }

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function contarTotal($termoBusca = '') {
        $sql = "SELECT COUNT(*) FROM produtos p";
        $params = [];

        if (!empty($termoBusca)) {
            $sql .= " WHERE p.nome LIKE ?";
            $params[] = "%$termoBusca%";
        }

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchColumn();
    }
    
    // O resto dos métodos continuam os mesmos
    public function criar($nome, $desc, $preco, $img, $plat_id) {
        $sql = "INSERT INTO produtos (nome, descricao, preco, url_imagem, plataforma_id) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$nome, $desc, $preco, $img, $plat_id]);
    }
    public function buscarPorId($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM produtos WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function atualizar($id, $nome, $desc, $preco, $img, $plat_id) {
        $sql = "UPDATE produtos SET nome = ?, descricao = ?, preco = ?, url_imagem = ?, plataforma_id = ? WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$nome, $desc, $preco, $img, $plat_id, $id]);
    }
    public function excluir($id) {
        $stmt = $this->pdo->prepare("DELETE FROM produtos WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
?>
