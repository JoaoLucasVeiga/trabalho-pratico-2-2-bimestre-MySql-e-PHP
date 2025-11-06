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
 * Descritivo: Controller para gerenciar as requisições da entidade Plataforma.
 ******************************************************************************/

require_once __DIR__ . '/../models/Plataforma.php';

class PlataformaController {
    private $plataformaModel;

    public function __construct($pdo) {
        $this->plataformaModel = new Plataforma($pdo);
    }

    public function listar() {
        $plataformas = $this->plataformaModel->listar();
        include __DIR__ . '/../views/plataformas/index.php';
    }

    public function criar() {
        include __DIR__ . '/../views/plataformas/criar.php';
    }

    public function salvar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->plataformaModel->criar($_POST['nome']);
            header('Location: index.php?action=listar_plataformas');
        }
    }

    public function editar() {
        $plataforma = $this->plataformaModel->buscarPorId($_GET['id']);
        include __DIR__ . '/../views/plataformas/editar.php';
    }

    public function atualizar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->plataformaModel->atualizar($_POST['id'], $_POST['nome']);
            header('Location: index.php?action=listar_plataformas');
        }
    }

    public function excluir() {
        $this->plataformaModel->excluir($_GET['id']);
        header('Location: index.php?action=listar_plataformas');
    }
}
?>