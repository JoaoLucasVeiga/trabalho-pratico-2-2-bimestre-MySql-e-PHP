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
 * Descritivo: Responsável por gerenciar as operações de listar, criar, editar, atualizar e excluir
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
        // Ação: Mostrar o formulário para criar uma NOVA plataforma.
        // View Correta: /views/plataformas/criar.php
        include __DIR__ . '/../views/plataformas/criar.php';
    }

    public function salvar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty(trim($_POST['nome']))) {
            $this->plataformaModel->criar($_POST['nome']);
            $_SESSION['mensagem'] = ['tipo' => 'sucesso', 'texto' => 'Plataforma adicionada com sucesso!'];
        } else {
            $_SESSION['mensagem'] = ['tipo' => 'erro', 'texto' => 'O nome da plataforma não pode ser vazio.'];
        }
        header('Location: index.php?action=listar_plataformas');
        exit();
    }

    public function editar() {
        // Ação: Buscar os dados de UMA plataforma e mostrar o formulário de edição.
        // View Correta: /views/plataformas/editar.php
        $plataforma = $this->plataformaModel->buscarPorId($_GET['id']);
        include __DIR__ . '/../views/plataformas/editar.php';
    }

    public function atualizar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty(trim($_POST['nome']))) {
            $this->plataformaModel->atualizar($_POST['id'], $_POST['nome']);
            $_SESSION['mensagem'] = ['tipo' => 'sucesso', 'texto' => 'Plataforma atualizada com sucesso!'];
        } else {
            $_SESSION['mensagem'] = ['tipo' => 'erro', 'texto' => 'O nome da plataforma não pode ser vazio.'];
        }
        header('Location: index.php?action=listar_plataformas');
        exit();
    }

    public function excluir() {
        $this->plataformaModel->excluir($_GET['id']);
        $_SESSION['mensagem'] = ['tipo' => 'sucesso', 'texto' => 'Plataforma e produtos associados foram excluídos!'];
        header('Location: index.php?action=listar_plataformas');
        exit();
    }
}
?>
