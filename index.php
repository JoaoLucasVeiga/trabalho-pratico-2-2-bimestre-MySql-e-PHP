<?php
session_start();

require_once __DIR__ . '/config/database.php';
require_once __DIR__ . '/controllers/ProdutoController.php';
require_once __DIR__ . '/controllers/PlataformaController.php';

$pdo = conectar_db();

$action = $_GET['action'] ?? 'listar_produtos';

$produtoController = new ProdutoController($pdo);
$plataformaController = new PlataformaController($pdo);

switch ($action) {
    case 'listar_plataformas': $plataformaController->listar(); break;
    case 'criar_plataforma': $plataformaController->criar(); break;
    case 'salvar_plataforma': $plataformaController->salvar(); break;
    case 'editar_plataforma': $plataformaController->editar(); break;
    case 'atualizar_plataforma': $plataformaController->atualizar(); break;
    case 'excluir_plataforma': $plataformaController->excluir(); break;
    case 'listar_produtos': $produtoController->listar(); break;
    case 'criar_produto': $produtoController->criar(); break;
    case 'salvar_produto': $produtoController->salvar(); break;
    case 'editar_produto': $produtoController->editar(); break;
    case 'atualizar_produto': $produtoController->atualizar(); break;
    case 'excluir_produto': $produtoController->excluir(); break;
    default:
        header('Location: index.php?action=listar_produtos');
        break;
}
?>