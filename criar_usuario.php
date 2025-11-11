<?php
require_once 'config/database.php';

// --- DADOS DO SEU PRIMEIRO ADMIN ---
$nome = "Admin";
$email = "admin@legendkeys.com";
$senhaPlana = "admin123"; // Uma senha temporária

// --- LÓGICA DE CRIAÇÃO ---
$senhaHash = password_hash($senhaPlana, PASSWORD_DEFAULT);

$pdo = conectar_db();
$stmt = $pdo->prepare("INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)");

if ($stmt->execute([$nome, $email, $senhaHash])) {
    echo "<h1>Usuário Admin criado com sucesso!</h1>";
    echo "<p><strong>Email:</strong> " . htmlspecialchars($email) . "</p>";
    echo "<p><strong>Senha:</strong> " . htmlspecialchars($senhaPlana) . "</p>";
    echo "<p style='color:red;'><strong>AVISO:</strong> Apague este arquivo (criar_usuario.php) agora mesmo por segurança!</p>";
} else {
    echo "<h1>Erro ao criar usuário.</h1>";
}
?>```
3.  **Execute o script:** Abra no seu navegador a URL: `http://localhost/trabalho_crud_jogos/criar_usuario.php`.
4.  Você verá uma mensagem de sucesso. **APAGUE O ARQUIVO `criar_usuario.php` IMEDIATAMENTE APÓS A EXECUÇÃO!**

---

### **Passo 3: Criar os Arquivos do Sistema de Login**

Agora, vamos criar a página de login e seu controlador.

**Ação 1:** Crie uma nova pasta `login` dentro de `views`.
**Ação 2:** Crie os dois arquivos abaixo.

#### **Novo Arquivo: `controllers/LoginController.php`**
```php
<?php
require_once __DIR__ . '/../models/Usuario.php'; // Vamos criar este Model a seguir

class LoginController {
    private $usuarioModel;

    public function __construct($pdo) {
        $this->usuarioModel = new Usuario($pdo);
    }

    public function index() {
        // Mostra o formulário de login
        include __DIR__ . '/../views/login/index.php';
    }

    public function entrar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $senha = $_POST['senha'];

            $usuario = $this->usuarioModel->buscarPorEmail($email);

            if ($usuario && password_verify($senha, $usuario['senha'])) {
                // Login bem-sucedido
                $_SESSION['usuario_id'] = $usuario['id'];
                $_SESSION['usuario_nome'] = $usuario['nome'];
                header('Location: index.php?action=listar_produtos');
            } else {
                // Falha no login
                $_SESSION['mensagem'] = ['tipo' => 'erro', 'texto' => 'Email ou senha inválidos.'];
                header('Location: index.php?action=login');
            }
        }
    }

    public function sair() {
        session_destroy();
        header('Location: index.php?action=login');
    }
}
?>