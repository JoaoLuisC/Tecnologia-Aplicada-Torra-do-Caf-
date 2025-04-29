<?php
session_start();
include '../configs/conexao.php'; // Conecta ao banco

// Função para redirecionar com erro
function redirecionaComErro($mensagem) {
    echo "<script>alert('$mensagem'); window.history.back();</script>";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Pega os dados do formulário
    $email = trim($_POST['email']);
    $senha = trim($_POST['senha']);

    // Verifica se os campos estão vazios
    if (empty($email) || empty($senha)) {
        redirecionaComErro("Por favor, preencha todos os campos.");
    }

    // Prepara a consulta para verificar o e-mail
    $sql = "SELECT id, nome, senha FROM usuarios WHERE email = ?";
    $stmt = $conn->prepare($sql);
    
    if ($stmt) {
        $stmt->execute([$email]);

        // Busca o usuário
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario) {
            // Usuário encontrado
            if (password_verify($senha, $usuario['senha'])) {
                // Senha correta - Inicia a sessão
                $_SESSION['usuario_id'] = $usuario['id'];
                $_SESSION['usuario_nome'] = $usuario['nome'];

                // Redireciona para a página restrita
                header("Location: ../../views/usuario.php");
                exit;
            } else {
                redirecionaComErro("Senha incorreta.");
            }
        } else {
            redirecionaComErro("E-mail não cadastrado.");
        }
    } else {
        redirecionaComErro("Erro na consulta ao banco de dados.");
    }
}
?>
