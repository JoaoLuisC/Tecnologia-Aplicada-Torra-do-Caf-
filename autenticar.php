<?php
session_start();
include 'conexao.php'; // Conecta ao banco

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
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            // Usuário encontrado
            $stmt->bind_result($id, $nome, $senhaCriptografada);
            $stmt->fetch();

            // Verifica a senha
            if (password_verify($senha, $senhaCriptografada)) {
                // Senha correta - Inicia a sessão
                $_SESSION['usuario_id'] = $id;
                $_SESSION['usuario_nome'] = $nome;

                // Redireciona para a página restrita
                header("Location: dashboard.php");
                exit;
            } else {
                redirecionaComErro("Senha incorreta.");
            }
        } else {
            redirecionaComErro("E-mail não cadastrado.");
        }

        $stmt->close();
    } else {
        redirecionaComErro("Erro na consulta ao banco de dados.");
    }
}
?>
