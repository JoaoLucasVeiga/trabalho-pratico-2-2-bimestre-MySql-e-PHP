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
 * Descritivo: Ponto de entrada e roteador principal da aplicação.
 ******************************************************************************/
session_start();

require_once 'config/database.php';
require_once 'controllers/PlataformaController.php';
require_once 'controllers/ProdutoController.php';

$pdo = conectar_db();

$action = $_GET['action'] ?? 'listar_produtos';

$plataformaController = new PlataformaController($pdo);
$produtoController = new ProdutoController($pdo);

switch ($action) {
    // Rotas de Produtos
    case 'listar_produtos':
        $produtoController->listar();
        break;
    case 'criar_produto':
        $produtoController->criar();
        break;
    case 'salvar_produto':
        $produtoController->salvar();
        break;
    case 'editar_produto':
        $produtoController->editar();
        break;
    case 'atualizar_produto':
        $produtoController->atualizar();
        break;
    case 'excluir_produto':
        $produtoController->excluir();
        break;

    // Rotas de Plataformas
    case 'listar_plataformas':
        $plataformaController->listar();
        break;
    case 'criar_plataforma':
        $plataformaController->criar();
        break;
    case 'salvar_plataforma':
        $plataformaController->salvar();
        break;
    case 'editar_plataforma':
        $plataformaController->editar();
        break;
    case 'atualizar_plataforma':
        $plataformaController->atualizar();
        break;
    case 'excluir_plataforma':
        $plataformaController->excluir();
        break;

    default:
        echo "<h1>Erro 404: Página não encontrada!</h1>";
        break;
}
?>