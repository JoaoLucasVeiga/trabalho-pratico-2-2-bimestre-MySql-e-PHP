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
 * Descritivo: Esse código é o roteador principal do sistema. Ele inicia a sessão, conecta ao 
 banco de dados, carrega os controladores e executa a ação informada na URL (como listar, criar, 
 editar ou excluir produtos e plataformas). Se nenhuma ação for passada, ele mostra a lista de produtos por padrão.
 ******************************************************************************/


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
