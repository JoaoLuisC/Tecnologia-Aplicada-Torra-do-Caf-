<?php
// Conecta ao banco
require_once 'conexao.php';

// Função para mostrar erros de forma amigável
function redirecionaComErro($mensagem) {
    echo "<script>alert('$mensagem'); window.history.back();</script>";
    exit;
}

// Verifica se veio pelo método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Pega e limpa os dados
    $nome = trim($_POST['firstName']);
    $sobrenome = trim($_POST['lastName']);
    $email = trim($_POST['email']);
    $confirmEmail = trim($_POST['confirmEmail']);
    $senha = trim($_POST['password']);
    $confirmSenha = trim($_POST['confirmPassword']);

    // Verificações básicas
    if (empty($nome) || empty($sobrenome) || empty($email) || empty($confirmEmail) || empty($senha) || empty($confirmSenha)) {
        redirecionaComErro("Todos os campos são obrigatórios!");
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        redirecionaComErro("E-mail inválido.");
    }

    if ($email !== $confirmEmail) {
        redirecionaComErro("Os e-mails digitados não conferem.");
    }

    if (strlen($senha) < 8) {
        redirecionaComErro("A senha deve ter no mínimo 8 caracteres.");
    }

    if ($senha !== $confirmSenha) {
        redirecionaComErro("As senhas digitadas não conferem.");
    }

    // Verifica se o email já existe
    $sql_verifica = "SELECT id FROM usuarios WHERE email = ?";
    if ($stmt = $conn->prepare($sql_verifica)) {
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows > 0) {
            redirecionaComErro("Este e-mail já está cadastrado.");
        }
        $stmt->close();
    } else {
        redirecionaComErro("Erro no banco de dados: " . $conn->error);
    }

    // Criptografa a senha
    $senhaCriptografada = password_hash($senha, PASSWORD_DEFAULT);

    // Insere o usuário
    $sql = "INSERT INTO usuarios (nome, sobrenome, email, senha) VALUES (?, ?, ?, ?)";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("ssss", $nome, $sobrenome, $email, $senhaCriptografada);

        if ($stmt->execute()) {
            echo "<script>alert('Cadastro realizado com sucesso!'); window.location.href = 'login.php';</script>";
            exit;
        } else {
            redirecionaComErro("Erro ao cadastrar: " . $stmt->error);
        }
        $stmt->close();
    } else {
        redirecionaComErro("Erro no banco de dados: " . $conn->error);
    }
} else {
    redirecionaComErro("Requisição inválida.");
}
?>
