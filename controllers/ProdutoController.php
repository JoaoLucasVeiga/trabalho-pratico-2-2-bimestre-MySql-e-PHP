<?php
/*******************************************************************************
 * Curso: Engenharia de Software
 * Disciplina: Linguagem e Técnicas de Programação
 * Professor: Flores
 * Turma: ESOFT-2B
 * Componentes: (Seus nomes e RAs)
 ******************************************************************************/

// AS DUAS LINHAS ABAIXO ESTAVAM FALTANDO
require_once __DIR__ . '/../models/Produto.php';
require_once __DIR__ . '/../models/Plataforma.php';

class ProdutoController {
    private $produtoModel;
    private $plataformaModel;
    public function __construct($pdo) {
        $this->produtoModel = new Produto($pdo);
        $this->plataformaModel = new Plataforma($pdo);
    }

    public function listar() {
        define('ITENS_POR_PAGINA', 6);
        $termoBusca = $_GET['busca'] ?? '';
        $paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
        
        $totalProdutos = $this->produtoModel->contarTotal($termoBusca);
        $totalPaginas = ceil($totalProdutos / ITENS_POR_PAGINA);
        $offset = ($paginaAtual - 1) * ITENS_POR_PAGINA;

        $produtos = $this->produtoModel->listarPaginadoEBuscar($termoBusca, ITENS_POR_PAGINA, $offset);
        
        include __DIR__ . '/../views/produtos/index.php';
    }
    
    private function processarUploadImagem($fileInfo, $imagemAntiga = '') {
        if (isset($fileInfo) && $fileInfo['error'] === UPLOAD_ERR_OK) {
            $uploadDir = 'public/images/';
            $nomeUnico = uniqid() . '-' . basename($fileInfo['name']);
            $caminhoCompleto = $uploadDir . $nomeUnico;

            if (move_uploaded_file($fileInfo['tmp_name'], $caminhoCompleto)) {
                if (!empty($imagemAntiga) && file_exists($imagemAntiga)) {
                    unlink($imagemAntiga);
                }
                return $caminhoCompleto;
            }
        }
        return $imagemAntiga;
    }

    public function salvar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $caminhoImagem = $this->processarUploadImagem($_FILES['imagem']);

            $this->produtoModel->criar($_POST['nome'], $_POST['descricao'], $_POST['preco'], $caminhoImagem, $_POST['plataforma_id']);
            $_SESSION['mensagem'] = ['tipo' => 'sucesso', 'texto' => 'Produto adicionado com sucesso!'];
            header('Location: index.php?action=listar_produtos');
        }
    }

    public function atualizar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $caminhoImagem = $this->processarUploadImagem($_FILES['imagem'], $_POST['imagem_antiga']);

            $this->produtoModel->atualizar($_POST['id'], $_POST['nome'], $_POST['descricao'], $_POST['preco'], $caminhoImagem, $_POST['plataforma_id']);
            $_SESSION['mensagem'] = ['tipo' => 'sucesso', 'texto' => 'Produto atualizado com sucesso!'];
            header('Location: index.php?action=listar_produtos');
        }
    }

    public function excluir() {
        $produto = $this->produtoModel->buscarPorId($_GET['id']);
        if ($produto && !empty($produto['url_imagem']) && file_exists($produto['url_imagem'])) {
            unlink($produto['url_imagem']);
        }
        $this->produtoModel->excluir($_GET['id']);
        $_SESSION['mensagem'] = ['tipo' => 'sucesso', 'texto' => 'Produto excluído com sucesso!'];
        header('Location: index.php?action=listar_produtos');
    }

    public function criar() {
        $plataformas = $this->plataformaModel->listar();
        include __DIR__ . '/../views/produtos/criar.php';
    }
    
    public function editar() {
        $produto = $this->produtoModel->buscarPorId($_GET['id']);
        $plataformas = $this->plataformaModel->listar();
        include __DIR__ . '/../views/produtos/editar.php';
    }
}
?>